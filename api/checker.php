<?php 
	require 'connection.php';
	if(isset($_SESSION['role'])){
		if($_SESSION['role'] == 'admin'){
			require 'admin.php';
		}
		else if($_SESSION['role'] == 'user'){
			require 'pengguna.php';
		}
	}
	else{
?>
<li class="form-group">
     <input type="text" class="form-control" placeholder="cari produk" style="width: 500px;">
</li>
</ul>
<ul class="nav navbar-nav navbar-right">
<?php }?>
<?php
	if(!isset($_SESSION['email'])){?>
		<li class="dropdown" id="login"> <a class="dropdown-toggle" id="navLogin" href="#" data-html="true" 
		data-toggle="popover"
	    data-placement="bottom"
	    data-content='<form action="api/login.php" method="post"><label for="email">Email:</label>
	            <input name="email" id="email" type="email" placeholder="Email" required/>
	    		<label for="pwd">Password:</label>
	            <input name="password" id="pwdLogin" type="password" placeholder="Password" required/>
	            <br>
	            <input type="hidden" name="login" />
	            <input class="btn btn-default navbar-btn" id="btnLogin" type="submit" value="Login" onclick="navbarLoginButtonHandler"></form>'>Login</a>
		</li>
	    <li><a href="register.php" id="register"><span class="glyphicon glyphicon-user"></span>  Daftar</a></li>
	<?php } else{?>
		<li><a href="api/logout.php" id="logout">Logout</a></li>
	<?php }?>

	