<div id="colorFrame" class="hidden relative w-full h-full flex flex-col space-y-8 lg:space-y-4">

  <div class="w-full h-full flex flex-col space-y-8 lg:space-y-2 p-8 lg:p-6">
    <!-- WHITE GRAY BLACK -->
    <div class="w-full h-full flex flex-row space-x-8 lg:space-x-4">
      <span class="w-full h-full rounded-xl bg-white"></span>
      <span class="w-full h-full rounded-xl bg-gray-400"></span>
      <span class="w-full h-full rounded-xl bg-gray-500"></span>
      <span class="w-full h-full rounded-xl bg-gray-800"></span>
      <span class="w-full h-full rounded-xl bg-gray-900"></span>
    </div>

    <!-- ALL COLORS -->
    <?php
    $colors = array("bg-red-", "bg-pink-", "bg-purple-", "bg-indigo-", "bg-sky-", "bg-emerald-", "bg-lime-", "bg-amber-");
    for ($color = 0; $color < count($colors); $color++) {
        echo '<div class="w-full h-full flex flex-row space-x-8 lg:space-x-4">';
        for ($tints = 4; $tints < 10; $tints++) {
            if ($tints == 7) {
                $tints = 8;
            }
            echo '<span data-color="' . $colors[$color] . $tints . '00" class="colorChooser w-full h-full rounded-xl cursor-pointer ' . $colors[$color] . $tints . '00"></span>';
        }
        echo '</div>';
    }
    ?>
  </div>

  <!-- BOTTOM BUTTONS -->
  <div id="colorChooserBackBtn" class="w-full flex flex-row justify-center">
    <p class="rounded-full w-1/2 text-center py-6 lg:py-2 bg-indigo-600"><?php echo BACK; ?></p>
  </div>

</div>
