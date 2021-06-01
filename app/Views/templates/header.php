<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <title><?= $page_title ?></title>
  <meta name="description" content="<?= $page_description ?>">
  <meta name="keywords" content="<?= $page_keywords ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="<?= $page_title ?>">
  <meta property="og:type" content="<?= $page_description ?>">
  <meta property="og:url" content="<?= $page_url ?>">
  <meta property="og:image" content="<?= $page_image ?>">

  <link rel="manifest" href="<?= base_url('/site.webmanifest') ?>">
  <link rel="apple-touch-icon" href="<?= base_url('/icon.png') ?>">
  <!-- Place favicon.ico in the root directory -->
  <link rel="icon" href="<?= base_url('/favicon.ico') ?>">

  <link rel="stylesheet" href="<?= base_url('/css/normalize.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/css/bulma.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/css/embla.css') ?>">
  <link rel="stylesheet" href="<?= base_url('/css/things.css') ?>">

  <script src="https://kit.fontawesome.com/7cb3f7dca8.js" crossorigin="anonymous"></script>

  <meta name="theme-color" content="#002029">
</head>
<body>
  <nav id="main_navbar" class="container navbar">
    <div class="navbar-brand">
      <a class="navbar-item" href="<?= base_url() ?>">
        <img src="<?= base_url('/img/stdb_logo_header.png') ?>">
      </a>
      <a class="navbar-burger">
        <span></span>
        <span></span>
        <span></span>
      </a>
    </div>
    <a class="navbar-item is-inline-flex-mobile" href="https://twitter.com/DbStadia" target="_blank">
      <span class="icon-text">
        <span class="icon"><i class="fab fa-twitter"></i></span><span class="is-hidden-touch">Twitter</span>
      </span>
    </a>
    <a class="navbar-item is-inline-flex-mobile" href="https://buymeacoffee.com/stadiagamesdb" target="_blank">
      <span class="icon-text">
        <span class="icon"><i class="own icon-buymeacoffee"></i></span><span class="is-hidden-touch">Buy Me A Coffee</span>
      </span>
    </a>
    <a class="navbar-item is-inline-flex-mobile" href="https://stadia.com/link/home?si_rid=10063878286671281778" target="_blank">
      <span class="icon-text">
        <span class="icon"><i class="own icon-stadia"></i></span><span class="is-hidden-touch">Try One Month Free!</span>
      </span>
    </a>
    <div class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="<?= base_url ( '/db/list' ) ?>">Game List</a>
        <?= view_cell ( 'App\Controllers\Games::stats' ) ?>
      </div>
      <div class="navbar-end">
        <div class="navbar-item">
          <form action="<?= base_url('/search/search') ?>" method="get" enctype="text/plain">
            <div class="field">
              <div class="control has-icons-left">
                <input type="text" class="input is-small is-gunmetal" placeholder="Search..." name="keyword">
                <span class="icon is-small has-text-dark-jungle is-left">
                  <i class="fas fa-search"></i>
                </span>
              </div>
            </div>
          </form>
        </div>
        <div class="navbar-item buttons">
          <?php if ( session ( 'logged' ) == true ): ?>
            <a href="<?= base_url ( '/users/profile' ) ?>"  class="button is-primary is-small">Profile</a>
            <a href="<?= base_url ( '/users/userslogout' ) ?>" class="button is-coral is-small"> Log Out</a>
          <?php else: ?>
            <a href="<?= base_url('/users/login') ?>" class="button is-info is-small">Log In OR Sign Up</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>
