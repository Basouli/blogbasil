window.onload = function() {

  function finalChangeLang(response) {
      try {
          const responseJSON = JSON.parse(response);

          if (responseJSON.success == 1) {
              reloadPage();
          } else {
              setTimeout(function() {
                  createAlertMsg(responseJSON.message);
              }, 300);
          }
      } catch (error) {
          setTimeout(function() {
              createAlertMsg(response);
          }, 300);
      }
  }

  const langSelect = document.getElementById('lang');
  langSelect.addEventListener("change", e => {
      let params = "lang=" + langSelect.value;
      makeRequest("updateLang.php", params, finalChangeLang);
  });


}
