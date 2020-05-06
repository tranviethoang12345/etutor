

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Sign In & Sign Up Form</title>
      <!-- Meta tags -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="Login & Sign Up Form, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
         />
      <script>
         addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
      </script>
      <!-- Meta tags -->
      <!--stylesheets-->
      <link href="css/styleLogin.css" rel='stylesheet' type='text/css' media="all">      
       <!-- <--//style sheet end here-->
      <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
   </head>
   <body>
      <div class="mid-class">
         <div class="art-right-w3ls">
            <h2>Sign In</h2>
            <form action="LoginAction.php" method="post">
               <div class="main">
                  <div class="form-left-to-w3l">
                     <input type="text" name="userNameToLogin" placeholder="Username" required="">
                  </div>
                  <div class="form-left-to-w3l ">
                     <input type="password" name="passwordToLogin" placeholder="Password" required="">
                     <div class="clear"></div>
                  </div>
               </div>
               <div class="left-side-forget">
                  <input type="checkbox" class="checked">
                  <span class="remenber-me">Remember me </span>
               </div>
               <div class="clear">
               </div>
               <div class="clear"   <?php 
                                          session_start();
                                          if (isset($_SESSION["errorWhenLogin"])){
                                             ?>style="display:block;"<?php
                                             unset($_SESSION['errorWhenLogin']);
                                           
                                          }else{
                                             ?>style="display:none;"<?php
                                          } 
                                    ?>
               >
                  <span style="color:red">* Wrong username or password </span>
               </div>
               <div class="btnn">
                  <button type="submit">Sign In</button>
                  <button type="submit"><a type="signup" href="#content1">Sign Up</a></button>
               </div>
            </form>
            <!-- popup-->
            <div id="content1" class="popup-effect">
               <div class="popup">
                  <!--login form-->
                  <div class="letter-w3ls">
                     <form action="#" method="post">
                        <div class="form-left-to-w3l">
                           <input type="text" name="name" placeholder="Username" required="">
                        </div>
                        <div class="form-left-to-w3l">
                           <input type="text" name="name" placeholder="Name" required="">
                        </div>                       
                        <div class="form-left-to-w3l">
                           Date:
                           <input type="date" name="name" placeholder="Date" required="">
                        </div>
                        <div class="form-left-to-w3l">
                           Gender:
                           <input type="radio" id="male" name="gender" value="male">
                           <label for="male">Male</label>
                           <input type="radio" id="female" name="gender" value="female">
                           <label for="female">Female</label>
                           <input type="radio" id="other" name="gender" value="other">
                           <label for="other">Other</label>
                        </div>
                        <div class="form-left-to-w3l">
                           <input type="text" name="name" placeholder="Address" required="">
                        </div>
                        <div class="form-left-to-w3l">
                           <input type="text" name="name" placeholder="Phone" required="">
                        </div>
                        <div class="form-left-to-w3l">
                           <input type="email" name="email" placeholder="Email" required="">
                        </div>
                        <div class="form-left-to-w3l">
                           Select image to upload:
                           <input type="file" name="fileToUpload" id="fileToUpload">                           
                        </div>
                        <div class="form-left-to-w3l">
                           <input type="password" name="password" placeholder="Password" required="">
                        </div>
                        <div class="btnn">
                           <button type="submit">Sign Up</button>
                           <br>
                        </div>
                     </form>
                     <div class="clear"></div>
                  </div>
                  <!--//login form-->
                  <a class="close" href="#">&times;</a>
               </div>
            </div>
            <!-- //popup -->
         </div>
         <div class="art-left-w3ls">
            <h1 class="header-w3ls">
               Sign In & Sign Up Form
            </h1>
         </div>
      </div>
   </body>
</html>


