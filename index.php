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
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#pagina1">EspancaBalls club</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="torneios.php">Torneios</a>
            </li>
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
	
    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Bem vindo ao teu desporto!</div>
          <div class="intro-heading text-uppercase">É bom conhecer-te</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#Servicos">Conheça-nos melhor</a>
        </div>
      </div>
    </header>

    <!-- Serviços -->
    <section id="Servicos">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Serviços</h2>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <a class="nav-link js-scroll-trigger" href="#compras"><i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i></a>
            </span>
            <h4 class="service-heading">Compras</h4>
            <p class="text-muted">Você consegue fazer as suas compras.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <a class="nav-link js-scroll-trigger" href="#torneios"><i class="fa fa-trophy fa-stack-1x fa-inverse"></i></a>
            </span>
            <h4 class="service-heading">Torneios</h4>
            <p class="text-muted">Você consegue aceder aos torneios que vamos realizar em as suas respetivas datas.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <a class="nav-link js-scroll-trigger" href="#contactos"><i class="fa fa-phone fa-stack-1x fa-inverse"></i><a/>
            </span>
            <h4 class="service-heading">Contactos</h4>
            <p class="text-muted">Você pode nos contactar para qualquer informação.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Compras Grid -->
	<?php
		if((!isset($_SESSION['email'])) && (!isset($_SESSION['password']))){
	?>
    <section class="bg-light" id="compras">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Compras</h2>
          </div>
        </div>
        <div class="text-center">
            <span class="fa-stack fa-1x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
            </span>
            <h4 class="service-heading">Precisa estar com sessão iniciada para ver a Loja do Clube!</h4>
            <a style="cursor:pointer;" class="nav-link js-scroll-trigger text-muted" onclick="document.getElementById(\'modal-wrapper\').style.display=\'block\'">Inicie sessão ou crie conta aqui!</a>
          </div>
      </div>
    </section>
	<?php 
		}else{
	?>
    <section class="bg-light" id="compras">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Compras</h2>
            <h3 class="section-subheading text-muted">Loja do clube.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 compras-item">
            <a class="compras-link" data-toggle="modal" href="#comprasModal1">
              <div class="compras-hover">
                <div class="compras-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/compras/01-thumbnail.jpg" alt="">
            </a>
            <div class="compras-caption">
              <h4>Roupa</h4>
              <p class="text-muted">Compra Roupa e acessórios</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 compras-item">
            <a class="compras-link" data-toggle="modal" href="#comprasModal2">
              <div class="compras-hover">
                <div class="compras-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/compras/02-thumbnail.jpg" alt="">
            </a>
            <div class="compras-caption">
              <h4>Raquetes</h4>
              <p class="text-muted">Raquetes e Bolas</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 compras-item">
            <a class="compras-link" data-toggle="modal" href="#comprasModal3">
              <div class="compras-hover">
                <div class="compras-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/compras/03-thumbnail.jpg" alt="">
            </a>
            <div class="compras-caption">
              <h4>Cordas</h4>
              <p class="text-muted">Cordas e outros</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 compras-item">
            <a class="compras-link" data-toggle="modal" href="#comprasModal4">
              <div class="compras-hover">
                <div class="compras-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/compras/04-thumbnail.jpg" alt="">
            </a>
            <div class="compras-caption">
              <h4>Calçado</h4>
              <p class="text-muted">Calçado adequado</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 compras-item">
            <a class="compras-link" data-toggle="modal" href="#comprasModal5">
              <div class="compras-hover">
                <div class="compras-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/compras/05-thumbnail.jpg" alt="">
            </a>
            <div class="compras-caption">
              <h4>Malas</h4>
              <p class="text-muted">Malas para raquetes</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 compras-item">
            <a class="compras-link" data-toggle="modal" href="#comprasModal6">
              <div class="compras-hover">
                <div class="compras-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/compras/06-thumbnail.jpg" alt="">
            </a>
            <div class="compras-caption">
              <h4>Chapéus</h4>
              <p class="text-muted">Chapeus e Fitas</p>
            </div>
          </div>
        </div>
      </div>
    </section>
	<?php
		}
	?>

    <!-- Sobre o clube/about -->
    <section id="Sobre">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Sobre</h2>
            <h3 class="section-subheading text-muted">História do clube.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/sobre/1.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Fevereiro de 2010</h4>
                    <h4 class="subheading">O começo do clube</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Em 2009 Pedro Martins pensou em abrir um clube de tenis onde todos os jovens pudessem ter a oportunidade de praticar a modalidade!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/sobre/2.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Abril de 2010</h4>
                    <h4 class="subheading">O começo do trabalho</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Em Abril de 2010 Pedro Martins com alguns amigos decidiram começar a fachada do clube para que em Dezembro do mesmo ano estivesse concluido e inaugurado!</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/sobre/3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Dezembro 2012</h4>
                    <h4 class="subheading">Instalações</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Em Dezembro, o clube foi inaugurado, as instalações já estavam praticamente todas feitas, mas o clube estava fechado para o público.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/sobre/4.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Fevereiro 2013</h4>
                    <h4 class="subheading">Clube aberto</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">O Clube por fim ficou aberto ao público em Fevereiro, muitas pessoas já estão a aderir.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Adere
                    <br>tu
                    <br>também!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Equipa /Team -->
    <section class="bg-light" id="equipa">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Equipa</h2>
            <h3 class="section-subheading text-muted">A melhor equipa</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <!--<div class="equipa-member">
              <img class="mx-auto rounded-circle" src="img/equipa/1.jpg" alt="">
              <h4>Pedro Martins</h4>
              <p class="text-muted">Designer</p>
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
            </div>-->
          </div>
          <div class="col-sm-4">
            <div class="equipa-member">
              <img class="mx-auto rounded-circle" src="img/equipa/2.jpg" alt="">
              <h4>Pedro Martins</h4>
              <p class="text-muted">Fundador</p>
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
          </div>
          <div class="col-sm-4">
            <!--<div class="equipa-member">
              <img class="mx-auto rounded-circle" src="img/equipa/3.jpg" alt="">
              <h4>Pedro Martins</h4>
              <p class="text-muted">Developer</p>
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
          </div>-->
        </div>
          <div class="col-lg-8 mx-auto text-center">
            <p class="text-muted centered">Caso queiras fazer parte da equipa contacta-nos!</p>
          </div>
      </div>
    </section>

    <!-- Clients -->
    <section class="py-5">
      <div class="container">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/wilson.png" alt="">
            </a>
      </div>
    </section>
	

    <!-- contactos /Contact -->
    <section id="contactos">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contactos</h2>
            <h3 class="section-subheading text-muted">Se desejar deixe-nos uma mensagem! Nós agradecemos.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form method="post" action="mail/contact_me.php" id="contactForm" name="sentMessage">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" name="name" id="name" type="text" placeholder="Nome *" required data-validation-required-message="Por favor coloque o seu nome.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="email" id="email" type="email" placeholder="Email *" required data-validation-required-message="Por favor coloque o seu email.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="phone" id="phone" type="tel" placeholder="Telefone *" required data-validation-required-message="Por favor coloque o seu numero.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" name="message" id="message" placeholder="O que tem a dizer *" required data-validation-required-message="Por favor deixe-nos uma mensagem."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div><br />
      </div>
