<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">

</head>

<body>


<?php
include_once('function.php');
include_once('connect_db.php');

if (isset($_POST['btnadd'])) {
    if (isset($_POST['id']) && $_POST['id'] != '') {
        $id = $_POST['id'];
        $conn = mysqli_connect("localhost", "root", "", "foodgennie");
        // Kiểm tra mã sản phẩm trùng
        $checkQuery = "SELECT * FROM `sanpham` WHERE `id` = '$id'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<script>alert('Mã sản phẩm đã tồn tại, vui lòng nhập mã khác.'); window.history.back();</script>";
            exit;
        }

        if (isset($_POST['name']) && $_POST['name'] != '') {
            if (isset($_POST['price']) && $_POST['price'] != '') {
                if (isset($_POST['gia_goc']) && $_POST['gia_goc'] != '') {
                    if (isset($_POST['idtl']) && $_POST['idtl'] != '') {
                        if (isset($_POST['idncc']) && $_POST['idncc'] != '') {
                            if (isset($_POST['gia_nhap']) && $_POST['gia_nhap'] != '') {
                                if (isset($_POST['khoi_luong']) && $_POST['khoi_luong'] != '') {
                                    if (isset($_POST['xuat_xu']) && $_POST['xuat_xu'] != '') {
                                        if (isset($_POST['content']) && $_POST['content'] != '') {
                                            $namei = $_POST['name'];
                                            $price = $_POST['price'];
                                            $gia_goc = $_POST['gia_goc'];
                                            $idtl = $_POST['idtl'];
                                            $idncc = $_POST['idncc'];
                                            $gia_nhap = $_POST['gia_nhap'];
                                            $khoi_luong = $_POST['khoi_luong'];
                                            $xuat_xu = $_POST['xuat_xu'];
                                            $content = $_POST['content'];

                                            if ($_FILES['image']['name'] != NULL) {
                                                if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {
                                                    $path2 = "../img/";
                                                    $tmp_name = $_FILES['image']['tmp_name'];
                                                    $name = $_FILES['image']['name'];
                                                    move_uploaded_file($tmp_name, $path2 . $name);
                                                    $image_url = $name;
                                                    
                                                    $sql1 = "INSERT INTO `sanpham` (`id`, `ten_sp`, `hinh_anh`, `don_gia`, `gia_goc`, `noi_dung`, `gia_nhap`, `id_the_loai`, `id_nha_cc`, `trangthai`, `khoi_luong`, `xuat_xu`) 
                                                             VALUES ('$id', '$namei', '$image_url', " . str_replace('.', '', $price) . ", " . str_replace('.', '', $gia_goc) . ", '$content', " . str_replace('.', '', $gia_nhap) . ", '$idtl', '$idncc', 0, '$khoi_luong', '$xuat_xu');";
                                                    
                                                    
                                                    if (mysqli_query($conn, $sql1)) {
                                                        echo "<script>window.location.href = 'admin.php?act=addsptc&dk=yes';</script>";
                                                    } else {
                                                        echo "<script>alert('Có lỗi xảy ra khi thêm sản phẩm. Vui lòng thử lại.'); window.history.back();</script>";
                                                    }
                                                } else {
                                                    echo "<script>alert('Chỉ cho phép upload ảnh (jpeg, png, gif).'); window.history.back();</script>";
                                                }
                                            } else {
                                                echo "<script>alert('Vui lòng chọn ảnh sản phẩm.'); window.history.back();</script>";
                                            }
                                        } else {
                                            header("location:./admin.php?act=addsptc&dk=no");
                                        }
                                    } else {
                                        header("location:./admin.php?act=addsptc&dk=no");
                                    }
                                } else {
                                    header("location:./admin.php?act=addsptc&dk=no");
                                }
                            } else {
                                header("location:./admin.php?act=addsptc&dk=no");
                            }
                        } else {
                            header("location:./admin.php?act=addsptc&dk=no");
                        }
                    } else {
                        header("location:./admin.php?act=addsptc&dk=no");
                    }
                } else {
                    header("location:./admin.php?act=addsptc&dk=no");
                }
            } else {
                header("location:./admin.php?act=addsptc&dk=no");
            }
        } else {
            header("location:./admin.php?act=addsptc&dk=no");
        }
    } else {
        header("location:./admin.php?act=addsptc&dk=no");
    }
}

    if (isset($_POST['btnsua'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['price']))
                    if ($_POST['price'] != '') {
                        if (isset($_POST['gia_goc']))
                            if ($_POST['gia_goc'] != '') {
                                if (isset($_POST['idtl']))
                                    if ($_POST['idtl'] != '') {
                                        if (isset($_POST['idncc']))
                                            if ($_POST['idncc'] != '') {
                                                if (isset($_POST['khoi_luong']))
                                                            if ($_POST['khoi_luong'] != '') {
                                                                if (isset($_POST['xuat_xu']))
                                                                    if ($_POST['xuat_xu'] != '') {
                                                if (isset($_POST['content']))
                                                    if ($_POST['content'] != '') {
                                                        if (isset($_POST['trangthai']) == "on")
                                                            $trangthai = 0;
                                                        if (isset($_POST['trangthai']) == NULL)
                                                            $trangthai = 1;
                                                        include_once('function.php');
                                                        $con = mysqli_connect("localhost", "root", "", "foodgennie");
                                                        $result4 = mysqli_query($con, "SELECT `id_the_loai` FROM `sanpham` WHERE `id`=" . $_GET['id'] . "");
                                                        $r2 = mysqli_fetch_array($result4);
                                                        if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
                                                            $uploadedFiles = $_FILES['gallery'];
                                                            $result = uploadFiles($uploadedFiles);
                                                            $galleryImages = $result['uploaded_files'];
                                                        }
                                                        if (!empty($_POST['gallery_image'])) {
                                                            $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                                                        }
                                                        if (!isset($image_url) && !empty($_POST['image'])) {
                                                            $image_url = $_POST['image'];
                                                        }
                                                        if ($_FILES['image']['name'] != NULL) {
                                                            // Kiểm tra file up lên có phải là ảnh không
                                                            if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {

                                                                // Nếu là ảnh tiến hành code upload
                                                                $path1 = "";
                                                                $path = "../img/"; // Ảnh sẽ lưu vào thư mục images
                                                                $tmp_name = $_FILES['image']['tmp_name'];
                                                                $name = $_FILES['image']['name'];
                                                                // Upload ảnh vào thư mục images
                                                                move_uploaded_file($tmp_name, $path . $name);
                                                                $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                                                // Insert ảnh vào cơ sở dữ liệu
                                                            }
                                                        }
                                                        $result1 = mysqli_query($con, "UPDATE `sanpham` 
                                                                                SET `ten_sp` = '" . $_POST['name'] . "',
                                                                                `hinh_anh` =  '$image_url',
                                                                                `don_gia` = " . str_replace('.', '', $_POST['price']) . ",
                                                                                `gia_goc` = " . str_replace('.', '', $_POST['gia_goc']) . ",
                                                                                `noi_dung` = '" . $_POST['content'] . "',
                                                                                `ngay_sua` = " . time() . ",
                                                                                `id_the_loai` =" . $_POST['idtl'] . ",
                                                                                `id_nha_cc`=" . $_POST['idncc'] . ",
                                                                                `xuat_xu`='" . $_POST['xuat_xu'] . "',
                                                                                `khoi_luong`='" . $_POST['khoi_luong'] . "',
                                                                                `trangthai`=" . $trangthai . "
                                                                                WHERE `id` = " . $_GET['id']);
                                                        if (!empty($galleryImages)) {
                                                            $product_id = ($_GET['act'] == 'sua' && !empty($_GET['id'])) ? $_GET['id'] : $con->insert_id;
                                                            $insertValues = "";
                                                            foreach ($galleryImages as $path) {
                                                                if (empty($insertValues)) {
                                                                    $insertValues = "( " . $product_id . ", '" . $path . "')";
                                                                } else {
                                                                    $insertValues .= ",( " . $product_id . ", '" . $path . "')";
                                                                }
                                                            }
                                                            $result = mysqli_query($con, "INSERT INTO `hinhanhsp` ( `id_sp`, `hinh_anh`) VALUES " . $insertValues . ";");
                                                            echo "cap nhat thanh cong";
                                                        }
                                                        if ($result1) {
                                                            // $result5 = mysqli_query($con,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`=".$r2['id_the_loai']."");
                                                            // $r5=mysqli_fetch_array($result5);
                                                            // $result6 = mysqli_query($con,"UPDATE `theloai` SET `tong_sp`=".$r5['cid_the_loai']." WHERE `id`=".$r2['id_the_loai']."");
                                                            // $result2 = mysqli_query($con,"SELECT COUNT(`id_the_loai`) AS cid_the_loai FROM `sanpham` WHERE `id_the_loai`=".$_POST['idtl']."");
                                                            // $r=mysqli_fetch_array($result2);
                                                            // $result3 = mysqli_query($con,"UPDATE `theloai` SET `tong_sp`=".$r['cid_the_loai']." WHERE `id`=".$_POST['idtl']."");
                                                            // if ($result6&&$result3) { 
                                                            header("location:./admin.php?act=suasptc&dk=yes");
                                                            // else header("location:./admin.php?act=suasptc&dk=no"); 
                                                        } else
                                                            header("location:./admin.php?act=suasptc&dk=no");
                                                    } else
                                                        header("location:./admin.php?act=suasptc&dk=no");
                                            } else
                                                header("location:./admin.php?act=suasptc&dk=no");
                                    }else
                                        header("location:./admin.php?act=suasptc&dk=no");
                            }else
                                header("location:./admin.php?act=suasptc&dk=no");
                    } else
                        header("location:./admin.php?act=suasptc&dk=no");
            } else
                                header("location:./admin.php?act=suasptc&dk=no");
                    } else
                        header("location:./admin.php?act=suasptc&dk=no");
            } else
                header("location:./admin.php?act=suasptc&dk=no");
    }
    if (isset($_POST['btntladd'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                // if (isset($_POST['tong_sp']))
                //     if ($_POST['tong_sp'] != '') {
                        $namei = $_POST['name'];
                        // $tong = $_POST['tong_sp'];
                        $sql = "INSERT INTO `theloai`(`ten_tl`) VALUES ('$namei')";
                        $result = mysqli_query($con, $sql);
                        if ($result)
                            header("location:./admin.php?act=addtltc&dk=yes");
                        else
                            header("location:./admin.php?act=addtltc&dk=no");
                    // } else
                    //     header("location:./admin.php?act=addtltc&dk=no");
            } else
                header("location:./admin.php?act=addtltc&dk=no");
    }
    if (isset($_POST['btntlsua'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                // if (isset($_POST['tong_sp']))
                //     if ($_POST['tong_sp'] != '') {
                        $con = mysqli_connect("localhost", "root", "", "foodgennie");
                        $result1 = mysqli_query($con, "UPDATE `theloai` SET `ten_tl` = '" . $_POST['name'] . "'WHERE `theloai`.`id` = " . $_GET['id'] . " ");
                        if ($result1)
                            header("location:./admin.php?act=suatltc&dk=yes");
                        else
                            header("location:./admin.php?act=suatltc&dk=no");
                    // } else
                    //     header("location:./admin.php?act=suatltc&dk=no");
            } else
                header("location:./admin.php?act=suatltc&dk=no");
    }
    if (isset($_POST['btnnccadd'])) {
        if (isset($_POST['name']))
            if ($_POST['name'] != '') {
                if (isset($_POST['email']))
                    if ($_POST['email'] != '') {
                        if (isset($_POST['website']))
                            if ($_POST['website'] != '') {
                                if (isset($_POST['sdt']))
                                    if ($_POST['sdt'] != '') {
                                        $sql = "INSERT INTO `nhacungcap`(`ten_ncc`, `email`, `web_site`,`phone`) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['website'] . "','" . $_POST['sdt'] . "')";
                                        $result = execute($sql);
                                        header("location:./admin.php?act=nccaddtc&dk=yes");
                                    } else
                                        header("location:./admin.php?act=nccaddtc&dk=no");
                            } else
                                header("location:./admin.php?act=nccaddtc&dk=no");
                    } else
                        header("location:./admin.php?act=nccaddtc&dk=no");
            } else
                header("location:./admin.php?act=nccaddtc&dk=no");
}
    
    if (isset($_POST['btnkhtt'])) {
        if (isset($_POST['trangthai']) == "on")
            $trangthai = 0;
        if (isset($_POST['trangthai']) == NULL)
            $trangthai = 1;
        $sql = "UPDATE `khachhang` SET `trangthai` = '" . $trangthai . "' WHERE `khachhang`.`id` = " . $_GET['id'] . " ";
        $result = execute($sql);
        header("location:./admin.php?act=khtttc&dk=yes");
    }
    if (isset($_POST['btnnvadd'])) {
        if (isset($_POST['id']) && $_POST['id'] != '' && isset($_POST['name']) && $_POST['name'] != '' && 
            isset($_POST['id_loainv']) && $_POST['id_loainv'] != '' && isset($_POST['id_quyen']) && $_POST['id_quyen'] != '' && 
            isset($_POST['mat_khau']) && $_POST['mat_khau'] != '' && isset($_POST['phone']) && $_POST['phone'] != '' && 
            isset($_POST['email']) && $_POST['email'] != '' && $_POST['tendangnhap'] != '') {
    
            $conn = mysqli_connect("localhost", "root", "", "foodgennie");
    
            // Lấy giá trị từ form
            $id = $_POST['id'];
            $namei = $_POST['name'];
            $id_loainv = $_POST['id_loainv'];
            $id_quyen = $_POST['id_quyen'];
            $mat_khau = $_POST['mat_khau'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $tendangnhap = $_POST['tendangnhap'];
    
            // Kiểm tra mã nhân viên đã tồn tại chưa
            $sql_check = "SELECT * FROM `nhanvien` WHERE `id` = '$id'";
            $result_check = mysqli_query($conn, $sql_check);
    
            if (mysqli_num_rows($result_check) > 0) {
                // Nếu mã nhân viên đã tồn tại
                echo "<script>alert('Mã nhân viên đã tồn tại, vui lòng nhập mã khác!'); window.history.back();</script>";
                exit();
            }
    
            // Nếu không có lỗi, tiếp tục xử lý ảnh
            if ($_FILES['image']['name'] != NULL) {
                // Kiểm tra file up lên có phải là ảnh không
                if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {
    
                    // Nếu là ảnh tiến hành code upload
                    $path1 = ""; // Ảnh sẽ lưu vào thư mục images
                    $path2 = "../img/";
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $name = $_FILES['image']['name'];
                    // Upload ảnh vào thư mục images
                    move_uploaded_file($tmp_name, $path2 . $name);
                    $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
    
                    // Insert dữ liệu vào cơ sở dữ liệu
                    $sql1 = "INSERT INTO `nhanvien`(`id`, `ten_nv`, `hinh_anh`, `ten_dangnhap`, `email`, `phone`, `mat_khau`, `id_loainv`, `id_quyen`) 
                             VALUES ('$id', '$namei', '$image_url', '$tendangnhap', '$email', '$phone', '$mat_khau', '$id_loainv', '$id_quyen')";
                    
                    $result = mysqli_query($conn, $sql1);
                    if ($result) {
                        header("location:./admin.php?act=addnvtc&dk=yes");
                    } else {
                        header("location:./admin.php?act=addnvtc&dk=no");
                    }
                } else {
                    header("location:./admin.php?act=addnvtc&dk=no");
                }
            } else {
                // Nếu không có ảnh, chèn dữ liệu mà không có ảnh
                $sql1 = "INSERT INTO `nhanvien`(`id`, `ten_nv`, `ten_dangnhap`, `email`, `phone`, `mat_khau`, `id_loainv`, `id_quyen`) 
                         VALUES ('$id', '$namei', '$tendangnhap', '$email', '$phone', '$mat_khau', '$id_loainv', '$id_quyen')";
                
                $result = mysqli_query($conn, $sql1);
                if ($result) {
                    header("location:./admin.php?act=addnvtc&dk=yes");
                } else {
                    header("location:./admin.php?act=addnvtc&dk=no");
                }
            }
        } else {
            // Nếu thiếu thông tin, chuyển hướng và hiển thị thông báo
            header("location:./admin.php?act=addnvtc&dk=no");
        }
    }
    
    
    if (isset($_POST['btnnvsua'])) {
        if (isset($_POST['id']))
            if ($_POST['id'] != '') {
                if (isset($_POST['name']))
                    if ($_POST['name'] != '') {
                        if (isset($_POST['id_loainv']))
                            if ($_POST['id_loainv'] != '') {
                                 if (isset($_POST['id_quyen']))
                            if ($_POST['id_quyen'] != '') {
                        if (isset($_POST['phone']))
                            if ($_POST['phone'] != '') {
                                if (isset($_POST['mat_khau']))
                                    if ($_POST['mat_khau'] != '') {
                                        if (isset($_POST['email']))
                                            if ($_POST['email'] != '') {
                                                if ($_POST['tendangnhap'] != '')
                                                    $tendangnhap = null;
                                                
                                                $conn = mysqli_connect("localhost", "root", "", "foodgennie");
                                                $result4 = mysqli_query($con, "SELECT `id_loainv` FROM `nhanvien` WHERE `id`=" . $_GET['id'] . "");
                                                $r2 = mysqli_fetch_array($result4);
                                                if (isset($_FILES['gallery']) && !empty($_FILES['gallery']['name'][0])) {
                                                    $uploadedFiles = $_FILES['gallery'];
                                                    $result = uploadFiles($uploadedFiles);
                                                    $galleryImages = $result['uploaded_files'];
                                                }
                                                if (!empty($_POST['gallery_image'])) {
                                                    $galleryImages = array_merge($galleryImages, $_POST['gallery_image']);
                                                }
                                                if (!isset($image_url) && !empty($_POST['image'])) {
                                                    $image_url = $_POST['image'];
                                                }
                                                if ($_FILES['image']['name'] != NULL) {
                                                    // Kiểm tra file up lên có phải là ảnh không
                                                    if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif") {

                                                        // Nếu là ảnh tiến hành code upload
                                                        $path1 = ""; // Ảnh sẽ lưu vào thư mục images
                                                        $path2 = "../img/";
                                                        $tmp_name = $_FILES['image']['tmp_name'];
                                                        $name = $_FILES['image']['name'];
                                                        // Upload ảnh vào thư mục images
                                                        move_uploaded_file($tmp_name, $path2 . $name);
                                                        $image_url = $path1 . $name; // Đường dẫn ảnh lưu vào cơ sở dữ liệu
                                                        // Insert ảnh vào cơ sở dữ liệu
                                                    }
                                                }
                                                $con = mysqli_connect("localhost", "root", "", "foodgennie");
                                                $result1 = mysqli_query($con, "UPDATE `nhanvien` 
                                                SET `ten_nv` = '" . $_POST['name'] . "', `hinh_anh`='$image_url', `mat_khau` = '" . $_POST['mat_khau'] . "', 
                                                `email` = '" . $_POST['email'] . "', `phone` = '" . $_POST['phone'] . "', `ten_dangnhap` = '" . $_POST['tendangnhap'] . "', 
                                                `id_loainv` = '" . $_POST['id_loainv'] . "', `id_quyen` = '" . $_POST['id_quyen'] . "' 
                                                WHERE `nhanvien`.`id` = " . $_GET['id']);
                                                

                                                if ($result1)
                                                    header("location:./admin.php?act=suanvtc&dk=yes");
                                                else
                                                    header("location:./admin.php?act=suanvtc&dk=no");
                                            } else
                                                header("location:./admin.php?act=suanvtc&dk=no");
                                    } else
                                        header("location:./admin.php?act=suanvtc&dk=no");
                            } else
                                header("location:./admin.php?act=suanvtc&dk=no");
                    }else
                                header("location:./admin.php?act=suanvtc&dk=no");
                    } else
                        header("location:./admin.php?act=suanvtc&dk=no");
                } else header("location:./admin.php?act=suanvtc&dk=no");
            } else
                header("location:./admin.php?act=suanvtc&dk=no");
    }
    
    if (isset($_POST['btntkmk'])) {
        if (isset($_POST['matkhaumoi']))
            if ($_POST['matkhaumoi'] != '') {
                $result1 = mysqli_query($con, "UPDATE `nhanvien` SET `mat_khau` = '" . $_POST['matkhaumoi'] . "' WHERE `ten_dangnhap` = '" . $_GET['user'] . "'");
                var_dump($result1);
                if ($result1)
                    header("location:./admin.php?act=tkmktc&dk=yes");
                else
                    header("location:./admin.php?act=tkmktc&dk=no");
            } else
                header("location:./admin.php?act=tkmktc&dk=no");
    }
    if (isset($_POST['btntkadd'])) {
        if (isset($_POST['tendangnhap']))
            if ($_POST['tendangnhap'] != '') {
                if (isset($_POST['matkhau']))
                    if ($_POST['matkhau'] != '') {
                        if (isset($_POST['name']))
                            if ($_POST['name'] != '') {
                                $sql2 = "INSERT INTO `taikhoang`(`id_quyen`,`username`,`pass`,`fullname`) VALUES (3,'" . $_POST['tendangnhap'] . "','" . $_POST['matkhau'] . "','" . $_POST['name'] . "')";
                                $result1 = mysqli_query($con, $sql2);
                                if ($result1)
                                    header("location:./admin.php?act=addtktc&dk=yes");
                                else
                                    header("location:./admin.php?act=addtktc&dk=no");
                            } else
                                header("location:./admin.php?act=addtktc&dk=no");
                    } else
                        header("location:./admin.php?act=addtktc&dk=no");
            } else
                header("location:./admin.php?act=addtktc&dk=no");
    }
    if (isset($_POST['btntksua'])) {
        if (isset($_POST['quyen']))
            if ($_POST['quyen'] != '') {
                if (isset($_POST['trangthai']) == "on")
                    $trangthai = 0;
                if (isset($_POST['trangthai']) == NULL)
                    $trangthai = 1;
                var_dump(intval($_POST['quyen']));
                // if ($_POST['quyen'] == '1' || $_POST['quyen'] == '2' || $_POST['quyen'] == '3' || $_POST['quyen'] == '4') {
                $result1 = mysqli_query($con, "UPDATE `taikhoang` SET `id_quyen` = '" . $_POST['quyen'] . "', `trang_thai` = ' " . $trangthai . "' WHERE `username` = '" . $_GET['id'] . "'");
                if ($result1)
                    header("location:./admin.php?act=suatktc&dk=yes");
                else
                    header("location:./admin.php?act=suatktc&dk=no");
                // } else header("location:./admin.php?act=suatktc&dk=no");
            } else
                header("location:./admin.php?act=suatktc&dk=no");
    }
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'xnhd') {
            if (isset($_GET['cuser']))
                if ($_GET['cuser'] == '') {
                    $conn = mysqli_connect("localhost", "root", "", "foodgennie");
                    //$sql="SELECT `hoadon`.`id`, `id_khachhang`, `tong_tien`, `hoadon`.`ngay_tao`, `id_nhanvien`, `trangthai`, `ten_dangnhap`, `ten_nv`,`nhanvien`.`id` AS `idnv` FROM (`hoadon` LEFT JOIN `nhanvien` ON `nhanvien`.`id`=`id_nhanvien` ) WHERE `hoadon`.`id` = " . $_GET['id'] . "";
                    $taikhoan = mysqli_query($conn, "SELECT `id`, `ten_dangnhap` FROM `nhanvien` WHERE `id`='" . $_GET['iduser'] . "'");
                    // $hoadon=mysqli_query($conn,$sql);var_dump($hoadon);
                    $row = mysqli_fetch_array($taikhoan);
                    $result1 = mysqli_query($conn, "UPDATE `hoadon` SET `trang_thai` = '1' ,`id_nhanvien` = '" . $row['id'] . "',`ngay_tao`=`ngay_tao` WHERE `id` = '" . $_GET['id'] . "'");
                    if ($result1)
                        header("location:./admin.php?act=xnhdtc&dk=yes");
                    else
                        header("location:./admin.php?act=xnhdtc&dk=no");
                } else
                    header("location:./admin.php?act=xnhdtc&dk=no");
        }
    }
   
    if (isset($_POST['btndmadd'])) {
        $data = $_POST;
        $inserts = "";
        if (isset($data['row'])) {
            $them = mysqli_query($con, "INSERT INTO `quyen`(`ten_quyen`) VALUES ('" . $_POST['tendanhmuc'] . "')");
            $id_quyen = mysqli_insert_id($con);
            foreach ($data['row'] as $insertid) {
                $inserts .= !empty($inserts) ? "," : "";
                $inserts .= "(" . $id_quyen . "," . $insertid . ")";
                var_dump($data['row']);
            }

            $inserted = mysqli_query($con, "INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES " . $inserts . "");
            if ($inserted)
                header("location:./admin.php?act=btndmaddtc&dk=yes");
            else
                header("location:./admin.php?act=btndmaddtc&dk=no");
        } else
            header("location:./admin.php?act=btndmaddtc&dk=no");

    }
    if (isset($_POST['btndmsua'])) {
        $data = $_POST;
        $inserts = "";
        if (isset($_POST['tendanhmuc']))
            if ($_POST['tendanhmuc'] != '') {
                if (isset($data['row'])) {
                    $sua = mysqli_query($con, "UPDATE `quyen` SET `ten_quyen`='" . $_POST['tendanhmuc'] . "' WHERE `id`=" . $_GET['idq'] . "");
                    $deleted = mysqli_query($con, "DELETE FROM `quyendahmuc` WHERE `id_quyen`=" . $_GET['idq'] . "");
                    foreach ($data['row'] as $insertid) {
                        $inserts .= !empty($inserts) ? "," : "";
                        $inserts .= "(" . $_GET['idq'] . "," . $insertid . ")";
                        var_dump($inserts);
                    }

                    $inserted = mysqli_query($con, "INSERT INTO `quyendahmuc`(`id_quyen`, `id_danhmuc`) VALUES " . $inserts . "");
                    var_dump($inserted);
                    if ($inserted)
                        header("location:./admin.php?act=btndmsuatc&dk=yes");
                    else
                        header("location:./admin.php?act=btndmsuatc&dk=no");
                } else
                    header("location:./admin.php?act=btndmsuatc&dk=no");
            } else
                header("location:./admin.php?act=btndmsuatc&dk=no");

    }
    ?>
</body>

</html>