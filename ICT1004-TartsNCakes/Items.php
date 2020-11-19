<?php
   $config = parse_ini_file('../../private/db1-config.ini');
     $conn = new mysqli($config['servername'], $config['username'],
     $config['password'], $config['dbname']);
    
    $stmt = $conn->prepare("SELECT * FROM world_of_pets_members WHERE email=?");
     
     //Bind & exec the query statement
    $stmt->execute();
    $result = $stmt->get_result();
    if ($conn->connect_error)
    {
     $errorMsg = "Connection failed: " . $conn->connect_error;
     $success = false;
    }
     else
    {
    // Prepare the statement:
    $stmt = $conn->prepare("SELECT * FROM Items");
    // Bind & execute the query statement:
    $stmt->execute();
    $result = $stmt->get_result();
    
    echo "<table border='1'>

    <tr>
    <th>Img</th>
    </tr>";
    
    while ($rows= mysql_fetch_assoc($result))
    {
            echo "<td>" .$rows['Img']. "</td>";    
    }
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

