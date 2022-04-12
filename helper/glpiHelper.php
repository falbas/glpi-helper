<?php
namespace glpiHelper {
  class glpiHelper {
    public $sessionToken = "";
    public $appToken = "";
    private $host = "";

    function __construct($apihost) {
      $this->host = $apihost;
    }

    function request(string $method, string $url, array $header = [], array $payload = []) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge(array("Content-Type: application/json", "App-Token: ".$this->appToken), $header));
      if ($method == "POST" || $method == "PUT") {
        $payload = json_encode($payload);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
      }

      $output = curl_exec($ch);
      curl_close($ch);
      $output = json_decode($output, TRUE);
      return $output;
    }

    function initSessionBasic(string $login, string $password, string $appToken = "") {
      $this->appToken = $appToken;
      $output = $this->request(
        "GET",
        $this->host."/initSession",
        array("Authorization: Basic ".base64_encode($login.":".$password))
      );
      if (isset($output["session_token"])) {
        $this->sessionToken = $output["session_token"];
      }
      return $output;
    }

    function initSessionWithUserToken(string $userToken, string $appToken = "") {
      $this->appToken = $appToken;
      $output = $this->request(
        "GET",
        $this->host."/initSession",
        array("Authorization: user_token ".$userToken)
      );
      if (isset($output["session_token"])) {
        $this->sessionToken = $output["session_token"];
      }
      return $output;
    }

    function killSession() {
      $output = $this->request(
        "GET",
        $this->host."/killSession",
        array("Session-Token: ".$this->sessionToken)
      );
      return $output;
    }

    function getAllItem(string $itemType) {
      $output = $this->request(
        "GET",
        $this->host."/".$itemType,
        array("Session-Token: ".$this->sessionToken)
      );
      return $output;
    }

    function getItem(string $itemType, int $id) {
      $output = $this->request(
        "GET",
        $this->host."/".$itemType."/".$id,
        array("Session-Token: ".$this->sessionToken)
      );
      return $output;
    }

    function searchItems(string $itemType, array $criteria, int $forcedisplay) {
      $params = "";
      for ($i=0; $i<count($criteria); $i++) {
        for ($j=0; $j<count($criteria[$i]); $j++) {
          $params = $params."criteria[".$i."][".$criteria[$i][$j][0]."]=".$criteria[$i][$j][1]."&";
        }
      }
      $params = $params."forcedisplay[0]=".$forcedisplay;
      $output = $this->request(
        "GET",
        $this->host."/search/".$itemType."?".$params,
        array("Session-Token: ".$this->sessionToken),
      );
      return $output;
    }

    function addItem(string $itemType, array $input) {
      $output = $this->request(
        "POST",
        $this->host."/".$itemType,
        array("Session-Token: ".$this->sessionToken),
        array("input"=>$input)
      );
      return $output;
    }

    function updateItem(string $itemType, int $id, array $input) {
      $output = $this->request(
        "PUT",
        $this->host."/".$itemType."/".$id,
        array("Session-Token: ".$this->sessionToken),
        array("input"=>$input)
      );
      return $output;
    }

    function deleteItem(string $itemType, int $id) {
      $output = $this->request(
        "DELETE",
        $this->host."/".$itemType."/".$id,
        array("Session-Token: ".$this->sessionToken)
      );
      return $output;
    }
  }
}
