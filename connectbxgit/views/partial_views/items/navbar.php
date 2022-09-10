<?php
  require_once '../config.php';
  $text = load_language();
?>

<ul class="side-nav" id="mobile-demo">
  <li class="center-align"><img id="brand-logo-mobile-menu" src="img/small-logo.png" alt="Home"/></li>
  <li><a href="home"><?= $text["pageHome"];?></a></li>
  <li><a href="map"><?= $text["pageMap"];?></a></li>
  <li><a href="events"><?= $text["pageEvents"];?></a></li>
  <li><a href="blog"><?= $text["pageBlog"];?></a></li>
  <li><a href="about"><?= $text["pageAbout"];?></a></li>
  <li><a href="contact"><?= $text["pageContact"];?></a></li>
  <li><a class="language" id="fr">FR</a></li>
  <li><a class="language" id="nl">NL</a></li>
</ul>
<div class="navbar-fixed">
  <nav class="green">
    <div class="nav-wrapper">
      <a href="home" class="brand-logo">
        <img id="brand-logo-img" src="img/connectbx-logo-white.png" alt="logo">
      </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="home"><?= $text["pageHome"];?></a></li>
        <li><a href="map"><?= $text["pageMap"];?></a></li>
        <li><a href="events"><?= $text["pageEvents"];?></a></li>
        <li><a href="blog"><?= $text["pageBlog"];?></a></li>
        <li><a href="about"><?= $text["pageAbout"];?></a></li>
        <li><a href="contact"><?= $text["pageContact"];?></a></li>
        <li><a class="language" id="fr">FR</a></li>
        <li><a class="language" id="nl">NL</a></li>
      </ul>
    </div>
  </nav>
</div>

<script>
  $('.language').on('click', function () {
    let language = $(this).attr('id');
    if(language == 'fr' || language == 'nl') {
      $.get("/ConnectBX/lib/actions.php?action=change_language&language="+language)
      .done(function (is_change)
      {
        if (is_change)
          // console.log(is_change);
          location.reload(true);
        else
          show_dialog(messages.unknown_error);
      })
      .fail(function ()
      {
        show_dialog(messages.unknown_error);
      });
    }
  });
</script>
