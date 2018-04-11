<?php
require 'header.php';
require 'menu.php';
?>
	<h3 class="text-success text-center">
	<?php
	if(isset($_SESSION['success'])){
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['successKategori'])){
        echo $_SESSION['successKategori'];
        unset($_SESSION['successKategori']);
    }
    ?>
	</h3>
	<h3 class="text-danger text-center bg-warning">
        <?php 
            if(isset($_SESSION['errormsgKategori'])){
                echo $_SESSION['errormsgKategori'];
                unset($_SESSION['errormsgKategori']);
            }
        ?>
    </h3>
	<h3 class="text-danger text-center bg-warning">
    <?php 
		if(isset($_SESSION['errormsgSK'])){
		        echo $_SESSION['errormsgSK'];
		        unset($_SESSION['errormsgSK']);
		    }
	?>
	</h3>

<?php
	require 'slider.php';
?>

<hr>
        
<?php
	require 'list_product.php';
	require 'list_brand.php';
	require 'footer.php';
?>