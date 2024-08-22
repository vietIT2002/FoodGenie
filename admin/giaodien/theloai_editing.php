<?php
if (!empty($_GET['id'])) {
    $result = mysqli_query($con, "SELECT * FROM `theloai` WHERE `id` = " . $_GET['id']);
    $theloai = $result->fetch_assoc();
}
?>



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
                        <h2>Sửa thể loại</h2> <br>
                    </center>
            </div>
    <div class="box-contentt">
   
         
        <form name="theloai-formsua" method="POST" action="./xulythem.php?id=<?= $_GET['id'] ?>" enctype="multipart/form-data">
        <div class="clear-both">  <br> 
            </div>
            
                   
            <div class="wrap-field form-group">
                <label>Tên thể loại:</label><br>
                <input class="form-control"  type="text" name="name" value="<?= (!empty($theloai) ? $theloai['ten_tl'] : "") ?>" />
               
                <div class="clear-both"></div>
            </div>
                    
            <div class="wrap-field form-group">
                <label>Số lượng: </label><br>
                <input class="form-control"  type="text" name="tong_sp" value="<?= (!empty($theloai) ? $theloai['tong_sp'] : "") ?>" />
               
                <div class="clear-both"></div>
            </div>
           
           
            <center>
            
                        <button class="btn btn-danger btnLuu" name="btntlsua" type="submit" title="Lưu thể loại" value="Lưu"   >Lưu </button>
                        <button class="btn btn-primary btnLuu" type="reset" value="Hủy">Hủy</button>
                    </center>
            </div>
           
            
        </form>
        <div class="clear-both"></div>