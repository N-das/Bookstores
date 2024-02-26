
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
         
            if(mysqli_num_rows($check_cart_numbers) > 0){
               $message[] = 'already added to cart!';
            }else{
                mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image,book_id) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image','$book_id')") or die('query failed');
                $message[] = 'product added to cart!';
            }
         
         }
         if(isset($_POST['update_cart'])){
            $bookid = $_POST['bookid'];
            $quantity = $_POST['qty'];
            mysqli_query($conn, "UPDATE cart SET quantity = '$quantity' WHERE book_id = '$bookid'") or die('query failed');
            $message[] = 'cart quantity updated';
         }
         if(isset($_POST['delete'])){
            $bookid = $_POST['bookid'];
            mysqli_query($conn, "DELETE from cart  WHERE book_id = '$bookid'") or die('query failed');
            
         }
         if(isset($_POST['delete_all'])){
            mysqli_query($conn,"DELETE from cart WHERE user_id = '$user_id'") or die('query failed');
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
 body{
    margin: 0;
    padding: 0;
    font-family: 'Rubik', sans-serif;
}
.header{
    display: flex;
    justify-content: space-between;
    background-color: rgb(236, 135, 176);
    width: 100%;
    position: fixed;
    /* bottom: 0; */
    top: 0;
    /* overflow: hidden; */
}
/* @media (max-width:750){
    .header{
        width: 100%;
    }
} */
.navbar ul {
    display: flex;
    /* text-decoration: none; */
    list-style: none;
    cursor: pointer;
    margin-top: 20px;
    justify-content: space-around;
   /* justify-content: space-around; */
}
.navbar ul i{
    margin-top: 10px;
    margin-left: 15px;
}
.navbar ul a:hover{
    text-decoration: underline;
}
.navbar ul a{
    justify-content: space-around;
    padding: 20px;
    text-decoration: none;
    color: black;
    font-size: 20px;
}
h2{
    margin-left: 86px;
}
#btn{
    border: none;
    /* background-color: rgb(226, 219, 209); */
    /* padding: 10px; */
    border-radius: 15px;
    margin-top: 22px;
    margin-right: 60px;
    cursor: pointer;
    justify-content: space-between;
}
#btn i{
    margin-right: 15px;
}
.search{
    margin-top: 42px;
    /* position: absolute; */
    /* background-color: bisque; */
    /* border: 1px solid black; */
    /* max-width: 100%; */
    width: 100%;
    overflow: hidden;
    /* top: 20; */
    background-image: url(heading-bg.webp);
    background-repeat: no-repeat;
    height: 40px;
    /* width: 900px;  */
    background-size: cover;
    padding-bottom: 300px;
    background-position: center center;
   text-align: center;
   
} 
.icons{
    display: flex;
    /* margin-left: 60px; */
    justify-content: space-between;
    /* background-color: plum; */
    width: 100%;
     position: relative;
     /* top: 100px; */
    top: 80px; 
    height: 70px;
    /* justify-content: center; */
    /* justify-content: space-between; */
}
.icon {
    margin-top: -1px;
    margin-left: 70px;
    /* color: aliceblue; */
    /* width: 100%; */
    /* height: 100px; */
    /* position: fixed; */
}
.icon  :hover{
    color: burlywood;
}
.icon i{
    /* margin-top: 20px; */
    margin-left: 10px;
    
}
/* img{
   width: 100%;
   height: 300px;
   background-size: cover;
} */
#search{
    margin-top: 80px;
    padding: 12px 80px;
    border-radius: 14px;
    border: none;
    text-align: center;
}
button{
    padding: 12px 20px;
    border-radius: 14px;
    border: none;
    background-color: rgb(236, 135, 176);
    float: right;
    margin-right: 200px;
    color: aliceblue;
    font-size: 1.2rem;
}
button :hover{
    background-color: aliceblue;
}
.search .topsearch{
    display: flex;
    justify-content: center;
    /* background-color: blanchedalmond; */
    /* display: flex; */
    /* margin-left: 150px; */
}
.search .topsearch h3,p{
    font-size: 2.5rem;
}
.quick{
    background-color: burlywood;
    /* opacity: 0.9; */
    height: 180px;
    width: 440px;
    border-radius: 13px;
    margin: auto;
    display: inline;
    /* border: 1px solid black; */
    /* justify-content: space-around; */

}
.topsearch h4{
    margin-left: 9px;
}
a{
    /* color: aliceblue; */
    color: black;
}
.icons .userde{
    display: flex;
}
#logout{
    background-color: burlywood;
    border: none;
    border-radius: 13px;
    margin-top: 13px;
    width: 70px;
    height: 40px;
    margin-right: -70px;
    cursor: pointer;
}
#logout :hover{
    color: aliceblue;
}
#signup1{
    margin-top: 13px;
    color: black;  
}
p{
    color: red;
}
.footer{
    background-color:  rgb(236, 135, 176);
}

