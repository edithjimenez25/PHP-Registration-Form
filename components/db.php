<?php
        /*Conection Variables*/
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
        /*Print connection is estableshed*/
        echo "Connected Succesful";