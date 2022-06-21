<div class="w-1/2 flex flex-col space-y-4 rounded-xl bg-gray-500 p-4">
  <p class=""><?php echo $params['articles'][$i]->getArticle(); ?></p>

  <p class="w-full text-end text-3xl lg:text-xs"><?php echo $params['articles'][$i]->getDate(); ?></p>

  <div class="">
    <p class="">Commentaires</p>

    <div class="w-full p-1 flex flex-col space-y-2 bg-gray-700">
      <?php
      if (isConnected()) {
        ?>
        <!-- Ecrire un commentaire -->
        <form id="formPosterCommentaire" class="w-full flex flex-row"
        action="index.php?c=Home&a=postCommentaire"
        method="post"
        enctype="multipart/form-data">
          <input class="h-0 w-0 opacity-0" name="articleId" value="<?php echo $params['articles'][$i]->getId(); ?>"/>
          <input class="bg-gray-700 w-full" name="commentaireSubmit" placeholder="écrire un commentaire..." type="text" />
          <input class="rounded-xl py-1 px-3 bg-gray-600 hover:bg-indigo-500 hover:cursor-pointer" type="submit" name="submit"  value="Poster" />
        </form>
        <?php
      }

      $commentaires = $params['articles'][$i]->getCommentaires();
      if (count($commentaires) != 0) {
        foreach ($commentaires as $commentaire) {
          include './view/element/commentaire.php';
        }
      } else if (!isConnected()) {
        ?><p class="bg-gray-700 text-center">pas de commentaires</p><?php
      }
      ?>
    </div>
  </div>
</div>
