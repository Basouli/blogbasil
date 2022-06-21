<div id="optionFrame" data-blockid="" class="hidden relative h-full w-full flex flex-col text-4xl lg:text-base">
  <div class="w-full h-full flex flex-col justify-between">

    <p class="w-full flex justify-center items-center text-center font-semibold text-gray-500"><?php echo OPTIONS; ?></p>

    <div class="w-full h-full flex flex-col justify-center items-center space-y-20 lg:space-y-4">

        <!-- ACCOUNT MANAGEMENT -->
        <a href="index.php?c=Home&a=manageAccount" class="w-full flex flex-row justify-center py-8 lg:py-2 text-white bg-indigo-600 rounded-full cursor-pointer"> <!-- index.php?c=Information&a=account -->
          <div class="absolute left-12 w-12 h-12 lg:w-6 lg:h-6">
            <?php echo SVGUSER; ?>
          </div>
          <p>COMPTE</p>
        </a>

        <!-- CONTACT -->
      	<a href="index.php?c=Information&a=contacter" class="w-full text-center py-8 lg:py-2 text-white bg-indigo-600 rounded-full cursor-pointer"><p><?php echo CONTACT; ?></p></a>

        <!-- lEGALS -->
        <a href="index.php?c=Information&a=rgpd" class="w-full text-center py-8 lg:py-2 text-white bg-indigo-600 rounded-full cursor-pointer">Mentions Légales</a>

        <!-- DECONNEXION -->
        <a href="index.php?c=Home&a=deconnexion" class="w-full py-8 lg:py-2 flex flex-row justify-center text-white bg-red-600 rounded-full cursor-pointer">
          <div class="absolute left-12 w-12 h-12 lg:w-6 lg:h-6">
            <?php echo SVGOUT; ?>
          </div>
          <p>DECONNEXION</p>
        </a>

    </div>

    <div class="relative w-full flex flex-row space-x-16">
      <div id="cancelOptionBtn" class="w-full flex justify-center items-center py-6 lg:py-2 bg-gray-600 rounded-full cursor-pointer">
        <p><?php echo CANCEL; ?></p>
      </div>
      <div id="updateOptionBtn" data-blockid="" class="w-full flex justify-center items-center py-6 lg:py-2 bg-indigo-600 rounded-full cursor-pointer">
        <p><?php echo MODIFY; ?></p>
      </div>
    </div>

  </div>
</div>
