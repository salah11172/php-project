<?php include "Layouts/header.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ADD PAGE</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
 
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group container mt-5">
        Name <input type="text" name="name" class="form-control"> <br> <br>
        author <input type="text" name="author" class="form-control"> <br> <br>
         description<input type="text" name="desc" class="form-control"> <br> <br>
         <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" name="img">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
       
        <button type="submit" name="add" class="btn btn-secondary btn-lg px-5 my-5">Add</button>
        <button type="reset" class="btn btn-secondary btn-lg px-5 m-5" >Reset</button>
        </div>
    </form>

</body>

</html>

<?php
if (isset($_POST['add'])){
    

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
var_dump($_COOKIE['userid']);
$pid= trim($_COOKIE['userid'], '"');
echo $pid;

$conn = new PDO("mysql:host=localhost;dbname=booksystem", "root", "");

$conn->query("INSERT INTO book (name, author, deccription,image,pid) 
VALUES ('{$_POST['name']}', '{$_POST['author']}', '{$_POST['desc']}','{$fileName}','{$pid}')");
    // $conn->query("insert into book 
    
    // Name='{$_POST['name']}',
    // author='{$_POST['author']}',
    // deccription='{$_POST['desc']}',
    // image='{$fileName}'
    
    // ");

 //header("Location:home.php");

}

?>