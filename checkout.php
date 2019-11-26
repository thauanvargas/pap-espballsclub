 <?php 
session_start();
include('bd.php');
$shipping_cost = 4.99;
?>
<!DOCTYPE html>
<html>

  <head>
	<link rel="icon" href="img/logos/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Espanca site</title>
	<!-- Fontes, bootstrap e outros -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet">

	<!-- CSS Modal Box (Login/Registar/Minha Conta) -->
	<style>
	*{margin:0px; padding:0px; font-family:Helvetica, Arial, sans-serif;}
	
	.loja-img-container {
		overflow: hidden; /* added */
	}

	.loja-img-container:hover img {
	  	opacity:0.8;
	}

	.loja-img-container:hover a {
		opacity: 1; /* added */
		top: 0; /* added */
		z-index: 500;
		color:#4CAF50;
	}

	.loja-img-container:hover a span {
		top: 50%;
		position: absolute;
		left: 0;
		right: 0;
		transform: translateY(-50%);
	}

	.loja-img-container a {
		display: block;
		position: absolute;
		opacity: 0;
		left: 0;
		bottom: 0;
		right: 0;
		text-align: center;
		color: inherit;
	}

	
	#cube {
		padding: 12px 20px;
	}
	
	.container:hover #cube { 
	background-color:#4CAF50; 
	border-radius:100px;
	}
	
	input[type=text], input[type=password] {
		width: 90%;
		padding: 12px 20px;
		margin: 8px 26px;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		font-size:16px;
	}
	
	/* Set a style for all buttons */
	.logout-button {
		background-color: #d64848;
		color: white;
		padding: 14px 20px;
		margin: 8px 26px;
		border: none;
		cursor: pointer;
		width: 90%;
		font-size:20px;
	}
	.login-button {
		background-color: #4CAF50;
		color: white;
		padding: 14px 20px;
		margin: 8px 26px;
		border: none;
		cursor: pointer;
		width: 90%;
		font-size:20px;
	}
	button:hover {
		opacity: 0.8;
	}

	/* Center the image and position the close button */
	.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
		position: relative;
	}
	.avatar {
		width: 100px;
		height:100px;
		border-radius: 50%;
	}

	/* The Modal (background) */
	.modal {
		background-color: rgba(0,0,0,0.4);
	}
	.modal-clog{
		background-color: #fefefe;
		margin: 4% auto 15% auto;
		border: 1px solid #888;
		width: 40%; 
		padding-bottom: 30px;
	}
	

	/* The Close Button (x) */
	.close {
		position: absolute;
		right: 25px;
		top: 0;
		color: #000;
		font-size: 35px;
		font-weight: bold;
	}
	.close:hover,.close:focus {
		color: red;
		cursor: pointer;
	}

	/* Add Zoom Animation */
	.animate {
		animation: zoom 0.6s
	}
	@keyframes zoom {
		from {transform: scale(0)} 
		to {transform: scale(1)}
	}
	
	
	#cart_button
{
	margin-top:50px;
	cursor:pointer;
}
#cart_button img
{
	width:45px;
	height:45px;
}
#cart_button input[type="button"]
{
	background:none;
	border:none;
	background-color:red;
	border-radius:100%;
	height:30px;
	width:30px;
	margin-top:0px;
	color:white;
	font-size:17px;
	cursor:pointer;
}
#mycart
{
	display:none;
	background-color:white;
	width:800px;
	margin-left:100px;
}
#mycart .cart_items
{
	border-bottom:1px dashed silver;
	padding:20px;
	padding-left:10px;
}
#mycart .cart_items img
{
	width:70px;
	height:50px;
	float:left;
}
#mycart .cart_items p
{
	margin:0px;
	font-size:17px;
	color:green;
}
h1
{
	margin-top:100px;
	color:green;
	text-align:center;
}
#item_div
{
	float:left;
	margin-left:60px;
}
.items
{
	padding:20px;
	background-color:white;
	width:250px;
	height:350px;
	margin-top:20px;
	box-shadow:0px 0px 10px 0px #A4A4A4;
	box-sizing:border-box;
	float:left;
	margin:20px;
	position:relative;
}
.items:hover input[type="button"]
{
	display:block;
}
.items input[type="button"]
{
	display:none;
	background:none;
	background-color:#3ADF00;
	width:200px;
	height:50px;
	border:none;
	font-size:20px;
	color:white;
	position:absolute;
	top:150px;
	left:25px;
	cursor:pointer;
}
.items img
{
	width:200px;
	height:200px;
}
.items p
{
	color: green;
}
	
	</style>
	
  </head>

  <body id="pagina1">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNava">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">EspancaBalls club</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#Servicos">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#compras">Compras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#Sobre">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#equipa">Equipa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contactos">Contactos</a>
            </li>
			<?php
			if((!isset($_SESSION['email'])) && (!isset($_SESSION['password']))){
			echo'<li class="nav-item">
			
              <a class="nav-link js-scroll-trigger" onclick="document.getElementById(\'modal-wrapper\').style.display=\'block\'">Login</a>
            </li>';
			}
			else{
			echo'<li class="nav-item">
              <a class="nav-link js-scroll-trigger" onclick="document.getElementById(\'modal-account\').style.display=\'block\'">Minha Conta</a>
            </li>';
			}
			?>
            <li class="nav-item">
				  <a id="cart_button" href="view_cart.php" class="compras-link">       
				  <img src="img/compras/cart.png">     
			<span class="cart-item" id="cart-container">
			<?php 
			if(isset($_SESSION["products"])){
				echo count($_SESSION["products"]); 
			} else {
				echo 0; 
			}
			?></span>
		</a>
				
            </li>
          </ul>
        </div>
      </div>
	  		  <div id="mycart">
		  </div>
    </nav>
