<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindrome</title>
</head>
<body>

    <form method="post">
        Input <input type="text" name="Palin" id="" value="">
        <button type='submit'>Check</button>
    </form>

    <?php
    
        if(isset($_POST['Palin'])){
            if($_POST['Palin']==strrev($_POST['Palin'])){
                echo $_POST['Palin']." is a Palindrome ";
            }else{
                echo $_POST['Palin']." is Not a palindrome ";
            }
		}
        
    ?>
</body>
</html>