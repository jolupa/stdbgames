<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php if (isset($item['gName'])): ?>
      <title>Stadia GamesDB -- <?= $item['gName'] ?></title>
      <meta name="description" content="Information about <?= $item['gName'] ?> developed by <?= $item['gdName'] ?> and published by <?= $item['gpName'] ?> in Stadia">
      <meta name="keywords" content="<?= $item['gName'] ?>, <?= $item['gdName'] ?>, <?= $item['gpName'] ?>, Stadia, Stream, Games, Online">
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:site" content="@DbStadia">
      <meta name="twitter:creator" content="@DbStadia">
      <meta property="twitter:title" content="<?=$item['gName']  ?> by <?= $item['gdName'] ?> on Stadia">
      <meta property="twitter:description" content="<?= character_limiter($item['gAbout'], 80, '...') ?>">
      <meta property="twitter:image" content="<?= base_url() ?>/images/<?= $item['gImage'] ?>.jpeg">
      <meta property="twitter:image:alt" content="content="<?=$item['gName']  ?> by <?= $item['gdName'] ?> on Stadia">
    <?php elseif (isset($developer[0]['dName'])): ?>
      <title>Stadia GamesDB -- <?= $developer[0]['dName'] ?></title>
      <meta name="description" content="Information about <?= $developer[0]['dName'] ?> developers of <?= $developer[0]['dgName'] ?>, and published by <?= $developer[0]['dpName'] ?> in Stadia">
      <meta name="keywords" content="<?php foreach ($developer as $developer): ?><?= $developer['dgName'] ?>, <?= $developer['dName'] ?>, <?= $developer['dpName'] ?><?php endforeach; ?>, Stadia, Stream, Games, Online">
    <?php elseif (isset($publisher[0]['pName'])): ?>
      <title>Stadia GamesDB -- <?= $publisher[0]['pName'] ?></title>
      <meta name="description" content="Information about <?= $publisher[0]['pName'] ?> publishers of <?= $publisher[0]['pgName'] ?> and published by <?= $publisher[0]['pName'] ?> in Stadia">
      <meta name="keywords" content="<?php foreach ($publisher as $publisher): ?><?= $publisher['pgName'] ?>, <?= $publisher['pName'] ?>, <?= $publisher['pdName'] ?><?php endforeach; ?>, Stadia, Stream, Games, Online">
    <?php elseif (isset($gametype)): ?>
      <title>Stadia Games DB</title>
      <meta name="desciption" content="All the games published on the Google Stadia platform in one place">
      <meta name="keywords" content="Stadia, Google, Games, Database, db, funny, play, stream">
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:site" content="@DbStadia">
      <meta name="twitter:creator" content="@DbStadia">
      <meta property="twitter:title" content="Stadia GamesDB!">
      <meta property="twitter:description" content="All the Google Stadia Games in one place.">
      <?php $number = array_rand($gametype, 1); ?>
      <meta property="twitter:image" content="<?= base_url() ?>/images/<?= $gametype[$number]['gImage'] ?>.jpeg">
      <meta property="twitter:image:alt" content="<?= $gametype[$number]['gName'] ?>">
    <?php else: ?>
      <title>Stadia Games DB</title>
      <meta name="desciption" content="All the games published on the Google Stadia platform in one place">
      <meta name="keywords" content="Stadia, Google, Games, Database, db, funny, play, stream">
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:site" content="@DbStadia">
      <meta name="twitter:creator" content="@DbStadia">
      <meta property="twitter:title" content="Stadia GamesDB!">
      <meta property="twitter:description" content="All the Google Stadia Games in one place.">
      <?php if (isset ($founders)): ?>
        <?php $number = array_rand($founders, 1); ?>
      <?php else: ?>
        <?php $number = random_int(0, 30); ?>
      <?php endif; ?>
      <meta property="twitter:image" content="<?= base_url() ?>/images/<?=$founders[$number]['gImage']  ?>.jpeg">
      <meta property="twitter:image:alt" content"<?= $founders[$number]['gName'] ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
            <a class="navbar-item" href="<?= base_url() ?>/about">About</a>
            <?php if ( session('role') == 1): ?>
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">New...</a>
              <div class="navbar-dropdown">
                <a class="navbar-item" href="<?= base_url() ?>/games/gameform/">...Game</a>
                <a class="navbar-item" href="<?= base_url() ?>/games/devform/">...Developer</a>
                <a class="navbar-item" href="<?= base_url() ?>/games/pubform/">...Publisher</a>
              </div>
            </div>
            <?php endif; ?>
          </div>
          <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
              <?php if( session('is_logged') != TRUE): ?>
                <a class="button is-primary" href="<?= base_url() ?>/users/signuser">Sign In</a>
                <a class="button is-light" href="<?= base_url() ?>/users/loguser">Log In</a>
                <?php else: ?>
                  <a class="button is-primary" href="<?= base_url() ?>/users/landing/<?= session('username') ?>">Profile</a>
                  <a class="button is-light" href="<?= base_url() ?>/users/logout">Log Out</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </nav>
      </div>
    </section>
