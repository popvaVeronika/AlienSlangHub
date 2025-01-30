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
    <title>Страница администратора</title>
    <link rel="stylesheet" href="styles\a.css">

</head>

<header> <body>
<span><p>AlienSlangHub</p></span>
<img src="images/NLO.svg">
<a href='m.php'>
<button><p> Вернуться</p></button></a>
</header>
<div class='admin'>

<h3>Сообщения</h3>
<div>

<?php
   $servername = "localhost";
   $username = "root";        
   $password = "";            
   $bd= "slanghub"; 
   $conn = new mysqli($servername, $username, $password, $bd);



  error_reporting(0);

$sql = "SELECT readme FROM admins where id=0";
$result = $conn->query($sql);

if ($result->num_rows != 0) {
    $row = $result->fetch_assoc();
    $readmeContent = $row['readme'];
    echo "<a href='" . htmlspecialchars($readmeContent) . "' download>Скачать файл readme" . "</a>";
} else {
    echo "<p>Нет данных для скачивания. </p>";
}

?>
<div class="main">
</form>
    <?php
    $sql_messages = "SELECT name, email, comment FROM messages";
    $result_messages = $conn->query($sql_messages);

    if ($result_messages->num_rows > 0) {
        while ($row = $result_messages->fetch_assoc()) {
            echo "<div class='entry'>";
            echo "<div><b> <p>" . htmlspecialchars($row['name']) . "</b> (" . htmlspecialchars($row['email']) . ") </p></div>";
            echo "<div> <p>" . htmlspecialchars($row['comment']). " </p></div>";
            echo "</div> ";
        }
    } else {
        echo "<div> <p>Нет сообщений.</p></div>";
    }
    ?>
</div>

<h3>Слова</h3>
<div class="main">
    <?php
    $sql_words = "SELECT russian_word, word1, txt2, txt3 FROM word";
    $result_words = $conn->query($sql_words);

    if ($result_words->num_rows != 0) {
        while ($row = $result_words->fetch_assoc()) {
            echo "<div class='entry'>";
            echo "<div><b>" . htmlspecialchars($row['russian_word']) . "</b> (" . htmlspecialchars($row['word1']) . ")</div>";
            echo "<div>";
        echo "<a href='slang/" . htmlspecialchars($row['word1']) . "/" . htmlspecialchars($row['txt2']) . "' download>Скачать " . htmlspecialchars($row['txt2']) . "</a><br>";
            echo "<a href='slang/" . htmlspecialchars($row['word1']) . "/" . htmlspecialchars($row['txt3']) . "' download>Скачать " . htmlspecialchars($row['txt3']) . "</a>";
         echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Нет слов.</p>";
    }
    ?>
</div>
</div>
<h3>Добавить новое слово</h3>
<form method="post"  enctype="multipart/form-data" action="php_workfiles/add_word.php">
  <p>  <input type="text" name="russian_word" placeholder="Русское слово" required>
</p>  <p>  <input type="text" name="word1" placeholder="Английское слово" required>
</p>  <p>  <input type="text" name="title" placeholder="Заголовок" required>
</p>  <p>  <input type="text" name="keywords" placeholder="Ключевые слова" required>
</p>


<p> Файл статьи <input type="file" name="txt2" accept=".txt"   class='inp'>
</p><p>   Файл оглавлений <input type="file" name="txt3" accept=".txt"   class='inp'>
</p>
<p>    <input type="submit" value="Добавить слово" class='inp'>
</p>
</form>


</div>
</body>
</html>
