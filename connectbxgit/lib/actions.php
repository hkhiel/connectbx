<?php

  require_once 'DB.class.php';
  require_once 'MailChimp.class.php';
  require_once 'secure_input.php';

  $DB = DB::get_instance();

  $DB->open_connection();

  if (isset ($_GET['action']))
  {
    switch ($_GET['action'])
    {
      //GET + formater pour les datatables
      case "get_associations":
        echo $DB->select_all_associations();
        break;
      case "get_events":
        echo json_encode($DB->select_all_events());
        break;
      case "add_message":
        add_message();
        break;
      case "add_subscriber":
        echo add_subscriber();
        break;
      case "change_language" :
        $language = secure_input($_GET['language']);
        if($language == 'fr' || $language == 'nl') {
          if(!isset($_SESSION["language"]) || empty($_SESSION["language"])){
            session_start();
          }
          $_SESSION['language'] = $language;
          echo true;
        }
        else
          echo false;
    }
  }

  $DB->close_connection();

function add_subscriber()
{
  if (isset($_GET['email']))
  {
    $MailChimp = new MailChimp();
    return $MailChimp->add_subscriber($_GET['email']);
  }
  else
    return null;
}
function add_message()
{
  if (
    isset($_GET['firstname']) &&
    isset($_GET['lastname']) &&
    isset($_GET['email']) &&
    isset($_GET['subject']) &&
    isset($_GET['message'])
  )
  {

    global $DB;

    $created_on = date('Y-m-d H:i:s');

    $to = "majda.sahloumi@gmail.com";
    $subject = secure_input($_GET['subject']);
    $txt = secure_input($_GET['message']);
    $headers = 'From: '.secure_input($_GET['email']);

    mail($to,$subject,$txt,$headers);

    echo $DB->add_message
    (
      secure_input($_GET['firstname']),
      secure_input($_GET['lastname']),
      secure_input($_GET['email']),
      secure_input($_GET['subject']),
      secure_input($_GET['message']),
      $created_on
    );

  }
  else
    echo null;
}

?>