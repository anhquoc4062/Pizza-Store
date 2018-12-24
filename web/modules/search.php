<?php 
        $check_search=0;
        $sql_search="select * from sanpham";
        $qry_search=mysqli_query($conn,$sql_search);
        $count_search=0;

        if(isset($_POST['timkiem'])){
            $giatri = $_POST['giatri'];
            $sql_tim="select * from sanpham where Ten_sanpham like '%$giatri%'";
            $qry_tim =mysqli_query($conn,$sql_tim);
            $check_search=1;
            $count_search=mysqli_num_rows($qry_tim);

        }

 ?>


                    <script type="text/javascript">

                        jQuery(document).ready(function($) {
                            $('html, body').click(function(event) {
                                /* Act on the event */
                                if(event.target.id=="search-content"||event.target.id=="isearch-bar"){
                                    return;
                                }
                                var bang=document.getElementById('search-content');
                                bang.style.display="none";
                            });
                        });

                        function Hienbang(){
                            //Khi nhập chữ thì hiện bảng
                            var bang=document.getElementById('search-content');
                            bang.style.display ="block";

                            var input = document.getElementById('isearch-bar');
                            var filter = input.value.toUpperCase();
                            var ul=document.getElementById("mysearch");
                            var li=ul.getElementsByTagName("li");
                            var count=0;

                            //code that causes an error
                            var ten;
                                for(var i = 0; i<li.length;i++){

                                    ten=li[i].getElementsByTagName('p')[0];

                                    if((ten.innerHTML.toUpperCase().indexOf(filter))>-1){
                                        li[i].style.display="";
                                        count++;
                                    }
                                    else{
                                         li[i].style.display="none";
                                    }
                                }

                            console.log(count);

                            if(count==0){
                                var none = document.getElementById("none-search");
                                none.style.display="block";
                                console.log("adfsdf");
                            }

                        }
                        
                    </script>
                    <div class="search-bar text-right">
                        <form action="" method="post">
                            <input id="isearch-bar" onkeyup="Hienbang()" type="text" name="giatri" placeholder="Nhập tên sản phẩm bạn muốn tìm...">
                            <button type="submit" class="search-button" name="timkiem"><i class="fas fa-search"></i>Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="search-list" id="search-content">
                        <ul id="mysearch">
                            <?php while($srow=mysqli_fetch_array($qry_search)){ ?>
                            <li><a href="single-product.php?id=<?php echo $srow['ID_sanpham'] ?>">
                                    <div class="sanpham">
                                        <img src="admin/uploads/<?php echo $srow['Hinh_sanpham'] ?>" width="80px" height="80px">
                                        <div class="info">
                                            <p class="product-name"><?php echo $srow['Ten_sanpham'] ?></p>
                                            <div class="sao">
                                                <?php for($i=1;$i<=$srow['Sao_sanpham'];$i++){ ?>
                                                <i class="fa fa-star"></i>
                                                <?php } ?>
                                                <?php for($i=($srow['Sao_sanpham']+1);$i<=5;$i++){ ?>
                                                <i class="far fa-star"></i>
                                                <?php } ?>
                                            </div>
                                            <p>
                                                <?php  
                                                    $giakhuyenmai=$srow['Gia_sanpham']-($srow['Gia_sanpham']*$srow['Kmai_sanpham'])/100;

                                                    echo number_format($giakhuyenmai,0,',','.').' đ';
                                                ?>       
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <?php } ?>

                            <li id="none-search">
                                    <div class="sanpham">
                                            <p>
                                                Không tìm thấy sản phẩm      
                                            </p>
                                    </div>
                            </li>
                        </ul>
                    </div>