<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="..//imagen/favicon1.jpg"/>
	  <link rel="stylesheet" href="style.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-sky-100">
    <header>
        <!-- The navigation menu-->
            <div class="navbar">
                <div class="home">
                  <a href="..//index.php">Web Development PHP</a> <!--Link a landing page-->
                  </div>
                      <div class="right-nav">
                          <div class="subnav">
                            <button class="subnavbtn">Register<i class="fa fa-caret-down"></i></button>
                            <div class="subnav-content">
                                  <a href="register.php">Form</a>
                                  <a href="Instructions.php">Instructions</a>
                                  <a href="other.php">Other</a> 
                            </div>
                         </div>
                     <a href="data.php">Data</a>
                     <a href="about.php">About</a>
                     </div>
             </div>
          </header>
<main>
      <div class="grid grid-cols-2 gap-5 mt-5 ml-5 mr-0 pl-4">
        <div class="mt-5">
            <?php
              require "form.php";                
            ?>      
        </div>
        <div class='mt-5'>
          <img src="../imagen/web0.webp" width="600px" >
        </div>
      </div> <!--containerR-->
</main>

</body>
</html>

