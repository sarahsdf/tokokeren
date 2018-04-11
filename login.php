<?php
    require 'header.php';
    session_start();
    if(isset($_SESSION['email'])){
        header("Location: index.php");
    }
?>
<div class="container loginForm">
    <div class="row">
        <div class="col-xs-12">
            <p class="navbar-text h2 fontTitle"> <span class="toko">TOKO</span><span class="keren">KEREN</span><h2 class="h2 text-primary text-uppercase" id="formTitle">LOGIN</h2> </p><br>
            <p class="text-danger bg-warning">
            <?php
            if(isset($_SESSION['error_msg'])){
                echo $_SESSION['error_msg'];
                unset($_SESSION['error_msg']);
            }
            ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <form action="api/login.php" method="post" >
                <div class="form-group">
                   <label for="email">Email:</label>
                   <input class="form-control" name="email" id="email" type="email" placeholder="Email" required/>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input class="form-control" name="password" id="pwdLogin" type="password" placeholder="Password" required/>
                </div>
                <input type="hidden" name="login" />
                <input class="btn btn-default navbar-btn" id="btnLogin" type="submit" value="Login" onclick="navbarLoginButtonHandler">
            </form>


        </div>
    </div>
</div>
