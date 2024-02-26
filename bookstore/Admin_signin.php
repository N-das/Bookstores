<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_signin.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <title>Admin sign_in</title>
</head>
<body>
    <div class="container">
        <div class="formbox">
            <h1 id="title">Admin sign-in</h1>
            <form action="" method="post">
                <div class="inputgroup">
                    <div class="inputfield">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" placeholder="Enter user-id" name="user">
                    </div>

                    <div class="inputfield">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="password" name="pwd">
                    </div>

                </div>

                <div class="btnfield">
                    <button type="submit" name="sub" id="btnsignin">Sign in</button>
                </div>
            </form>
            <?php
                $host = "localhost";
                $user = "root";
                $pwd = "";
                $db = "book_store";
                $conn = mysqli_connect($host,$user,$pwd,$db);
                if($conn){
                    if(isset($_POST['sub'])){
                        $user = $_POST['user'];
                        $pwds = $_POST['pwd'];
                        $q  = mysqli_query($conn,"select * from admin_login");
                        if(mysqli_num_rows($q)>0){
                            $row = mysqli_fetch_assoc($q);
                            if($row){
                                $_SESSION['user'] = $user;
                                header("location:admin.php");
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>