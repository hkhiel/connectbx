<?php
  require_once '../config.php';
  $text = load_language();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ConnectBX - <?= $text["aboutTitle"]; ?></title>
    <meta name="description" content="Toute l'histoire de ConnectBX" />
    <?php load_head(); ?>
  </head>
  <body>
    <header>
      <?php load_navbar(); ?>
    </header>

    <main>

      <div id="about-container">
        <div id="intro" class="center-align">
          <h1 class="white-text"><?= $text["aboutTitle"]; ?></h1>
          <p class="flow-text white-text"><b><?= $text["aboutText"]; ?></b></p>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none" stroke="none" fill="white">
            <polygon points="100 0 100 10 0 10" />
          </svg>
        </div>



        <div id="origin" class="row">

          <div class="col xl3 l4">
              <h3 class="right-align title"><?= $text["aboutHistoryTitle"]; ?></h3>
          </div>
          <div class="col xl9 l8">
            <p><?= $text["aboutHistoryText"]; ?></p>
          </div>
        </div>

        <div id="team" class="center-align">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none" stroke="none" fill="white">
            <polygon points="0 0 100 0 0 10" />
          </svg>
          <h2 class="white-text title"><?= $text["aboutTeamTitle"]; ?></h2>
          <p class="white-text"><?= $text["aboutTeamText"]; ?></p>
          <div id="description" class="row col s12 ">
             <div class="col m2 offset-m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["president"]; ?>" class="hoverable circle tooltipped" src="img/team/Hanane.jpg">
                <p>Hanane</p>
             </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["executiveDirector"]; ?>" class="hoverable circle tooltipped" src="img/team/Jennifer.jpg">
                <p>Jennifer</p>
              </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["secretary"]; ?>" class="hoverable circle tooltipped" src="img/team/Jodie.jpg">
                <p>Jodie</p>
              </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["mappingManager"]; ?>" class="hoverable circle tooltipped" src="img/team/LeVan.jpg">
                <p>LeVan</p>
              </div>
              <div class="col m2 offset-m1">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["developerDesignerM"]; ?>" class="hoverable circle tooltipped" src="img/team/Yassin.jpg">
                <p>Yassin<br/>
              </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["developerDesignerF"]; ?>" class="hoverable circle tooltipped" src="img/team/Majda.jpg">
                <p>Majda</p>
              </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["editorInChief"]; ?>" class="hoverable circle tooltipped" src="img/team/Najima.jpg">
                <p>Najima</p>
              </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["redactor"]; ?>" class="hoverable circle tooltipped" src="img/team/Hajar.jpg">
                <p>Hajar</p>
              </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["redactor"]; ?>" class="hoverable circle tooltipped" src="img/team/Ikram.jpg">
                <p>Ikram</p>
              </div>
              <div class="col m2 offset-m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["ambassador"]; ?>" class="hoverable circle tooltipped" src="img/team/Vasty.jpg">
                <p>Vasty</p>
              </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["ambassador"]; ?>" class="hoverable circle tooltipped" src="img/team/Karima.jpg">
                <p>Karima</p>
              </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["ambassador"]; ?>" class="hoverable circle tooltipped" src="img/team/Catarina.jpg">
                <p>Catarina</p>
              </div>
              <div class="col m2">
                <img data-position="top" data-delay="50" data-tooltip="<?= $text["designManager"]; ?>" class="hoverable circle tooltipped" src="img/team/Marie.jpg">
                <p>Marie</p>
              </div>
            </div>
        </div>

        <div id="now" class="center-align">
          <div class="now-raw-text">
            <h2 class="title"><?= $text["aboutAndNowTitle"]; ?></h2>
            <p><?= $text["aboutAndNowIntro"]; ?></p>
          </div>
          <div id="tools" class="row">
            <div class="col l4">
              <div class="card-panel hoverable">
                <a href="map"><img src="img/map-icon.png"></a>
                <p><a href="map"><?= $text["aboutAssosMapText"]; ?></a> <?= $text["aboutAssosMapText"]; ?></p>
              </div>
            </div>
            <div class="col l4">
              <div class="card-panel hoverable">
                <a href="events"><img src="img/calendar-icon.png"></a>
                <p><a href="events"><?= $text["aboutEventCalendarTitle"]; ?></a> <?= $text["aboutEventCalendarText"]; ?></p>
              </div>
            </div>
            <div class="col l4">
              <div class="card-panel hoverable">
                <a href="https://www.facebook.com/connectbx/"><img src="img/icon-facebook.jpg"></a>
                <p><a href="https://www.facebook.com/connectbx/"><?= $text["aboutOfficialFacebookPageTitle"]; ?></a> <?= $text["aboutOfficialFacebookPageText"]; ?></p>
              </div>
            </div>
          </div>
          <p class="now-raw-text"><b><?= $text["aboutAndNowText"]; ?></b></p>
        </div>

        <div id="you" class="center-align">
          <h1 class="title"><?= $text["aboutAndYouTitle"]; ?></h1>
          <p class="flow-text"><?= $text["aboutAndYouText"]; ?> <a href="contact"><?= $text["contactPage"]; ?>.</a>
          </p>

        </div>


      </div><!-- /container -->
    </main>

    <?php load_footer(); ?>
  </body>
</html>