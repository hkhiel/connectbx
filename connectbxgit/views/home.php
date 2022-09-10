<?php
  require_once '../config.php';
  $text = load_language();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>ConnectBX</title>
    <meta name="description" content="<?= $text["homeDescription"]; ?>" />
    <?php load_head(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jarallax/1.9.0/jarallax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jarallax/1.9.0/jarallax-element.min.js"></script>
  </head>
  <body>
    <header class="home-navbar-transparent">
      <?php load_navbar(); ?>
    </header>

    <div id="home-background" data-jarallax data-speed="0.2" class="jarallax">
      <div class="row" id="header-items">
        <div style="background-color: rgba(255, 255, 255, 0.6); padding: 50px 0; border-radius: 20px;">
          <img id="logo-header" src="img/connectbx-logo.png">
        </div>
<!--        <div>
          <img id="logo-header" style="" src="img/small-logo.png">
        </div>
        <div id="header-quote" class="col s12">
          La porte des jeunes au monde associatif bruxellois
        </div>-->
      </div>
      <img class="arrow" onclick="scrollToContent()" id="arrow-bottom" src="img/arrow-bottom.png">
    </div>

    <main id="home-container">

      <div id="about-connectbx" class="center-align container">
        <div>
          <h2><?= $text["homeTitle"]; ?></h2>
        </div>
        <p class="flow-text"><?= $text["homeText"]; ?></p>
      </div>

      <div class="row valign-wrapper home-item container">
        <div class="col m6 s12">
          <a href="map">
            <div class="col s12 home-item-img-small center-align">
              <img style="height: 100px" src="img/map-icon.png">
            </div>
            <h2 class="home-title-white">
              <?= $text["homeAssosMapTitle"]; ?> <i class="material-icons small">keyboard_arrow_right</i>
            </h2>
          </a>
          <p class=""><?= $text["homeAssosMapText"]; ?></p>
        </div>
        <a href="map" class="col m6 center-align hide-on-small-only">
          <img src="img/map-icon.png">
        </a>
      </div>

      <div class="green-background">
        <div class="row valign-wrapper home-item container">
          <a href="events" class="col m6 s12 center-align hide-on-small-only">
            <img src="img/calendar-icon.png">
          </a>
          <div class="col m6 s12 white-text">
            <a href="events">
              <div class="col s12 center-align home-item-img-small">
                <img style="height: 100px" src="img/calendar-icon.png">
              </div>
              <h2 class="home-title-green" style="color: #ffffff">
                <?= $text["homeEventTitle"]; ?> <i class="material-icons small">keyboard_arrow_right</i>
              </h2>
            </a>
            <p class=""><?= $text["homeEventText"]; ?></p>
          </div>
        </div>
      </div>

      <div class="row valign-wrapper home-item container">
        <div class="col m6 s12">
          <a href="blog">
            <div class="col s12 center-align home-item-img-small">
              <img src="img/blog-icon.png">
            </div>
            <h2 class="home-title-white">
              <?= $text["homeBlogTitle"]; ?> <i class="material-icons small">keyboard_arrow_right</i>
            </h2>
          </a>
          <p class=""><?= $text["homeBlogText"]; ?></p>
        </div>
        <a href="blog" class="col m6 s12 center-align hide-on-small-only">
          <img src="img/blog-icon.png">
        </a>
      </div>
      <div id="newsletters-container">
        <div class="row">
          <div class="col s12 m8 offset-m2">
            <div class="card hoverable center-align">
              <span class="card-title"><?= $text["homeNewsletterText"]; ?></span>
              <div class="card-content">
                <div class="row">
                  <div class="col s12 m5 offset-m2">
                    <div class="input-field">
                      <input type="email" id="subscriber-email">
                      <label for="subscriber-email"><?= $text["homeNewsletterEmail"]; ?></label>
                    </div>
                  </div>
                  <div class="col s12 m2">
                    <button class="waves-effect waves-light btn-large green" onclick="addSubscriber(<?= $_SESSION['language']; ?>)"><?= $text["homeNewsletterRegister"]; ?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main><!-- container-->

    <?php load_footer(); ?>
  </body>
</html>

<script>
  $(window).scroll(() =>
  {
    if ($(window).scrollTop() > 0)
      $('header').removeClass('home-navbar-transparent');
    else
      $('header').addClass('home-navbar-transparent');
  });
</script>