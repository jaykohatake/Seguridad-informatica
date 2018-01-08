<!DOCTYPE html>
<html lang='en'>
<head>
	<script src="<?=base_url();?>/assets/js/jquery-1.12.1.min.js"  type="text/javascript"></script>
	<script src="<?=base_url();?>/assets/js/jquery-2.2.1.min.js"   type="text/javascript"></script>
	<meta charset="utf-8">
	<title><?=$head ?></title>
  <link href="<?=base_url();?>/assets/css/bootstrap.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/materialize.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>



		<nav>
		    <div class="nav-wrapper blue-grey lighten-2">
		      <a href="#!" class="brand-logo"> Fotos Unal </a>
		      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
<?php   if($this->session->has_userdata('id')){ ?>
					<ul class="right hide-on-med-and-down">
						<li><a href="<?=site_url('Fotos/logout')?>">Log out</a></li>
						<li><a href="<?=site_url('Fotos/guardarAlbum')?>">Crear Album</a></li>
						<li><a href="<?=site_url('Fotos/guardarImagen')?>">Subir Foto</a></li>
						<li><a href="<?=site_url('Fotos/guardarImagenxAlbum')?>">Agsignar imagen</a></li>
						<li><a href="<?=site_url('Fotos/listarAlbum')?>">Ver Albums</a></li>
					</ul>
					<ul class="side-nav" id="mobile-demo">
						<li><a href="<?=site_url('Fotos/logout')?>">Log out</a></li>
				</ul>
					<?php }else{ ?>
						<ul class="right hide-on-med-and-down">
								<li><a href="<?=site_url('Fotos/index')?>">Logearse</a></li>
								<li><a href="<?=site_url('Fotos/registrarUsuario')?>">Registrarse</a></li>

						</ul>
						<ul class="side-nav" id="mobile-demo">
							<li><a href="<?=site_url('Fotos/index')?>">Logearse</a></li>
							<li><a href="<?=site_url('Fotos/registrarUsuario')?>">Registrarse</a></li>
						</ul>
					<?php } ?>
		    </div>
		  </nav>


</head>
<body>
	    <script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>

			<script>
		  $(document).ready(function(){
		          $(".button-collapse").sideNav();
							$(".dropdown-button").dropdown();
		  });
		  </script>

	<div class="center_div">
	<h3>	<p class="text-center">	<?=$head?></p></h3>
	</div>
<div id="body">
	<?php if($this->session->flashdata('message')){?>
	<div class="alert alert-success">
	<?=$this->session->flashdata('message')?>
	</div>
	<?php }?>
