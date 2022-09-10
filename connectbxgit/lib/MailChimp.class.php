<?php

class MailChimp
{
  private $_list = '719f515784';
  private $_username = 'Hkhiel';
  private $_apikey = '45575ae53f4ddb85c7207569cdc8ceaa-us17';
  private $_base_url = 'https://us17.api.mailchimp.com/3.0/';

  public function add_subscriber($email)
  {
    $endpoint = 'lists/'.$this->_list.'/members/';
    $curl_url = $this->_base_url.$endpoint;
    $curl_body = json_encode(
      array(
        "email_address" => $email,
        "status" => "subscribed"
      )
    );

    try
    {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
        CURLOPT_USERPWD => $this->_username.':'.$this->_apikey,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER => array('Content-Type:application/json'),
        CURLOPT_URL => $curl_url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $curl_body
      ));

      $curl_response = curl_exec($curl);
      curl_close($curl);

      return $curl_response;
    }
    catch (PDOException $e)
    {
      return $e;
    }
  }
}
