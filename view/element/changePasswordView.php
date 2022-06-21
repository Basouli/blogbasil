<form id="formconnect" class="relative w-full lg:w-1/4 flex flex-col items-center space-y-20 lg:space-y-6 p-12 lg:p-6 bg-gray-600 shadow-2xl rounded-2xl z-10 text-5xl lg:text-sm"
action="?c=Connexion&a=changePasswordTest"
method="post"
enctype="multipart/form-data">

    <div class="w-full flex flex-col space-y-12 py-6">
      <div class="w-full flex flex-col items-center space-y-2 lg:space-y-0">
        <p><?php echo "Ancien " . PASSWORD; ?></p>
        <input class="border-2 w-full p-1 text-black font-normal" type="password" name="oldPassword" value="" style="color:black; -webkit-text-fill-color: #000"></input>
      </div>

      <div class="w-full flex flex-col items-center space-y-2 lg:space-y-0">
        <p><?php echo "Nouveau " . PASSWORD; ?></p>
        <input class="border-2 w-full p-1 text-black font-normal" type="password" name="newPassword" value="" style="color:black; -webkit-text-fill-color: #000"></input>
      </div>

      <div class="w-full flex flex-col items-center space-y-2 lg:space-y-0">
        <p><?php echo "Nouveau " . PASSWORD; ?></p>
        <input class="border-2 w-full p-1 text-black font-normal" type="password" name="newPasswordBis" value="" style="color:black; -webkit-text-fill-color: #000"></input>
      </div>
    </div>

    <input name="submitMail" type=submit class="py-6 px-10 lg:py-2 lg:px-6 text-center bg-indigo-600 rounded-2xl lg:rounded-xl cursor-pointer" value="<?php echo SEND; ?>" />
</form>
