<?php
session_start();  
$user_id = $_SESSION['user'];
    if(!isset($user_id)){
        header('location:Admin_signin.php');
    }
    $host = "localhost";
    $user = "root";
    $pwd = "";
    $db = "book_store";
    $conn = mysqli_connect($host,$user,$pwd,$db);
    if($conn){
        if(isset($_POST['add1'])){
            $book_id1 = $_POST['book_id1'];
            $update_quantity1 = $_POST['update1'];
            $q = mysqli_query($conn,"UPDATE products set quantity = '$update_quantity1' where book_id = '$book_id1'"); 
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
        integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
   <link rel="stylesheet" href="admincss.css">
        
    
</head>

<body>
    <div class="main">
        <?php include 'admin_header.php'?>
        <br><br><br><br><br>
        <h1 style="font-style: italic;">Admin Page</h1>
        <div class="table">
            <table  border="1px">
                <tr>
                    <th>Book_Id</th>
                    <th>Book_Name</th>
                    <th>Book_Price</th>
                    <th>Quantity</th>
                    <th>Alert</th>
                    <th><input type="button" id="btnAdd" value="Add"></th>
                </tr>
                <tr >
                    <td colspan="4"><h3>suggested book</h3></td>
                </tr>
                <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `suggest` LIMIT 6") or die('query failed');
                    if(mysqli_num_rows($select_products) > 0){
                        while($fetch_products = mysqli_fetch_assoc($select_products)){
                    ?>
                <tr>
                    <form action="" method="post">
                        <td><?php echo $fetch_products['book_id'];?></td>
                        <td><?php echo $fetch_products['name'];?></td>
                        <td><?php echo $fetch_products['price'];?></td>
                        <td><input type="number" name="update1" id="" value="<?php echo $fetch_products['quantity'];?>"></td>
                        <input type="hidden" name="book_id1" value="<?php echo $fetch_products['book_id'];?>">
                        <td type="submit" name="add1"><button>Add</button></td>
                    </form>
                    
                </tr>
                <?php
                        }
                    }else{
                        echo '<p class="empty">no products added yet!</p>';
                    }
                    ?>
                    <tr >
                        <td colspan="4"><h3>Chetan bhagat</h3></td>
                    </tr>
                    <?php
                        $select_products = mysqli_query($conn, "SELECT * FROM `chetan_bhagat` LIMIT 6") or die('query failed');
                        if(mysqli_num_rows($select_products) > 0){
                            while($fetch_products = mysqli_fetch_assoc($select_products)){
                        ?>
                    <tr>
                        <td><?php echo $fetch_products['book_id'];?></td>
                        <td><?php echo $fetch_products['name'];?></td>
                        <td><?php echo $fetch_products['price'];?></td>
                        <td><?php echo $fetch_products['quantity'];?></td>
                        <td type="submit"><button>Add</button></td>
                        
                    </tr>
                    <?php
                            }
                        }else{
                            echo '<p class="empty">no products added yet!</p>';
                        }
                        ?>
                        <tr >
                            <td colspan="4"><h3>Collenhover</h3></td>
                        </tr>
                        <?php
                            $select_products = mysqli_query($conn, "SELECT * FROM `collen_hover` LIMIT 6") or die('query failed');
                            if(mysqli_num_rows($select_products) > 0){
                                while($fetch_products = mysqli_fetch_assoc($select_products)){
                            ?>
                        <tr>
                            <td><?php echo $fetch_products['book_id'];?></td>
                            <td><?php echo $fetch_products['name'];?></td>
                            <td><?php echo $fetch_products['price'];?></td>
                            <td><?php echo $fetch_products['quantity'];?></td>
                            <td type="submit"><button>Add</button></td>
                            
                        </tr>
                        <?php
                                }
                            }else{
                                echo '<p class="empty">no products added yet!</p>';
                            }
                            ?>
                         <tr >
                    <td colspan="4"><h3>Rk narayan</h3></td>
                </tr>
                <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `rk_narayan` LIMIT 6") or die('query failed');
                    if(mysqli_num_rows($select_products) > 0){
                        while($fetch_products = mysqli_fetch_assoc($select_products)){
                    ?>
                <tr>
                    <td><?php echo $fetch_products['book_id'];?></td>
                    <td><?php echo $fetch_products['name'];?></td>
                    <td><?php echo $fetch_products['price'];?></td>
                    <td><?php echo $fetch_products['quantity'];?></td>
                    <td type="submit"><button>Add</button></td>
                    
                </tr>
                <?php
                        }
                    }else{
                        echo '<p class="empty">no products added yet!</p>';
                    }
                    ?>
                 <tr >
                    <td colspan="4"><h3>John boyne</h3></td>
                </tr>
                <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `john_boyne` LIMIT 6") or die('query failed');
                    if(mysqli_num_rows($select_products) > 0){
                        while($fetch_products = mysqli_fetch_assoc($select_products)){
                    ?>
                <tr>
                    <td><?php echo $fetch_products['book_id'];?></td>
                    <td><?php echo $fetch_products['name'];?></td>
                    <td><?php echo $fetch_products['price'];?></td>
                    <td><?php echo $fetch_products['quantity'];?></td>
                    <td type="submit"><button>Add</button></td>
                </tr>
                <?php
                        }
                    }else{
                        echo '<p class="empty">no products added yet!</p>';
                    }
                    ?>
                    <tr >
                        <td colspan="4"><h3>Vikram sampath</h3></td>
                    </tr>
                    <?php
                        $select_products = mysqli_query($conn, "SELECT * FROM `vikram_sampath` LIMIT 6") or die('query failed');
                        if(mysqli_num_rows($select_products) > 0){
                            while($fetch_products = mysqli_fetch_assoc($select_products)){
                        ?>
                    <tr>
                        <td><?php echo $fetch_products['book_id'];?></td>
                        <td><?php echo $fetch_products['name'];?></td>
                        <td><?php echo $fetch_products['price'];?></td>
                        <td><?php echo $fetch_products['quantity'];?></td>
                        <td type="submit"><button>Add</button></td>
                    </tr>
                    <?php
                            }
                        }else{
                            echo '<p class="empty">no products added yet!</p>';
                        }
                        ?>
                        <tr >
                            <td colspan="4"><h3>Jk rowling</h3></td>
                        </tr>
                        <?php
                            $select_products = mysqli_query($conn, "SELECT * FROM `jk_rowling` LIMIT 6") or die('query failed');
                            if(mysqli_num_rows($select_products) > 0){
                                while($fetch_products = mysqli_fetch_assoc($select_products)){
                            ?>
                        <tr>
                            <td><?php echo $fetch_products['book_id'];?></td>
                            <td><?php echo $fetch_products['name'];?></td>
                            <td><?php echo $fetch_products['price'];?></td>
                            <td><?php echo $fetch_products['quantity'];?></td>
                            <td type="submit"><button>Add</button></td>
                        </tr>
                        <?php
                                }
                            }else{
                                echo '<p class="empty">no products added yet!</p>';
                            }
                            ?>
            </table>
        </div>


    </div>


    <script>
        let a = document.getElementsByClassName('more');
        let b = document.getElementsByClassName('book1');
        const more = () => {
            b.classlist.toggle('active');
        }

    </script>

</body>

</html>