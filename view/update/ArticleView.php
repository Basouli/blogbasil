<form id="formcreatearticle" class="relative w-full lg:w-1/3 flex flex-col items-center space-y-20 lg:space-y-6 p-12 lg:p-6 bg-gray-600 shadow-2xl rounded-2xl z-10 text-5xl lg:text-sm"
action="index.php?c=Home&a=updateProfil"
method="post"
enctype="multipart/form-data">

  <div class="w-full flex flex-col justify-cenetr items-center space-y-10 lg:space-y-4">
    <!-- Login -->
    <div class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-1">
      <p>Login</p>
      <input class="border-2 w-full p-1 text-black font-normal" type="text" name="submitLogin" value="<?php echo $_SESSION['user']->getLogin(); ?>"></input>
    </div>

    <!-- Password -->
    <div class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-1">
      <p>Password</p>
      <input class="border-2 w-full p-1 text-black font-normal" type="password" name="submitPassword" placeholder="Garder ancien..." value=""></input>
    </div>

    <!-- Email -->
    <div class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-1">
      <p>Email</p>
      <input class="border-2 w-full p-1 text-black font-normal" type="mail" name="submitMail" value="<?php echo $_SESSION['user']->getMail(); ?>"></input>
    </div>

    <!-- Droits -->
    <div id="droits" class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-0">
      <p>Droits</p>
      <select name="selectDroits" class="border-2 w-full p-1 text-black font-normal hover:cursor-pointer">
        <?php
        $droits = $_SESSION['user']->getDroits();
        foreach ($params['droits'] as $d) {
          if ($d->getId() == $droits) {
            echo '<option value="' . $d->getId() . '">' . $d->getNom() . '</option>';
          }
        }
        foreach ($params['droits'] as $d) {
          if ($d->getId() != $droits) {
            echo '<option value="' . $d->getId() . '">' . $d->getNom() . '</option>';
          }
        }
        ?>
      </select>
    </div>

  </div>

  <!-- ACTION BTN -->
  <div class="w-full flex flex-row justify-center">
    <input name="submitbtn" type=submit class="py-6 px-10 lg:py-2 lg:px-6 text-center bg-indigo-500 hover:bg-indigo-600 rounded-2xl lg:rounded-xl cursor-pointer" value="Valider" />
  </div>

</form>
