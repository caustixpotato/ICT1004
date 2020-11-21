<!--
Navbar Goals:
Sticky Navbar
Needs Brand
Primary Buttons:
    - About Us
    - Shopping Cart
    - Account (Drop Down)
-->


<style>


.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: cornflowerblue;
  min-width: 70px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: whitesmoke;
  padding: 10px 25px;
  text-decoration: none;
  display: block;
  font-size: 10px;
}

.dropdown-content a:hover {color: orange;}

.dropdown:hover .dropdown-content {display: block;}

</style>

<nav id ="navbar"
     class="navbar sticky-top navbar-expand-sm navbar-light"
     style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" />
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarToggler" aria-controls="navbarToggler"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href=" About.php">About Us</a>
            </li>
           
            
            
             <?php       
               session_start();

             if(!isset($_SESSION['whoami']))
              {
                   echo ' <li class="nav-item">
                  <a class="nav-link" title="Login" href="Login.php">Login              
                  </a>                  
                  </li>';
              }
              else
              {
                   echo ' <li class="nav-item">
                       
                   <div class="dropdown">
                        <a class="nav-link" title="view profile" >Account</a>                   
                        <div class="dropdown-content">
                           <a href="profile.php">Profile</a>
                           <a href="logout.php">Logout</a>                   
                        </div>
                   </div>
                   

                                 
                  </li>';
              }
             
           //open connection and select database
           $config = parse_ini_file('../../private/db1-config.ini');
           $conn = new mysqli($config['servername'], $config['username'],
           $config['password'], $config['dbname']);
  
 
            $useremail = $_SESSION['whoami'];

            $sql="SELECT * FROM cake_member where email ='$useremail'";

            

              ?>
              
               <?php       
               session_start();

             if(isset($_SESSION['whoami']))
              {
              
                   
                   echo ' <li class="nav-item">
                <a class="nav-link" title="cart" href="Cart.php">Shopping Cart              
                  </a>                  
                  </li>';
              }
             
           //open connection and select database
           $config = parse_ini_file('../../private/db1-config.ini');
           $conn = new mysqli($config['servername'], $config['username'],
           $config['password'], $config['dbname']);
  
 
            $useremail = $_SESSION['whoami'];

            $sql="SELECT * FROM cake_member where email ='$useremail'";

            

              ?>
            
            
               
        </ul>
    </div>
</nav>