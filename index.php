<?php
  if (session_status() == PHP_SESSION_NONE)
  session_start();

  if(!isset($_SESSION['language']) || empty($_SESSION['language']))
    $_SESSION['language'] = 'fr';

  header('Location: home');
?>