.container {
    max-width: 1200px;
    margin:0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, 20rem);
    align-items: flex-start;
    gap:1.5rem;
    justify-content: center;
    margin-top: 50px;
}
.container .product_details{
    margin-top: 50px;
}
.container .product_details .name{
    font-size: 3rem;
}
.container .product_details .price{
    font-size: 2.4rem;
    color: red;
}
.container .product_details #qty{
    border-radius: 10px;
    width: 100px;
    height: 35px;
    font-size: 2rem;
}
.container .product_details .update{
    border: none;
    border-radius: 10px;
    background-color:  rgb(236, 135, 176);
    width: 70px;
    height: 33px;
    color: white;
    font-size: 1rem;
}
.container .product_details .update:hover{
    background-color: aliceblue;
    color: rgb(236, 135, 176);
}
.cart-total p{
    text-align: center;
}
.flex{
    display: flex;
    justify-content: center;
    /* margin-left: 50px; */

    
}
.flex a{
    margin-left: 40px;

}
.flex a button:hover{
    background-color: aliceblue;
    color: rgb(218, 47, 115);
}
.sub-total{
    margin-top: 80px;
    margin-left: -19px;
}
#delete_all{
    border: none;
    border-radius: 10px;
    background-color:  rgb(236, 135, 176);
    width: 100px;
    height: 45px;
    color: white;
    font-size: 1.2rem;
}
.del{
    margin: auto;
}
#delete_all:hover{
    background-color: aliceblue;
    color: rgb(239, 30, 114);
}
@media(max-width:920px){
    .icons{
        margin-top: 20px;
    }
    .icon{
        margin-top: 10px;
        display: block;
    }
}
@media (max-width:560px){
    .icons,.icon{
        display: none;
    }
    /* .icon{
        display: none;
    } */
    .search{
        width: 120%;
        margin-top: 60px;
        margin-left: 20px;
        font-size: 5px;;
    }
    .header{
        justify-content: space-around;
    }
  
    .search input{
        width: 250px;
        text-align: left;
    }
    .suggest p{
        /* float: left; */
        margin-left: -40px;
    }
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
                  <h2><i>  bookstore.com</i></h2>
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
                    <!-- <div id="user-btn" class="fa-solid fa-user fa-lg"></div> -->
                    <?php
                 $user_id = $_SESSION["user"];
                   $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                   $cart_rows_number = mysqli_num_rows($select_cart_number); 
                ?>
                <a href="kart.php"> <i class="fa-solid fa-cart-shopping fa-lg"></i></a> <span id="no">(<?php echo $cart_rows_number; ?>)</span> 
                </div>
               
            </div>
            
            <!-- <br> -->
            <div class="content">
                <div class="icons">
                    <!-- <h3></h3> -->
                   <div class="icon">
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
                <div class="search" >
                  
                   
                   
                    <br><br><br>
                    <div class="quick">
                        <div class="topsearch">
                    <!-- <h3>top search : </h3> -->
                            <h3>shopping cart</h3>
                            <p> <a href="home.php">home</a> / cart </p>
                        </div>
                   
                    </div>
                    
                </div>
       </div>

       <div class="cartinfo">
            <?php  
            $user_id = $_SESSION["user"];
            $grand_total = 0;
                $select_products = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select_products) > 0){
                    while($fetch_products = mysqli_fetch_assoc($select_products)){
            ?>
            <div class="container">
                <img src=".\images\<?php echo $fetch_products['image']; ?>" alt="">
                <div class="product_details">
                   <form action="" method="post">
                    <div class="name"><?php echo $fetch_products['name']; ?></div>
                        <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                        <input type="hidden" name="bookid" value="<?php echo $fetch_products['book_id'];?>">
                        <input type="number" name="qty" id="qty"  value="<?php echo $fetch_products['quantity']; ?>">
                        <input type="submit" class="update" value="update" name="update_cart">
                        <input type="submit" class="update" value="delete" name="delete">
                   </form>

                </div>
            </div>
            <div class="sub-total"> <h2>sub total : <span>$<?php echo $sub_total = ($fetch_products['quantity'] * $fetch_products['price']); ?>/-</span> </h2></div>
            <form action="" method="post" class="del"><center><input type="submit" value="delete all" name="delete_all" id="delete_all">    </center></form>
            
            <?php
            $grand_total += $sub_total;
                }
            }else{
                echo ' <center><img src=".\images\empty-cart.jpg" alt=""></center>';
            }
            ?>
       </div>
       <div class="cart-total">
            <p>grand total : <span>$<?php echo $grand_total; ?>/-</span></p>
            <div class="flex">
                <a href="homie.php" class="option-btn"><h2>continue shopping</h2></a>
                <a href="payment.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>"><button>proceed to pay</button></a>
            </div>
       </div>
       <div class="author">
     
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
</body>
</html>