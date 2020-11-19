<!--
Navbar Goals:
Sticky Navbar
Needs Brand
Primary Buttons:
    - About Us
    - Shopping Cart
    - Account (Drop Down)
-->

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
                <a class="nav-link" href="#dogs">About Us</a>
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
                  <a class="nav-link" title="Logout" href="logout.php">Logout           
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
              
               <?php       
               session_start();

             if(isset($_SESSION['whoami']))
              {
                   echo ' <li class="nav-item">
                <a class="nav-link" title="view profile" href="profile.php">Account              
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
            
            
                <li class="nav-item">
                <a class="nav-link" href="#cats">Shopping Cart</a>
            </li>
        </ul>
    </div>
</nav>