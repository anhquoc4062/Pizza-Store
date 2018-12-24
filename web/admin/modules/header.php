        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Trang quản trị</a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $(".dropdown").click(function(event) {
                            /* Act on the event */
                            $(this).addClass('open');
                        });
                    });
                </script>
                <?php 
                    $today = date("Y-m-d");
                    $qry_lienhe=mysqli_query($conn,"select * from lienhe order by Ngaylienhe desc limit 0,4");
                    $qry_lienhemoi = mysqli_query($conn,"select * from lienhe where Daxem = 0");
                    $lienhemoi= mysqli_num_rows($qry_lienhemoi);


                   ?>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><<i class="fas fa-comments"></i><span class="badge"><?php echo $lienhemoi ?></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-menu-header">
                                <strong>Liên hệ</strong>
                            </li>
                            <?php 
                                while($lienhe=mysqli_fetch_array($qry_lienhe)){
                             ?>
                            <li class="avatar">
                                <a href="detail-contact.php?id=<?php echo $lienhe['ID_lienhe'] ?>">
                                    <div><?php echo $lienhe['Email_lienhe'] ?></div>
                                    <small><?php echo $lienhe['Tinnhan'] ?></small>
                                    <?php if($lienhe['Daxem']==0){ ?>
                                    <span class="label label-info">MỚI</span>
                                    <?php } ?>
                                </a>
                            </li>
                            <?php } ?>
                            
                            <li class="dropdown-menu-footer text-center">
                                <a href="contact.php">View all messages</a>
                            </li>   
                        </ul>
                    </li>
                </ul>
            <!-- /.navbar-header -->
		<?php include('sidebar.php') ?>
            <!-- /.navbar-static-side -->
        </nav>