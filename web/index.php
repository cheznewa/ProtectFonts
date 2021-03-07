<?php
session_start();
define("BASE_FOLDER",dirname($_SERVER["SCRIPT_NAME"]));
define("SITE_ROOT",pathinfo($_SERVER["SCRIPT_FILENAME"],PATHINFO_DIRNAME));
define("SITE_URL",rtrim("http://".$_SERVER["HTTP_HOST"].BASE_FOLDER,"/"));
define("SITE_HOST",parse_url(SITE_URL,PHP_URL_HOST));
$_SESSION["font_access_token"] = uniqid();
$_SESSION["font_access_key"] = uniqid();
$_SESSION["font_access_token_sec"] = uniqid();
$_SESSION["font_access_key_sec"] = uniqid();
echo "<style>@font-face{font-family:\"Oi\";src:url(\"fonts.php?font=MainFont.ttf&".$_SESSION["font_access_key"]."=".$_SESSION["font_access_token"]."\");}";
echo "h1{font-family:\"Oi\";font-weight:bold;}";
echo "@font-face{font-family:\"DotGothic16\";src:url(\"fonts.php?font=SecondaryFont.ttf&".$_SESSION["font_access_key_sec"]."=".$_SESSION["font_access_token_sec"]."\");}";
echo "body{font-family:\"DotGothic16\";}</style>";
echo "<h1>Font Example, Et Essayez De M'attraper ...</h1>";
echo "La Police D'ecriture Telle Que Vous Le Voyez, N'est Accissble Par La Charge De La Page, Hors Du Charge, Ce Sera Refusé.<br/>";
echo "Cette Protection De Police Est Basé Sur <a href=\"https://stackoverflow.com/questions/21470085/how-to-protect-webfonts\">Cette Question</a><br/>Bien Que Pour L'exemple Pas Question Utiliser Une Police Sous License/Payante, J'utilise Celui De Google Fonts.";