<?php
        $servername = "localhost";
        $username = "root";        
        $password = "";            
        $bd= "slanghub"; 
        $conn = new mysqli($servername, $username, $password, $bd);

        error_reporting(0);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
          $comment = $conn->real_escape_string($_POST['comment']);

            $sql = "INSERT INTO messages (name, email, comment) VALUES ('$name', '$email', '$comment')";
            if ($conn->query($sql) == TRUE) {
               
               header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        }

        $conn->close();
        header("Location: ../m.php");
        exit;
        ?>