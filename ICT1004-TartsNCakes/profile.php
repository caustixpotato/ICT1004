<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tarts N's Cake</title>
        <link rel="stylesheet" href="css/profile.css"/>
        <?php
        include 'phpFiles/headcontents.inc.php';
        ?>




        <?php
        session_start();
        if (!isset($_SESSION['whoami'])) {
            header("Location:Login.php");
        }

        //open connection and select database
        $config = parse_ini_file('../../private/db1-config.ini');
        $conn = new mysqli($config['servername'], $config['username'],
                $config['password'], $config['dbname']);
        $useremail = $_SESSION['whoami'];
        $userid = $_SESSION['userid'];
        $userlname = $_SESSION['username'];
        $sql = "SELECT * FROM cake_member where userID ='$userid'";

        $selectduser = mysqli_query($conn, $sql);
        $userinfo = mysqli_fetch_assoc($selectduser);
        ?>



    </head>

    <body>
<?php
include "phpFiles/nav.inc.php"
;
?> 
        <header id="Content">
            <?php
            include "phpFiles/banner.php";
            ?>
        </header>

        <main class="container">        
            <img id="profileimg" alt="profilepicture" src="<?php echo $userinfo['profilepic'] ?>">
            <br>
            <h1 style="color:darkgrey;"><?php echo $userinfo['lname']; ?>'s Profile</h1>        
            <br>
            <br>
            <p>             
                Manage and edit your account info.  
            </p>  


            <form id="form1" enctype="multipart/form-data" name="form1" action="process_updateprofile.php" method="post">
                <div class="form-gorup">
                    <label for="newfname">First Name:</label>            
                    <input class="form-control " type="text" id="newfname" required  name="newfname"                   
                           value="<?php echo $userinfo['fname']; ?>">    

                </div>
                <div class="form-gorup">
                    <label for="newlname">Last Name:</label>            
                    <input class="form-control" type="text" id="newlname"
                           required maxlength="45" name="newlname" value="<?php echo $userinfo['lname']; ?>">             
                </div>   

                <div class="form-gorup">
                    <label for="newemail">Email:</label>            
                    <input class="form-control" type="email" id="newemail" required name="newemail"                   
                           placeholder="Enter email" title="Please enter a valid email addess" value="<?php echo $userinfo['email']; ?>">            
                </div>      

                <div class="form-gorup">
                    <label for="newphoneno">Phone number:</label> 
                    <input  class="form-control" type="text" id="newphoneno"  required maxlength="11" name="newphoneno" 
                            pattern="[0-9]{8}" title="Please enter phone number as 8-digit numbers only" value="<?php echo $userinfo['phoneno']; ?>">  
                </div>               
                <div class="form-gorup">
                    <label for="newaddress">Address:</label> 
                    <input  class="form-control" type="text" id="newaddress"  required  name="newaddress" 
                            value="<?php echo $userinfo['address']; ?>">  
                </div>

                <div class="form-check">
                    <label for="fileToUpload">Update profile pic:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>

                <?php
                if (isset($_GET['fail'])) {
                    echo "<span style='color:red'>Upload Failed !!!!</span>";
                }
                if (isset($_GET['big'])) {
                    echo "<script>
               alert('File Size Too Big, Fail To Upload File');
               window.location.href='profile.php';
               </script>";
                }
                ?>                 
                <div class="form-check">
                    <label>                
                        <input required  type="checkbox" name="agree">Agree to terms and conditions.</label>            
                </div> 
                <div class="form-gorup">
                    <button id="savebtn" class="btn btn-primary" type="submit">Save</button> 
                </div>
            </form>

<?php include "phpFiles/footer.inc.php"; ?> 

        </main>





    </body>


</html>

