<div class="relative py-8 h-full w-full flex flex-col justify-start items-center text-5xl lg:text-base text-white space-y-8 overflow-y-scroll">

      <div class="absolute left-8 top-8 flex flex-col items-center">
        <h1 class="text-6xl lg:text-2xl"><?php echo APPNAME ?></h1>
      </div>

      <p>Derniers articles parus</p>

      <?php
      for ($i = 0; $i < 3; $i++) {
        if (isset($articles[$i])) {
          include './view/element/article.php';
        }
      }
      ?>

      <?php
      if (count($articles) > 3) {
        ?>
        <a href="?c=Home&a=allArticles" class="hover:cursor-pointer">voir tous les articles</a>
        <?php
      }
      ?>

</div>
