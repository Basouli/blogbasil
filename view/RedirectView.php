<div class="relative w-full h-full bg-gray-700 p-24 lg:p-4 text-white text-4xl lg:text-sm">
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
          $usedLang = $_SESSION['lang'];
          echo '<option value="' . $usedLang['libelle'] . '" class=text-lg lg:text-base">' . $usedLang['libelleShort'] . '</option>';
          foreach ($this->langs as $l) {
              if ($l['libelle'] != $usedLang['libelle']) {
                  echo '<option value="' . $l['libelle'] . '" class="text-lg lg:text-base">' . $l['libelleShort'] . '</option>';
              }
          }
          ?>
        </select>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="w-full lg:w-1/4 flex flex-col justify-center items-center bg-gray-600 space-y-12 lg:space-y-2 rounded-2xl lg:rounded-lg shadow-2xl p-8 lg:p-4">
        <?php echo $contentToShow; ?>
    </div>

  </div>
</div>
