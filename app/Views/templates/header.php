<!DOCTYPE html>
<html prefix="og:http://ogp.me/ns#">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if(isset($game)): ?>
    <title><?= $game['name'] ?> - Stadia GamesDB!</title>
    <meta name="description" content="Information about <?= $game['name'] ?> developed by <?= $game['developer_name'] ?> and published by <?= $game['developer_name'] ?>">
    <meta name="keywords" content="<?= $game['name'] ?>, <?= $game['developer_name'] ?>, <?= $game['publisher_name'] ?>, stadia, stream, gaming, cloud, online">
    <meta property="og:title" content="<?= $game['name'] ?> by <?= $game['developer_name'] ?> on Stadia - Stadia GamesDB!">
    <?php if($game['about']): ?>
      <meta property="og:description" content="<?= character_limiter($game['about'], 80, '...') ?>">
    <?php endif; ?>
    <meta property="og:image" content="<?= base_url() ?>/images/<?= $game['image'] ?>.jpeg">
    <meta property="og:url" content="<?= base_url() ?>/game/<?= $game['slug'] ?>">
    <meta name="twitter:image_alt" content="<?= $game['name'] ?>">
  <?php elseif(isset($developer)): ?>
    <title><?= $developer['name'] ?> - Stadia GamesDB!</title>
    <meta name="description" content="Information about <?= $developer['name'] ?> on Stadia">
    <meta name="keywords" content="<?= $developer['name'] ?>, stadia, stream, gaming, cloud, online">
    <meta property="og:title" content="<?= $developer['name'] ?> on Stadia - Stadia GamesDB!">
    <?php if($developer['about']): ?>
      <meta property="og:description" content="<?= character_limiter($developer['about'], 80, '...') ?>">
    <?php endif; ?>
    <meta property="og:image" content="<?= base_url() ?>/assets/stdb_logo_big.png">
    <meta property="og:url" content="<?= base_url() ?>/developer/<?= $developer['slug'] ?>">
    <meta name="twitter:image_alt" content="<?= $developer['name'] ?>">
  <?php elseif(isset($publisher)): ?>
    <title><?= $publisher['name'] ?> - Stadia GamesDB!</title>
    <meta name="description" content="Information about <?= $publisher['name'] ?> on Stadia">
    <meta name="keywords" content="<?= $publisher['name'] ?>, stadia, stream, gaming, cloud, online">
    <meta property="og:title" content="<?= $publisher['name'] ?> on Stadia - Stadia GamesDB!">
    <?php if($publisher['about']): ?>
      <meta property="og:description" content="<?= character_limiter($publisher['about'], 80, '...') ?>">
    <?php endif; ?>
    <meta property="og:image" content="<?= base_url() ?>/assets/stdb_logo_big.png">
    <meta property="og:url" content="<?= base_url() ?>/developer/<?= $publisher['slug'] ?>">
    <meta name="twitter:image_alt" content="<?= $publisher['name'] ?>">
  <?php elseif(isset($doodle)): ?>
    <title>Stadia Doodles - Stadia GamesDB!</title>
    <meta name="description" content="The promo images for some Games made by Stadia">
    <meta name="keywords" content="<?php foreach($doodle as $doodle): ?><?= $doodle['game_name'] ?>,<?php endforeach; ?>, stadia, stream, gaming, cloud, online">
    <meta property="og:title" content="Stadia Doodles - Stadia GamesDB!">
    <meta property="og:description" content="The promo images for some Games made by Stadia">
    <meta property="og:image" content="<?= base_url() ?>/assets/stdb_logo_big.png">
    <meta property="og:url" content="<?= base_url() ?>/doodles">
    <meta name="twitter:image_alt" content="Stadia Game Doodles">
  <?php else: ?>
    <title>Stadia GamesDB!</title>
    <meta name="description" content="All the Stadia Games in one place!">
    <meta name="keywords" content="stadia, stream, gaming, cloud, online, streaming, fun, party, games">
    <meta property="og:title" content="Stadia GamesDB!">
    <meta property="og:description" content="All the information you are searching with the games launched, coming to the Google Stadia platform. Also a community where you can review your favourite games">
    <meta property="og:image" content="<?= base_url() ?>/assets/stdb_logo_big.png">
    <meta property="og:url" content="<?= base_url() ?>">
    <meta name="twitter:image_alt" content="Stadia GamesDB!">
  <?php endif; ?>
  <meta name="og_site_name" content="Stadia GamesDB!">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@DbStadia">
  <?php if(isset($doodle)): ?>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/lightbox.css">
  <?php endif; ?>
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/slick-theme.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/slick.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bulma.css">
  <script defer src="https://use.fontawesome.com/releases/v5.14.0/js/all.js" integrity="sha384-3Nqiqht3ZZEO8FKj7GR1upiI385J92VwWNLj+FqHxtLYxd9l+WYpeqSOrLh0T12c" crossorigin="anonymous"></script>
  <script src="https://cdn.tiny.cloud/1/25k6xs0os5kaxnymng45nlq4065x2mg02j2nrjqy70yfqrk0/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/stdb_logo_header.png">
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <div class="navbar-brand">
        <a title="Stadia GamesDB!" class="navbar-item" href="<?= base_url() ?>">
          <img src="<?= base_url() ?>/assets/stdb_logo_header.png">
        </a>
        <a role="button" class="navbar-burger burger" data-target="navMenu">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div class="navbar-menu" id="navMenu">
        <a href="<?= base_url() ?>/list" class="navbar-item">Games List</a>
        <a href="<?= base_url() ?>/doodles" class="navbar-item">Stadia Doodles</a>
        <?= view_cell('App\Controllers\Stats::gamestats') ?>
        <a href="<?= base_url() ?>/about" class="navbar-item">About</a>
        <div class="navbar-end">
          <div class="navbar-item">
            <?= view_cell('App\Controllers\Search::searchnavbarform') ?>
          </div>
          <div class="navbar-item">
            <div class="buttons">
              <a class="button is-info is-small" style="border: none;" href="https://stadia.com/link/home?si_rid=10063878286671281778" target="_blank"><strong>Try Stadia Free One Month</strong></a>
              <?php if(session('logged') == true): ?>
                <a class="button is-primary has-text-dark is-small" style="border: none;" href="<?= base_url() ?>/user/profile/<?= session('slug') ?>">Profile</a>
                <a class="button is-danger has-text-dark is-small" style="border: none;" href="<?= base_url() ?>/logout">Log Out</a>
              <?php else: ?>
                <a class="button is-primary is-small" style="border: none;" href="<?= base_url() ?>/signup">Sign Up</a>
                <a class="button is-primary is-small" style="border: none;" href="<?= base_url() ?>/login">Log In</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {

      // Get all "navbar-burger" elements
      const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

      // Check if there are any navbar burgers
      if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach( el => {
          el.addEventListener('click', () => {

            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

          });
        });
      }

    });
  </script>
