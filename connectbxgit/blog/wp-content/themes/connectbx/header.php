<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="ConnectBX">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ConnectBX - Blog</title>
    <meta name="description" content="Toute l'actu du monde associatif" />

    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script>
      $(document).ready(function()
      {
        /*Initialisation des éléments navbar responsive, select, modals, tooltip, datepicker et datepicker*/
        $('.button-collapse').sideNav();
        $('select').material_select();
        $('.modal').modal();
        $('.tooltipped').tooltip({delay: 50});
      });
    </script>

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <header>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="//dev.connectbx.be/home">Accueil</a></li>
        <li><a href="//dev.connectbx.be/map">Assos' Map</a></li>
        <li><a href="//dev.connectbx.be/events">Événements</a></li>
        <li><a href="<?= home_url(); ?>">Blog</a></li>
        <li><a href="//dev.connectbx.be/about">À propos</a></li>
        <li><a href="//dev.connectbx.be/contact">Contact</a></li>
      </ul>
      <div class="navbar-fixed">
        <nav class="green">
          <div class="nav-wrapper">
            <a href="//dev.connectbx.be/home" class="brand-logo">
              <img id="brand-logo-img" src="../img/connectbx-logo-white.png" alt="logo">
            </a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="//dev.connectbx.be/home">Accueil</a></li>
              <li><a href="//dev.connectbx.be/map">Assos' Map</a></li>
              <li><a href="//dev.connectbx.be/events">Événements</a></li>
              <li><a href="<?= home_url(); ?>">Blog</a></li>
              <li><a href="//dev.connectbx.be/about">À propos</a></li>
              <li><a href="//dev.connectbx.be/contact">Contact</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>


    <main>

      <div class="container">
        <div class="center-align">
          <h1><a href="<?= home_url(); ?>">Blog</a></h1>
          <h5>Tous les articles de ConnectBX !</h5>
        </div>
