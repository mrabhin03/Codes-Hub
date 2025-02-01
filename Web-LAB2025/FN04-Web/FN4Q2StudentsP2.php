<?php
$conn=mysqli_connect('localhost','root','','Students');
if(!$conn){
    die("Connection Error");
}
if(isset($_POST['Roll'])){
    $Roll=$_POST['Roll'];
    $Name=$_POST['Name'];
    $DOB=$_POST['DOB'];
    $SQL="INSERT INTO details ( `RollNo`, `Name`, `DOB`) VALUES ('$Roll','$Name','$DOB')";
    mysqli_query($conn,$SQL);
}
header('location:FN4Q2StudentsP1.php');


?>