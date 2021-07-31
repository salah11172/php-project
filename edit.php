<?php

$id = $_GET['id'];
echo $id;

$conn = new PDO("mysql:host=localhost;dbname=booksystem", "root", "");


$result = $conn->query("select * from user where id = $id");

$data = $result->fetch(PDO::FETCH_ASSOC);

// var_dump($data);

?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

    Image <input type="file" name="img"><br><br><br>

  
    <button type="submit" name="submit">Update</button>
    <button type="reset">Reset</button>

</form>

<?php
if (isset($_POST['submit'])){

$fileName=$_FILES['img']['name'];

$fileSize=$_FILES['img']['size'];
$fileTempName=$_FILES['img']['tmp_name'];
$fileType=$_FILES['img']['type'];
$fileExtansion=explode(".","$fileName");
print_r($fileExtansion);
$fileActualExtansion=strtolower(end($fileExtansion));
//    print_r($fileActualExtansion);
$allowedExtansion=array('jpg','png','pdf');
if (in_array($fileActualExtansion,$allowedExtansion)) {


   move_uploaded_file($fileTempName,"uploads/".$fileName);
} 


else {
echo"the image not valid";
}

var_dump($_FILES);
    $conn->query("update user set

   
    image='{$fileName}'

    where id = $id
");

   header("Location:profile.php");

}

?>