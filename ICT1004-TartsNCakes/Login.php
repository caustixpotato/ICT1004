<html lang="en">
<head>
    <?php
      include "cssandjava.inc.php" //add/include the content from nav.inc.php
     ?>
    <link rel="stylesheet"  href="css/login.css">
      

 
<title>World of Pets</title>      
</head>

<body>
     <?php
      include "nav.inc.php" //add/include the content from nav.inc.php
     ?>
        <header class="jumbotron text-center">
            <h1 class="display-4">Welcome to World of Pets!</h1>
            <h2>Home of Singapore's Pet Lovers</h2>
        </header>
  
 <main class="container">        
               <section id="content">

    <article>
            <h2>Existing customer</h2>
            
            <h3>sign in with your account detail</h3>
        
            
        <form name="form1" action="process_login.php" method="post" >    	
              <div class="form-gorup1">
            <label for="user">Email<span>*</span></label>
            <input type="email"  class="form-control" placeholder="Pls enter your email here" name="email" id="email" required>
              </div>
             <div class="form-gorup1">
            <label for="pass">Password<span>*</span></label>
            <input type="password" class="form-control" placeholder="Pls enter your password here" name="pwd" id="pwd" required>
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
            <div class="tick"><p>Speed your way through checkout</p></div>
            <div  class="tick"><p>Track your order easily</p></div>
            <div class="tick"><p><b>Promotion for member</b></p></div>
        
            <div id="registerbutton"> <a href="register.php" title="signup"><h4>REGISTER</h4></a></div>
        </aside>
        
    </section>                   
                                     
            <?php
               include "footer.inc.php"; //add/include the content from footer.inc.php
            ?>

</main>
    

    
    
       
</body>


</html>
