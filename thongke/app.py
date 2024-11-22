import dash
from dash import dcc, html
import plotly.express as px
import pandas as pd  
import plotly.graph_objects as go
from data import get_monthly_revenue, get_monthly_sales, get_top_and_least_sold_products, get_product_categorys, get_top_products_revenue, get_customer_levels
import data

# Tạo ứng dụng Dash
app = dash.Dash(__name__)

# Dữ liệu và tính toán
total_revenue = data.get_total_revenue()
confirmed_orders = data.get_confirmed_orders()
total_sold_products = data.get_total_sold_products()
total_purchase_cost = data.get_total_purchase_cost()
total_purchased_products = data.get_total_purchased_products()
total_refunds = data.get_total_refunds()
profit = total_revenue - total_purchase_cost - total_refunds
profit_margin = (profit / total_revenue) * 100
conversion_rate = (total_sold_products / total_purchased_products) * 100
# Số lượng tồn kho
total_Inventory_Quantity =  data.get_total_Inventory_Quantity()
# Số lượng chờ vận chuyển
total_Quantity_Awaiting_Shipment = data.get_total_Quantity_Awaiting_Shipment()
# Tổng số đơn hàng đã bán
confirmed_orders = data.get_confirmed_orders()
# Lấy dữ liệu doanh thu và số lượng bán ra
revenue_data = get_monthly_revenue()
sales_data = get_monthly_sales()

# Biểu đồ hỗn hợp
# Kiểm tra dữ liệu và định dạng lại
months = []
revenue = []
sales = []
# Giả sử revenue_data và sales_data là DataFrame, ta sử dụng iloc hoặc tên cột để truy cập
for i in range(len(revenue_data)):
    months.append(f"{int(revenue_data.iloc[i]['thang'])}/{int(revenue_data.iloc[i]['nam'])}")
    revenue.append(revenue_data.iloc[i]['doanh_thu'])
    sales.append(sales_data.iloc[i]['so_luong'])
# Tạo biểu đồ hỗn hợp
fig = go.Figure()
# Biểu đồ cột số lượng sản phẩm bán ra
fig.add_trace(go.Bar(
    x=months,
    y=sales,
    name="Số lượng bán ra",
    yaxis="y1"
))
# Biểu đồ đường doanh thu
fig.add_trace(go.Scatter(
    x=months,
    y=revenue,
    name="Doanh thu",
    mode='lines+markers',
    yaxis="y2"
))
# Cấu hình trục y cho hai loại biểu đồ
fig.update_layout(
    title="Thống kê doanh thu và sản phẩm bán ra theo tháng",
    yaxis=dict(
        title="Số lượng sản phẩm bán ra",
        side="left",
        showgrid=True
    ),
    yaxis2=dict(
        title="Doanh thu",
        side="right",
        overlaying="y",
        showgrid=False
    ),
    xaxis=dict(
        title="Tháng"
    ),
    barmode="group"
)


# Biểu đồ 1
# Lấy dữ liệu 
data = get_product_categorys()

# Biểu đồ Vòng (Donut Chart)
fig1 = px.pie(
    data, 
    names='ten_tl', 
    values='so_luong_ban', 
    title='Tỷ lệ sản phẩm bán theo danh mục',
    labels={'ten_tl': 'Danh mục', 'so_luong_ban': 'Số lượng bán'},
    hole=0.4  # Thiết lập tỷ lệ kích thước vòng tròn trống ở giữa
)

# Tùy chỉnh layout cho dễ nhìn
fig1.update_layout(
    title='Tỷ lệ sản phẩm bán theo danh mục',
    title_font_size=20,
    title_x=0.5,  # Căn giữa tiêu đề
    title_y=0.95,  # Điều chỉnh vị trí tiêu đề
    font=dict(family="Arial", size=14),
    showlegend=True, 
)


