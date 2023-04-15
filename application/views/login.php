<!-- start: BODY -->
<body class="login">
	<!-- start: LOGIN -->
	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 col-lg-2 col-lg-offset-5">
			<div class="logo text-center">
				<img src="<?=base_url()?>assets/images/logo-big.png" alt="{{app.name}}" class="img-responsive" />
			</div>
			<p class="text-center text-dark text-bold text-extra-large margin-top-15">
				Bienvenue sur UCA Finance
			</p>
			<!--<p class="text-center">
				You can build just about any type of dashboard you want with Packet, a developer friendly admin theme.
			</p>-->
			<p class="text-center">
				Merci de saisir votre login et mot de passe.
			</p>
			<!-- start: LOGIN BOX -->
			<div class="box-login">
				<form class="form-login" action="<?=base_url()?>auth/signin" method="POST">
					<div class="alert alert-danger" style="display:<?=(isset($_GET['CIError']))?'':'none'?>">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Erreur!</strong>
						Login ou Mot de passe Incorrect.<br />
						Accout has been suspended for a while, Please try later
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="login" placeholder="Login">
					</div>
					<div class="form-group form-actions">
						<input type="password" class="form-control password" name="password" placeholder="Password">
					</div>
					<div class="text-center">
						<a href="<?=base_url()?>/login/forgot"> J'ai oublié mon mot de passe </a>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-red btn-block">
							Connexion
						</button>
					</div>
				</form>
				<!-- start: COPYRIGHT -->
				<div class="copyright">
					2016 &copy; uca finance.
				</div>
				<!-- end: COPYRIGHT -->
			</div>
			<!-- end: LOGIN BOX -->
		</div>
	</div>
	<!-- end: LOGIN -->