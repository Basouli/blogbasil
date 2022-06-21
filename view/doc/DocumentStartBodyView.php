<?php
//
// TITLE
if (isset($pageTitle)) {
    echo '<title>' . $pageTitle . '</title>';
} else {
    echo '<title>' . APPNAME . '</title>';
}
//OTHER META HEAD
if (isset($headParams)) {
    foreach ($headParams as $headParam) {
        echo $headParam;
    }
}
?>
</head>

<body id="body" class="relative w-full h-full">
