!DOCTYPE HTML>
<html>
    <body>
    <?php

$sname = "127.0.0.1";
$password = "";
$uname = "root";
$db_name = "testcase";

$connection = new mysqli($sname, $uname, $password, $db_name);

if(!$connection->connect_error) {
    echo "<br><h3>Connection Succesful with DataBase :) </h3>";
}
if(isset($_POST['submit'])) {
    $name1 = $_POST['fname'];
    $name2 = $_POST['lname'];
    $reg = $_POST['regno'];
    $mail = $_POST['email'];

    $query = "INSERT INTO students "."(FirstName,LastName,Regno,Email)"."VALUES('$name1','$name2','$reg','$mail')";

    $result = $connection->query($query);

}

if(isset($_POST['view'])) {
    $query = "SELECT * FROM students ";
    $result = $connection->query($query);
    
    while($row = mysqli_fetch_array($result)) {
        echo "<br>FIRST NAME :{$row['FirstName']}  <br> ".
            "LAST NAME : {$row['LastName']} <br> ".
            "REGNO : {$row['Regno']} <br> ".
            "EMAIL : {$row['Email']} <br> ".
            "-------------------------------------------<br>";
   }
}

if(isset($_POST['delete'])) {
    $rno = $_POST['delrno'];
    $query = "DELETE FROM students WHERE Regno=$rno";
    
    $result = $connection->query($query);
}

if(isset($_POST['update'])) {
    $name = $_POST['changename'];
    $rno = $_POST['changerno'];
    
    $query = "UPDATE students SET FirstName='$name' WHERE Regno=$rno";

    $result = $connection->query($query);
}

?>
    </body>
</html>    
