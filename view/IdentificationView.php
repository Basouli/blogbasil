<div class="relative w-full h-full bg-gray-700 flex flex-col justify-center items-center p-24 lg:p-0 text-5xl lg:text-base text-white">

  <div class="relative w-full h-full flex flex-col justify-center items-center">

    <!-- TITLE -->
    <div class="absolute left-0 top-0 lg:top-8 w-full flex flex-col items-center">
      <h1 class="text-6xl lg:text-2xl"><?php echo APPNAME ?></h1>
      <p class="text-gray-400"><?php echo VERSION; ?></p>
    </div>

    <!-- LANG -->
    <div class="absolute top-0 right-0 lg:top-6 lg:right-12">
      <div class="relative w-full flex flex-row bg-indigo-600 px-6 lg:px-3 py-1 lg:py-0 border-4 lg:border-2 border-indigo-400 rounded-full cursor-pointer">
        <div class="flex justify-center items-center h-16 w-16 lg:w-8 lg:h-8">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
          </svg>
        </div>

        <select id="lang" name="lang" class="w-full bg-indigo-600 px-1 cursor-pointer text-4xl lg:text-base">
          <?php
          $usedLang = json_decode($_COOKIE['lang'], true);
          echo '<option value="' . $usedLang['libelle'] . '" class=text-lg lg:text-base">' . $usedLang['libelleShort'] . '</option>';
          foreach ($langs as $l) {
              if ($l['libelle'] != $usedLang['libelle']) {
                  echo '<option value="' . $l['libelle'] . '" class="text-lg lg:text-base">' . $l['libelleShort'] . '</option>';
              }
          }
          ?>
        </select>
      </div>
    </div>

    <?php
    if ($a == 'identification') {
        require_once './view/element/connect.php';
    } else if ($a == 'register') {
        require_once './view/element/register.php';
    }

    if (isset($_GET['connexionError'])) {
        $connexionError = filter_input(INPUT_GET, 'connexionError', FILTER_SANITIZE_NUMBER_INT);
        if ($connexionError == 1) {
            require_once './view/element/connexionError.php';
        }
    }
    ?>

    <!-- CONTACT AND RGPD BTN -->
    <div class="absolute left-0 lg:left-1/2 bottom-0 lg:bottom-8 w-full lg:w-1/4 flex flex-row justify-around lg:-translate-x-1/2 space-x-28 text-4xl lg:text-base">
      <a href="index.php?c=Information&a=contacter" class="flex flex-row justify-center items-center py-4 lg:py-1 px-8 rounded-full bg-indigo-600 flex-1 shadow-xl cursor-pointer"><p><?php echo CONTACT; ?></p></a>
      <a href="index.php?c=Information&a=rgpd" class="flex flex-row justify-center py-4 lg:py-1 px-8 rounded-full bg-indigo-600 flex-1 shadow-xl cursor-pointer"><p class="text-center"><?php echo LEGALS; ?></p></a>
    </div>
  </div>

</div>
