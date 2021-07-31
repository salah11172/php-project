
<?php 
 include "Layouts/header.php"; 
echo $_COOKIE['userid'];
$con = new PDO("mysql:host=localhost; dbname=booksystem","root","");
$data=$con->query("select * from user where id={$_COOKIE['userid']}");

while ($row=$data->fetch(PDO::FETCH_ASSOC)) {
  
    
     $content ="<img src='u.jpg' alt='undefined ' width='300px'style='border-radius: 50%; margin-left: 40%; margin-top: 5%'' >";
    

        if (empty($row['image'])) {
             echo "<td >{$content}</td>";
         }
           else{  echo "<td> <img src='uploads/{$row['image']}' width='300px' style='border-radius: 50%; margin-left: 40%; margin-top: 5%'' > </td>";
           }
        
           echo" <h1 style='text-align: center;color:lightblue'> welcome {$row['email']}  </h1>";
     
           
        echo"    <a style='margin-left: 45%;' class='btn btn-secondary btn-lg ' href='edit.php?id={$row['id']}'   >Change image</a>";
            
      

        }
        // echo "<a href='home.php'>Go Home</a>";

echo " <h1 style='padding-top:1% '> MY BOOK </h1>";
$conn1 = new PDO("mysql:host=localhost; dbname=booksystem","root","");

$table = $conn1->query("select * from book where pid={$_COOKIE['userid']}");
echo "<h1 style='text-align: center ; color:lightblue ; padding-top:1% '>BOOK MANGMENT SYSTEM</h1>

<section class='row mt-5 justify-content-around bg-light'>";
while ($row=$table->fetch(PDO::FETCH_ASSOC)) {
    
 echo"<div class='card col-4  m-3'>
 <img src='uploads/{$row['image']}' class='card-img-top mt-2'  height='300px'>
 <div class='card-body'>
     <h5 class='card-title'>{$row['Name']}</h5>
     <h6 class='card-title'>{$row['author']}</h6>
     <p class='card-text'>
     {$row['deccription']}
     </p>
     
 </div>
</div>";

    
}

echo "</section>";


        
?>



    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>