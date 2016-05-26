<?php
  /* Cartrolando FC - http://cartrolandofc.com
   * https://github.com/wgenial/cartrolandofc
   * Desenvolvido por WGenial - http://wgenial.com.br
   * License: MIT <http://opensource.org/licenses/mit-license.php> - see LICENSE file
   */

  header('Content-type: application/json');

  if (isset($_GET["api"]) and $_GET["api"] !== "") {

    if ($_GET["api"] === "busca-time") {
      $url = "https://api.cartolafc.globo.com/times?q=". rawurlencode($_GET["team"]);
    } else if ($_GET["api"] === "busca-atletas") {
      $url = "https://api.cartolafc.globo.com/time/". $_GET["team_slug"];
    } else if ($_GET["api"] === "parciais-atletas") {
      $url = "https://api.cartolafc.globo.com/atletas/pontuados";
    } else if ($_GET["api"] === "mercado-status") {
      $url = "https://api.cartolafc.globo.com/mercado/status";
    }

    $c = curl_init();
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_URL, $url);
    $result = curl_exec($c);
    curl_close($c);
    echo $result;
  }
?>
