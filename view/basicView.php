<div class="relative w-full h-full bg-gray-700 text-white text-4xl lg:text-sm flex flex-col">
<?php include_once './view/element/header.php'; ?>
  <div class="relative w-full h-full flex flex-col justify-center items-center">

    <!-- TITLE -->
    <div class="absolute left-0 top-0 lg:top-8 w-full flex flex-col items-center">
      <h1 class="text-6xl lg:text-2xl"><?php echo APPNAME ?></h1>
      <p class="text-gray-400"><?php echo VERSION; ?></p>
    </div>

    <!-- CONTENT -->
    <div class="w-full flex flex-col justify-center items-center space-y-12 lg:space-y-6 rounded-2xl lg:rounded-lg">
      <?php echo $content; ?>
    </div>

    <!-- NAVBAR -->
    <div class="absolute left-0 lg:left-1/2 lg:-translate-x-1/2 bottom-0 w-full lg:w-1/4 flex flex-row justify-evenly space-x-8"> <!-- lg:bottom-8 -->
      <?php
      if (in_array('contact', $navButtons)) {
          writeBtn("?c=Information&a=contacter", CONTACT);
      }
      if (in_array('connexion', $navButtons)) {
          writeBtn("?c=Connexion&a=identification", CONNECT);
      }
      if (in_array('rgpd', $navButtons)) {
          writeBtn("?c=Information&a=rgpd", LEGALS);
      }
      if (in_array('back', $navButtons)) {
          writeBtn("?c=Home&a=run", BACK);
      }

      function writeBtn($href, $txt) {
          echo '<a href="' . $href . '" class="flex flex-row justify-center items-center py-6 lg:py-1 px-2 rounded-full bg-indigo-600 flex-1 text-center shadow-xl cursor-pointer">
                    <p>' . $txt . '</p>
                </a>';
      }
      ?>
    </div>

  </div>
  <?php include_once './view/element/footer.php'; ?>
</div>
