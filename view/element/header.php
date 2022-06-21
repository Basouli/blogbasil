<div class="w-full px-8 py-2 flex flex-row items-center z-30 bg-gray-600 space-x-8 shadow-2xl">

  <!-- Retour accueil -->
  <div class="flex flex-row items-center space-x-2 rounded bg-gray-500 hover:bg-indigo-500 px-4 py-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
      <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
    </svg>
    <a href="http://localhost/blogbasil/" class="">Accueil</a>
  </div>

  <!-- types d"articles -->
  <?php if (false) {
    ?><div class="flex flex-row space-x-2">
      <label for="categoriesSelect" value="Catégories">Catégories</label>
      <select name="categoriesSelect">
        <option>1</option>
        <option>2</option>
      </select>
    </div><?php
  }?>

  <div class="w-full flex flex-row justify-end space-x-4">

    <?php if ($_SESSION['user']->getDroits() == 42 || $_SESSION['user']->getDroits() == 1337) {
      //Creation d'Article
      ?><a href="?c=Manage&a=createArticle" class="rounded hover:bg-indigo-500 px-4 py-2 whitespace-nowrap">Creer Article</a><?php
    }
    if ($_SESSION['user']->getDroits() == 1337) {
      //Administration
      ?><a href="?c=Manage&a=admin" class="rounded hover:bg-indigo-500 px-4 py-2">Administrer</a><?php
    }?>

    <?php if (isConnected()) {
      //Profil
      ?><a href="?c=Connexion&a=profil" class="rounded hover:bg-indigo-500 px-4 py-2">Profil</a>
      <!--Deconnexion-->
      <a href="?c=Connexion&a=disconnect" class="rounded hover:bg-indigo-500 px-4 py-2">Deconnexion</a><?php
    } else {
      //Connexion
      ?><a href="?c=Connexion&a=identification" class="rounded hover:bg-indigo-500 px-4 py-2">Connexion</a><?php
      //Inscription
      ?><a href="?c=Connexion&a=register" class="rounded hover:bg-indigo-500 px-4 py-2">Inscription</a><?php
    }?>
  </div>



</div>
