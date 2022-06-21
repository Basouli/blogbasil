<?php
//
echo '<div id="alertFloatingMsg" class="fixed top-0 left-0 lg:left-1/2 lg:-translate-x-1/2 w-full lg:w-1/4 flex flex-col space-y-4 justify-center items-center text-4xl lg:text-base text-white p-4 lg:p-2" style="z-index:999">';

foreach ($_SESSION['alert'] as $alert) {
    echo '<div class="w-full flex flex-row justify-center items-center rounded-2xl bg-indigo-600 shadow-2xl p-6 lg:p-4 space-x-8 lg:space-x-4">
            ' . SVGALERT .
            '<p>' . $alert . '</p>
        </div>';
}
echo '</div>';
//
?>

<script>
setTimeout(function() {
  document.getElementById('alertFloatingMsg').remove();
}, 5000);
</script>
