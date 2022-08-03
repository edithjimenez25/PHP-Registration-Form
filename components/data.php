<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data</title>
    <link rel="icon" type="image/x-icon" href="..//imagen/favicon2.png"/>
	  <link rel="stylesheet" href="style.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-sky-100">
    <header>
        <!-- The navigation menu-->
            <div class="navbar">
                <div class="home">
                  <a href="..//index.php">Web Development PHP</a> <!--Link a landing page-->
                </div>
                    <div class="right-nav">                        
                        <a href="register.php">Register</a>                     
                        <a href="data.php">Data</a>
                        <a href="about.php">About-us</a>
                    </div>
             </div>
          </header>
          <main class="ml-12">
            <div class="containerR">
              <h2 class="text-center text-xl font-bold font-mono">User Registration List</h2>
              <br>
              <table class="table">
                <thead>
                   <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Comments</th>
                        <th>Gender</th>
                    </tr> 
                </thead>
                <tbody>
                    <!--start php code-->
                    <?php
                    //Connect to the database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbform = "dbform";
                    
                    //Create conection
                    $connection = new mysqli($servername,$username,$password,$dbform);

                    /*Create validation to check if there is an error. If an error is occur the rest of the code will not execute*/ 
                    if($connection->connect_error){
                        die("Connection Failed"). $connection->connect_error;
                    }

                    //Read the data from table users
                    $sql = "SELECT * FROM users";
                    $result = $connection->query($sql);

                    //check if my query is executed correctly
                    if (!$result){
                        die("Invalid query: " .$connection->error);
                    }

                    //read the data per row using while loop
                    while($row = $result->fetch_assoc()){
                        echo " 
                            <tr>
                                <td>" . $row["ID"] . "</td>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["lastname"] . "</td>
                                <td>" . $row["dob"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["password"] . "</td>
                                <td>" . $row["comment"] . "</td>
                                <td>" . $row["gender"] . "</td>
                                <td>
                                    <a class='btn btn-primary btn-sm' href='update'>Update</a>
                                    <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
                                </td>
                            </tr>";
                    }
                    //-print using echo
                    
                    ?>
                </tbody> 
              </table>               

                               


                
            </div> <!--col-md-3-->
          </main>

</body>
</html>