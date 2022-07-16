<?php
include_once "./regex.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 500px;
            margin: 20px auto;
        }

        form input[type="submit"] {
            margin-top: 15px;
        }

        .comment {
            height: 200px;
            resize: none;
        }
    </style>

    <form method="POST">
        <input type="text" name="phone_number" placeholder="+38 0XX XXX-XX-XX">
        <textarea class="comment" placeholder="Comment..." cols="30" rows="10"></textarea>
        <input type="submit" value="SEND">
    </form>
    
</body>

</html>