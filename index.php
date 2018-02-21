<?php 
session_start();
// koneksi ke database
$koneksi = new mysqli ("localhost", "root", "", "megalopolisdb");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Megapolis</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php include('header.php'); ?>

  <div id="slider">
    <img class="slides" src="images/banner1.jpg"/>
    <img class="slides" src="images/banner2.jpg"/>
    <img class="slides" src="images/banner3.jpg"/>
    <img class="slides" src="images/banner4.jpg"/>
    
    <button class="btn" onclick="plusIndex(-1)" id="btn1">&#10094;</button>
    <button class="btn" onclick="plusIndex(1)" id="btn2">&#10095;</button>
  </div>






  <div class="banner_bottom_agile_info">
       <div class="container">
        <h2 class="jumbotron text-center">Core Activities</h2>
           <div class="banner_bottom_agile_info_inner_w3ls">
              <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
              <figure class="effect-roxy">
                   <img src="images/bottom1.jpg" alt=" " class="img-responsive" />
                    <figcaption>
                      <h3><span>F</span>all Ahead</h3>
                      <p>New Arrivals</p>
                    </figcaption>     
              </figure>
              </div>
              <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
              <figure class="effect-roxy">
                    <img src="images/bottom2.jpg" alt=" " class="img-responsive" />
                      <figcaption>
                        <h3><span>F</span>all Ahead</h3>
                        <p>New Arrivals</p>
                      </figcaption>     
              </figure>
            </div>
          <div class="clearfix"></div>
          </div> 
       </div> 
  </div>



<section class="konten">
 <div class="container">
  <h3 class="jumbotron text-center">Produk Baru</h3>

  <div class="row">
   <?php $ambil = $koneksi->query("SELECT * FROM produk LIMIT 8"); ?>
   <?php while( $perproduk = $ambil->fetch_assoc()) : ?>
     <div class="col-md-3">
      <div class="thumbnail">
       <img src="foto_produk/<?= $perproduk ['foto_produk']; ?>" class="image" alt="">
       <div class="middle">
        <a class="hvr-outline-out button2" href="detail.php?id=<?= $perproduk ['id_produk']; ?>">View Details</a>
      </div>
      <div class="caption text-center">
        <div class="nama-produk">
        <h5><?= $perproduk ['nama_produk']; ?></h5>
        </div>
        <div class="harga">
        <h5>Rp<?= number_format($perproduk ['harga_produk']); ?></h5>
        </div>
        <a href="beli.php?id=<?= $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
      </div>
    </div>
  </div>
<?php endwhile; ?>

</div>
</section>



<div class="sale-w3ls">
  <div class="container">
    <h6>We Offer Flat <span>40%</span> Discount</h6>

    <a class="hvr-outline-out button2" href="single.html">Shop Now </a>
  </div>
</div>
<!-- //we-offer -->
<!--/grids-->
<div class="coupons">
  <div class="coupons-grids text-center">
    <div class="w3layouts_mail_grid">
      <div class="col-md-3 w3layouts_mail_grid_left">
        <div class="w3layouts_mail_grid_left1 hvr-radial-out">
          <i class="fa fa-truck" aria-hidden="true"></i>
        </div>
        <div class="w3layouts_mail_grid_left2">
          <h3>FREE SHIPPING</h3>
          <p>Lorem ipsum dolor sit amet, consectetur</p>
        </div>
      </div>
      <div class="col-md-3 w3layouts_mail_grid_left">
        <div class="w3layouts_mail_grid_left1 hvr-radial-out">
          <i class="fa fa-headphones" aria-hidden="true"></i>
        </div>
        <div class="w3layouts_mail_grid_left2">
          <h3>24/7 SUPPORT</h3>
          <p>Lorem ipsum dolor sit amet, consectetur</p>
        </div>
      </div>
      <div class="col-md-3 w3layouts_mail_grid_left">
        <div class="w3layouts_mail_grid_left1 hvr-radial-out">
          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        </div>
        <div class="w3layouts_mail_grid_left2">
          <h3>MONEY BACK GUARANTEE</h3>
          <p>Lorem ipsum dolor sit amet, consectetur</p>
        </div>
      </div>
      <div class="col-md-3 w3layouts_mail_grid_left">
        <div class="w3layouts_mail_grid_left1 hvr-radial-out">
          <i class="fa fa-gift" aria-hidden="true"></i>
        </div>
        <div class="w3layouts_mail_grid_left2">
          <h3>FREE GIFT COUPONS</h3>
          <p>Lorem ipsum dolor sit amet, consectetur</p>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>

  </div>
</div>
<!--grids-->



<script>
        var index = 1;


        function plusIndex(n){
          index = index + n;
          showImage(index);
        }

        showImage(1);

        function showImage(n) {
          var i ;
          var x = document.getElementsByClassName("slides");
          if (n > x.length) { index = 1 };
          if (n < 1) { index = x.length };

          for (i=0; i<x.length; i++) 
          {
            x[i].style.display = "none";
          }
          x[index-1].style.display ="block";
        }

        autoSlide();
        function autoSlide(){
          var i ;
          var x = document.getElementsByClassName("slides");
          for (i=0; i<x.length; i++) 
          {
            x[i].style.display = "none";
          }
          if (index > x.length) {index = 1}
            x[index-1].style.display ="block";
          index++;
          setTimeout(autoSlide,2000);
        }
      </script>
      



<?php include('footer.php'); ?>






        <section>

        </section>

