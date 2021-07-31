<style>

.two{ display: none;}
   

</style>
<?php
session_start();
$username="salah";
$password="salah123456";

if ($username== $_POST['uname'] && $password==$_POST['psw']) {
    $_SESSION['userdata']=$_POST['uname'];
    // echo" <h5 style=' color:lightblue ; padding-top:1%'>welcome $_SESSION[userdata]</h5>";
   
}
else{header("Location:login.php");
}
$email=$_POST['uname'];
$pass=$_POST['psw'];
// echo $email ;
?>
<?Php
// $conn = new PDO("mysql:host=localhost; dbname=booksystem","root","");
// $conn->query("insert into user 
//                set email=' $email',
//                  pass='$pass'
                
//             ");
 $conn = new PDO("mysql:host=localhost; dbname=booksystem","root","");
$data= $conn->query("select id from user ");

 $profile=$data->fetch(PDO::FETCH_ASSOC);
 
 
 $id=$profile['id'] ;
 setcookie("userid", $id);
 setcookie("useremail", $email);
//  var_dump($_COOKIE);
// var_dump($_COOKIE['userid']);

/////////////////////////////////////////////////
 
include "Layouts/header.php";

// function readMore($limit,$text)
// { $content=explode(" ",$text);
//     $words=array_slice($content,0,$limit);
//     return implode(" ",$words);

// }


$conn1 = new PDO("mysql:host=localhost; dbname=booksystem","root","");

$table = $conn1->query('select * from book ');
echo "<h1 style='text-align: center ; color:lightblue ; padding-top:1% '>BOOK MANGMENT SYSTEM</h1>

<section class='row mt-5 justify-content-around bg-light'>";
$row=$table->fetch(PDO::FETCH_ASSOC);
while ($row=$table->fetch(PDO::FETCH_ASSOC)) {

  
 echo"<div class='card col-4  m-3'>
 <img src='uploads/{$row['image']}' class='card-img-top mt-2'  height='300px'>
 <div class='card-body'>
     <h5 class='card-title'>{$row['Name']}</h5>
     <h6 class='card-title'>{$row['author']}</h6>
     <p class='card-text'>";
      $content=$row['deccription'];
      if(strlen($content)>100){
      $string = str_split($content, 100);
      $desc1 = $string[0];
      $desc2 = $string[1];
      };
   
    //  $string=substr($stringcut,0,strrpos($stringcut,' ')).'...<a href=#> READ MORE</a>';
     

    
    echo"  <div class='' id='one'> $desc1 </div>
     <span class='two'  > $desc2 </span>
     <a class=' btn btn-primary stretched-link 'id='tow'>READ MORE</a>
    

 </div>
</div>";

    
}

echo "</section>";

$content="This function should not be used to try to prevent XSS attacks.
     Use more appropriate functions like htmlspecialchars() or other means depending
      on the context of the output.Warning
    Because strip_tags() does not actually validate the HTML, partial or broken tags can
     result in the removal of more text/data than expectedWarning
    This function does not modify any attributes on the tags that you allow using allowed_tags,
     including the style and onmouseover attributes that a mischievous 
     user may abuse when posting text that will be shown to other users.";
    //  if(strlen($content)>200);
    //   $stringcut=substr($content,0,200);
    //   $string=substr($stringcut,0,strrpos($stringcut,' '));
    //   echo $string;
//     $string = str_split($content, 200);
//     $desc1 = $string[0];
//     $desc2 = $string[1];

// echo $desc1 , $desc2;


?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
 
</script>
<!-- 

<h1 style="text-align: center ; color:lightblue ; padding-top:1% ">BOOK MANGMENT SYSTEM</h1>

<section class="row mt-5 justify-content-around bg-light">
            <div class="card col-12 col-lg m-3">
                <img src="images/1.jpg" class="card-img-top mt-2" alt="hema" height="300px">
                <div class="card-body">
                    <h5 class="card-title">Fire</h5>
                    <h6 class="card-title">Author : hamdy</h6>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up
                        the bulk of the card's content.
                    </p>
                    
                </div>
            </div>
            <div class="card col-12 col-lg ms-lg-3 m-3" >
                <img src="images/2.jpg" class="card-img-top mt-2" alt="hema" height="300px">
                <div class="card-body">
                    <h5 class="card-title">Minaret Mosque and nature</h5>
                    <h6 class="card-title">Author : salah</h6>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up
                        the bulk of the card's content.
                    </p>
                    
                </div>
            </div>
            <div class="card col-12 col-lg ms-lg-3 m-3" >
                <img src="images/3.jpg" class="card-img-top mt-2" alt="hema" height="300px">
                <div class="card-body">
                    <h5 class="card-title">Clouds and trees</h5>
                    <h6 class="card-title">Author : salah</h6>
                    <p class="card-text">
                        Some quick example text to build on the card title and make up
                        the bulk of the card's content.
                    </p>
                    
                </div>
            </div>
        </section> -->
        
<script>$("a").click(function() {
    console.log("hh")
    
    $("span").toggleClass("two");
    $(".btn btn-primary").toggleClass("two");
}); </script>
