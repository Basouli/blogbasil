<div class="relative w-full h-full bg-gray-700 text-white text-4xl lg:text-sm flex flex-col">

  <?php include_once './view/element/header.php'; ?>

  <div class="relative w-full h-full flex flex-col justify-center items-center overflow-hidden">

    <!-- CONTENT -->
    <div class="relative w-full h-full flex flex-col justify-center items-center space-y-12 lg:space-y-6 rounded-2xl lg:rounded-lg">
      <div class="relative py-8 h-full w-full flex flex-col justify-start items-center text-5xl lg:text-base text-white space-y-8 overflow-y-scroll">

          <!-- titre de l'appli -->
          <div class="absolute left-8 top-8 flex flex-col items-center">
            <h1 class="text-6xl lg:text-2xl"><?php echo APPNAME ?></h1>
          </div>

          <!-- rappel position page actuelle -->
          <p><?php echo "page " . $pageActuelle . " sur " . $nombreDePages; ?></p>

          <!-- Liste des articles -->
          <?php
          for ($i = 0; $i < 5; $i++) {
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

          <!-- menu pagination -->
          <div class="w-1/3 flex flex-row justify-center space-x-4 ">
            <?php
            if ($pageActuelle > 1) {
              ?>
              <a href="?c=Home&a=allArticles&start=0<?php echo "&categorie=" . $categorie; ?>" class="text-center rounded w-1/5 py-1 px-2 bg-indigo-500 hover:bg-indigo-600"><< Début</a>
              <a href="?c=Home&a=allArticles&start=<?php echo ($pageActuelle-2)*5 . "&categorie=" . $categorie; ?>" class="text-center rounded  w-1/5 py-1 px-2 bg-indigo-500 hover:bg-indigo-600">Page <?php echo $pageActuelle - 1; ?></a>
              <?php
            } else {
              ?><span class="w-1/5 bg-gray-600 hover:cursor-default rounded"></span><span class="w-1/5 bg-gray-600 hover:cursor-default rounded"></span><?php
            }
            if ($nombreDePages > 1) {
              ?><a href="#" class="text-center rounded w-1/5 py-1 px-2 bg-gray-600 hover:cursor-default">Page <?php echo $pageActuelle; ?></a><?php
            }
            if ($pageActuelle < $nombreDePages) {
              ?>
              <a href="?c=Home&a=allArticles&start=<?php echo ($pageActuelle)*5 . "&categorie=" . $categorie; ?>" class="text-center rounded  w-1/5 py-1 px-2 bg-indigo-500 hover:bg-indigo-600">Page <?php echo $pageActuelle + 1; ?></a>
              <a href="?c=Home&a=allArticles&start=<?php echo ($nombreDePages-1)*5 . "&categorie=" . $categorie; ?>" class="text-center rounded  w-1/5 py-1 px-2 bg-indigo-500 hover:bg-indigo-600">Fin >></a>
              <?php
            } else {
              ?><span class="w-1/5 bg-gray-600 hover:cursor-default rounded"></span><span class="w-1/5 bg-gray-600 hover:cursor-default rounded"></span><?php
            }
            ?>
          </div>
      </div>

    </div>

  </div>

  <?php include_once './view/element/footer.php'; ?>

</div>
