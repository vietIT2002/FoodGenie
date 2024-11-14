<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">

                <ul class="breadcrumb-tree">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li class="active">Đơn hàng của tôi</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<!-- ĐƠN HÀNG CỦA TÔI -->
<div class="container">
    <div class="row">
        <div class="col col-lg-3 col-sm-12">
            <div class="row">
                <p>Tài khoản của
                <p>
                    <strong><?= $_SESSION['ten_dangnhap'] ?></strong>
            </div>
            <div>

                <ul class="footer-links">
                    <li><a href="?act=my_account"><i class="fa fa-user-o" style="color:black;"></i>&nbsp;Tài Khoản Của
                            Tôi</a>
                    </li>
                    <li><a href="?act=my_bill" style="color:#D10024;"><i class="fa fa-bars"
                                style="color:black;"></i>&nbsp;Đơn
                            Hàng Của Tôi</a></li>

                </ul>
            </div>
        </div>
        <div class="col col-lg-9 col-sm-12">
            <div class="section-title text-center">
                <h3 class="title">Đơn hàng của tôi</h3>
            </div>
            <table width=100% class="table table-bordered">
                <tr class="title-mybill info">
                    <th>Mã đơn hàng</th>
                    <th>Ngày mua</th>
                    <th>Sản phẩm</th>
                    <th>Tổng tiền(VNĐ)</th>
                    <th>Trạng thái đơn hàng</th>
                    <th></th>
                </tr>
                <?php
                $sql = 'SELECT * from hoadon where id_khachhang=' . $info['id'] . ' ORDER BY hoadon.ngay_tao DESC';
                $listBill = executeResult($sql);

                foreach ($listBill as $value) {
                    $ten_sp = $trangthai = '';
                    $sl_sp = 0;

                    $ten_sp = executeSingleResult('SELECT sanpham.ten_sp FROM cthoadon, sanpham WHERE cthoadon.id_sanpham=sanpham.id AND id_hoadon=' . $value['id'] . ' LIMIT 0, 1')['ten_sp'];
                    $sl_sp = executeSingleResult('SELECT COUNT(id_sanpham) AS sl_sp FROM cthoadon WHERE id_hoadon=' . $value['id'])['sl_sp'];
                    if ($sl_sp > 1)
                        $ten_sp = $ten_sp . ', ... và ' . ($sl_sp - 1) . ' sản phẩm khác.';
                    echo '<tr height=85px class="content-shopping">
                                        <td align=center ><a href="index.php?act=bill_detail&id=' . $value['id'] . '"><strong style="color:deepskyblue;"><u>HĐ' . $value['id'] . '</u></strong></a></td>
                                        <td>' . date('d-m-Y', strtotime($value['ngay_tao'])) . '</td>
                                        <td>' . $ten_sp . '</td>
                                        <td>' . currency_format($value['tong_tien']) . '</td>';
                    // if ($value['trang_thai'] == 0) {
                    //     echo '<td align=center style="color:red">Đang xử lý</td>
                    //                                 <td align:right; ><a onclick="huydonhang(' . $value['id'] . ')" style="color:#d10024"><i class="fa-solid fa-trash"></i></a></td>';
                    // } else {
                    //     echo '<td align=center style="color:#07ea03">Xác nhận giao</td><td></td>';
                    // }
  if ($value['trang_thai'] == 0 && $value['trang_thai_hien_thi'] == 0) {
    echo '<td align="center" style="color:red">Đang xử lý</td>
          <td align="right"><a onclick="huydonhang(' . $value['id'] . ')" style="color:#d10024"><i class="fa-solid fa-trash"></i></a></td>';
} elseif ($value['trang_thai'] == 1 && $value['trang_thai_hien_thi'] == 0) {
    echo '<td align="center" style="color:#07ea03">Xác nhận giao</td><td></td>';
} elseif ($value['trang_thai'] == 0 && $value['trang_thai_hien_thi'] == 1) {
    echo '<td align="center" style="color:grey">Bị hủy</td><td></td>';
}elseif ($value['trang_thai'] == 1 && $value['trang_thai_hien_thi'] == 1) {
    echo '<td align="center" style="color:grey">Đã giao</td><td></td>';
}
                    echo '</tr>';
                }
                ?>

            </table>
        </div>
    </div>
</div>
<!-- /ĐƠN HÀNG CỦA TÔI -->