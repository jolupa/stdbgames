<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $page_title ?></title>
  <meta name="description" content="<?= $page_description ?>">
  <meta name="keywords" content="<?= $page_keywords ?>">
  <meta property="og:title" content="<?= $page_title ?>">
  <meta property="og:type" content="<?= $page_description ?>">
  <meta property="og:url" content="<?= $page_url ?>">
  <meta property="og:image" content="<?= $page_image ?>">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico">
	<link rel="stylesheet" href="<?= base_url ( '/assets/css/bulma.css' ) ?>">
	<link rel="stylesheet" href="<?= base_url ( '/assets/css/splide.min.css' ) ?>">
	<script src="https://kit.fontawesome.com/7cb3f7dca8.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="<?= base_url ( '/assets/js/splide.min.js' ) ?>"></script>
</head>

<body>

  <nav class="navbar" role="navigation" aria-label="main navigation">
		<div class="container is-max-widescreen">
			<div class="navbar-brand">
				<a class="navbar-item" href="<?= base_url () ?>">
					<img src="<?= base_url ( '/assets/images/icon.png') ?>">
				</a>
				<a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</a>
			</div>
			<div class="navbar-menu" id="navMenu">
				<div class="navbar-start">
					<a class="navbar-item" href="https://twitter.com/DbStadia" target="_blank">
						<span class="icon-text">
							<span class="icon"><i class="fa-brands fa-twitter"></i></span><span>Twitter</span>
						</span>
					</a>
					<a class="navbar-item" href="http://buymeacoffee.com/stadiagamesdb" target="_blank">
						<span class="icon-text">
							<span class="icon"><i class="fa-solid fa-mug-saucer"></i></span><span>Buy Us A Cofee</span>
						</span>
					</a>
					<a class="navbar-item" href="https://stadia.com/link/home?si_rid=10063878286671281778" target="_blank">
						<span class="icon-text">
							<span class="icon"><i class="fa-solid fa-gamepad"></i></span><span>Try Stadia</span>
						</span>
					</a>
				</div>
				<div class="navbar-end">
					<div class="navbar-item">
						<form action="<?= base_url ('/search/search') ?>" method="get" enctype="text/plain">
							<div class="field is-grouped">
								<p class="control has-icons-left">
									<input class="input is-small" type="text" placeholder="Search Games..." name="keyword">
									<span class="icon is-small is-left">
										<i class="fa-solid fa-magnifying-glass"></i>
									</span>
								</p>
								<p class="control">
									<input type="submit" class=" button is-primary is-small" value="Search">
								</p>
							</div>
						</form>
					</div>
          <?php
          if ( session('logged') == true && session('role') == 1 ):
           ?>
					<a class="navbar-item" href="<?= base_url ('/admin/panel') ?>">
						<span class="icon-text">
							<span class="icon"><i class="fa-solid fa-screwdriver-wrench"></i></span><span>Admin</span>
						</span>
					</a>
          <?php
          endif;
          ?>
          <?php
          if ( session('logged') == false ):
           ?>
					<a class="navbar-item" href="<?= base_url ('/users/login') ?>">
						<span class="icon-text">
							<span class="icon"><i class="fa-solid fa-arrow-right-to-bracket"></i></span><span>Login</span>
						</span>
					</a>
          <?php
          else:
          ?>
          <a class="navbar-item" href="<?= base_url ('/users/profile') ?>">
						<span class="icon-text">
							<span class="icon"><i class="fa-solid fa-user"></i></span><span>Profile</span>
						</span>
					</a>
          <?php
          endif;
          ?>
				</div>
			</div>
		</div>
		<script>
		$(document).ready(function() {
			// Check for click events on the navbar burger icon
			$(".navbar-burger").click(function() {
				// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
				$(".navbar-burger").toggleClass("is-active");
				$(".navbar-menu").toggleClass("is-active");
			});
		});
		</script>
	</nav>
