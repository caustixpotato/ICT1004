<html lang="en">
<head>
    <?php
      include "cssandjava.inc.php" //add/include the content from nav.inc.php
     ?>
    
    <?php       
           session_start();

           //open connection and select database
           $config = parse_ini_file('../../private/db1-config.ini');
           $conn = new mysqli($config['servername'], $config['username'],
           $config['password'], $config['dbname']);
  
           $useremail = $_SESSION['whoami'];
           $userlname = $_SESSION['username'];
           $sql="SELECT * FROM cake_member where email ='$useremail'";     
           
           $selectduser = mysqli_query($conn,$sql);
           $userinfo = mysqli_fetch_assoc($selectduser);

    ?>

 
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
           
               <h1><?php echo $userinfo['lname'];?>'s Profile</h1>        
               <p>             
                   Manage and edit your account info.  
               </p>  
             
               
               <form id="form1" name="form1" action="process_updateprofile.php" method="post">
              <div class="form-gorup">
                   <label for="fname">First Name:</label>            
                   <input class="form-control " type="text" id="newfname" required  name="newfname"                   
                         value="<?php echo $userinfo['fname'];?>">    
                  
              </div>
              <div class="form-gorup">
                   <label for="lname">Last Name:</label>            
                   <input class="form-control "type="text" id="newlname"
                   required maxlength="45" name="newlname" value="<?php echo $userinfo['lname'];?>">             
              </div>   
              <div class="form-gorup">
                   <label for="email">Email:</label>            
                   <input class="form-control" type="email" id="newemail" required name="newemail"                   
                          placeholder="Enter email" title="Please enter a valid email addess" value="<?php echo $userinfo['email'];?>">            
              </div>             
              <div class="form-gorup">
                   <label for="phoneno">Phone number:</label> 
                   <input  class="form-control" type="text" id="newphoneno"  required maxlength="11" name="newphoneno" 
                           pattern="[0-9]{8}" title="Please enter phone number as 8-digit numbers only" value="<?php echo $userinfo['phoneno'];?>">  
              </div>               
              <div class="form-gorup">
                   <label for="address">Address:</label> 
                   <input  class="form-control" type="text" id="newaddress"  required  name="newaddress" 
                         value="<?php echo $userinfo['address'];?>">  
              </div>
              
                                       
              <div class="form-check">
                   <label>                
                   <input required  type="checkbox" name="agree">Agree to terms and conditions.</label>            
              </div> 
              <div class="form-gorup">
                   <button id="registerbtn" class="btn btn-primary" type="submit">Save</button> 
              </div>
            </form>
                                
            <?php
               include "footer.inc.php"; //add/include the content from footer.inc.php
            ?>

</main>
    

    
    
       
</body>


</html>

