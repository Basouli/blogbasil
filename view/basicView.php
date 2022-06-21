<div class="relative w-full h-full bg-gray-700 text-white text-4xl lg:text-sm flex flex-col">

  <?php include_once './view/element/header.php'; ?>

  <div class="relative w-full h-full flex flex-col justify-center items-center overflow-hidden">

    <!-- CONTENT -->
    <div class="relative w-full h-full flex flex-col justify-center items-center space-y-12 lg:space-y-6 rounded-2xl lg:rounded-lg">
      <?php echo $content; ?>
    </div>

  </div>

  <?php include_once './view/element/footer.php'; ?>

</div>
