</div>
</main>
<footer class="page-footer green">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Suis-nous sur Facebook !</h5>
        <a href="https://www.facebook.com/connectbx/"><img src="../img/icon-facebook.jpg" height="25" width="25"></a>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Pages</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="//dev.connectbx.be/home">Accueil</a></li>
          <li><a class="grey-text text-lighten-3" href="//dev.connectbx.be/map">Assos' Map</a></li>
          <li><a class="grey-text text-lighten-3" href="//dev.connectbx.be/events">Événements</a></li>
          <li><a class="grey-text text-lighten-3" href="<?= home_url(); ?>">Blog</a></li>
          <li><a class="grey-text text-lighten-3" href="//dev.connectbx.be/about">À propos</a></li>
          <li><a class="grey-text text-lighten-3" href="//dev.connectbx.be/contact">Contact</a></li>
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

<?php wp_footer(); ?>

</body>
</html>