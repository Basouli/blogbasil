<div id="listFrame" class="hidden relative h-full w-full flex flex-col text-5xl lg:text-base">

  <!-- TITLE AND DELETE LIST -->
  <div id="deleteListSection" class="relative w-full flex flex-row justify-start mb-12">
    <div id="deleteListBtn" data-listid="" class="flex flex-row justify-center items-center p-4 lg:p-1.5 bg-indigo-600 rounded-full border-8 border-gray-700 text-white cursor-pointer" style="z-index:99">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
      </svg>
    </div>
    <div id="deleteListConfirmFrame" class="hidden absolute right-0 top-O w-full flex flex-col items-center space-y-12 rounded-2xl bg-gray-500 p-12 shadow-2xl" style="z-index:98">
      <p><?php echo DELETE; ?> ?</p>
      <div class="w-full flex flex-row items-center justify-evenly">
        <div id="cancelDeleteList" class="bg-gray-400 rounded-2xl p-4">
          <p><?php echo CANCEL; ?></p>
        </div>
        <div id="confirmDeleteList" class="relative bg-red-500 rounded-2xl p-4">
          <p class="opacity-0"><?php echo DELETE; ?></p>
          <p id="confirmDeleteListStatus" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"><?php echo DELETE; ?></p>
        </div>
      </div>
    </div>
    <p id="listTitle" class="absolute w-full h-full flex justify-center items-center text-center font-semibold text-gray-200"></p>
  </div>

  <div id="listFrame-Container" class="w-full h-full">

    <!-- DETAILS -->
    <div id="listFrame-Details" class="w-full h-full flex flex-col justify-center space-y-12 lg:space-y-4">
      <div class="w-full h-full flex flex-col justify-center space-y-16 lg:space-y-4">
        <!-- DESCRIPTION -->
        <div class="w-full flex flex-col items-center justify-center space-y-4 lg:space-y-1">
          <p><?php echo DESCRIPTION; ?></p>
          <p id="listDescription" class="w-full rounded-2xl lg:rounded-xl bg-gray-800 bg-opacity-30 border border-gray-800 p-8 lg:p-4"></p>
        </div>
        <!-- MOVE BLOCKS -->
        <form id="formMove" class="w-full flex flex-row items-center justify-center cursor-pointer"
          action="index.php?c=Home&a=move"
          method="post"
          enctype="multipart/form-data">
            <input id="moveListId" type="number" name="moveListId" class="opacity-0 h-0 w-0">
            <input type="submit" name="submit" class="w-full text-center bg-indigo-600 rounded-full p-6 lg:p-2" value="<?php echo ORDER_BLOCK; ?>">
        </form>
      </div>
      <!-- BUTTONS -->
      <div class="w-full flex flex-row space-x-16 lg:space-4">
        <div id="backListBtn" class="w-full flex justify-center items-center p-6 lg:p-2 bg-gray-600 rounded-full cursor-pointer">
          <p><?php echo BACK; ?></p>
        </div>
        <div id="updateListBtn" data-listid="" class="w-full flex justify-center items-center p-6 lg:p-2 bg-indigo-600 rounded-full cursor-pointer">
          <p><?php echo MODIFY; ?></p>
        </div>
      </div>
    </div>

    <!-- MODIFICATION / ADD -->
    <div id="listFrame-Editor" class="hidden w-full h-full flex flex-col justify-center space-y-20 lg:space-y-4">

      <div class="relative w-full h-full rounded-2xl lg:rounded-xl bg-gray-800 bg-opacity-30">
        <div class="absolute top-0 left-0 w-full h-full flex flex-col space-y-12 lg:space-y-4 p-8 lg:p-2 overflow-y-scroll">

          <!-- TITLE -->
          <div class="w-full flex flex-col items-center justify-center space-y-2 lg:space-y-1">
            <p><?php echo TITLE; ?></p>
            <div class="w-full bg-gray-500 py-3 lg:p-2 flex flex-row justify-center rounded-full">
              <input id="finalListTitle" class="text-center bg-gray-500 rounded-full" type="text" maxlength="25" placeholder="<?php echo DEFAULT_LIST_TITLE; ?>" />
            </div>
          </div>

          <!-- DESCRIPTION -->
          <div class="w-full flex flex-col items-center justify-center space-y-2 lg:space-y-1">
            <p><?php echo DESCRIPTION; ?></p>
            <textarea id="finalListDescription" class="bg-gray-500 rounded-3xl lg:rounded-xl w-full p-8 lg:p-2 font-normal text-4xl lg:text-base" type="text" rows="10"></textarea>
          </div>

          <!-- COULEUR -->
          <div class="w-full flex flex-col items-center justify-center space-y-3 lg:space-y-1">
            <p><?php echo COLOR; ?></p>
            <div id="finalListColor" data-color="bg-gray-500" class="relative w-full bg-gray-500 py-5 lg:p-2 flex flex-row justify-center rounded-full">
              <p id="finalListColorText" class="opacity-0">X</p>
              <div class="absolute top-0 w-full h-full rounded-full" style="border: 0.6rem solid #6b7280;"></div>
            </div>
          </div>

          <!-- SHOW COLOR -->
          <div class="w-full flex flex-row items-center justify-center space-x-8">
            <label for="showColor">Afficher la couleur</label>
            <input id="showColor" class="w-12 h-12 lg:h-6 lg:w-6" type="checkbox" name="showColor">
          </div>

        </div>
      </div>

      <!-- BUTTONS -->
      <div class="w-full flex flex-row space-x-16 lg:space-4">
        <div id="cancelListBtn" class="w-full flex justify-center items-center p-6 lg:p-2 bg-gray-600 rounded-full cursor-pointer">
          <p><?php echo CANCEL; ?></p>
        </div>
        <div id="createListBtn" href="?c=Home&a=run" class="w-full flex justify-center items-center p-6 lg:p-2 bg-indigo-600 rounded-full cursor-pointer">
          <p><?php echo CREATE; ?></p>
        </div>
        <div id="confirmUpdateListBtn" data-listid="" class="hidden w-full flex justify-center items-center p-6 lg:p-2 bg-indigo-600 rounded-full cursor-pointer">
          <p><?php echo MODIFY; ?></p>
        </div>
      </div>
    </div>

  </div>
</div>
