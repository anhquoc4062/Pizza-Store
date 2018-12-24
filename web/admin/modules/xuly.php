<?php 

	include('config.php');

	if(isset($_POST['add'])){
		//them san pham
		$hinhanh=$_FILES['hinhanh']['name'];
		$hinhanh_upload=$_FILES['hinhanh']['tmp_name'];//copy ra 1 hình ảnh khác để quăng vào folder uploads
		move_uploaded_file($hinhanh_upload,"../uploads/".$hinhanh);

		$tensanpham=$_POST['tensanpham'];
		//xử lý giá
		$giasanpham=$_POST['giasanpham'];
		$tmp="";
		for($i=0;$i<strlen($giasanpham);$i++){
			if($giasanpham[$i]!='.'){
				$tmp.=$giasanpham[$i];
			}
		}
		$giasanpham=$tmp;
		if($_POST['khuyenmai']!=""){
			$khuyenmai=$_POST['khuyenmai'];
		}
		else{
			$khuyenmai=0;
		}

		$theloai=$_POST['theloai'];
		$mota=$_POST['mota'];

		$sql= "insert into sanpham (Hinh_sanpham, Ten_sanpham, Gia_sanpham,Kmai_sanpham, ID_loai, Mota_sanpham, Sao_sanpham) values ('$hinhanh','$tensanpham','$giasanpham','$khuyenmai','$theloai','$mota',5)";
		mysqli_query($conn,$sql);
		echo "ĐÃ thêm";

	}
	else if(isset($_POST['edit'])){
		//sua thong tin san pham
		$id=$_GET['id'];
		$hinhanh=$_FILES['hinhanh']['name'];
		echo $hinhanh;
		$hinhanh_upload=$_FILES['hinhanh']['tmp_name'];//copy ra 1 hình ảnh khác để quăng vào folder uploads
		move_uploaded_file($hinhanh_upload,"../uploads/".$hinhanh);

		$tensanpham=$_POST['tensanpham'];
		$giasanpham=$_POST['giasanpham'];
		$tmp="";
		for($i=0;$i<strlen($giasanpham);$i++){
			if($giasanpham[$i]!='.'){
				$tmp.=$giasanpham[$i];
			}
		}
		$giasanpham=$tmp;

		if($_POST['khuyenmai']!=""){
			$khuyenmai=$_POST['khuyenmai'];
		}
		else{
			$khuyenmai=0;
		}

		$theloai=$_POST['theloai'];
		$mota=$_POST['mota'];

		if($hinhanh!=""){
			$sql= "update sanpham set Hinh_sanpham='$hinhanh', Ten_sanpham='$tensanpham', Gia_sanpham='$giasanpham', Kmai_sanpham='$khuyenmai',ID_loai='$theloai', Mota_sanpham='$mota' where ID_sanpham='$id'";
		}
		else{
			$sql= "update sanpham set Ten_sanpham='$tensanpham', Gia_sanpham='$giasanpham', Kmai_sanpham='$khuyenmai', ID_loai='$theloai',Mota_sanpham='$mota' where ID_sanpham='$id'";
		}

		mysqli_query($conn,$sql);

	}
	else{
		//xoa
		$id=$_GET['id'];
		$sql="delete from sanpham where ID_sanpham = $id";
		mysqli_query($conn,$sql);
	}
	header('refresh:0; url=../list-product.php?page=1');


 ?>