<?php
   $servername = "localhost";
   $username = "root";        
   $password = "";            
   $bd= "slanghub"; 
   $conn = new mysqli($servername, $username, $password, $bd);



  error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="styles\a.css"> 
</head>

<header> <body>
<span><p>AlienSlangHub</p></span>
<img src="images/NLO.svg">
<a href='m.php'>
<button><p> Вернуться</p></button></a>
</header>
<div class='avtorisation'>

    <form method="post" action="">
        <p>Логин:</p> 
        <input type="text" id="name" name="name" required>
        <br>
        <p>Почта:</p>
        <input type="email" id="email" name="email" required>
        <br>
        <p>Пароль:</p>
        <input type="password" id="pass" name="pass" required>
        <br>
        <input type="submit" value="Войти">
    </form>

    <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $conn->real_escape_string($_POST['name']);
         $email = $conn->real_escape_string($_POST['email']);
        $pass = $conn->real_escape_string($_POST['pass']);
        $sql = "SELECT * FROM admins WHERE name='$name' AND email='$email' AND pass='$pass'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<p>Добро пожаловать, ". $name . "!</p>";
            sleep (3);
            header("Location: admin.php");
            exit;
        } else {
             sleep (3);
            echo "<p>Неверный логин, почта или пароль.</p>";
        }
    }

    $conn->close();
    ?>
    </div>
</body>
</html>