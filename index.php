<!DOCTYPE html>
<html lang="en">
<head>
  <title>IP Leak Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Expires: 0");
header("Pragma: no-cache");
?>
</head>
<body>
<div class="jumbotron">
  <div class="container text-center">
    <h1>IP Information</h1>      
    <p>
<?php 
switch ($_SERVER["HTTP_CF_CONNECTING_IP"]) {
    case "216.245.220.14":
    case "185.61.149.116":
    case "142.44.133.83":
    case "51.15.2.172":
    case "95.215.44.147":
    case "185.225.17.101":
    case "205.185.122.55":
        echo "You are connected to SigaVPN";
        break;
    default:
        echo "<b><font color='red'>You are not connected to SigaVPN</font></b>";
}
?>
</p>
  </div>
</div>
<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p><b>IP Address</b></p>
	<p><?php echo $_SERVER["HTTP_CF_CONNECTING_IP"]; ?></p>
    </div>
    <div class="col-sm-3"> 
      <p><b>Country</b></p>
        <p><?php echo $_SERVER["HTTP_CF_IPCOUNTRY"]; ?></p>    
</div>
    <div class="col-sm-3"> 
      <p><b>User Agent</b></p>
        <p><?php echo $_SERVER['HTTP_USER_AGENT']; ?>
</p>    
</div>
    <div class="col-sm-3">
      <p><b>ISP</b></p>
	<p>
<?php
$ipaddress = $_SERVER["HTTP_CF_CONNECTING_IP"];
function ip_details($ip) {
    $json = file_get_contents("http://ipinfo.io/{$ip}/json");
    $details = json_decode($json); 
    return $details;
}
$details = ip_details($ipaddress);
echo $details->org;
?>
</p>
    </div>
  </div>
</div><br>
</body>
</html>

