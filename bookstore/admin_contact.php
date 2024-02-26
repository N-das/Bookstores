<?php
session_start();  
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "book_store";
    $conn = mysqli_connect($host,$user,$pwd,$db);
    if($conn){
        if(isset($_POST['del'])){
            $email = $_POST['email'];
            $q = mysqli_query($conn,"delete from contact where email='$email'") or die('query failed');
            $message[] = 'message deleted';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="admincss.css">
</head>
<body>
    <div class="main">
    <?php include 'admin_header.php'?>
        <div class="message">
            <?php  
                $select_products = mysqli_query($conn, "SELECT * FROM `contact`") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
            ?>
            <div class="box">
               <form action="" method="post">
                    <h2>Name : <span><?php echo $fetch_products['name'];?></span></h2>
                    <h2>e-mail : <span><?php echo $fetch_products['email'];?></span></h2>
                    <h2>message : <span><?php echo $fetch_products['message'];?></span></h2><br>
                    <input type="hidden" name="name" value="<?php echo $fetch_products['name'];?>">
                    <input type="hidden" name="email" value="<?php echo $fetch_products['email'];?>">
                    <input type="hidden" name="message" value="<?php echo $fetch_products['message'];?>">

                    <button type="submit" name="del">Delete</button>
               </form>
            </div>
            <?php
                    }
                }
                else{
                    echo '<center><img src=".\images\nomessage.jpg" id="img" alt=""></center>';
                }
            ?>
        </div>
    </div>
</body>
</html>
