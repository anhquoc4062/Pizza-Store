<?php 
	if(isset($_SESSION['id_thanhvien'])){
		$id_thanhvien=$_SESSION['id_thanhvien'];
		$qry_quyen=mysqli_query($conn,"select * from thanhvien where ID_thanhvien = '$id_thanhvien'");
		$quyenhanh=mysqli_fetch_array($qry_quyen);
		if($quyenhanh['ID_phanquyen']!=1){
			echo '<script type="text/javascript">window.location.href="../login.php"</script>';
		}
	}
	else{
		echo '<script type="text/javascript">window.location.href="../login.php"</script>';
	}

?>