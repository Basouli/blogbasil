<?php
//
// CHARGEMENT CONFIG.XML //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$xmldata = simplexml_load_file("./include/config.xml") or die ("Failed to load config.xml");

define('STYLE', $xmldata->apparence[0]->theme);
define('FAVICON', $xmldata->apparence[0]->favicon);

require_once './include/variables/' . STYLE . 'Style.php';

//Email du webmaster
define('WEBMASTER', 'Basil COLLETTE');
define('MAIL_WEBMASTER', 'basil.collette@outlook.fr');


date_default_timezone_set('Europe/Paris');
//
?>
