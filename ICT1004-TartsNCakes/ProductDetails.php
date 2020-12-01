<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Detail</title>
    <link rel="stylesheet" href="_stylesheets/Css_Reset.css">
    <link rel="stylesheet" type="text/css" href="_stylesheets/Detail.css">
<?php

  session_start();
    
    if (!isset($_SESSION['whoami']))
{
    header("Location:Login.php");
}
  
  //open connection and select database
  $conn = mysqli_connect("localhost", "root", "","db_154247j" );
  
  $selected_code = $_GET['ProductID'];   //get the country code that was passes over
  
  $sql = "SELECT*FROM product WHERE ProductID = '$selected_code'";
  
  $selectedcake = mysqli_query($conn , $sql) ;
  
  $cake = mysqli_fetch_assoc($selectedcake);
?> 
</head>

<body>
    
<div id="wrapper">
    
    <header>
        <input type="text" id="Searchbox" name="name" placeholder="SEARCH">
        <img src="_images/SearchShape.png" id="searchimg" alt="">
        
        <a href="index.php" title="Pho pattisserie"><img src="_images/Logo.png" id="Logo" alt=""></a>
       
       <aside class="rightheader">
           
          <div id="login"><a href="Login.php" title="login">Login</a></div>
          <div id="signup"><a href="signup.php" title="signup">signup</a></div>
          <div id="cart"><a href="cart.php" title="cart">Cart</a></div>
          <a href="cart.php" title="cartlogo"><img src="_images/Cart%20shape.png" id="cartlogo" alt=""></a>
           
       </aside>
    </header>

     <nav>
       <ol class="main-menu">
          <li id="number1"><a href="index.php" title="home">Home</a></li>
          <li id="number2"><a href="Cake.php" title="cakes">Cake</a></li>
          <li id="number3"><a href="tartandother.php" title="tartandother">tart &amp; others</a></li>
          <li id="number4"><a href="promotion.php" title="promo">promotion</a></li>
       </ol>
    </nav>
    
    <img src="_images/Banner.png" id="banner" alt="">
    

<fieldset>
   <h1><b><?php echo $cake['ProductName']; ?></b></h1>
   
   <div id="detail">
   <img class="img" src="_images/<?php echo $cake['ProductImage'] ?>">
   </div>
 <article >
  
     <p>Description: <b><?php echo $cake['Description'];?></b></p>
  <p>Price: <b>$<?php echo $cake['ProductPrice'];?></b></p>
 </article>


   <form id="form1" name="form1" method="post" action="insertrecording.php">
       
     <input type="submit" name="Add to cart" value="Add to Cart">
     
     <input type="hidden" name="cke" value="<?php echo $cake['ProductName']; ?>"/>
     <input type="hidden" name="cost" value="<?php echo $cake['ProductPrice']; ?>"/>
     <input type="hidden" name="imgfile" value="<?php echo $cake['ProductImage']; ?>"/>
    
   </form>
    
</fieldset>
    
    <footer>
       
      <div id="payment">
          <a href="https://www.paypal.com/sg/webapps/mpp/account-selection"><img src="_images/Paypal.png" id="p" alt=""></a>
          <a href="https://www.mastercard.us/en-us/consumers.html"><img src="_images/Matsercard.png" id="m" alt=""></a>
          <a href="https://usa.visa.com/pay-with-visa/visa-offers-and-perks.html"><img src="_images/Visa.png" id="v" alt=""></a>
      </div>
        
    <div id="social">
        <a href="https://www.facebook.com/profile.php?id=100012605859318"><img src="_images/Facebook.png" id="f" alt=""></a>
        <a href="gallery1.php"><img src="_images/Gallery.png" id="i" alt=""></a>
    </div>
    
        
        
        <div id="copy">Copyright &copy; Xueming</div>
    </footer>



    </div>
</body>
</html>
