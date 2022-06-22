<div class="relative w-full h-full bg-gray-700 text-white text-4xl lg:text-sm flex flex-col">

  <?php include_once './view/element/header.php'; ?>

  <div class="relative w-full h-full flex flex-col justify-center items-center overflow-hidden">

    <!-- CONTENT -->
    <div class="relative w-full h-full flex flex-col justify-center items-center space-y-12 lg:space-y-6 rounded-2xl lg:rounded-lg">
      <form id="formcreatearticle" class="relative w-full lg:w-3/4 flex flex-col items-center space-y-20 lg:space-y-6 p-12 lg:p-6 bg-gray-600 shadow-2xl rounded-2xl z-10 text-5xl lg:text-sm"
      action="index.php?c=Manage&a=updateGeneric&type=<?php echo get_class($element); ?>"
      method="post"
      enctype="multipart/form-data">

        <div class="w-full flex flex-col justify-cenetr items-center space-y-10 lg:space-y-4">
          <?php
          $attributHidden = array("lang", "categorieNom", "commentaires", "nomUtilisateur");

          foreach ($element->jsonSerialize() as $key => $attribut) {
            if (!in_array($key, $attributHidden)) {
              if ($key == "id") {
                echo '<div class="w-full ' . TITLE . ' flex flex-col items-center space-y-2 lg:space-y-1">
                  <p>' . $key . ' (Non Modifiable)</p>
                  <input readonly class="bg-gray-400 border-2 border-gray-400 w-full p-1 text-black font-normal" type="text" name="submit' . $key . '" value="' . $attribut . '"></input>
                </div>';
              } else {
                echo '<div class="w-full ' . TITLE . ' flex flex-col items-center space-y-2 lg:space-y-1">
                  <p>' . $key . '</p>
                  <input class="border-2 w-full p-1 text-black font-normal" type="text" name="submit' . $key . '" value="' . $attribut . '"></input>
                </div>';
              }
            }
          }
          ?>
        </div>

        <!-- ACTION BTN -->
        <div class="w-full flex flex-row justify-center">
          <input name="submit" type=submit class="py-6 px-10 lg:py-2 lg:px-6 text-center bg-indigo-500 hover:bg-indigo-600 rounded-2xl lg:rounded-xl cursor-pointer" value="Valider" />
        </div>

      </form>
    </div>

  </div>

  <?php include_once './view/element/footer.php'; ?>

</div>
