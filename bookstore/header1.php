<?php
    session_start();  
   
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
        <!-- <div id="user-btn" class="fa-solid fa-user fa-lg"></div> -->
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