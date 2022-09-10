<?php
  require_once '../config.php';
  $text = load_language();
?>

<footer class="page-footer green">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text"><?= $text["followUs"];?></h5>
        <a href="https://www.facebook.com/connectbx/"><img src="img/icon-facebook.jpg" height="25" width="25"></a>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text"><?= $text["pages"];?></h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="home"><?= $text["pageHome"];?></a></li>
          <li><a class="grey-text text-lighten-3" href="map"><?= $text["pageMap"];?></a></li>
          <li><a class="grey-text text-lighten-3" href="events"><?= $text["pageEvents"];?></a></li>
          <li><a class="grey-text text-lighten-3" href="blog"><?= $text["pageBlog"];?></a></li>
          <li><a class="grey-text text-lighten-3" href="about"><?= $text["pageAbout"];?></a></li>
          <li><a class="grey-text text-lighten-3" href="contact"><?= $text["pageContact"];?></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © ConnectBX <?= date('Y')?>
    </div>
  </div>
</footer>