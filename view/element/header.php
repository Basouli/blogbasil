<div class="w-full px-8 py-3 flex flex-row items-center z-30 bg-gray-500 space-x-8">

  <!-- Retour accueil -->
  <a href="http://localhost/blogbasil/" class="">Accueil</a>

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

  <div class="w-full flex flex-row justify-end space-x-8">

    <?php if ($_SESSION['user']->getDroits() == 42 || $_SESSION['user']->getDroits() == 1337) {
      //Creation d'Article
      ?><a href="?c=Manage&a=createArticle" class="flex flex-row whitespace-nowrap">Creer Article</a><?php
    }
    if ($_SESSION['user']->getDroits() == 1337) {
      //Administration
      ?><a href="?c=Manage&a=admin" class="">Administrer</a><?php
    }?>

    <?php if (isConnected()) {
      //Profil
      ?><button>Profil</button>
      <!--Deconnexion-->
      <button>Deconnexion</button><?php
    } else {
      //Connexion
      ?><a href="?c=Connexion&a=identification" class="">Connexion</a><?php
      //Inscription
      ?><a href="?c=Connexion&a=register" class="">Inscription</a><?php
    }?>
  </div>



</div>