# Biểu đồ 2
# Lấy dữ liệu từ SQL query
df = get_top_and_least_sold_products()
# Tạo danh sách tháng đầy đủ từ 1 đến 12
all_months = pd.DataFrame({'thang': list(range(1, 13))})
# Kết hợp dữ liệu đầy đủ với các tháng
df_full = pd.merge(all_months, df, on='thang', how='left').fillna({
    'ten_sp': 'Không có sản phẩm',
    'tong_so_luong': 0,
    'loai_san_pham': 'Không có dữ liệu'
})
# Tạo biểu đồ cột đứng thay vì cột ngang
fig2 = px.bar(
    df_full,
    x='thang',  # Đặt trục tháng ở ngang
    y='tong_so_luong',  # Tổng số lượng trên trục dọc
    color='loai_san_pham',
    text='ten_sp',  # Hiển thị tên sản phẩm trên cột
    barmode='group',
    title='Sản phẩm bán chạy nhất và bán ít nhất trong tháng'
)
# Tùy chỉnh trục và nhãn
fig2.update_layout(
    xaxis_title='Tháng',
    yaxis_title='Tổng số lượng bán',
    xaxis=dict(
        tickmode='array',
        tickvals=list(range(1, 13)),
        ticktext=[f'{i}' for i in range(1, 13)]
    ),
    legend_title='Loại sản phẩm',
    title_x=0.5,
    uniformtext_minsize=10,
    uniformtext_mode='hide'
)
# Hiển thị tên sản phẩm trên đầu cột để tránh che lấp
fig2.update_traces(
    textposition='outside',
    texttemplate='%{text}'  
)

# Biểu đồ 3
data = get_top_products_revenue()
fig3 = px.pie(data, names='ten_san_pham', values='doanh_thu', title='Top 10 sản phẩm bán chạy nhất')

# Biểu đồ 4
data = get_customer_levels()
fig4 = px.pie(data, names='thanhvien', values='so_khach_hang', title='Phân loại khách hàng theo cấp độ thành viên')


cards = html.Div(
    children=[
        html.Div(className="card card-blue2", children=[html.H4("DOANH THU"), html.P(f"{int(total_revenue):,}")]),
        html.Div(className="card card-blue", children=[html.H4("SỐ LƯỢNG ĐÃ BÁN"), html.P(f"{int(total_sold_products):,}")]),
        html.Div(className="card card-three", children=[html.H4("LỢI NHUẬN"), html.P(f"{int(profit):,}")]),
        html.Div(className="card card-red", children=[html.H4("TỶ LỆ LỢI NHUẬN"), html.P(f"{profit_margin:.2f}%")]),
        html.Div(className="card card-green", children=[html.H4("TỶ LỢI CHUYỂN ĐỔI"), html.P(f"{conversion_rate:.2f}%")]),
    ],
    className="cards-container"
)

# Thống kê kho dưới dạng bảng
inventory_stats = html.Div(
    children=[
        html.H3("THỐNG KÊ KHO", className="statistics-header"),
        html.Table(
            children=[
                html.Tr(
                    children=[
                        html.Td("Số lượng nhập kho", className="table-header"),
                        html.Td(f"{int(total_purchased_products):,}", className="table-value")
                    ]
                ),
                html.Tr(
                    children=[
                        html.Td("Số lượng tồn kho", className="table-header"),
                        html.Td(f"{int(total_Inventory_Quantity):,}", className="table-value")
                    ]
                ),
                html.Tr(
                    children=[
                        html.Td("đơn hàng đã bán", className="table-header"),
                        html.Td(f"{int(confirmed_orders):,}", className="table-value")
                    ]
                ),
                html.Tr(
                    children=[
                        html.Td("Số lượng chờ vận chuyển", className="table-header"),
                        html.Td(f"{int(total_Quantity_Awaiting_Shipment):,}", className="table-value")
                    ]
                ),
                html.Tr(
                    children=[
                        html.Td("Giá trị nhập kho", className="table-header"),
                        html.Td(f"{int(total_purchase_cost):,}", className="table-value")
                    ]
                ),
            ],
            className="inventory-table"
        ),
    ],
    className="inventory-container"
)

# App layout
app.layout = html.Div(children=[
    html.H1("THỐNG KÊ BÁN HÀNG", className="custom-header"),
    cards,
   html.Div(children=[
        # Đặt inventory_stats chiếm 30% và biểu đồ chiếm 70%
        html.Div(inventory_stats, style={'flex': '0 0 35%', 'padding': '10px', 'margin-right': '10px'}),
        html.Div(dcc.Graph(figure=fig), style={'flex': '0 0 60%', 'padding': '10px'})
    ], style={'display': 'flex', 'align-items': 'center', 'justify-content': 'space-between'}),
    html.Div(children=[
        html.Div(dcc.Graph(figure=fig1), className='graph-item'),
        html.Div(dcc.Graph(figure=fig2), className='graph-item')
    ], className='graph-container'),
    html.Div(children=[
        html.Div(dcc.Graph(figure=fig3), className='graph-item'),
        html.Div(dcc.Graph(figure=fig4), className='graph-item')
    ], className='graph-container'),
], className="layout-background")


# Run app
if __name__ == '__main__':
    app.run_server(debug=True, port=8050)
