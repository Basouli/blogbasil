<div class="relative w-full h-full bg-gray-700 text-white text-4xl lg:text-sm flex flex-col">
  <?php include_once './view/element/header.php'; ?>
  <div class="relative w-full h-full flex flex-col justify-center items-center overflow-hidden">

    <!-- CONTENT -->
    <div class="relative w-full h-full flex flex-col justify-center items-center lg:space-y-6 rounded-2xl lg:rounded-lg">
      <div class="relative h-full w-full flex flex-col justify-start items-center text-5xl lg:text-base text-white">

          <!-- nav objects -->
          <div class="relative w-full px-8 flex flex-row items-center z-20 bg-gray-400">
            <a href="?c=Manage&a=admin&elements=utilisateurs" class="px-2 py-2 hover:bg-gray-500">Utilisateurs</a>
              <span class="h-full w-px bg-gray-100"></span>
            <a href="?c=Manage&a=admin&elements=articles" class="px-2 py-2 hover:bg-gray-500">Articles</a>
              <span class="h-full w-px bg-gray-100"></span>
            <a href="?c=Manage&a=admin&elements=commentaires" class="px-2 py-2 hover:bg-gray-500">Commentaires</a>
              <span class="h-full w-px bg-gray-100"></span>
            <a href="?c=Manage&a=admin&elements=categories" class="px-2 py-2 hover:bg-gray-500">Catégories</a>
              <span class="h-full w-px bg-gray-100"></span>
            <a href="?c=Manage&a=admin&elements=droits" class="px-2 py-2 hover:bg-gray-500">Droits</a>
          </div>

          <!-- liste des objets -->
          <div class="w-full h-full p-16 overflow-y-scroll">

            <div class="w-full p-2 rounded-xl bg-gray-600">
              <table class="w-full text-center table-fixed">
                <?php
                if ($elements != null) {
                  $attributHidden = array("lang", "categorieNom", "commentaires", "nomUtilisateur", "password");

                  //Titres
                  echo '<tr>';
                    foreach ($elements[0]->jsonSerialize() as $key => $value) {
                      if (!in_array($key, $attributHidden)) {
                        echo '<th class="border-collapse border border-gray-800 bg-indigo-500">' . $key . '</th>';
                      }
                    }
                    echo '<th class=""></th><th></th>';
                  echo '</tr>';

                  //Valeurs
                  foreach ($elements as $e) {
                    echo '<tr class="">';
                      foreach ($e->jsonSerialize() as $key => $attribut) {
                        if (!in_array($key, $attributHidden)) {
                          echo '<td class="p-2 overflow-hidden text-ellipsis whitespace-nowrap bg-gray-500 border-collapse border border-gray-800">' . $attribut . '</td>';
                        }
                      }

                      echo '<td class="relative bg-orange-400 hover:bg-orange-500 cursor-pointer"><a class="absolute top-0 left-0 border border-collapse border-gray-800 flex justify-center items-center w-full h-full" href="?c=Manage&a=modify&type=' . get_class($e) . '&id=' . $e->getId() . '"><p>Modifier</p></a></td>'; //Bouton de modification

                      echo '<td class="relative bg-red-500 hover:bg-red-600 cursor-pointer"><a class="absolute top-0 left-0 border border-collapse border-gray-800 flex justify-center items-center w-full h-full" href="?c=Manage&a=delete&type=' . get_class($e) . '&id=' . $e->getId() . '"><p>Supprimer</p></a></td>'; //bouton de suppression
                    echo '</tr>';
                  }
                } else {
                  echo '<p class="text-center">Aucun élément selectionné ou trouvé</p>';
                }
                ?>
              </table>
            </div>
          </div>

      </div>
    </div>

  </div>
  <?php include_once './view/element/footer.php'; ?>
</div>
