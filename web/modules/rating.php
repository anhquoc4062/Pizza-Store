<?php 
    if(isset($_POST['danhgia'])){
        $id_thanhvien=$_SESSION['id_thanhvien'];
        $id_sanpham=$_GET['id'];
        $sosao=$_POST['sosao'];
        if($sosao==NULL){
            $sosao=1;
        }
  
        $review=$_POST['review'];
        $date=date("Y-m-d");
        $sql_danhgia="insert into danhgia (ID_thanhvien, ID_sanpham,Sosao,Nhanxet, Ngaydang) values ('$id_thanhvien','$id_sanpham','$sosao','$review','$date')";
        
        $qry=mysqli_query($conn,$sql_danhgia);


    }
 ?>

 <script type="text/javascript"> 
    jQuery(document).ready(function($) {
    var rating=1;
    $(".rating-wrap-post .fa").click(function(event) {
        /* Act on the event */
        var star = $(this);
        var value = star.attr("data-value");
        $(".highlight").removeClass('highlight');
        
        for(var i=1;i<=value;i++){
            $(".rating-wrap-post i:nth-child("+i+")").addClass('highlight');
        }
        rating = parseInt(value);

        $("#getsao").val(rating);
    });

    $(".rating-wrap-post .fa").hover(function() {
        /* Stuff to do when the mouse enters the element */
        var star = $(this);
        var value = star.attr("data-value");
        console.log(typeof(value));
        /*var position =int.Parse(value);*/
        $(".highlight").removeClass('highlight');
        
        for(var i=1;i<=value;i++){
            $(".rating-wrap-post i:nth-child("+i+")").addClass('highlight');
        }
        rating = parseInt(value);

        $("#getsao").val(rating);
    }, function() {
        /* Stuff to do when the mouse leaves the element */
    });
});

 </script>

<h2>Đánh Giá</h2>
<form action="" method="post">
    <div class="submit-review">
        <div class="rating-chooser">
            <p>Đánh giá 5 sao</p>

            <div class="rating-wrap-post" style="cursor: pointer;">
                <i style="color: #f39c12" class="fa fa-star" data-value="1"></i>
                <i class="fa fa-star" data-value="2"></i>
                <i class="fa fa-star" data-value="3"></i>
                <i class="fa fa-star" data-value="4"></i>
                <i class="fa fa-star" data-value="5"></i>
            </div>
        </div>
        <input type="hidden" id="getsao" name="sosao" value="">
        <p><label for="review">Lời nhận xét</label> <textarea name="review" id="" cols="30" rows="10" placeholder="Nhập bình luận..." style="color:black"></textarea></p>
        <p><input type="submit" name="danhgia" value="đánh giá"></p>
    </div>
</form>