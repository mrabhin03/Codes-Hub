<!-- Registration page 2 -->
 
 <?php
if(isset($_POST['Name'])){
    $Name=$_POST['Name'];
    $DOB=$_POST['DOB'];
    $tel=$_POST['tel'];
    $Email=$_POST['Email'];
    $conn=mysqli_connect('localhost','root','','codehub');
    $SQL="INSERT INTO `userdetails`(`Name`, `PhoneNumber`, `Email`, `DOB`) VALUES ('$Name','$tel','$Email','$DOB')";
    mysqli_query($conn,$SQL);
    header('location:FN9Q2RegisterP1.php');
}
?>