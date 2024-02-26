<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login.css">
    <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
    <title>Login Page</title>
    <style>
        .admin{
            margin-top: -45px;
        }
        .show{
            margin-top: 20px;
            /* margin-left: 5px; */
            font-size: 1rem;
            display:flex;
            float: left;
            
            /* display: inline; */
            /* justify-content: flex-start; */
        }
        #show{
            /* padding: 5px; */
            height: 15px;
            width: 15px;
            /* padding-left: 7px; */
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="formbox">
            <h1 id="title">sign up</h1>
            <form action="" method="post">
                <div class="inputgroup">
                    <div class="inputfield" id="namefield">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Name" name="name" >
                    </div>

                    <div class="inputfield">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email " placeholder="email" name="email" required>
                    </div>

                    <div class="inputfield">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" placeholder="password" name="pwd" id="pass"required>
                    </div>

                    <p>Change password <a href="#">Click here!</a></p>
                    <div class="show">
                        <input type="checkbox" name="" id="show">show password
                    </div>
                </div>
               
              

                <div class="btnfield">
                    <button type="submit" id="btnsignup" name="sign-up">Sign up</button>
                    <button type="submit" class="disable" name="sign-in" id="btnsignin">Sign in</button>
                </div>
                <div class="admin">
                    <h3>admin login <a href="Admin_signin.php">click here!</a></h3>
                </div>

                <?php
                    $host = "localhost";
                    $user = "root";
                    $pwd = "";
                    $db = "book_store";
                    $conn = mysqli_connect($host,$user,$pwd,$db);
                    if($conn){
                        // echo "data base connected";
                        // if(isset($_POST['sub'])){
                        if(isset($_POST['sign-up'])){
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $pwds = $_POST['pwd'];
                            $q = "insert into sign_up values('$name','$email',$pwds)";
                            $qw = "select  * from sign_up where email='$email'";
                            $we = mysqli_query($conn,$qw);
                            if(mysqli_num_rows($we)>0){
                                echo "user already exist";
                            }
                            else{
                                $query = mysqli_query($conn,$q);          
                            if($query){
                                echo "record saved"; 
                            }
                            else{
                                echo "record not saved"; 
                            } 
                            }
                           

                        }
                        elseif(isset($_POST['sign-in'])){
                            $emails = $_POST['email'];
                            $pwds = $_POST['pwd'];
                            $sel = "select * from sign_up where email='$emails' and password='$pwds'";
                            $res = mysqli_query($conn,$sel);
                            // $count = mysqli_num_rows($res);  
                            if(mysqli_num_rows($res)>0){
                                $row = mysqli_fetch_assoc($res);
                                if($row){  
                                        echo "<h3><center> Login successful </center></h3>";
                                        $_SESSION["user"]=$emails;
                                        $_SESSION["pwd"]=$pwds;
                                        $_SESSION["name"]=$row['name'];

                                        header("location:homie.php"); 
                                    
                                        // exit;
                                    }  
                                    else{  
                                        echo "<h3> Login failed. Invalid username or password.</h3>";  
                                    } 
                            }  

                        // if
                         }
                        else{

                        }
                     }

                  ?>
            </form>
            
        </div>
    </div>

    <script>
        let btnsignup = document.getElementById("btnsignup");
        let btnsignin = document.getElementById("btnsignin");
        let namefield = document.getElementById("namefield");
        let title = document.getElementById("title");

        btnsignin.onclick = function(){
            namefield.style.maxHeight = "0";
            title.innerHTML = "sign in";
            btnsignup.classList.add("disable");
            btnsignin.classList.remove("disable");
        }

        btnsignup.onclick = function(){
            namefield.style.maxHeight = "60px";
            title.innerHTML = "sign up";
            btnsignup.classList.remove("disable");
            btnsignin.classList.add("disable");
        }
        document.getElementById("show").onclick = () => {
            let show = document.getElementById("pass");
            if(show.type==="password"){
                show.type = "text";
            }else{
                show.type = "password";
            }
        }
    </script>
</body>
</html>
