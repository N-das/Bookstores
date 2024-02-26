<?php
session_start();  
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "book_store";
    $conn = mysqli_connect($host,$user,$pwd,$db);
    if($conn){
    
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
                $select_products = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
            ?>
            <div class="container">
              
                    
                    <div class="img"><img src=".\images\<?php echo $fetch_products['image'];?>" alt=""></div>
                        <div class="product-detail">
                            <h2>user_id : <span><?php echo $fetch_products['user_id'];?></span></h2>
                            <h2>book id : <span><?php echo $fetch_products['book_id'];?></span></h2>
                            <h2>name : <span><?php echo $fetch_products['name'];?></span></h2>
                            <h2>price: <span>$<?php echo $fetch_products['price'];?>/-</span></h2>
                            <h2>quantity : <span><?php echo $fetch_products['quantity'];?></span></h2>
                        </div>
                    <!-- <input type="hidden" name="name" value="<?php echo $fetch_products['name'];?>">
                    <input type="hidden" name="email" value="<?php echo $fetch_products['email'];?>">
                    <input type="hidden" name="message" value="<?php echo $fetch_products['message'];?>"> -->

                    <!-- <button type="submit" name="del">Delete</button> -->
               
            </div>
            <?php
                    }
                }
                else{
                    echo '<center><h1>no orders yet!</h1></center>';
                }
            ?>
        </div>
    </div>
</body>
</html>
