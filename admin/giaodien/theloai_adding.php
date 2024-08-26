
<style>
 
     .btnLuu {
            margin-top: 20px;
            width: 100%;
            padding: 10px 20px;
        }

        .wrap-field {
            margin-top: 10px;
            width: 100%;

        }  
    </style>

<div>
                    <center>
                    <br> <br>
                        <h2>Thêm thể loại</h2> <br>
                    </center>
            </div>
    <div class="box-contentt">
   
    <form name="theloai-formadd" method="POST" action="./xulythem.php" enctype="multipart/form-data">
            <div class="clear-both">  <br> 
            </div>
            
                   
            <div class="wrap-field form-group">
                <label>Tên thể loại:</label><br>
                <input class="form-control"  type="text" name="name" value="" />
               
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field form-group">
                <label>Tổng sản phẩm:</label><br>
                <input class="form-control"  type="text" name="tong_sp" value="" />
               
                <div class="clear-both"></div>
            </div>
         
           
           
            <center>
            
                        <button class="btn btn-danger btnLuu" name="btntladd" type="submit" title="Lưu thể loại" value="Lưu"  >Lưu </button>
                        <button class="btn btn-primary btnLuu" type="reset" value="Hủy">Hủy</button>
                    </center>
            </div>
           
            
        </form>
        <div class="clear-both"></div>