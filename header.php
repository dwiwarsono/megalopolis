
<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style1.css">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

<body>

	<div class="header" id="home">
    <div class="container">
      <ul>
        <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
        <li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
        <li><i class="fa fa-phone" aria-hidden="true"></i> Call : 01234567898</li>
        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:info@example.com">info@megapolis.com</a></li>
      </ul>
    </div>
  </div>

	<nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#naff" aria-expanded="false">
          
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          <img src="images/megalopolis.png" alt="">
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="naff">
        <ul class="nav navbar-nav">
          <li class=""><a href="index.php">Home</a></li>
          <li class=""><a href="keranjang.php">Keranjang</a></li>
                <!-- jika sudah login (ada session pelanggan ) -->
          <?php if (isset($_SESSION['pelanggan'])): ?>
                        <li class=""><a href="logout.php">Logout</a></li>
            <!-- selain itu (belum melakukan login | belum ada session pelanggan) -->
          <?php else: ?>
          <li class=""><a href="login.php">Login</a></li>
          <?php endif ?>
          <li class=""><a href="checkout.php">Checkout</a></li>
        </ul>
  <!-- FORM SEARCH -->
          <form action="" class="navbar-form navbar-right">
          <div class="search">
            <!-- We'll have a button that'll make the search input appear, a submit button and the input -->
            
            <!-- Alos, a label for it so that we can style it however we want it-->
            <input id="submit" value="" type="submit">
            <label for="submit" class="submit"></label>
            
            <!-- trigger button and input -->
            <a href="javascript: void(0)" class="icon"></a>
            <input type="search" name="Search" id="search" placeholder="Search here...">
          </div>
          </form>

<!-- END FORM SEARCH -->

<div class="clear"></div>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>



      </body>

 <script src="js/jquery-1.7.min.js"></script>
      <script>
        jQuery("document").ready(function($){

  var nav = $('.navbar');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 15) {
      nav.addClass("f-nav");
    } else {
      nav.removeClass("f-nav");
    }
  });

});
      </script>

<!-- INI UNTUK SEARCH -->
      <script class="cssdeck" src="js/jquery-1.8.0.min.js"></script>
      <script>
        // Ok, the CSS is complete. Now we need to hide the input and make it appear on clicking the icon.
// Now, we have a small problem. Clicking on search butotn doesnt perform any search and the input element hides. To make search button work, we'll use a flag

// Perfect! This thing is cross browser compatible and works even in IE8! You can use the same technique to create some other cool effects like on http://www.apple.com/ and http://developer.android.com/index.html

$(".icon").click(function() {
  var icon = $(this),
      input = icon.parent().find("#search"),
      submit = icon.parent().find(".submit"),
      is_submit_clicked = false;
  
  // Animate the input field
  input.animate({
    "width": "200px",
    "padding": "10px",
    "opacity": 1
  }, 300, function() {
    input.focus();
  });
  
  submit.mousedown(function() {
    is_submit_clicked = true;
  });
  
  // Now, we need to hide the icon too
  icon.fadeOut(300);
  
  // Looks great, but what about hiding the input when it loses focus and doesnt contain any value? Lets do that too
  input.blur(function() {
    if(!input.val() && !is_submit_clicked) {
      input.animate({
        "width": "0",
        "padding": "0",
        "opacity": 0
      }, 200);
      
      // Get the icon back
      icon.fadeIn(200);
    };
  });
});

      </script>


<script src="js/jquery-3.3.1.min.js"></script>
