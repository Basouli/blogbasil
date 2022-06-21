window.onload = function() {

  function reloadPage() {
      const newLocation = "index.php?c=Connexion&a=identification";
      window.location = newLocation;
  }

  setTimeout(function() {
      reloadPage();
  }, 10000);

}
