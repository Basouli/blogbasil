<form id="formcreatearticle" class="relative w-full lg:w-3/4 flex flex-col items-center space-y-20 lg:space-y-6 p-12 lg:p-6 bg-gray-600 shadow-2xl rounded-2xl z-10 text-5xl lg:text-sm"
action="index.php?c=Manage&a=submitCreateArticle"
method="post"
enctype="multipart/form-data">

  <div class="w-full flex flex-col justify-cenetr items-center space-y-10 lg:space-y-4">
    <!-- Article -->
    <div class="w-full <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-1">
      <p>Article</p>
      <textarea class="border-2 w-full p-1 text-black font-normal resize-none" rows="10"  name="submitArticle" style="color:black; -webkit-text-fill-color: #000"></textarea>
    </div>

    <div id="droits" class="w-1/3 <?php echo TITLE;?> flex flex-col items-center space-y-2 lg:space-y-0">
      <p>Catégories</p>
      <select name="selectCategorie" class="border-2 w-full p-1 text-black font-normal">
        <?php foreach ($params['categories'] as $c) {
          echo '<option value="' . $c->getId() . '">' . $c->getNom() . '</option>';
        }
        ?>
      </select>
    </div>
  </div>

  <!-- ACTION BTN -->
  <div class="w-full flex flex-row justify-center">
    <input name="submitbtn" type=submit class="py-6 px-10 lg:py-2 lg:px-6 text-center bg-indigo-600 rounded-2xl lg:rounded-xl cursor-pointer" value="Créer" />
  </div>

</form>
