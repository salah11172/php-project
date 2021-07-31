
include "Layouts/header.php";

$conn1 = new PDO("mysql:host=localhost; dbname=booksystem","root","");

$data1 = $conn1->query('select * from book ');

// var_dump($table);

 
echo "
    <table border=1>
        <tr>
            <th>name</th>
            <th>author</th>
            <th>description</th>
             <th>pic</th>
            
        </tr>
";

while ($row=$data1->fetch(PDO::FETCH_ASSOC)) {
    //  echo "<h1>{$row['fname']}</h1>";
     $content ="<img src='u.jpg' alt='undefined ' width='50px' >";
 

    echo "<tr>";
        echo "<td>{$row['Name']}</td>";
        echo "<td>{$row['author']}</td>";
        echo "<td >{$row['deccription']}</td>";
        // echo "<td w>{$row['pic']}</td>";
        if (empty($row['image'])) {
            echo "<td >{$content}</td>";
        }
          else{  echo "<td> <img src='../uploads/{$row['pic']}' width='50px'> </td>";
          }
        
       
        echo "
        <td>
            
            <a href='edit.php?id={$row['Name']}'>Edit</a>
            
        </td>";
    echo "</tr>";
}

echo "</table> <br><br>";
