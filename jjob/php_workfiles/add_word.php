
<?php
   $servername = "localhost";
   $username = "root";        
   $password = "";            
   $bd= "slanghub"; 
   $conn = new mysqli($servername, $username, $password, $bd);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $russian_word = $_POST['russian_word'];
    $word1 = $_POST['word1'];
    $title = $_POST['title'];
    $keywords = $_POST['keywords'];
    $directory = "../slang/" . $word1;
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
    $file2_name = basename($_FILES['txt2']['name']);
    $file3_name = basename($_FILES['txt3']['name']);
    $file2_path = $directory . '/' . $file2_name;
    $file3_path = $directory . '/' . $file3_name;

    if (move_uploaded_file($_FILES['txt2']['tmp_name'], $file2_path) && 
        move_uploaded_file($_FILES['txt3']['tmp_name'], $file3_path)) {

  $sql = "INSERT INTO word (russian_word, word1, txt2, txt3, title, keywords) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssssss", $russian_word, $word1, $file2_name, $file3_name, $title, $keywords);
            if ($stmt->execute()) {
            }
         $stmt->close();
        } 
    } 
}
$conn->close();
header("Location: ../admin.php");
exit;
?>