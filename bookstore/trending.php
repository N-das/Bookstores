
<?php
session_start();  
$user_id = $_SESSION["user"];
    if(!isset($user_id)){
        header('location:login.php');
    }
    // <!-- $email =  $_SESSION['user'];
    // if(!isset($email)){
    //     header('location:login.php');
    //  } -->

    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "book_store";
    $conn = mysqli_connect($host,$user,$pwd,$db);
    if($conn){
        if(isset($_POST['add_to_cart'])){

            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_image = $_POST['product_image'];
            $product_quantity = $_POST['product_quantity'];
            $book_id = $_POST['book_id'];
         
            $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
            $q="SELECT quantity from chetan_bhagat  where book_id='$book_id'";
            $res=mysqli_query($conn,$q);
            $quon=mysqli_fetch_assoc($res);
            $remaining=$quon['quantity']-$product_quantity;
            $qry = mysqli_query($conn,"UPDATE chetan_bhagat SET quantity = $remaining WHERE book_id = '$book_id'");

            if(mysqli_num_rows($check_cart_numbers) > 0){
               $message[] = 'already added to cart!';
            }else{
               mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image,book_id) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image','$book_id')") or die('query failed');
               $message[] = 'product added to cart!';
            }
         
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <link rel="stylesheet" href="bookstore_style.css">
   <style>
    .author .auth_img{
        display : flex;
        margin-left: 280px;
        margin-right: 200px;
        margin-top: 50px;
    }
    .author .auth_img .auth_detail{
        padding: 5rem;
        margin-left: 60px;
    }
    .author .auth_img img{
        width: 500px;
        height: 300px;
    }
   </style>
</head>
<body>
    <div class="main">
       <?php include 'header1.php'; ?>
       <div class="author">
           
            <div class="auth1">
                <div class="auth">
                    <?php  
                $select_products = mysqli_query($conn, "SELECT * FROM `chetan_bhagat` LIMIT 6") or die('query failed');
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
            <div class="auth1">
                <div class="auth">
                    <?php  
                $select_products = mysqli_query($conn, "SELECT * FROM `collen_hover` LIMIT 6") or die('query failed');
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
        </div>
        <?php include 'footer1.php'?>
    </div>
<script>
  let a =  document.getElementsByClassName('more');
  let b =  document.getElementsByClassName('book1');
const more = ()=>{
    b.classlist.toggle('active');
}
    

 </script>
</body>
</html>