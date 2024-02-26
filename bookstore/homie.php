
<?php
session_start();  
$user_id = $_SESSION["user"];
    if(!isset($user_id)){
        header('location:login.php');
    }
            $host = "localhost";
            $user = "root";
            $pwd = "";
            $db = "book_store";
            $conn = mysqli_connect($host,$user,$pwd,$db);
            // $message[] = 'product added to cart!';
    if($conn){
        if(isset($_POST['add_to_cart'])){

            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];
            $book_id = $_POST['book_id'];
         
            $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
            // $check_table = mysqli_query($conn,"SELECT * FROM products where quantity = $product_quantity");
            // $check_quantity = mysqli_num_rows($check_table);
            // $fetch = mysqli_fetch_assoc($check_table);
            // $qunatity = $fetch['quantity']-$check_quantity;
            // if($qunatity<1){
            //     $message[] = 'product is unavailable'; 
            // }
                      // if(mysqli_num_rows($check_table)>0){
            //    while($fetch = mysqli_fetch_assoc($check_table)){
            //     $qty = $fetch['quantity']-$product_quantity;
            //     $qry = mysqli_query($conn,"UPDATE products SET quantity = $qty WHERE book_id = $product_id");
            //     if($qry){
            //         echo "quantity";
            //     }
            //    }
            // }
            // else{
                
            // }
            $q="SELECT quantity from suggest  where book_id='$book_id'";
            $res=mysqli_query($conn,$q);
            $quon=mysqli_fetch_assoc($res);
            $remaining=$quon['quantity']-$product_quantity;
            $qry = mysqli_query($conn,"UPDATE suggest SET quantity = $remaining WHERE book_id = '$book_id'");
            // if($product_quantity <= 50){
            //     $qry = mysqli_query($conn,"UPDATE products SET quantity = quantity-$product_quantity WHERE book_id = $book_id");
                // if($qry){
                //     $message[] = 'cart quantity updated';
                // }
                // else{
                //     $message[] = 'query failed';
                // }
            // }
            
            if(mysqli_num_rows($check_cart_numbers) > 0){
               $message[] = 'already added to cart!';
            }else{
                mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image,book_id) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image','$book_id')") or die('query failed');
               $message[] = 'product added to cart!';
            }
         
         }
    }
    if(isset($_POST['logout'])){
        session_destroy();
       // header('location:login.php');
        header('location:Login.php');
        //  echo "<script>location.href(Login.php)</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bookstore_style.css">
    <style>
        .user-box button{
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="main">
    <?php

   
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<div class="header">
    <div class="menu">
        <i class="fa-solid fa-bars fa-lg" id="menu1"></i>
    </div>
    <header>
        <h2>bookstore.com</h2>
    </header>
    <nav class="navbar">
        <ul>
            <li><a href="homie.php">home</a></li>
            <li><a href="trending.php">Trending</a></li>
            <li><a href="upcomming.php">upcomming</a></li>
            <li><a href="#">manga</a></li>
            <!-- <li><i class="fa-solid fa-user fa-lg" onclick="user()"></i></li>
                    <li><i class="fa-solid fa-cart-shopping fa-lg"></i></li> -->
        </ul>
    </nav>
    <!-- <a href="#"><BUtton id="btn">LOG-OUT</BUtton></a> -->
    <div id="btn">
        <div id="user-btn" class="fa-solid fa-user fa-lg"></div>
        <?php
                $user_id = $_SESSION["user"];
                $select_cart_number = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('query failed');
                $cart_rows_number = mysqli_num_rows($select_cart_number); 
                ?>
        <a href="kart.php"> <i class="fa-solid fa-cart-shopping fa-lg"></i></a> <span
            id="no">(<?php echo $cart_rows_number; ?>)</span>
    </div>

</div>
<script>
 
</script>
<!-- <br> -->
<div class="content">
    <div class="icons" style="margin-top: 40px;">
        <!-- <h3></h3> -->
        <div class="icon" style="margin-top: -7px;">
            <i class="fa-brands fa-instagram fa-xl"></i>
            <i class="fa-brands fa-twitter fa-xl"></i>
            <i class="fa-brands fa-linkedin fa-xl"></i>
            <i class="fa-brands fa-facebook fa-xl"></i>
        </div>
        <div class="userde">
            <!-- <input type="submit" id="logout" value="Log-out" name="logout">
                    <h2>|</h2>
                    <h3><a href="register.php">Sign-up</a></h3> -->
            <?php
                
                // echo  $_SESSION["user"]; 
               ?>

        </div>
    </div>
    <div class="search">


        <!-- <img src="bg.jpg" alt=""><br> -->
        <input type="search" placeholder="Search book" id="search">
        <button><i class="fa-solid fa-magnifying-glass fa-lg"></i></button>

        <br><br><br>
        <div class="quick">
            <div class="topsearch">
                <!-- <h3>top search : </h3> -->
                <!-- <i id="sear" class="fa-solid fa-magnifying-glass fa-lg"></i>
                <h4> <a href="#">Chetan Bhagat </a></h4>
                <h4> <a href="#">Rabindranath Tagore </a></h4>
                <h4> <a href="#">Harivansh rai bachan </a></h4>
                <h4> <a href="#">chetan bhagat </a></h4> -->
            </div>
            <div class="topsearch">
                <!-- <h3>top search : </h3>
                <h4> <a href="#">Chetan Bhagat </a></h4>
                <h4> <a href="#">Rabindranath Tagore </a></h4>
                <h4> <a href="#">Harivansh rai bachan </a></h4>
                <h4> <a href="#">chetan bhagat </a></h4> -->
            </div>
        </div>

    </div>
</div>
            <div class="user-box">
                <form action="" method="post">
                    <p> user: <span><?php echo $_SESSION["name"]; ?></span></p>
                    <p>email : <span><?php echo $_SESSION["user"];  ?></span></p>
                <button type="submit" name="logout">logout</button>
                </form>
            </div>
            <div class="suggest">
                <p>suggested book for <span><?php echo $_SESSION["name"]; ?></span><p>
            </div>
            <script>
                    let a =  document.querySelector('.user-box');

                    document.querySelector('#user-btn').onclick = () =>{
                        a.classList.toggle('active');
                       if(a.style.display === "none"){
                            a.style.display = "block";

                       }
                       else{
                        a.style.display="none";
                       }
                    }
                    let ajax = document.querySelector('#menu1').onclick = () =>{
                    let nav = document.querySelector('.navbar');
                    let icon = document.querySelector('.icon');
                    if(nav.style.display === "none"){
                        nav.style.display = "block";
                        icon.style.display = "none";
                    }
                    else{
                        nav.style.display = "none";
                        icon.style.display = "block";
                    }
                }
                
                    
              
             </script>
            
        <div class="auth1">
            <div class="auth">
                <?php  
                $select_products = mysqli_query($conn, "SELECT * FROM `suggest` LIMIT 6") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
                    ?>
                    <form action="" method="post" class="box">
                    <img class="image" src=".\images\<?php echo $fetch_products['image']; ?>" alt="">
                    <div class="name"><?php echo $fetch_products['name']; ?></div>
                    <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                    <input type="number" min="1" name="product_quantity" value="1" class="qty">
                    <input type="hidden" name="book_id" value="<?php echo $fetch_products['book_id']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                    <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    <div class="available">Available quantity <span><?php echo $fetch_products['quantity'];?></span></div>
                    </form>
                    <?php
                        }
                    }else{
                        echo '<p class="empty">no products added yet!</p>';
                    }
                    ?>
            </div>
        </div>
        <?php
    //     }
    // }
    // else{

    // }
        ?>
        <h2>Authors</h2>
        <div class="books">
            <div class="book">
              <div class="box">
              <div class="ion">
             <i class="fa-brands fa-instagram fa-2xl"></i>
                <i class="fa-brands fa-twitter fa-2xl"></i>
                <i class="fa-brands fa-linkedin fa-2xl"></i>
                <i class="fa-brands fa-facebook fa-2xl"></i>
             </div>
              <a href="vikram.php"><img src=".\images\vikram.jpg" class="image" alt=""></a>
              <h3>Vikram sampath</h3>
              </div>
              <div class="box">
             <div class="ion">
             <i class="fa-brands fa-instagram fa-2xl"></i>
                <i class="fa-brands fa-twitter fa-2xl"></i>
                <i class="fa-brands fa-linkedin fa-2xl"></i>
                <i class="fa-brands fa-facebook fa-2xl"></i>
             </div>
              <a href="rknarayan.php"><img src=".\images\rknarayan.jpg" class="image" alt=""></a>
              <h3>rk narayan</h3>
              </div>
              <div class="box">
              <div class="ion">
                <i class="fa-brands fa-instagram fa-2xl"></i>
                    <i class="fa-brands fa-twitter fa-2xl"></i>
                    <i class="fa-brands fa-linkedin fa-2xl"></i>
                    <i class="fa-brands fa-facebook fa-2xl"></i>
                </div>
              <a href="johnboyne.php"><img src=".\images\john.jpg" class="image" alt=""></a>
              <h3>John boyne</h3>
              </div>
              <div class="box">
                <div class="ion">
                <i class="fa-brands fa-instagram fa-2xl"></i>
                    <i class="fa-brands fa-twitter fa-2xl"></i>
                    <i class="fa-brands fa-linkedin fa-2xl"></i>
                    <i class="fa-brands fa-facebook fa-2xl"></i>
                </div>
              <a href="chetan.php"><img src=".\images\chetan.jpg" class="image" alt=""></a>
              <h3>Chetan bhagat</h3>
              </div>
              <div class="box">
                <div class="ion">
                <i class="fa-brands fa-instagram fa-2xl"></i>
                    <i class="fa-brands fa-twitter fa-2xl"></i>
                    <i class="fa-brands fa-linkedin fa-2xl"></i>
                    <i class="fa-brands fa-facebook fa-2xl"></i>
                </div>
              <a href="collen_hover.php"><img src=".\images\collen.jpg" class="image" alt=""></a>
              <h3>Collen hover</h3>
              </div>
              <div class="box">
                <div class="ion">
                <i class="fa-brands fa-instagram fa-2xl"></i>
                    <i class="fa-brands fa-twitter fa-2xl"></i>
                    <i class="fa-brands fa-linkedin fa-2xl"></i>
                    <i class="fa-brands fa-facebook fa-2xl"></i>
                </div>
              <a href="jkrowling.php"><img src=".\images\jkrowling.jpg" class="image" alt=""></a>
              <h3>Jk rowling</h3>
              </div>
            </div>
            
        </div>
        
        <?php include 'footer1.php'; ?>
    </div>



</body>
</html>