<!-- Serviços -->
    <section id="MyCart">
<div class="container">	
<h3 style="text-align:left">Verificar o carrinho</h3>
<?php
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	$total = 0;
	$list_tax = '';
	?>	
	<table class="table" id="shopping-cart-results">
	<thead>
	<tr>
	<th>Produto</th>
	<th>Preço</th>
	<th>Quantidade</th>
	<th>Subtotal</th>
	<th>&nbsp;</th>				
	</tr>
	</thead>
	<tbody>				
	<?php			
	$cart_box = '';
	foreach($_SESSION["products"] as $product){
		$product_name = $product["product_name"];
		$product_qty = $product["product_qty"];
		$product_price = $product["product_price"];
		$product_code = $product["product_code"];	
		$item_price = sprintf("%01.2f",($product_price * $product_qty)); 		
		?>
		<tr>
		<td><?php echo $product_name;?></td>
		<td><?php echo $product_price; ?></td>
		<td><?php echo $product_qty; ?></td>
		<td><?php echo sprintf("%01.2f", ($product_price * $product_qty)); ?> €</td>
		<td>&nbsp;</td>
		</tr>				
		<?php		
		$subtotal = ($product_price * $product_qty);
		$total = ($total + $subtotal);
	}	
	$grand_total = $total + $shipping_cost;
	$shipping_cost = ($shipping_cost)?'Custo de envio : '. sprintf("%01.2f", $shipping_cost).' €<br />':'';	
	$cart_box .= "<span>$shipping_cost  $list_tax <hr>Total a Pagar : ".sprintf("%01.2f", $grand_total)." €</span>";	
	$_SESSION['custo_total'] = sprintf("%01.2f", $grand_total);
	?>
	<tfoot>
	<tr>
	<td><br><br><br><br><br><br><a href="view_cart.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Alterar Carrinho</a></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td class="text-center view-cart-total"><strong><?php echo $cart_box; ?></strong></td>	
	<td><br><br><br><br><br><br><a href="success.php" class="btn btn-success btn-block">Comprar <i class="glyphicon glyphicon-menu-right"></i></a></td>
	</tr>
	</tfoot>	
	<?php	
} else {
	echo "Your Cart is empty";
}
?>
</tbody>
</table>
</div>
    </section>
	<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/cart.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
	<script>
var check = function() {
  if (document.getElementById('password').value == document.getElementById('confirmar_password').value) {
    document.getElementById('confirmar').style.color = 'green';
    document.getElementById('confirmar').innerHTML = 'Passwords: ✔';
  } else {
    document.getElementById('confirmar').style.color = 'red';
    document.getElementById('confirmar').innerHTML = 'Passwords: ✖';
  }
}
	
	var login = document.getElementById('modal-wrapper');
	var account = document.getElementById('modal-account');
	var register = document.getElementById('modal-register');
	window.onclick = function(event) {
		if (event.target == register) {
			register.style.display = "none";
		}
		if (event.target == login) {
			login.style.display = "none";
		}
		if (event.target == account) {
			account.style.display = "none";
		}
	}
	</script>
	

</body>
</html>