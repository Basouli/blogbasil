<div class="relative min-h-full w-full px-24 lg:px-0 pt-40 pb-52 lg:py-12 bg-gray-700 flex flex-col text-5xl lg:text-base justify-center items-center text-white">

    <div class="relative w-full lg:w-1/4 flex flex-col items-center space-y-20 lg:space-y-6 p-12 lg:p-6 bg-gray-600 shadow-2xl rounded-2xl">

      <!-- LANG --------------------------------------------------------------------------------------------------------------------------------------------------------- LANG -->
      <div class="w-full flex flex-col items-center justify-center bg-indigo-600 rounded-3xl lg:rounded-xl py-6 px-12 lg:py-2">
        <p id="langBtn" class="w-full text-center cursor-pointer">Changer Langue</p>
        <div class="w-full flex flex-col items-center overflow-hidden cursor-pointer space-y-6 max-h-0" style="transition-property: max-height; transition-duration: 1s;">

          <div class="w-full flex flex-col space-y-12 py-6">
            <span class="w-full h-px bg-white"></span>

            <div class="w-full flex flex-row bg-indigo-600 px-8 lg:px-4 py-2 lg:py-1 border-4 lg:border-2 border-indigo-400 rounded-full cursor-pointer">
              <div class="flex justify-center items-center h-16 w-16">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                </svg>
              </div>

              <select id="lang" name="lang" class="w-full bg-indigo-600 px-1 cursor-pointer">
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

            <span></span>

            <span id="newLangConfirm" class="w-full flex flex-row justify-center py-4 rounded-full bg-white border-4 border-white">
              <p class="text-indigo-600 font-semibold">Changer</p>
            </span>
          </div>

        </div>
      </div>

      <!-- LOGIN --------------------------------------------------------------------------------------------------------------------------------------------------------- LOGIN -->
      <div class="w-full flex flex-col items-center justify-center bg-indigo-600 rounded-3xl lg:rounded-xl py-6 px-12 lg:py-2">
        <p id="loginBtn" class="w-full text-center cursor-pointer">Changer Login</p>
        <div class="w-full flex flex-col items-center overflow-hidden cursor-pointer space-y-6 max-h-0" style="transition-property: max-height; transition-duration: 1s;">

          <div class="w-full flex flex-col space-y-12 py-6">
            <span class="w-full h-px bg-white"></span>

            <div class="w-full flex flex-col items-center space-y-2 lg:space-y-0">
              <p><?php echo "Nouvel " . LOGIN; ?></p>
              <input class="border-2 w-full p-1 text-black font-normal" type="text" placeholder="test" name="newLogin" value="" style="color:black; -webkit-text-fill-color: #000"></input>
            </div>

            <div class="w-full flex flex-col items-center space-y-2 lg:space-y-0">
              <p><?php echo PASSWORD; ?></p>
              <input class="border-2 w-full p-1 text-black font-normal" type="password" name="password" required style="color:black; -webkit-text-fill-color: #000">
            </div>

            <span></span>

            <span id="newLoginConfirm" class="w-full flex flex-row justify-center py-4 rounded-full bg-white border-4 border-white">
              <p class="text-indigo-600 font-semibold">Changer</p>
            </span>
          </div>

        </div>
      </div>

      <!-- PASSWORD --------------------------------------------------------------------------------------------------------------------------------------------------------- PASSWORD -->
      <div class="w-full flex flex-col items-center justify-center bg-indigo-600 rounded-3xl lg:rounded-xl py-6 px-12 lg:py-2">
        <p id="passwordBtn" class="w-full text-center cursor-pointer">Changer Mot de passe</p>
        <div class="w-full flex flex-col items-center overflow-hidden cursor-pointer space-y-6 max-h-0" style="transition-property: max-height; transition-duration: 1s;">

          <div class="w-full flex flex-col space-y-12 py-6">
            <span class="w-full h-px bg-white"></span>

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

            <span></span>

            <span id="newPasswordConfirm" class="w-full flex flex-row justify-center py-4 rounded-full bg-white border-4 border-white">
              <p class="text-indigo-600 font-semibold">Changer</p>
            </span>
          </div>

        </div>
      </div>

      <!-- MAIL -->
      <div class="w-full flex flex-col items-center justify-center bg-indigo-600 rounded-3xl lg:rounded-xl py-6 px-12 lg:py-2">
        <p id="mailBtn" class="w-full text-center cursor-pointer">Changer l'adresse Mail</p>
        <div class="w-full flex flex-col items-center overflow-hidden cursor-pointer space-y-6 max-h-0" style="transition-property: max-height; transition-duration: 1s;">

          <div class="w-full flex flex-col space-y-12 py-6">
            <span class="w-full h-px bg-white"></span>

            <div class="w-full flex flex-col items-center space-y-2 lg:space-y-0">
              <p><?php echo "Nouvelle " . MAIL; ?></p>
              <input class="border-2 w-full p-1 text-black font-normal" type="text" placeholder="test" name="newLogin" value="" style="color:black; -webkit-text-fill-color: #000"></input>
            </div>

            <div class="w-full flex flex-col items-center space-y-2 lg:space-y-0">
              <p><?php echo PASSWORD; ?></p>
              <input class="border-2 w-full p-1 text-black font-normal" type="password" name="password" required style="color:black; -webkit-text-fill-color: #000">
            </div>

            <span></span>

            <span id="newMailConfirm" class="w-full flex flex-row justify-center py-4 rounded-full bg-white border-4 border-white">
              <p class="text-indigo-600 font-semibold">Changer</p>
            </span>
          </div>

        </div>
      </div>

      <!-- DATA -->
      <div class="w-full flex flex-col items-center justify-center bg-indigo-600 rounded-3xl lg:rounded-xl py-6 px-12 lg:py-2">
        <p id="dataBtn" class="w-full text-center cursor-pointer">Données</p>
        <div class="w-full flex flex-col items-center overflow-hidden cursor-pointer space-y-6 max-h-0" style="transition-property: max-height; transition-duration: 1s;">

          <div class="w-full flex flex-col space-y-12 py-6">
            <span class="w-full h-px bg-white"></span>

            <span id="newMailConfirm" class="w-full flex flex-row justify-center py-4 rounded-full bg-white border-4 border-white">
              <p class="text-indigo-600 font-semibold">TELECHARGER MES DATA</p>
            </span>
          </div>

        </div>
      </div>

      <!-- DELETE ACCOUNT -->
      <div class="w-full flex flex-col items-center justify-center bg-indigo-600 rounded-3xl lg:rounded-xl py-6 px-12 lg:py-2">
        <p id="deleteAccountBtn" class="w-full text-center cursor-pointer">Supprimer le compte</p>
        <div class="w-full flex flex-col items-center overflow-hidden cursor-pointer space-y-6 max-h-0" style="transition-property: max-height; transition-duration: 1s;">

          <div class="w-full flex flex-col space-y-12 py-6">
            <span class="w-full h-px bg-white"></span>

            <p>La suppression du compte entrainera également la suppression des listes et blocks que vous avez créés, sans aucun retour en arrière possible.</p>

            <p>Êtes vous sure de vouloir supprimer votre compte ?</p>

            <div class="w-full flex flex-col items-center space-y-2 lg:space-y-0">
              <p><?php echo PASSWORD; ?></p>
              <input class="border-2 w-full p-1 text-black font-normal" type="password" name="password" required style="color:black; -webkit-text-fill-color: #000">
            </div>

            <span id="newMailConfirm" class="w-full flex flex-row justify-center py-4 rounded-full bg-red-600">
              <p class="text-white font-semibold">Supprimer mon compte</p>
            </span>
          </div>

        </div>
      </div>

    </div>

    <div class="absolute bottom-0 w-full flex flex-row justify-center space-x-32 lg:space-x-0 lg:justify-around items-center pb-12 z-30">

        <a id="backBtn" href="?c=Home&a=run" class="flex justify-center items-center px-20 lg:px-8 py-4 lg:py-2 bg-indigo-600 rounded-full shadow-2xl hover:cursor-pointer hover:bg-indigo-700 active:bg-indigo-700">
          <p><?php echo BACK; ?></p>
        </a>

    </div>

</div>
