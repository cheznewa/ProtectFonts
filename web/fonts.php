<?php
session_start();
define("BASE_FOLDER",dirname($_SERVER["SCRIPT_NAME"]));
define("SITE_ROOT",pathinfo($_SERVER["SCRIPT_FILENAME"],PATHINFO_DIRNAME));
define("SITE_URL",rtrim("http://".$_SERVER["HTTP_HOST"].BASE_FOLDER,"/"));
define("SITE_HOST",parse_url(SITE_URL,PHP_URL_HOST));
if ((isset($_SESSION["font_access_key"]) && isset($_SESSION["font_access_token"]) && isset($_GET["font"]) && isset($_GET[$_SESSION["font_access_key"]]) && (isset($_SERVER["HTTP_REFERER"])&& $_GET[$_SESSION["font_access_key"]] == $_SESSION["font_access_token"] && parse_url($_SERVER["HTTP_REFERER"],PHP_URL_HOST) == SITE_HOST)) || ((isset($_SESSION["font_access_key_sec"]) && isset($_SESSION["font_access_token_sec"]) && isset($_GET["font"]) && isset($_GET[$_SESSION["font_access_key_sec"]]) && isset($_SERVER["HTTP_REFERER"])&& $_GET[$_SESSION["font_access_key_sec"]] == $_SESSION["font_access_token_sec"] && parse_url($_SERVER["HTTP_REFERER"],PHP_URL_HOST) == SITE_HOST)))
{
if (file_exists("../fonts/".basename($_GET['font'])))
{
header("Content-Type:application/octet-stream");
readfile("../fonts/".basename($_GET['font']));
}
else
{
header("HTTP/1.0 404 Not Found");
}
}
else
{
header("HTTP/1.0 403 Forbidden");
}
unset($_SESSION['font_access_key'],$_SESSION['font_access_token']);
