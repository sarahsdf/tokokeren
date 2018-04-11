<?php
    require 'header.php';
?>

   <body class="registerBody">
        <?php
            require 'menu.php';
        ?>
        <div class="container registerContainer">
            <div class="row">
                <div class="col-xs-12">
                    <p class="h3 register-title" >Buat Akun Baru</p>
                    <p class="text-danger bg-warning">
                    <?php 
                        if(isset($_SESSION['errormsg'])){
                            echo $_SESSION['errormsg'];
                            unset($_SESSION['errormsg']);
                        }
                    ?>
                    </p>
                </div>
            </div>
            <div class="row registerForm">
                <div class="col-xs-12">
        			<form action="api/register.php" method="post" enctype="multipart/form-data" data-toggle="validator" id="registerForm">
                        <div class="form-group">
                            <label for="email" class="control-label">Email:</label>
                             <input type="email" class="form-control" id="insert-email" name="email" data-error="email is invalid" required>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword" class="control-label">Password:</label>
                            <div class="form-inline row">
                                <div class="form-group col-sm-6">
                                    <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
                                    <div class="help-block">Minimum of 6 characters</div>
                                </div>
                                <div class="form-group col-sm-6">
                                    <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="password not match" placeholder="Confirm" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
        				<div class="form-group">
        					<label for="name" class="control-label">Nama lengkap: </label>
        					<input type="text" class="form-control" id="insert-name" name="name" required>
        				    <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="control-label">Jenis Kelamin:</label>
                            <select class="form-control" name="gender" id="insert-gender" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telp" class="control-label"> Nomor telepon: </label>
                            <input class="form-control" pattern="^(\+62|0)?\d{7,20}$"  id="insert-telp" name="telp" placeholder = "+62 atau 0xx" required />

                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group"> <!-- Date input -->
                            <label class="control-label" for="date">Tanggal Lahir:</label>
                            <input class="form-control" id="insert-date" name="date" placeholder="MM/DD/YYY" type="text" required />
                            <div class="help-block with-errors"></div>
                        </div>

        				<div class="form-group">
        					<label for="address" class="control-label">Alamat:</label>
        					<input type="text" class="form-control" id="insert-address" name="address" required>
                            <div class="help-block with-errors"></div>
        				</div>
        				<input type="hidden" id="insert-command" name="insert-command" value="insert">
        				<button type="submit" class="btn btn-default">Daftar</button>
                    </form>
                </div>
            </div>
        </div>

<?php
    require 'footer.php';
?>