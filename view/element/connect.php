<form id="formconnect" class="relative w-full lg:w-1/4 flex flex-col items-center space-y-20 lg:space-y-6 p-12 lg:p-6 bg-gray-600 shadow-2xl rounded-2xl z-10 text-5xl lg:text-sm"
action="index.php?c=Connexion&a=connect"
method="post"
enctype="multipart/form-data">

  <div class="w-full flex flex-col justify-cenetr items-center space-y-10 lg:space-y-4">
    <!-- PSEUDO -->
    <div id="pseudo" class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-1">
      <p><?php echo LOGIN; ?></p>
      <input class="border-2 w-full p-1 text-black font-normal" type="text" name="submitLogin" style="color:black; -webkit-text-fill-color: #000">
    </div>

    <!-- MOT DE PASSE -->
    <div id="motdepasse" class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-1">
      <p><?php echo PASSWORD; ?></p>
      <input class="border-2 w-full p-1 text-black font-normal" type="password" name="submitPassword" style="color:black; -webkit-text-fill-color: #000">
    </div>
  </div>

  <!-- KEEP CONNECTED -->
  <div class="w-full flex flex-row items-center justify-center space-x-8 lg:space-x-4">
    <label for="keepConnect"><?php echo KEEP_CONNECT; ?></label>
    <input class="w-12 h-12 lg:w-6 lg:h-6 cursor-pointer" type="checkbox" id="keepConnect" name="keepConnect">
  </div>

  <!-- ACTION BTN -->
  <div class="w-full flex flex-row justify-between">
    <!-- REGISTER BTN -->
    <a href="index.php?c=Connexion&a=register" class="text-center flex flex-col justify-center items-center bg-gray-500 rounded-2xl lg:rounded-xl py-6 px-10 lg:py-2 lg:px-6"><?php echo REGISTER; ?></a>
    <!-- CONNEXION BTN -->
    <input name="submitbtn" type=submit class="py-6 px-10 lg:py-2 lg:px-6 text-center bg-indigo-600 rounded-2xl lg:rounded-xl cursor-pointer" value="<?php echo CONNECT; ?>" />
  </div>
</form>

<?php
if (isset($_GET['connexionError'])) {
    $connexionError = filter_input(INPUT_GET, 'connexionError', FILTER_SANITIZE_NUMBER_INT);
    if ($connexionError == 1) {
        ?>
        <form class="relative w-full lg:w-1/4 text-center flex justify-center px-16 lg:px-4 py-8 lg:py-2 bg-indigo-600 shadow-2xl rounded-2xl lg:rounded-xl z-10 cursor-pointer"
        action="index.php?c=Connexion&a=cannotConnect"
        method="post"
        enctype="multipart/form-data">

          <input type="submit" name="submitCannotConnect" class="text-4xl lg:text-base text-center underline cursor-pointer" value="<?php echo CANNOT_CONNECT; ?>" />
        </form>
        <?php
    }
}
?>
