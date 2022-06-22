<div class="w-1/2 flex flex-col space-y-4 rounded-xl bg-gray-500 p-4 shadow-xl">

  <div class="w-full flex flex-row justify-between text-indigo-300 text-3xl lg:text-xs">
    <p><?php echo $articles[$i]->getNomCategorie(); ?></p>
    <p><?php echo $articles[$i]->getDate(); ?></p>
  </div>

  <p class=""><?php echo $articles[$i]->getArticle(); ?></p>

  <div class="">
    <p class="">Commentaires</p>

    <div class="w-full flex flex-col space-y-1">
      <?php
      $commentaires = $articles[$i]->getCommentaires();
      if (count($commentaires) != 0) {
        foreach ($commentaires as $commentaire) {
          include './view/element/commentaire.php';
        }
      } else if (!isConnected()) {
        ?><p class="bg-gray-700 text-center">pas de commentaires</p><?php
      }
      if (isConnected()) {
        ?>
        <!-- Ecrire un commentaire -->
        <form id="formPosterCommentaire" class="w-full flex flex-row space-x-1 bg-gray-700 rounded-xl p-1"
        action="index.php?c=Home&a=postCommentaire"
        method="post"
        enctype="multipart/form-data">
          <input class="h-0 w-0 opacity-0" name="articleId" value="<?php echo $articles[$i]->getId(); ?>"/>
          <input class="bg-gray-700 w-full rounded-xl" name="commentaireSubmit" placeholder="écrire un commentaire..." type="text" />
          <input class="rounded-xl py-1 px-3 bg-indigo-500 hover:bg-indigo-600 hover:cursor-pointer" type="submit" name="submit"  value="Poster" />
        </form>
        <?php
      }
      ?>
    </div>
  </div>
</div>
