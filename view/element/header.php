<div class="relative w-full px-8 py-2 flex flex-row justify-between items-center z-30 bg-gray-500 shadow-2xl">

  <!-- Retour accueil -->
  <a href="http://localhost/blogbasil/" class="flex flex-row items-center space-x-2 rounded bg-indigo-500 hover:bg-indigo-600 px-4 py-2 hover:cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
      <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
    </svg>
    <p class="">Accueil</p>
  </a>

  <!-- types d"articles -->
  <?php
    if ($a == "allArticles") {
      ?>
      <div class="absolute left-1/2 top-1/2 -translate-y-1/2 -translate-x-1/2 flex flex-row items-center space-x-2 m-0">
        <label for="categoriesSelect" value="Catégories">Catégorie</label>
        <select id="categoriesSelect" class="bg-indigo-500 py-1 px-3 hover:cursor-pointer hover:bg-indigo-600 rounded">
          <?php
          $idSelectedCategorie = null;
          if (isset($params['categorie']) && $params['categorie'] != "null") {
            foreach ($params['categories'] as $c) {
              if ($c->getId() == $params['categorie']) {
                echo '<option value="' . $c->getId() . '">' . $c->getNom() . '</option>';
                $idSelectedCategorie = $c->getId();
              }
            }
          }

          echo '<option value="null">-- toutes --</option>';

          foreach ($params['categories'] as $c) {
            if ($c->getId() != $idSelectedCategorie) {
              echo '<option value="' . $c->getId() . '">' . $c->getNom() . '</option>';
            }
          }
          ?>
        </select>
      </div>

      <script>
        const selectCategorie = document.getElementById('categoriesSelect');
        selectCategorie.addEventListener('change', e => {
          const newLocation = "?c=Home&a=allArticles&categorie=" + selectCategorie.value;
          window.location = newLocation;
        });
      </script>

      <?php
    }
  ?>

  <div class="w-full flex flex-row justify-end space-x-4">

    <?php if ($_SESSION['user']->getDroits() == 42 || $_SESSION['user']->getDroits() == 1337) {
      //Creation d'Article
      ?><a href="?c=Manage&a=createArticle" class="rounded bg-gray-400 bg-opacity-25 hover:bg-indigo-500 hover:bg-opacity-100 px-4 py-2 whitespace-nowrap">Creer Article</a><?php
    }
    if ($_SESSION['user']->getDroits() == 1337) {
      //Administration
      ?><a href="?c=Manage&a=admin" class="rounded bg-gray-400 bg-opacity-25 hover:bg-indigo-500 hover:bg-opacity-100 px-4 py-2">Administrer</a><?php
    }?>

    <?php if (isConnected()) {
      //Profil
      ?><a href="?c=Home&a=profil" class="rounded bg-gray-400 bg-opacity-25 hover:bg-indigo-500 hover:bg-opacity-100 px-4 py-2">Profil</a>
      <!--Deconnexion-->
      <a href="?c=Home&a=deconnexion" class="rounded bg-gray-400 bg-opacity-25 hover:bg-red-500 hover:bg-opacity-100 px-4 py-2">Deconnexion</a><?php
    } else {
      //Connexion
      ?><a href="?c=Connexion&a=identification" class="rounded bg-gray-400 bg-opacity-25 hover:bg-indigo-500 hover:bg-opacity-100 px-4 py-2">Connexion</a><?php
      //Inscription
      ?><a href="?c=Connexion&a=register" class="rounded bg-gray-400 bg-opacity-25 hover:bg-indigo-500 hover:bg-opacity-100 px-4 py-2">Inscription</a><?php
    }?>
  </div>



</div>
