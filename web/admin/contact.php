<!DOCTYPE HTML>
<html>
<head>
  <?php include('modules/head.php') ?>
</head>
<body>
  <?php include('modules/config.php') ?>
<div id="wrapper">
     <!-- Navigation -->
        <?php   include('modules/header.php') ?>
             <?php session_start() ?>
     <?php include ('modules/quyentruycap.php') ?>
     <?php 
        if(isset($_GET['action'])&&$_GET['action']=='remove'){
              $id=$_GET['id'];

              mysqli_query($conn,"delete from lienhe where ID_lienhe='$id'");
              echo '<script type="text/javascript">window.location.href="contact.php"</script>';
            }
      ?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
     <div class="xs">
     <h3>Liên hệ khách hàng</h3>

  <div class="bs-example4" data-example-id="simple-responsive-table">

    <script type="text/javascript">
      $(document).ready(function(){
        $('table tr').click(function(){
          if(event.target.id=="xoa"){
              return;
          }
          window.location = $(this).attr('href');
          return false;
        });
    });
    </script>

    <div class="table-responsive">
      <table class="table">
                    <tbody>
                      <?php 
                          $qry_lienhe=mysqli_query($conn,"select * from lienhe order by Ngaylienhe desc");
                          while($lienhe=mysqli_fetch_array($qry_lienhe)){
                       ?>
                        <tr class="unread checked" href="detail-contact.php?id=<?php echo $lienhe['ID_lienhe'] ?>" style="cursor: pointer;">
                            <td class="hidden-xs" width="100px">
                                <?php if($lienhe['Daxem']==0){ ?>
                                <i class="fa fa-star icon-state-warning"></i>
                                <?php }else{ ?>
                                <i class="fa fa-star"></i>
                                <?php } ?>
                            </td>
                            <td class="hidden-xs email">
                                <?php echo $lienhe['Email_lienhe'] ?>
                            </td>
                            <td style="text-align: left">
                                <?php 
                                  $tinnhan=$lienhe['Tinnhan'];
                                  if(strlen($tinnhan)<=50){
                                    echo $tinnhan;
                                  }
                                  else{
                                    echo substr($tinnhan,0,50)."...";
                                  }
                                 ?>
                            </td>
                            <td class="datecontact">
                              <?php 
                                $date=strtotime($lienhe['Ngaylienhe']);
                                        echo date('d/m/Y',$date); 
                              ?>
                            </td>
                            <td width="200px" align="center">
                              <a id="xoa" href="contact.php?action=remove&id=<?php echo $lienhe['ID_lienhe'] ?>"><i class="fas fa-eraser"></i></a>
                            </td>
                        </tr>
                        <?php } ?>

                </table>
    </div><!-- /.table-responsive -->
  </div>
  </div>
  <div class="copy_layout">
      <p>Copyright © 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
  </div>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
