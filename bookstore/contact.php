<?php
session_start();  
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "book_store";
    $conn = mysqli_connect($host,$user,$pwd,$db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>Contact Page</title>
</head>
<body>
    <div class="container">
        <div class="formbox">
            <form action="" method="post">
                <h2>Contact Us</h2>
                <div class="inputbox">
                    <input type="text" name="f_name" required>
                    <span>Full Name</span>
                </div>

                <div class="inputbox">
                    <input type="email" name="email" required>
                    <span>Email Address</span>
                </div>

                <div class="inputbox">
                    <textarea name="text" id="" cols="30" rows="10"></textarea>
                    <span>Type your message here....</span>
                </div>

                <div class="inputbox">
                    <input type="submit" value="send" name="sub">
                </div>
                <?php 
        if(isset($_POST['sub'])){
            $name = $_POST['f_name'];
            $email = $_POST['email'];
            $text = $_POST['text'];
            $q = mysqli_query($conn,"insert into contact values('$name','$email','$text')");
            if($q){
                echo "<h3>message sent</h3>";
            }
            else{
                echo "message not sent";
            }
        }
    ?>
            </form>
        </div>

        <div class="imgbx"><img src="imgbx.jpg" alt="box_image"></div>
    </div>
    
</body>
</html>