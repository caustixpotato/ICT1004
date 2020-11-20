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
<?php
        $success = true;
        $config = parse_ini_file('../../private/db1-config.ini');
        $conn = new mysqli($config['servername'], $config['username'],
        $config['password'], $config['dbname']);
        $sql = "SELECT Img FROM Items"; 
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            echo '<img src="data:image/jpeg;base64,'
            .base64_encode( $row['Img'] ).'"/>';
        }
        
        
 ?>
    
    <?php
    include "footer.inc.php"; //add/include the content from footer.inc.php
 ?>
</body>
</html>
    

       
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

