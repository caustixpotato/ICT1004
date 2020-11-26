<!DOCTYPE html>
<html lang="en">
<head>
      <title>Tarts N's Cake</title>
       <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">
    <link rel="stylesheet"  href="css/login.css">
     
    <link rel="stylesheet" href="css/main.css" />
    
     <!-- Bootstrap 4.5.3 jQuery-->
        <script defer src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous">
        </script>

        <!--Bootstrap 4.5.3 JS-->
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous">
        </script>
        
        <!-- Internal JS -->
        <script defer src="js/main.js"></script>

 
 
</head>

<body>
    <?php 
        include "phpFiles/nav.inc.php"
        ;?> 
        <header id="Content">
            <div class="jumbotron jumbotron-fluid text-center bg-cover" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.15),rgba(255,255,255,0.7)), url(images/sliced.png)">
                <h1 class="display-4">Tarts N' Cakes</h1>
                <hr class="lead">
                <p>Best Thing Since Sliced Bread!</p>
            </div>
        </header>
  
 <main class="container">        
               <section id="contentlogin">

    <article>
            <h2>Existing customer</h2>
            
            <h3>sign in with your account detail</h3>
        
            
        <form name="form1" action="process_login.php" method="post" >    	
              <div class="form-gorup1">
            <label for="email">Email<span>*</span></label>
            <input type="email"  class="form-control" placeholder="Enter your email here" pattern="^[a-zA-Z0-9]+@gmail\.com$" 
                   title="Please enter a valid GMAIL addess" name="email" id="email" required>
              </div>
             <div class="form-gorup1">
            <label for="pwd">Password<span>*</span></label>
            <input type="password" class="form-control" placeholder="Enter your password here" name="pwd" id="pwd" required>
             </div>
             <div class="form-gorup1">
            <input type="submit" value="SIGN IN" id="signinbutton">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             </div>
            
            <div class="verline">&nbsp;</div>

        </form>
     </article>
        
        <aside id="info">
            <h2>NEW CUSTOMER</h2>
            <h3>Sign up today and you will be able to:</h3>
            <div class="tick"><p>Speedy Checkouts</p></div>
            <div  class="tick"><p>Easy Order Tracking</p></div>
            <div class="tick"><p><b>Promotions</b></p></div>
        
            <div id="registerbutton"> <a href="register.php" title="signup"><h4>REGISTER</h4></a></div>
        </aside>
        
    </section>                   
                                     
           <?php    include "phpFiles/footer.inc.php";?> 

</main>
    

    
    
       
</body>


</html>
