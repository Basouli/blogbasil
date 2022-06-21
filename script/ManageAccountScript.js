window.onload = function() {

  const langBtn = document.getElementById('langBtn');
  const loginBtn = document.getElementById('loginBtn');
  const passwordBtn = document.getElementById('passwordBtn');
  const mailBtn = document.getElementById('mailBtn');
  const dataBtn = document.getElementById('dataBtn');
  const deleteAccountBtn = document.getElementById('deleteAccountBtn');

  langBtn.addEventListener('click', e => {
      toggleItem(langBtn);
  })
  loginBtn.addEventListener('click', e => {
      toggleItem(loginBtn);
  })
  passwordBtn.addEventListener('click', e => {
      toggleItem(passwordBtn);
  })
  mailBtn.addEventListener('click', e => {
      toggleItem(mailBtn);
  })
  dataBtn.addEventListener('click', e => {
      toggleItem(dataBtn);
  })
  deleteAccountBtn.addEventListener('click', e => {
      toggleItem(deleteAccountBtn);
  })

  function toggleItem(item) {
      finalItem = item.parentNode;
      if (!finalItem.classList.contains('expended')) {
          finalItem.children[1].style.maxHeight = "2000px";
          finalItem.classList.add('expended');
      } else {
          finalItem.children[1].style.maxHeight = "0px";
          finalItem.classList.remove('expended');
      }
  }

}
