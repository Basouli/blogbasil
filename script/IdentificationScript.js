window.onload = function() {

  function reloadPage() {
      const newLocation = "index.php?c=Connexion&a=Identification";
      window.location = newLocation;
  }

  function createAlertMsg(msg) {
      const doc = document.documentElement;
      doc.classList.add('overflow-hidden');
      const top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);

      const parentDiv = document.createElement("div");
      parentDiv.id = "priorityParent"
      parentDiv.className = 'absolute left-0 w-full py-24 px-32 flex flex-col text-3xl lg:text-base text-white';
      parentDiv.style.top = top + "px";
      parentDiv.style.zIndex = "100";

      const msgDiv = document.createElement("div");
      msgDiv.className = 'flex justify-center items-center shadow-2xl text-4xl lg:text-base p-12 rounded-2xl bg-gray-400';
      parentDiv.appendChild(msgDiv);

      const msgContent = document.createElement("p");
      msgContent.innerHTML = msg;
      msgDiv.appendChild(msgContent);

      body.appendChild(parentDiv);

      setTimeout(function() {
          document.getElementById('priorityParent').remove();
      }, 3000);
  }

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
