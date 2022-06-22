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

        <a href="?c=Home&a=allArticles" class="hover:cursor-pointer rounded px-3 py-1 hover:bg-indigo-600">voir tous les articles</a>

        <?php
        $i = 1;
        $articles[$i] = $selectedArticle;
        include './view/element/article.php';
        ?>

      </div>

    </div>

  </div>

  <?php include_once './view/element/footer.php'; ?>

</div>
