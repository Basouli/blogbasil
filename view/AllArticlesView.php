<div class="relative w-full h-full bg-gray-700 text-white text-4xl lg:text-sm flex flex-col">

  <?php include_once './view/element/header.php'; ?>

  <div class="relative w-full h-full flex flex-col justify-center items-center overflow-hidden">

    <!-- CONTENT -->
    <div class="relative w-full h-full flex flex-col justify-center items-center space-y-12 lg:space-y-6 rounded-2xl lg:rounded-lg">
      <div class="relative py-8 h-full w-full flex flex-col justify-start items-center text-5xl lg:text-base text-white space-y-8 overflow-y-scroll">

          <div class="absolute left-8 top-8 flex flex-col items-center">
            <h1 class="text-6xl lg:text-2xl"><?php echo APPNAME ?></h1>
          </div>

          <?php
          /*
          $categorie = "";
          $start = 0;
          if (isset($params['start'])) {
            $start = $params['start'];
          }
          $filter = array();
          if (isset($params['categorie'])) {
            $categorie = $params['categorie'];
            $filter = array('id_categorie' => $categorie);
          }
          $articles = $this->model->findAllArticlesWithFilter($filter);

          $nombreDePages = (int)(count($articles) / 5);
          $pageActuelle = ($start == 0) ? 0 : $start / 5;
          */
          ?>

          <p>page ... sur ...</p>

          <?php
          for ($i = 0; $i < 5; $i++) {
            if (isset($articles[$i])) {
              include './view/element/article.php';
            }
          }
          ?>

          <!-- menu pagination -->
          <div class="w-1/3 flex flex-row space-x-4 ">

            <?php
            if (true) {
              ?><a href="?c=Home&a=allArticles&start=0" class="text-center rounded w-1/5 py-1 px-2 bg-gray-500 hover:bg-indigo-500"><< Début</a><?php
            }
            if (true) {
              ?><a href="?c=Home&a=allArticles&start=0" class="text-center rounded  w-1/5 py-1 px-2 bg-gray-500 hover:bg-indigo-500">Page 1</a><?php
            }
            ?>
            <a href="#" class="text-center rounded  w-1/5 py-1 px-2 bg-gray-500 hover:bg-indigo-500">Page 2</a>
            <?php
            if (true) {
              ?><a href="?c=Home&a=allArticles&start=0" class="text-center rounded  w-1/5 py-1 px-2 bg-gray-500 hover:bg-indigo-500">Page 3</a><?php
            }
            if (true) {
              ?><a href="?c=Home&a=allArticles&start=0" class="text-center rounded  w-1/5 py-1 px-2 bg-gray-500 hover:bg-indigo-500">Fin >></a><?php
            }
            ?>

          </div>
      </div>

    </div>

  </div>

  <?php include_once './view/element/footer.php'; ?>

</div>
