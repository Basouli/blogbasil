<div class="flex flex-col p-1 rounded bg-gray-600">
  <p class="w-full text-indigo-300 whitespace-nowrap"><?php echo $commentaire->getNomUtilisateur() . " - <span class='text-xs'>" . $commentaire->getDate(); ?></span></p>

  <p class=""><?php echo $commentaire->getCommentaire(); ?></p>
</div>
