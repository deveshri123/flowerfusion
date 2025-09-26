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

<header class="header">
    <div class="flex">
        <a href="home.php" class="logo">FlowerFusion</a>

        <nav class="navbar">
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="about.php">about</a></li>
                <li><a href="contact.php">contact</a></li>
                <li><a href="shop.php">shop</a></li>
                <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') { ?>
                    <li><a href="orders.php">orders</a></li>
                <?php } ?>
            </ul>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') { 
                $select_wishlist_count = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id = '".$_SESSION['user_id']."'") or die('query failed');
                $wishlist_num_rows = mysqli_num_rows($select_wishlist_count);
            ?>
                <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?php echo $wishlist_num_rows; ?>)</span></a>
                <?php
                    $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '".$_SESSION['user_id']."'") or die('query failed');
                    $cart_num_rows = mysqli_num_rows($select_cart_count);
                ?>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?php echo $cart_num_rows; ?>)</span></a>
            <?php } ?>
        </div>

        <div class="account-box">
            <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') { ?>
                <p>username : <span><?php echo htmlspecialchars($_SESSION['user_name']); ?></span></p>
                <p>email : <span><?php echo htmlspecialchars($_SESSION['user_email']); ?></span></p>
                <a href="logout.php" class="delete-btn">logout</a>
            <?php } else { ?>
                <a href="login.php" class="option-btn">login</a>
                <a href="register.php" class="option-btn">register</a>
            <?php } ?>
        </div>
    </div>
</header>