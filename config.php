<?php
  define('ROOT', dirname(__FILE__));

  function load_head()
  {
    require_once ROOT.'/views/partial_views/items/head.php';
  }

  function load_navbar()
  {
    require_once ROOT.'/views/partial_views/items/navbar.php';
  }

  function load_footer()
  {
    require_once ROOT.'/views/partial_views/items/footer.php';
  }

  function load_DB_class()
  {
    require_once ROOT.'/lib/DB.class.php';
  }

  function load_secure_input()
  {
    require_once ROOT.'/lib/secure_input.php';
  }

  function load_language() {
    $languages_array = file_get_contents(ROOT.'/languages.json');
    $languages_array = json_decode($languages_array, true);

    if (session_status() == PHP_SESSION_NONE)
      session_start();

    if(!isset($_SESSION["language"]) || empty($_SESSION["language"]))
      $_SESSION["language"] = "fr";

    if($_SESSION["language"] == "nl")
      $text = $languages_array["nl"];
    else
      $text = $languages_array["fr"];


    return $text;
  }

?>
