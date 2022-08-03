<?php
/* call the document require */
require "db.php";



/*define variables and set to empty values*/

$nameErr = $lastnameErr = $dobErr = $emailErr = $genderErr = $passwordErr= "";
$name = $lastname = $dob = $email = $gender = $comment = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["lastname"])) {
    $lastnameErr = "Lastname is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    // check if lastname only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["dob"])) {
    $dobErr = "Date of Birth is required";
  } else {
    $dob = test_input($_POST["dob"]);
    // check if date of birth only contains date
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dob)) {
      $dobErr = "Only date is allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  
  if (!empty($_POST["password"]) && $_POST["password"] !=""){
      if (strlen($_POST["password"]) <= '8') {
        $passwordErr .= "Your Password Must Contain At Least 8 Digits !"."<br>";
      }
      elseif(!preg_match("#[0-9]+#",$_POST["password"])) {
        $passwordErr .= "Your Password Must Contain At Least 1 Number !"."<br>";
      }
      elseif(!preg_match("#[A-Z]+#",$_POST["password"])) {
        $passwordErr .= "Your Password Must Contain At Least 1 Capital Letter !"."<br>";
      }
      elseif(!preg_match("#[a-z]+#",$_POST["password"])) {
        $passwordErr .= "Your Password Must Contain At Least 1 Lowercase Letter !"."<br>";
      }
      elseif(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST["password"])) {
        $passwordErr .= "Your Password Must Contain At Least 1 Special Character !"."<br>";
      }
  } else{
      $passwordErr .= "Please Enter your password"."<br>";
  }
  //Encrypt the password
  // The plain text password to be hashed
  $plaintext_password = "password";
  // The hash of the password that
  // can be stored in the database
  $password_hash = password_hash($plaintext_password, PASSWORD_DEFAULT);
  // Print the generated hash $post123(TRES
  //echo "Generated hash: ".$hash;


  //End of the encryption

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

/*create insert*/
$sql = "INSERT INTO users (name,lastname,dob,email,password,comment,gender) 
VALUES ('$name','$lastname','$dob','$email','$password_hash','$comment','$gender')";
     if($connection->query($sql) === true){
      echo '  Your Data has been sent to the database';
     } else {
        echo 'Error occur while sending data'.$connection->error; 
     }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



/*Close connection for security*/
$connection->close();

?>


<!-- Create validation form --> 
<h2 class="flex text-2xl text-align-center font-sans"> Validation Form</h2>

<p class="text-left text-red-500" > <span class="error"> * Required Field </span></p><br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

Name: <input type="text" name="name" value="<?php echo$name;?>">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>

Lastname: <input type="text" name="lastname" value="<?php echo$lastname;?>">
<span class="error">* <?php echo $lastnameErr;?></span>
<br><br>

Date of Birth: <input required type ="date" name="dob" value="<?php echo$dob;?>">
<span class="error">* <?php echo $dobErr;?></span>
<br><br>

E-mail: <input required type = "email" name= "email" value="<?php echo$email;?>">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>

Password: <input required type = "password" name= "password"value="<?php echo$password;?>">
<span class="error">* <?php echo $passwordErr;?></span>
<br><br>

Comment: <textarea name="comment" rows="5" Cols="40"><?php echo $comment;?></textarea>

<div>
Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
</div>
<input type = "submit">



    



    
