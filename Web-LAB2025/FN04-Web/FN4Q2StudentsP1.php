
<?php

    //       ---Form to submit Students Details And details show---


    $conn=mysqli_connect('localhost','root','','Students');
    if(!$conn){
        die("Connection Error");
    }
    $Select="SELECT * FROM details ORDER BY RollNo";
    $data=mysqli_query($conn,$Select);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <style>
        body,html{
            height:100%;
            width: 100%;
        }
        .homePage{
            margin: 40px auto;
            width: fit-content;
        }
        form{
            padding:20px;
            background-color:#eee;
            border-radius:20px;
            width: fit-content;
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
    <div class='homePage'>
        <form action="FN4Q2StudentsP2.php" method="post">
            <h2>Students Details</h2>
            <table>
                <tr>
                    <td>Roll Number</td>
                    <td>: <input type="number" name="Roll" placeholder='Enter Your Roll number' required></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>: <input type="text" name="Name" placeholder='Enter Your Name' required></td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td>: <input type="date" name="DOB" placeholder='2003-01-01' required></td>
                </tr>
                <tr>
                    <td colspan='2'><button type='submit'>Submit</button></td>
                </tr>
            </table>
        </form>
        <table style='width:100%;text-align:center;margin-top:20px;' border='1'>
            <thead>
                <th>RollNo</th>
                <th>Name</th>
                <th>DOB</th>
            </thead>
            <?php
            if(mysqli_num_rows($data)>0){
                while($values=mysqli_fetch_assoc($data)){
                    ?>
                        <tr>
                            <td><?=$values['RollNo']?></td>
                            <td><?=$values['Name']?></td>
                            <td><?=$values['DOB']?></td>
                        </tr>
                    <?php
                }
            }else{
                echo "<tr><td colspan='3'>No Data</td></tr>";
            }
            ?>
        </table>
    </div>
    
</body>
    
</body>
</html>