        <?php 
            $qry_order=mysqli_query($conn,"select * from donhang where Tinhtrang = 0");
            $chuaxuli=mysqli_num_rows($qry_order);
         ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fas fa-tachometer-alt nav_icon"></i>Bảng chính</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="list-category.php"><i class="fa fa-tags nav_icon"></i>Loại sản phẩm</a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-utensils nav_icon"></i>Sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add-product.php">Thêm sản phẩm</a>
                                </li>
                                <li>
                                    <a href="list-product.php?page=1">Quản lý sản phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user nav_icon"></i>Tài khoản<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="add-account.php">Thêm tài khoản</a>
                                </li>
                                <li>
                                    <a href="list-account.php">Quản lý tài khoản</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="list-order.php"><i class="fas fa-shopping-cart nav_icon"></i>Đơn hàng 
                                <?php if($chuaxuli>0){ ?>
                                <span class="order-amount"><?php echo $chuaxuli ?></span>
                                <?php } ?>
                            </a>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="contact.php"><i class="fas fa-envelope nav_icon"></i>Liên hệ</a>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="../index.php"><i class="fas fa-sign-out-alt nav_icon"></i>Trở về website</a>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>