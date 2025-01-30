<?php
   $servername = "localhost";
   $username = "root";        
   $password = "";            
   $bd= "slanghub"; 
   $conn = new mysqli($servername, $username, $password, $bd);
     error_reporting(0);

  $slovo = isset($_POST['slovo']) ? $_POST['slovo'] :'';
  if (!empty($slovo)) {
      $stmt =$conn->prepare("SELECT title, keywords FROM word WHERE russian_word =?");
      $stmt ->bind_param("s", $slovo);
      $stmt->execute();
      $result = $stmt->get_result();
      $title = '';
      $keywords = '';
      if ($row =$result->fetch_assoc()) {
          $title = $row['title'];
          $keywords = $row['keywords'];
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo  $title; ?></title>
    <meta name="keywords" content='<?php echo $keywords;?> '>
    <link rel="stylesheet" href="styles\a.css"> 
</head>
<body>
<header> 
<span><p>AlienSlangHub</p></span>
<img src="images/NLO.svg">
<button  type="button" onclick="window.myDialog.showModal()"> <p>Править страницу</p></button>
</header>

  <div class="t1">
    <form name="feedback" method="post"> 
       <input type="text" name="slovo" placeholder="Сленговое слово" minlength="0"maxlength="40">
  
       <button type="submit" class="lupa" value=' '>

  </form>
  </div>

 <div class="info"> 
    <div class="stat">
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (isset($_POST['slovo'])) {
      $slovo = $_POST['slovo'];
     
  }
}
else {
  $slovo='сленг';
}

$main="SELECT txt2, word1 FROM word WHERE russian_word =N'$slovo'";
  
$result = $conn->query($main);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $filename = $row['txt2'];
    $word = $row['word1'];
    $filePath = 'slang' . DIRECTORY_SEPARATOR . $word . DIRECTORY_SEPARATOR . $filename;
    $content = file_get_contents($filePath);
    echo $content;
 
  //"D:\xoxo\htdocs\jjob\slang\slang\slang.txt"
  }
  else {
    echo '<p style ="word-wrap: break-word;"> Мы пока не знаем такого слова :с <br>
    напишите в техподдержку </p>';
}
?>

    </div>
    <div class="mic-info">
 <img src="images/tokenMain.svg" class="token" alt=”инопришеленец”>
<div class='stat'> 
<h3>Оглавление</h3>
        <ul>
  <?php 
   $yakor="SELECT txt3, word1 FROM word WHERE russian_word =N'$slovo'"; 
   $result = $conn->query($yakor);
   
   if ($result->num_rows != 0) {
    $row = $result->fetch_assoc();
    $filename = $row['txt3'];
    $word = $row['word1'];
    $filePath = 'slang/' . $word . '/'. $filename;
    $content = file_get_contents($filePath);
    echo $content;
 
   } 
   else {
    echo "Недоступно";
}

$conn->close();
  ?>
  </ul>
</div>


 </div>

</div>

<dialog id="myDialog" class="dialog" > 
    <button type="button" onclick="window.myDialog.close()"> </button>
    <div class="dialog_inside"> 
    <p class='p1'> <a href='admin_panel.php'>войти как администратор
       <br> </a> или </p> <br>
        <p class='p2'> 
        создать форму обращения </p> 
        <form method="post"  action="php_workfiles/comments.php">
            <p>Как к вам обращаться </p>
            <input type="text" name="name" required>
            <p>Email для связи:</p>
            <input type="email" name="email" required>
            <p>Ваше сообщение: </p>
            <textarea name="comment" required maxlength="100"></textarea>
            <input type="submit" value="отправить" class='button' >
        </form> 

    </div>
</dialog>

  </div>




</dialog> 




</body>
</html> 

