<!-- Registration page 1 -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        form{
            padding: 18px;
            background-color:#ddd;
            width:fit-content;
            margin:0 auto;
            border-radius:10px;
        }
    </style>
</head>
<body>
    <form action="FN9Q2RegisterP2.php" method="post">
        <h2 align='center'>Registration</h2>
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name='Name' placeholder='Enter your name' required></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input type="date" name='DOB'  required></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><input type="number" name='tel' placeholder='Enter your Phone number' required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name='Email' placeholder='Enter your Email' required></td>
            </tr>
            <tr>
                <td colspan='2'>
                    <button style='width:100%;'>Submit</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>