<div id="googleMap" style="height:200px;width:50%;margin-right:auto;margin-left:auto;"></div>
<script>
function myMap() {
var myCenter = new google.maps.LatLng(38.7413748, -9.1652676);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI36SwlFqBLe-au3QNkUIrBBVEM3ABgsU&callback=myMap"></script>
</section>
	


    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; espancaballsclub.com</span>
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#contactos">Ajuda</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Compras Modals -->

    <!-- Modal 1 -->
    <div class="compras-modal modal fade" id="comprasModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
		 <h3>Roupa</h3>
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
		  <div class="modal-body">
		  <br />
			<div class="row">
			<?php
			$sql = "SELECT * FROM loja WHERE tipo = 'Roupa'";
			$result = mysqli_query($bd, $sql);
			while($r = mysqli_fetch_array($result)) {
				?>
				<div class="col-sm-4">
				<form id="product-form" class="product-form">
				<br /><br />
				<div class="container">
				<div class="items" id="item1">
						<input name="product_code" type="hidden" value="<?php echo $r["product_code"]; ?>">
					<h5><?php echo $r['produto'];?></h5>
					<div class="loja-img-container">
					<img style="width:50%;height:auto;max-width: 300px;max-height: 300px;border-radius:10px;" class="img-fluid d-block mx-auto" src="<?php echo $r['imagem']; ?>" alt="">
					<!--<a  name="butao" class="plusbutton"><span class="fa fa-plus fa-5x"></span></a>-->
					</div>
						<span><?php echo "Preço: ".$r['preco']." €";?></span>
							<br /><br />
						<span><?php 
						if($r['stock']  == 0){
							echo "<span style='color:#870000;'>Sem Stock<span><br />";
						}elseif($r['stock'] <= 5){
							echo "<span style='color:#874f15;'>Pouco Stock</span><br />";
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}else{
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}
							?></span>
						
				</div>
				</form>
				</div>
				</div>
			<?php
			}
			?>
			
              
            </div>
        </div>
      </div>
      </div>
    </div>

    <!-- Modal 2 -->
    <div class="compras-modal modal fade" id="comprasModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
		 <h3>Raquetes de Tênis</h3>
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
		  <div class="modal-body">
		  <br />
			<div class="row">
			<?php
			$sql = "SELECT * FROM loja WHERE tipo = 'Raquetes'";
			$result = mysqli_query($bd, $sql);
			while($r = mysqli_fetch_array($result)) {
				?>
				<div class="col-sm-4">
				<form id="product-form" class="product-form">
				<br /><br />
				<div class="container">
				<div class="items" id="item1">
						<input name="product_code" type="hidden" value="<?php echo $r["product_code"]; ?>">
					<h5><?php echo $r['produto'];?></h5>
					<div class="loja-img-container">
					<img style="width:50%;height:auto;max-width: 300px;max-height: 300px;border-radius:10px;" class="img-fluid d-block mx-auto" src="<?php echo $r['imagem']; ?>" alt="">
					<!--<a  name="butao" class="plusbutton"><span class="fa fa-plus fa-5x"></span></a>-->
					</div>
						<span><?php echo "Preço: ".$r['preco']." €";?></span>
							<br /><br />
						<span><?php 
						if($r['stock']  == 0){
							echo "<span style='color:#870000;'>Sem Stock<span><br />";
						}elseif($r['stock'] <= 5){
							echo "<span style='color:#874f15;'>Pouco Stock</span><br />";
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}else{
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}
							?></span>
						
				</div>
				</form>
				</div>
				</div>
			<?php
			}
			?>
			
              
            </div>
        </div>
      </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="compras-modal modal fade" id="comprasModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
		 <h3>Cordas e Outros</h3>
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
		  <div class="modal-body">
		  <br />
			<div class="row">
			<?php
			$sql = "SELECT * FROM loja WHERE tipo = 'Outros'";
			$result = mysqli_query($bd, $sql);
			while($r = mysqli_fetch_array($result)) {
				?>
				<div class="col-sm-4">
				<form id="product-form" class="product-form">
				<br /><br />
				<div class="container">
				<div class="items" id="item1">
						<input name="product_code" type="hidden" value="<?php echo $r["product_code"]; ?>">
					<h5><?php echo $r['produto'];?></h5>
					<div class="loja-img-container">
					<img style="width:50%;height:auto;max-width: 300px;max-height: 300px;border-radius:10px;" class="img-fluid d-block mx-auto" src="<?php echo $r['imagem']; ?>" alt="">
					<!--<a  name="butao" class="plusbutton"><span class="fa fa-plus fa-5x"></span></a>-->
					</div>
						<span><?php echo "Preço: ".$r['preco']." €";?></span>
							<br /><br />
						<span><?php 
						if($r['stock']  == 0){
							echo "<span style='color:#870000;'>Sem Stock<span><br />";
						}elseif($r['stock'] <= 5){
							echo "<span style='color:#874f15;'>Pouco Stock</span><br />";
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}else{
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}
							?></span>
						
				</div>
				</form>
				</div>
				</div>
			<?php
			}
			?>
			
              
            </div>
        </div>
      </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="compras-modal modal fade" id="comprasModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
		 <h3>Calçado</h3>
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
		  <div class="modal-body">
		  <br />
			<div class="row">
			<?php
			$sql = "SELECT * FROM loja WHERE tipo = 'Calcado'";
			$result = mysqli_query($bd, $sql);
			while($r = mysqli_fetch_array($result)) {
				?>
				<div class="col-sm-4">
				<form id="product-form" class="product-form">
				<br /><br />
				<div class="container">
				<div class="items">
						<input name="product_code" type="hidden" value="<?php echo $r["product_code"]; ?>">
					<h5><?php echo $r['produto'];?></h5>
					<div class="loja-img-container">
					<img style="width:50%;height:auto;max-width: 300px;max-height: 300px;border-radius:10px;" class="img-fluid d-block mx-auto" src="<?php echo $r['imagem']; ?>" alt="">
					<!--<a  name="butao" class="plusbutton"><span class="fa fa-plus fa-5x"></span></a>-->
					</div>
						<span><?php echo "Preço: ".$r['preco']." €";?></span>
							<br /><br />
						<span><?php 
						if($r['stock']  == 0){
							echo "<span style='color:#870000;'>Sem Stock<span><br />";
						}elseif($r['stock'] <= 5){
							echo "<span style='color:#874f15;'>Pouco Stock</span><br />";
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}else{
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}
							?></span>
						
				</div>
				</form>
				</div>
				</div>
			<?php
			}
			?>
			
             
            </div>
        </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="compras-modal modal fade" id="comprasModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
		 <h3>Malas</h3>
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
		  <div class="modal-body">
		  <br />
			<div class="row">
			<?php
			$sql = "SELECT * FROM loja WHERE tipo = 'Malas'";
			$result = mysqli_query($bd, $sql);
			while($r = mysqli_fetch_array($result)) {
				?>
				<div class="col-sm-4">
				<form id="product-form" class="product-form">
				<br /><br />
				<div class="container">
				<div class="items" id="item1">
						<input name="product_code" type="hidden" value="<?php echo $r["product_code"]; ?>">
					<h5><?php echo $r['produto'];?></h5>
					<div class="loja-img-container">
					<img style="width:50%;height:auto;max-width: 300px;max-height: 300px;border-radius:10px;" class="img-fluid d-block mx-auto" src="<?php echo $r['imagem']; ?>" alt="">
					<!--<a  name="butao" class="plusbutton"><span class="fa fa-plus fa-5x"></span></a>-->
					</div>
						<span><?php echo "Preço: ".$r['preco']." €";?></span>
							<br /><br />
						<span><?php 
						if($r['stock']  == 0){
							echo "<span style='color:#870000;'>Sem Stock<span><br />";
						}elseif($r['stock'] <= 5){
							echo "<span style='color:#874f15;'>Pouco Stock</span><br />";
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}else{
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}
							?></span>
						
				</div>
				</form>
				</div>
				</div>
			<?php
			}
			?>
			
              
            </div>
        </div>
      </div>
    </div>
	</div>

    <!-- Modal 6 -->
    <div class="compras-modal modal fade" id="comprasModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
		 <h3>Chapéus</h3>
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
		  <div class="modal-body">
		  <br />
			<div class="row">
			<?php
			$sql = "SELECT * FROM loja WHERE tipo = 'Chapeus'";
			$result = mysqli_query($bd, $sql);
			while($r = mysqli_fetch_array($result)) {
				?>
				<div class="col-sm-4">
				<form id="product-form" class="product-form">
				<br /><br />
				<div class="container">
				<div class="items" id="item1">
						<input name="product_code" type="hidden" value="<?php echo $r["product_code"]; ?>">
					<h5><?php echo $r['produto'];?></h5>
					<div class="loja-img-container">
					<img style="width:50%;height:auto;max-width: 300px;max-height: 300px;border-radius:10px;" class="img-fluid d-block mx-auto" src="<?php echo $r['imagem']; ?>" alt="">
					<!--<a  name="butao" class="plusbutton"><span class="fa fa-plus fa-5x"></span></a>-->
					</div>
						<span><?php echo "Preço: ".$r['preco']." €";?></span>
							<br /><br />
						<span><?php 
						if($r['stock']  == 0){
							echo "<span style='color:#870000;'>Sem Stock<span><br />";
						}elseif($r['stock'] <= 5){
							echo "<span style='color:#874f15;'>Pouco Stock</span><br />";
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}else{
							echo '<input name="product_qty" type="number" value="1" min="0" max="99" style="float:center;width: 33px;height: 22px;border: 1px solid #a3b8d3;background: #fff;color: #616161;text-align: center;" >';
							echo '<button style="background:#5a5a5a;border:0;font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#fff;text-transform:uppercase;padding:4px 5px 3px 5px;cursor:pointer;margin-left:6px" type="submit">Adicionar</button>';
						}
							?></span>
						
				</div>
				</form>
				</div>
				</div>
			<?php
			}
			?>
			
              
            </div>
        </div>
        </div>
      </div>
    </div>
	
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
	<script type="text/javascript" src="js/cart.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
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
