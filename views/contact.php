<?php
  require_once '../config.php';
  $text = load_language();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>ConnectBX - <?= $text["contactTitle"]; ?></title>
    <meta name="description" content="<?= $text["contactIntro"]; ?>" />
    <?php load_head(); ?>
  </head>
  <body>
    <header>
      <?php load_navbar(); ?>
    </header>

    <main>
    <div class="container">

      <h1 class="center-align"><?= $text["contactTitle"]; ?></h1>
      <p class="flow-text center-align"><?= $text["contactIntro"]; ?><br/> <?= $text["contactText"]; ?></p>

      <div class="row">
          <form class="col m8 offset-m2 s10 offset-s1" style="padding-bottom: 125px;">
            <div class="row">
              <div class="input-field col s6">
                <input id="lastname" type="text" class="validate">
                <label for="lastname"><?= $text["contactLastname"]; ?>*</label>
              </div>
              <div class="input-field col s6">
                <input id="firstname" type="text" class="validate">
                <label for="firstname"><?= $text["contactFirstname"]; ?>*</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email"><?= $text["contactEmail"]; ?>*</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input id="subject" type="text" class="validate">
                <label for="subject"><?= $text["contactSubject"]; ?>*</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="message" class="materialize-textarea"></textarea>
                <label for="message"><?= $text["contactMessage"]; ?>*</label>
              </div>
            </div>
            <button class="btn waves-effect waves-light green" onclick="addMessage(event,<?= $_SESSION['language'] =='nl' ? 'nl' : 'fr'; ?>);"><i class="material-icons left">send</i><?= $text["contactSend"]; ?></button>
          </form>
      </div>

    </div>
    </main>

    <?php load_footer(); ?>
  </body>
</html>