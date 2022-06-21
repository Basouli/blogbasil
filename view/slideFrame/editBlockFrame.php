<div id="blockFrame" class="hidden relative h-full w-full flex flex-col text-5xl lg:text-base">

  <!-- TITLE AND DELETE BTN -->
  <div id="deleteBlockSection" class="relative w-full flex flex-row justify-start mb-12">
    <div id="deleteBlockBtn" data-listid="" class="flex flex-row justify-center items-center p-4 lg:p-1.5 bg-indigo-600 rounded-full border-8 border-gray-700 text-white cursor-pointer" style="z-index:99">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 lg:h-5 lg:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
      </svg>
    </div>
    <div id="deleteBlockConfirmFrame" class="hidden absolute right-0 top-O w-full flex flex-col items-center space-y-12 rounded-2xl bg-gray-500 p-12 shadow-2xl" style="z-index:98">
      <p><?php echo DELETE; ?> ?</p>
      <div class="w-full flex flex-row items-center justify-evenly">
        <div id="cancelDeleteBlock" class="bg-gray-400 rounded-2xl p-4">
          <p><?php echo CANCEL; ?></p>
        </div>
        <div id="confirmDeleteBlock" class="relative bg-red-500 rounded-2xl p-4">
          <p class="opacity-0"><?php echo DELETE; ?></p>
          <p id="confirmDeleteBlockStatus" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"><?php echo DELETE; ?></p>
        </div>
      </div>
    </div>
    <p id="blockTitle" class="absolute w-full h-full flex justify-center items-center text-center font-semibold text-gray-200"></p>
  </div>

  <div id="blockFrame-Container" class="w-full h-full">

    <!-- DETAILS -->
    <div id="blockFrame-Details" class="w-full h-full flex flex-col justify-center space-y-12 lg:space-y-4">
      <div class="w-full h-full flex flex-col justify-center">
        <!-- DESCRIPTION -->
        <div class="w-full flex flex-col items-center justify-center space-y-4 lg:space-y-1">
          <p><?php echo DESCRIPTION; ?></p>
          <span class="w-full rounded-2xl lg:rounded-xl bg-gray-800 bg-opacity-30 border border-gray-800 p-8 lg:p-4">
            <p id="blockDescription" class="text-4xl lg:text-sm"></p>
          </span>
        </div>
      </div>
      <!-- BUTTONS -->
      <div class="w-full flex flex-row space-x-16 lg:space-4">
        <div id="backBlockBtn" class="w-full flex justify-center items-center p-6 lg:p-2 bg-gray-600 rounded-full cursor-pointer">
          <p><?php echo BACK; ?></p>
        </div>
        <div id="updateBlockBtn" data-listid="" class="w-full flex justify-center items-center p-6 lg:p-2 bg-indigo-600 rounded-full cursor-pointer">
          <p><?php echo MODIFY; ?></p>
        </div>
      </div>
    </div>

    <!-- MODIFICATION / ADD -->
    <div id="blockFrame-Editor" class="hidden w-full h-full flex flex-col justify-center space-y-20 lg:space-y-4">

      <div class="relative w-full h-full rounded-2xl lg:rounded-xl bg-gray-800 bg-opacity-30">
        <div class="absolute top-0 left-0 w-full h-full flex flex-col space-y-12 lg:space-y-4 p-8 lg:p-2 overflow-y-scroll">

          <!-- TITLE -->
          <div class="w-full flex flex-col items-center justify-center space-y-2 lg:space-y-1">
            <p><?php echo TITLE; ?></p>
            <div class="w-full bg-gray-500 py-3 lg:p-2 flex flex-row justify-center rounded-full">
              <input id="finalBlockTitle" class="text-center bg-gray-500 rounded-full" type="text" maxlength="25" placeholder="<?php echo DEFAULT_BLOCK_TITLE; ?>" />
            </div>
          </div>

          <!-- DESCRIPTION -->
          <div class="w-full flex flex-col items-center justify-center space-y-2 lg:space-y-1">
            <p><?php echo DESCRIPTION; ?></p>
            <textarea id="finalBlockDescription" class="bg-gray-500 rounded-3xl lg:rounded-xl w-full p-8 lg:p-2 font-normal text-4xl lg:text-base" type="text" rows="10"></textarea>
          </div>

          <!-- TYPE -->
          <div class="w-full flex flex-col items-center justify-center space-y-3 lg:space-y-1">
            <p><?php echo TYPE; ?></p>
            <div class="relative w-full text-5xl lg:text-base">
              <select id="blockTypeSelect" class="w-full bg-gray-500 py-3 lg:py-0 cursor-pointer rounded-full border-8 border-gray-500">
                <option id="simple" value="simple" class="text-xl lg:text-base"><?php echo BLOCK_TYPE_SIMPLE; ?></option>
                <option id="date" value="date" class="text-xl lg:text-base"><?php echo BLOCK_TYPE_DATE; ?></option>
                <option id="recurring" value="recurring" class="text-xl lg:text-base"><?php echo BLOCK_TYPE_RECURRING; ?></option>
                <option id="check" value="check" class="text-xl lg:text-base"><?php echo BLOCK_TYPE_CHECK; ?></option>
              </select>
              <span class="absolute h-full right-8 top-0 flex flex-col items-center justify-center z-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 lg:h-6 lg:w-6" viewBox="0 0 20 20" fill="white">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </span>
            </div>
          </div>

          <div id="dateDiv" class="hidden w-full flex flex-col items-center justify-center space-y-2 lg:space-y-1">
            <p><?php echo DATE; ?></p>
            <input id="dateBlock" class="w-full text-center text-white rounded-full pl-28 pr-8 py-3 lg:p-2 bg-gray-500" type="date" name="date">
          </div>

          <div id="recurringDiv" class="hidden w-full flex flex-col items-center justify-center space-y-2 lg:space-y-1">
            <p><?php echo RECURRING; ?></p>
            <input id="recurringBlock" value="1" class="w-full text-center text-white rounded-full px-8 py-3 lg:p-2 bg-gray-500" type="number" name="recurence" min="1" max="730">
          </div>

          <!-- COULEUR -->
          <div class="w-full flex flex-col items-center justify-center space-y-3 lg:space-y-1">
            <p><?php echo COLOR; ?></p>
            <div class="w-full flex flex-row space-x-4">

              <div id="parentColorBtn" data-color="bg-gray-500" class="relative bg-gray-500 px-8 lg:py-0 lg:px-4 flex flex-row justify-center rounded-full">
                <p class="opacity-0">X</p>
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-1/2 -translate-y-1/2 h-12 w-12 lg:h-4 lg:w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>

              <div id="finalBlockColor" data-color="bg-gray-500" class="relative w-full bg-gray-500 py-5 lg:p-2 flex flex-row justify-center rounded-full">
                <p id="finalBlockColorText" class=""><?php echo DEFAULT_COLOR; ?></p>
                <div class="absolute top-0 w-full h-full rounded-full" style="border: 0.6rem solid #6b7280;"></div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- BUTTONS -->
      <div class="w-full flex flex-row space-x-16 lg:space-4">
        <div id="cancelBlockBtn" class="w-full flex justify-center items-center p-6 lg:p-2 bg-gray-600 rounded-full cursor-pointer">
          <p><?php echo CANCEL; ?></p>
        </div>
        <div id="createBlockBtn" href="?c=Home&a=run" class="w-full flex justify-center items-center p-6 lg:p-2 bg-indigo-600 rounded-full cursor-pointer">
          <p><?php echo CREATE; ?></p>
        </div>
        <div id="confirmUpdateBlockBtn" class="hidden w-full flex justify-center items-center p-6 lg:p-2 bg-indigo-600 rounded-full cursor-pointer">
          <p><?php echo MODIFY; ?></p>
        </div>
      </div>

    </div>

  </div>
</div>
