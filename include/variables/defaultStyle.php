<?php
//
//ENVIRONNEMENT dev/prod
require_once './include/variables/env.php';

define ('ERROR_MSG_TIME', 5000);

//STRINGS
define('APPNAME', 'Blog - La Plateforme');
define('VERSION', 'v1.0');

//COLORS
define('BACKGROUND', 'bg-gray-700');
define('ACTION', 'bg-indigo-600');
define('ACTION-PRESSED', 'bg-indigo-700');

//TAILWIND ______________________________________________________________________________________________ TAILWIND//
define('BODY', 'relative w-full h-full flex flex-col justify-center items-center');
define('BG', 'bg-gray-200');
define('DARK-BG', 'bg-gray-700');
define('WINDOW', 'shadow-2xl rounded-lg flex justify-center items-center py-8 px-12 lg:py-4 lg:px-8');

//define('TITLE', 'text-5xl lg:text-lg font-medium');
define('SUBTITLE', 'text-4xl lg:text-base font-medium');
define('CONTENTMARGIN', 'mx-12 lg:mx-96');

define('BUTTON', 'text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none');
define('CLICKABLE', 'underline hover:text-indigo-500');
define('ATEXT', 'underline hover:text-indigo-500');

//SVG ____________________________________________________________________________________________________ SVG //
require_once './include/variables/svg.php';

define('THEME', 'bg-gray-700 text-white');
define('SUBTHEME', 'bg-gray-600');
define('PADDING', 'py-8 px-12 lg:py-4 lg:px-8');
//
?>
