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
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: whitesmoke;
        padding: 10px 25px;
        text-decoration: none;
        display: block;
        font-size: 10px;
        text-align: center;
    }

    .dropdown-content a:hover {color: orange;}

    .dropdown:hover .dropdown-content {display: block;}

    /*.bg-dark {
        background: transparent !important;
    }
    
    .bg-dark.scrolled{
        background: #000 !important;
    }*/

</style>

<nav id ="navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
    <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" width="auto" height="100" class="d-inline-block align-center" alt="Tarts N Cakes Logo" loading="lazy"/>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" 
            data-target="#navbarToggler" aria-controls="navbarToggler"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href=" About.php">
                    <img src="images/about.png" width="auto" height="40" class="d-inline-block align-center" alt="About Us" loading="lazy"/>
                    About Us
                </a>
            </li>



            <?php
            session_start();

            if (!isset($_SESSION['whoami'])) {
                echo '
                  <li class="nav-item">
                  <a class="nav-link" title="Login" href="Login.php">
                  <img src="images/account.png" width="auto" height="40" class="d-inline-block align-center" alt="Acccount" loading="lazy"/>
                  Login              
                  </a>                  
                  </li>';
            } else {
                echo ' <li class="nav-item">
                       
                   <div class="dropdown">
                        <a class="nav-link" title="view profile" >
                        <img src="images/account.png" width="auto" height="40" class="d-inline-block align-center" alt="Acccount" loading="lazy"/>
                        Account
                        </a>                   
                        <div class="dropdown-content">
                           <a href="profile.php">Profile</a>
                           <a href="orderhistory.php">Order History</a>
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

            $sql = "SELECT * FROM cake_member where email ='$useremail'";
            ?>

            <?php
            session_start();

            if (isset($_SESSION['whoami'])) {


                echo ' <li class="nav-item">
                <a class="nav-link" title="Cart" href="Cart.php">
                      <img src="images/cart.png" width="auto" height="40" class="d-inline-block align-center" alt="Cart" loading="lazy"/>Cart
                  </a>                 
                  </li>';
            }

            //open connection and select database
            $config = parse_ini_file('../../private/db1-config.ini');
            $conn = new mysqli($config['servername'], $config['username'],
                    $config['password'], $config['dbname']);


            $useremail = $_SESSION['whoami'];

            $sql = "SELECT * FROM cake_member where email ='$useremail'";
            ?>



        </ul>
    </div>
</nav>