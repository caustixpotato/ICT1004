<html lang="en">
<head>
    <title>Tarts N's Cake</title>
    <?php
      include "cssandjava.inc.php" //add/include the content from nav.inc.php
     ?>
      <link rel="stylesheet" href="css/main.css" />
      <link rel="stylesheet" href="css/register.css" />
      
       <?php
      include "cssandjava.inc.php" //add/include the content from nav.inc.php
     ?>
<script>
   function same()
    {
          var p= document.form1.pwd.value;
	  var c=document.form1.conconfirm.value;
	  
	  if(p == c)
	  {
		  return true;
          
	  }
	  else
	  {
	    alert("Your password does not match, Please enter your password again.");
            document.form1.pwd.value ="";
	    document.form1.conconfirm.value ="";
            return false;
          }	  
  }
</script>
    
<title>World of Pets</title>      
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
                    <a class="btn btn-primary btn-lg" href="#" role="button">Baked!</a>
            </div>
        </header>
        
    <main class="container">        
               <h1>Member Registration</h1>        
               <p>             
                   For existing members, please go to the 
                   <a href="Login.php">Sign In page</a>.       
               </p>        
               <form id="form1" name="form1" action="process_register.php" method="post" onSubmit="return same();">
              <div class="form-gorup">
                   <label for="fname">First Name:</label>            
                   <input class="form-control " type="text" id="fname" required name="fname"                   
                          placeholder="Enter first name">           
              </div>
              <div class="form-gorup">
                   <label for="lname">Last Name:</label>            
                   <input class="form-control "type="text" id="lname"
                   required maxlength="45" name="lname" placeholder="Enter last name">             
              </div>   
              <div class="form-gorup">
                   <label for="email">Email:</label>            
                   <input class="form-control" type="email" id="email" required name="email"                   
                          placeholder="Enter email" title="Please enter a valid email addess">            
              </div>
              <div class="form-gorup">
                   <label for="pwd">Password:</label>            
                   <input  class="form-control" type="password" id="pwd" required name="pwd"                                                                           
                          placeholder="Enter password" >   
              </div>
              <div class="form-gorup">
                   <label for="conconfirm">Confirm Password:</label> 
                   <input  class="form-control" type="password" id="conconfirm" required  name="conconfirm" 
                          placeholder="Confirm password">  
              </div>           
              <div class="form-gorup">
                   <label for="phoneno">Phone number:</label> 
                   <input  class="form-control" type="text" id="phoneno"  required maxlength="11" name="phoneno" 
                           pattern="[0-9]{8}" title="Please enter phone number as 8-digit numbers only">  
              </div>               
              <div class="form-gorup">
                   <label for="address">Address:</label> 
                   <input  class="form-control" type="text" id="address"  required  name="address" 
                          placeholder="">  
              </div>
              <div class="form-gorup">
                   <label for="birthdate">Birthdate :</label> 
                   <input   class="form-control" type="date" id="birthdate"  required  name="birthdate" >  
              </div>
                                       
              <div class="form-check">
                   <label>                
                   <input required  type="checkbox" name="agree">Agree to terms and conditions.</label>            
              </div> 
              <div class="form-gorup">
                   <button id="registerbtn" class="btn btn-primary" type="submit">Submit</button> 
              </div>
            </form>
                   
                                     
            <?php    include "phpFiles/footer.inc.php";?> 

    </main>
    

    
    
       
</body>


</html>
