<!DOCTYPE html>
<html prefix="og:http://ogp.me/ns#">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php if (isset($game)): ?>
			<title>Stadia GamesDB! - <?= $game['gName'] ?></title>
			<meta name="description" content="Information about <?= $game['gName'] ?> developed by <?= $game['gdName'] ?> and published by <?= $game['gpName'] ?> in Stadia">
			<meta name="keywords" content="<?= $game['gName'] ?>, <?= $game['gdName'] ?>, <?= $game['gpName'] ?>, Stadia, Stream, Cloud, Games, Online">
			<!-- og Metatags -->
			<meta property="og:title" content="<?= $game['gName'] ?> by <?= $game['gdName'] ?> on Stadia - Stadia GamesDB!">
			<?php if(!empty($game['About'])): ?>
				<meta property="og:description" content="<?= character_limiter($game['gAbout'], 80, '...') ?>">
			<?php endif; ?>
			<meta property="og:image" content="<?= base_url() ?>/images/<?= $game['gImage'] ?>">
			<meta property="og:url" content="<?= base_url() ?>/games/game/<?= $game['gSlug'] ?>">
			<!-- og Metatags Not Essential Recommended -->
			<meta name="twitter:image_alt" content="<?= $game['gName'] ?>">
		<?php elseif (isset($developer)): ?>
			<title>Stadia GamesDB! - <?= $developer['dName'] ?></title>
			<meta name="description" content="Information About <?= $developer['dName'] ?> in Stadia">
			<meta name="keywords" content="<?= $developer['dName'] ?>, Stadia, Stream, Cloud, Games, Online">
			<!-- og metatags -->
			<meta property="og:title" content="Games Developed by <?= $developer['dName'] ?> on Stadia - Stadia GamesDB!">
			<meta property="og:description" content="All the games Developed by <?= $developer['dName'] ?>">
			<?php if(isset($developer['dImage'])): ?>
				<meta property="og:image" content="<?= base_url() ?>/images/developers/<?= $developer['dImage'] ?>">
			<?php endif; ?>
			<meta property="og:url" content="<?= base_url() ?>/developers/developer/<?= $developer['dSlug'] ?>">
			<!-- og Metatags No Essential Recommended -->
			<?php if(isset($developer['dImage'])): ?>
				<meta name="twitter:image_alt" content="<?= $developer['dImage'] ?>">
			<?php endif; ?>
		<?php elseif (isset($publisher)): ?>
			<title>Stadia GamesDB! - <?= $publisher['pName'] ?></title>
			<meta name="description" content="Information About <?= $publisher['pName'] ?> in Stadia">
			<meta name="keywords" content="<?= $publisher['pName'] ?>, Stadia, Stream, Cloud, Games, Online">
			<!-- og metatags -->
			<meta property="og:title" content="Games Published by <?= $publisher['pName'] ?> on Stadia - Stadia GamesDB!">
			<meta property="og:description" content="All the games Published by <?= $publisher['pName'] ?>">
			<?php if(isset($publisher['pImage'])): ?>
				<meta property="og:image" content="<?= base_url() ?>/images/publishers/<?= $publisher['pImage'] ?>">
			<?php endif; ?>
			<meta property="og:url" content="<?= base_url() ?>/publishers/publisher/<?= $publisher['pSlug'] ?>">
			<!-- og Metatags No Essential Recommended -->
			<?php if(isset($publisher['pImage'])): ?>
				<meta name="twitter:image_alt" content="<?= $publisher['pImage'] ?>">
			<?php endif; ?>
    <?php elseif (isset($gametype)): ?>
      <title>Stadia Games DB</title>
      <meta name="desciption" content="All the games published on the Google Stadia platform in one place">
      <meta name="keywords" content="Stadia, Google, Games, Database, db, funny, play, stream">
      <!-- og Metatags -->
      <meta property="og:title" content="Games on Stadia -- Stadia GamesDB!">
      <meta property="og:description" content="Search the Stadia GamesDB!">
      <?php $number = array_rand($gametype, 1); ?>
      <meta property="og:image" content="<?= base_url() ?>/images/<?= $gametype[$number]['gImage'] ?>">
      <meta property="og:url" content="<?= base_url() ?>">
      <meta name="twitter:card" content="summary_large_image">
      <!-- og Metatags Not Essential Recommended -->
      <meta name="twitter:image_alt" content="<?= $gametype[$number]['gName'] ?>">
    <?php else: ?>
      <title>Stadia Games DB</title>
      <meta name="desciption" content="All the games published on the Google Stadia platform in one place">
      <meta name="keywords" content="Stadia, Google, Games, Database, db, funny, play, stream">
      <!-- og Metatags -->
      <meta property="og:title" content="Stadia GamesDB!!">
      <meta property="og:description" content="All the Google Stadia Games in one place">
      <?php if (isset($founders)): ?>
        <?php $number = array_rand($founders, 1); ?>
      <?php else: ?>
        <?php $number = random_int(0, 30); ?>
      <?php endif; ?>
        <meta property="og:image" content="<?= base_url() ?>/images/<?= $founders[$number]['gImage'] ?>">
      <meta property="og:url" content="<?= base_url() ?>">
      <meta name="twitter:card" content="summary_large_image">
      <!-- og Metatags Not Essential Recommended -->
      <meta name="twitter:image_alt" content="<?= $founders[$number]['gImage'] ?>">
    <?php endif; ?>
		<!-- og Metatags Not Essential Only Analytics -->
		<meta name="og_site_name" content="Stadia GamesDB!">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:site" content="@DbStadia">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
  </head>
  <body>
    <section class="section">
      <div class="container">
      <nav class="navbar">
        <div class="navbar-brand">
          <a class="navbar-item" href="<?= base_url() ?>">Stadia GamesDB!</a>
          <div class="navbar-burger">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </div>
        </div>
        <div class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="<?= base_url() ?>/games/about">About</a>
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">Go to...</a>
              <div class="navbar-dropdown">
                <a class="navbar-item" href="<?= base_url() ?>/games/list/launched">... Games Launched</a>
                <a class="navbar-item" href="<?= base_url() ?>/games/list/soon">... Games Coming Soon</a>
              </div>
            </div>
            <?php if ( session('is_logged') == TRUE): ?>
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">New...</a>
              <div class="navbar-dropdown">
                <a class="navbar-item" href="<?= base_url() ?>/games/insert/">... Game</a>
                <a class="navbar-item" href="<?= base_url() ?>/developers/insert/">... Developer</a>
                <a class="navbar-item" href="<?= base_url() ?>/publishers/insert/">... Publisher</a>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
              <?php if( session('is_logged') != TRUE): ?>
                <a class="button is-primary" href="<?= base_url() ?>/users/register">Sign In</a>
                <a class="button is-light" href="<?= base_url() ?>/users/login">Log In</a>
                <?php else: ?>
                  <a class="button is-primary" href="<?= base_url() ?>/users/profile/<?= session('username') ?>">Profile</a>
                  <a class="button is-light" href="<?= base_url() ?>/users/logout">Log Out</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </nav>
      </div>
    </section>
