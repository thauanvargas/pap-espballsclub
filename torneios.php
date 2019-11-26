<!DOCTYPE html>
<?php
session_start();
include('bd.php');
?>
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
	
	input[type=text], input[type=password],[type=email], [type=tel] {
		width: 90%;
		padding: 12px 20px;
		margin: 8px 26px;
		display: inline-block;
		border: 1px solid #ccc;
		box-sizing: border-box;
		font-size:16px;
	}
	
	.minha-conta{
		width: 90%;
		padding: 12px 20px;
		margin: 8px 26px;
		display: inline-block;
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

    <!-- Barra de navegação -->
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
              <a class="nav-link js-scroll-trigger active" href="torneios.php">Torneios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#Servicos">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#compras">Compras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#Sobre">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#equipa">Equipa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#contactos">Contactos</a>
            </li>
			<?php
			if((!isset($_SESSION['email'])) && (!isset($_SESSION['password']))){
			echo'<li class="nav-item">
			
              <a style="cursor:pointer;" class="nav-link js-scroll-trigger" onclick="document.getElementById(\'modal-wrapper\').style.display=\'block\'">Login</a>
            </li>';
			}
			else{
			echo'<li class="nav-item">
              <a style="cursor:pointer;" class="nav-link js-scroll-trigger" onclick="document.getElementById(\'modal-account\').style.display=\'block\'">Minha Conta</a>
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
    <section id="Servicos">
  <div class="container">
    <h3>Torneios</h3>
    <p>Escolhe o teu torneio</p>
  </div>
  <div class="container" style="padding: 0 8px;">
	 <ul class="list-group">
	  <li class="list-group-item">
	  <img src="img/torneios/fptenis.jpg" style="float:left;width:30%;padding-right:10px;">
	  <a  href="https://fpt.tietennis.com/Tournaments/8b1ef834-9368-457d-a63b-557f644d6c4b/Overview" style="font-size: 14px; color: #3b5998; font-weight: 700;">XXVII Open Juvenil CSNA/Cidade do Porto</a>
	  <div style="font-size:13px;">Porto</div>
	  <div style="font-size:13px;">2018-06-26 até 2018-06-30</div>
	  <div style="font-size:13px;"><b>Desporto:</b> Tênis </div>
	  <div style="font-size:13px;"><b>Localização:</b> Club Sportivo Nun'Alvares </div>
	  <div style="font-size:13px;"><b>Promovido por:</b> Federação Portuguesa de Ténis</div>
	  <div style="font-size:13px;"><b>Nível:</b> A</div>
	  </li>
	  <li class="list-group-item">
	  <img src="img/torneios/1.jpg" style="float:left;width:30%;padding-right:10px;">
	   <a href="https://www.tietennis.com/Tournaments/ba0d2cdb-f3f5-46c2-89c6-3c13abe18717" style="font-size: 14px; color: #3b5998; font-weight: 700;">ATP - International Eastbourne	</a>
	  <div style="font-size:13px;">Porto</div>
	  <div style="font-size:13px;">2018-06-25 até 2018-06-30 </div>
	  <div style="font-size:13px;"><b>Desporto:</b> Tênis </div>
	  <div style="font-size:13px;"><b>Localização:</b> Clube Ténis Jamor</div>
	  <div style="font-size:13px;"><b>Promovido por:</b> ATP World Tour</div>
	  <div style="font-size:13px;"><b>Nível:</b> A</div>
	  </li>
	  <li class="list-group-item">
	  <img src="img/torneios/2.jpg" style="float:left;width:30%;padding-right:10px;">
	   <a href="https://www.tietennis.com/Tournaments/ba0d2cdb-f3f5-46c2-89c6-3c13abe18717" style="font-size: 14px; color: #3b5998; font-weight: 700;">ATP - Antalya Open</a>
	  <div style="font-size:13px;">Porto</div>
	  <div style="font-size:13px;">2018-06-26 até 2018-06-30</div>
	  <div style="font-size:13px;"><b>Desporto:</b> Tênis </div>
	  <div style="font-size:13px;"><b>Localização:</b> Club Sportivo Nun'Alvares </div>
	  <div style="font-size:13px;"><b>Promovido por:</b> Federação Portuguesa de Ténis</div>
	  <div style="font-size:13px;"><b>Nível:</b> A</div>
	  </li>
	  <li class="list-group-item">
	  <img src="img/torneios/3.jpg" style="float:left;width:30%;padding-right:10px;">
	   <a href="https://www.tietennis.com/Tournaments/ba0d2cdb-f3f5-46c2-89c6-3c13abe18717" style="font-size: 14px; color: #3b5998; font-weight: 700;">Smashtour - CT Aveiro </a>
	  <div style="font-size:13px;">Porto</div>
	  <div style="font-size:13px;">2018-06-26 até 2018-06-30</div>
	  <div style="font-size:13px;"><b>Desporto:</b> Tênis </div>
	  <div style="font-size:13px;"><b>Localização:</b> Club Sportivo Nun'Alvares </div>
	  <div style="font-size:13px;"><b>Promovido por:</b> Federação Portuguesa de Ténis</div>
	  <div style="font-size:13px;"><b>Nível:</b> A</div>
	  </li>
	  <li class="list-group-item">
	  <img src="img/torneios/4.jpg" style="float:left;width:30%;padding-right:10px;">
	  <a href="https://www.tietennis.com/Tournaments/ba0d2cdb-f3f5-46c2-89c6-3c13abe18717" style="font-size: 14px; color: #3b5998; font-weight: 700;">Torneio Cidade do Barreiro</a>
	  <div style="font-size:13px;">Porto</div>
	  <div style="font-size:13px;">2018-06-26 até 2018-06-30</div>
	  <div style="font-size:13px;"><b>Desporto:</b> Tênis </div>
	  <div style="font-size:13px;"><b>Localização:</b> Club Sportivo Nun'Alvares </div>
	  <div style="font-size:13px;"><b>Promovido por:</b> Federação Portuguesa de Ténis</div>
	  <div style="font-size:13px;"><b>Nível:</b> A</div>
	  </li>
	</ul> 
  </div>
    </section>


	


    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; espancaballsclub.com</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Ajuda</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
	
		<!-- Login -->
	<div id="modal-wrapper" class="modal">
  
  <form class="modal-clog animate" action="action.php" method="post">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Fechar">&times;</span>
      <img src="img/logos/icon.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Login</h1>
    </div>

    <div class="container">
      <input type="text" placeholder="Escreva o Email" name="email" />
      <input type="password" placeholder="Escreva a Password" name="password" />        
      <button class="login-button" name='login' type="submit">Login</button>
      <a href="javascript:void(0)" style="border-radius: 5px;background-color:white;text-decoration:none; float:left; margin-right:34px; margin-top:26px;" onclick="document.getElementById('modal-wrapper').style.display='none';document.getElementById('modal-register').style.display='block'">&nbsp;Registe-se!&nbsp;</a>
    </div>
    
  </form>
	
    </div>
	
		<!-- Minha Conta -->
	<div id="modal-account" class="modal">
  
  <form class="modal-clog animate" action="action.php" method="post">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-account').style.display='none'" class="close" title="Fechar">&times;</span>
      <img src="img/logos/icon.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Minha Conta</h1>
    </div>

    <div class="container">
	  <br />
      <?php echo "<span class='minha-conta'>Nome:" .$_SESSION['nome']." </span>"; ?>       
      <?php if(isset($_SESSION['morada'])){
			echo "<span class='minha-conta'>".$_SESSION['morada']." </span>";
			echo "<form action='action.php' ><input name='morada' type='text' placeholder='Altere a Morada...'/><button style='padding: 5px 5px 5px 5px;' class='login-button' name='updatemorada' type='submit'>Alterar</button></form>";
		  }else{
			echo "<form action='action.php' ><input name='morada' type='text' placeholder='Escreva a Morada...'/> <button style='padding: 5px 5px 5px 5px;' class='login-button' name='updatemorada' type='submit'>Inserir</button></form>";
		  }
	  ?>       
	  <br />
	  <br />
	  <br />
	  </form>
      <button class="logout-button" onclick="location.href = 'logout.php'" type="button">Logout</button>
    </div>
    
  </form>
	
    </div>

		<!-- Registar -->
	<div id="modal-register" class="modal">
  
  <form class="modal-clog animate" action="action.php" method="post">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-register').style.display='none'" class="close" title="Fechar">&times;</span>
      <img src="img/logos/icon.png" alt="Avatar" class="avatar">
      <h1 style="text-align:center">Registar</h1>
    </div>

    <div class="container">
      <input type="text" placeholder="Escreva o seu Nome" name="nome">
      <input type="email" placeholder="Escreva o Email" name="email">
      <input onkeyup='check();' id="password" type="password" placeholder="Escreva a Password" name="password">        
      <input onkeyup='check();' id="confirmar_password" type="password" placeholder="Confirmar Password"> 
	  <span style="display:inline;" id="confirmar"></span>
      <button class="login-button" name='registar' type="submit">Registar</button>
      <a href="javascript:void(0)" style="border-radius: 5px;background-color:white;text-decoration:none; float:left; margin-right:34px; margin-top:26px;" onclick="document.getElementById('modal-register').style.display='none';document.getElementById('modal-wrapper').style.display='block'">&nbsp;Já tenho conta&nbsp;</a>
    </div>
    
  </form>
	
    </div>
	
	    <!-- Bootstrap core JavaScript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="js/carrinhoscript.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#m').attr('src','http://www.the-url.com');
	}
	</script>
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
