<form id="formRegister" class="relative w-full lg:w-1/4 flex flex-col items-center space-y-16 lg:space-y-4 p-12 lg:p-6 bg-gray-600 shadow-2xl rounded-2xl z-10"
action="index.php?c=Connexion&a=tempRegister"
method="post"
enctype="multipart/form-data">
  <!-- PSEUDO -->
  <div id="pseudo" class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-0">
    <p><?php echo LOGIN; ?></p>
    <input class="border-2 w-full p-1 text-black font-normal" type="text" name="submitLogin" required style="color:black; -webkit-text-fill-color: #000">
  </div>

  <!-- MOT DE PASSE -->
  <div id="motdepasse" class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-0">
    <p><?php echo PASSWORD; ?></p>
    <input class="border-2 w-full p-1 text-black font-normal" type="password" name="submitPassword" required style="color:black; -webkit-text-fill-color: #000">
  </div>

  <!-- MOT DE PASSE -->
  <div id="motdepasse" class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-0">
    <p><?php echo PASSWORD; ?></p>
    <input class="border-2 w-full p-1 text-black font-normal" type="password" name="submitPasswordBis" required style="color:black; -webkit-text-fill-color: #000">
  </div>

  <!-- MAIL -->
  <div id="mail" class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-0">
    <p><?php echo MAIL; ?></p>
    <input class="border-2 w-full p-1 text-black font-normal" type="mail" name="submitMail" required style="color:black; -webkit-text-fill-color: #000">
  </div>

  <!-- DROITS -->
  <div id="droits" class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-0">
    <p>Droits</p>
    <select name="selectDroits" class="border-2 w-full p-1 text-black font-normal">
      <?php foreach ($params['droits'] as $droit) {
        echo '<option value="' . $droit->getId() . '">' . $droit->getNom() . '</option>';
      }
      ?>
    </select>
  </div>

  <!-- BUTTONS -->
  <div class="w-full flex flex-row justify-between lg:pt-4">
    <!-- CANCEL BTN -->
    <a href="index.php?c=Connexion&a=identification" class="text-center flex flex-col justify-center items-center bg-gray-500 hover:bg-indigo-600 rounded-2xl lg:rounded-xl py-6 px-10 lg:py-2 lg:px-6 cursor-pointer"><?php echo CANCEL; ?></a>
    <!-- CONFIRM REGISTER BTN -->
    <input name="submitbtn" type=submit class="py-6 px-10 lg:py-2 lg:px-6 text-center bg-indigo-500 hover:bg-indigo-600 rounded-2xl lg:rounded-xl cursor-pointer" value="<?php echo REGISTER; ?>" />
  </div>

</form>
