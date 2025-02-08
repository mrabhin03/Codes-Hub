<?php

//    ---Main Login Page---



session_start();
// if(isset($_SESSION['User'])){
//     header('location:FN3Q2LoginP2.php');
// }
$msg="";
if(isset($_POST['User'])){
    $conn=mysqli_connect('localhost','root','','CodeHub');
    $User=$_POST['User'];
    $Pass=$_POST['pass'];
    $sql="SELECT Username FROM Logins WHERE Username='$User' AND Password='$Pass'";
    $data=mysqli_query($conn,$sql);
    if(mysqli_num_rows($data)>0){
        $_SESSION['User']=mysqli_fetch_assoc($data)['Username'];
        header('location:FN3Q2LoginP2.php');
    }else{
        $msg="Wrong Username or Password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body,html{
            height:100%;
            width: 100%;
            display: grid;
            place-items: center;
            background-color:#555;
        }
        form{
            padding:20px;
            background-color:#eee;
            border-radius:20px;
        }
        h2{
            margin:0;
            margin-bottom:20px;
            text-align:center;
        }
        button{
            width: 100%;
            margin-top:0px;
            padding: 5px 0;
            border-radius:3px;
            background-color:#006698;
            color:white;
            border:none;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h2>Login</h2>
        <table>
            <tr>
                <td>UserName</td>
                <td><input type="text" name="User" placeholder='Enter Your UserName'></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" placeholder='Enter Your password'></td>
            </tr>
            <tr >
                <td colspan='2' ><p style='color:red;margin:3px 0;'><?=$msg?></p></td>
            </tr>
            <tr>
                <td colspan='2'><button type='submit'>Login</button></td>
            </tr>
        </table>
    </form>
</body>
</html>