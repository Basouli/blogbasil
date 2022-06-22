<div class="relative py-8 h-full w-full flex flex-col justify-start items-center text-5xl lg:text-base text-white space-y-8 overflow-y-scroll">

      <div class="absolute left-8 top-8 flex flex-col items-center">
        <h1 class="text-6xl lg:text-2xl"><?php echo APPNAME ?></h1>
      </div>

      <p>Derniers articles parus</p>

      <?php
      for ($i = 0; $i < 3; $i++) {
        if (isset($articles[$i])) {
          ?>
          <a href="?c=Home&a=detailsArticle&id=<?php echo $articles[$i]->getId() ?>" class="w-1/2 flex flex-col space-y-4 rounded-xl bg-gray-500 p-4 hover:cursor-pointer shadow-xl">
            <div class="w-full flex flex-row justify-between text-indigo-300 text-3xl lg:text-xs">
              <p><?php echo $articles[$i]->getNomCategorie(); ?></p>
              <p><?php echo $articles[$i]->getDate(); ?></p>
            </div>

            <p class=""><?php echo $articles[$i]->getArticle(); ?></p>
          </a>
          <?php
        }
      }
      ?>

      <?php
      if (count($articles) > 3) {
        ?>
        <a href="?c=Home&a=allArticles" class="hover:cursor-pointer rounded px-3 py-1 hover:bg-indigo-600">voir tous les articles</a>
        <?php
      }
      ?>

</div>
