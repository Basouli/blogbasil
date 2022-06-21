window.onload=function() {

  //List Indexes
  const list = document.getElementById('list');
  let blockIndexes = list.dataset.blockindexes.split(';');
  if (blockIndexes[0] == "") {
      blockIndexes.shift();
  }
  const blockIndexesLength = blockIndexes.length;

  const listContainer = document.getElementById('listContainer');
  let elmnt;
  let elmntIndex;
  let elmntAtTop;
  let elmntAtTopLimit;
  let elmntAtBottom;
  let elmntAtBottomLimit;

  let toucheYpos = 0; //Original Touch pos (where the block were touched)

  let windowHeightThird = window.innerHeight/3; //Screen height / 3
  let touchPos; //Position of touch in screen
  let touchStart = false; //Toucing or not

  const moveSVG = document.createElement('div');
  moveSVG.className = "absolute left-0 top-0 h-full flex flex-col p-4 space-y-4";
  moveSVG.innerHTML = "<svg xmlns='http://www.w3.org/2000/svg' class='w-full h-full' viewBox='0 0 1280.000000 1130.000000' preserveAspectRatio='xMidYMid meet'><g transform='translate(0.000000,1130.000000) scale(0.100000,-0.100000)' fill='currentColor' stroke='none'><path d='M6266 11289 c-200 -27 -402 -141 -536 -301 -38 -46 -432 -718 -1284 -2194 -3554 -6153 -4323 -7485 -4358 -7554 -61 -121 -81 -211 -81 -375 -1 -115 3 -154 21 -220 91 -327 350 -567 681 -629 75 -14 614 -16 5691 -16 5077 0 5616 2 5691 16 331 62 590 302 681 629 18 66 22 105 21 220 0 164 -20 254 -81 375 -21 41 -756 1317 -1633 2835 -877 1518 -2126 3680 -2775 4804 -817 1416 -1196 2063 -1234 2109 -112 134 -277 239 -445 283 -93 24 -256 32 -359 18z'/></g></svg><svg xmlns='http://www.w3.org/2000/svg' class='w-full h-full rotate-180' viewBox='0 0 1280.000000 1130.000000' preserveAspectRatio='xMidYMid meet'><g transform='translate(0.000000,1130.000000) scale(0.100000,-0.100000)' fill='currentColor' stroke='none'><path d='M6266 11289 c-200 -27 -402 -141 -536 -301 -38 -46 -432 -718 -1284 -2194 -3554 -6153 -4323 -7485 -4358 -7554 -61 -121 -81 -211 -81 -375 -1 -115 3 -154 21 -220 91 -327 350 -567 681 -629 75 -14 614 -16 5691 -16 5077 0 5616 2 5691 16 331 62 590 302 681 629 18 66 22 105 21 220 0 164 -20 254 -81 375 -21 41 -756 1317 -1633 2835 -877 1518 -2126 3680 -2775 4804 -817 1416 -1196 2063 -1234 2109 -112 134 -277 239 -445 283 -93 24 -256 32 -359 18z'/></g></svg>";

  // Set to all block the custom touch event
	document.querySelectorAll('.update-block').forEach(item => {
  		item.addEventListener('mousedown', customMouseDown, {passive: false})
  		item.addEventListener('touchstart', customTouchStart, {passive: false})
	})

	let notClicking = false;
	function customTouchStart(e) {
      if (e.target === e.currentTarget) {
          elmnt = e.target; //The current element become the touched element who trigger the event
      } else {
          elmnt = e.target.parentNode; //The current element become the touched element who trigger the event
      }
      e.preventDefault();
      toucheYpos = e.touches[0].clientY; //get the mouse cursor position at startup
      touchPos = toucheYpos;

      elmnt.classList.add('bg-opacity-50');

      //To prevent the click (trigger only if event wasn't a click)
      notClicking = true;
      setTimeout(function() {
          if (notClicking) { //After the time delay, a simple click will have set the variable to false

              elmnt.appendChild(moveSVG);

              setElementAround(); //Set the block at top and at bottom, compared to current block touched

              //Set the touchend event who cancel the opacity of block AND stop the loop who test the touch pos for scroll
              elmnt.addEventListener('touchend', closeDragElement, {passive: false});

              //Set the touchmove event who move the block
              elmnt.addEventListener('touchmove', function(e) {
                  elementDrag(e, true);
              }, {passive: false});

              touchStart = true; //Able the below function to check touch pos
              positionListener(e); //Call the async function who check the pos of touch and scroll if needed
          }
      }, 800);
  }

	function customMouseDown(e) {
  		//notClicking = false; //To prevent from click
  		console.log(e);
  }

  function elementDrag(e, touch) {
      var clientY = (touch) ? e.touches[0].clientY : e.clientY;
      touchPos = clientY;
  }


  //Reset the top and bottom elements, compared to current block index
  function setElementAround() {
      let blocks = Array.prototype.slice.call(listContainer.children);
      elmntIndex = blocks.indexOf(elmnt);
      elmntAtTop = listContainer.children[elmntIndex-1];
      elmntAtBottom = listContainer.children[elmntIndex+1];
      elmntAtNextBottom = listContainer.children[elmntIndex+2];
  }

  //Close the touch event
  function closeDragElement() {
      elmnt.classList.remove('bg-opacity-50'); //Remove the effect applied to the moved block
      moveSVG.remove();
      touchStart = false; //Set to false to stop the loop who check the current pos of touch for scroll (the below function positionListener)
  }

  // SCROLL WITH POSITION ON SCREEN ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// SCROLL WITH POSITION ON SCREEN

  async function positionListener() {
      let doubleWindowHeightThird = 2*windowHeightThird;
       while(touchStart) {
           if (touchPos < windowHeightThird) { //If on the first third of screen, scroll top
               window.scrollBy(0, -6);
           }
           if (touchPos > doubleWindowHeightThird) { //If on the third third of screen, scroll down
               window.scrollBy(0, 6);
           }

           if (elmntIndex > 0) {
               let elmntAtTopRect = elmntAtTop.getBoundingClientRect();
               elmntAtTopLimit = elmntAtTopRect.top;

               if (touchPos < elmntAtTopLimit) { //If the displacement is high enough, insert touched block above
                   listContainer.insertBefore(elmnt, elmntAtTop);
                   setElementAround();
               }
           }

           if (elmntIndex < blockIndexesLength-1) {
               let elmntAtBottomRect = elmntAtBottom.getBoundingClientRect();
               elmntAtBottomLimit = elmntAtBottomRect.bottom;

               if (touchPos > elmntAtBottomLimit) { //If the displacement is high enough, insert touched block below
                   listContainer.insertBefore(elmnt, elmntAtNextBottom);
                   setElementAround();
               }
           }

           await sleep(20); //Little sleep to save processing resources
       }
  }

  //Make a pause of specified time in parameters, to process where the function is called
  function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
  }

  // CONFIRM NEW ORDER //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// CONFIRM NEW ORDER

  //Validate the new index of all blocks and send it to ajax who update on bdd
  const validateMoveBtn = document.getElementById('validateMoveBtn');
  validateMoveBtn.addEventListener('click', e => {

      let newBlockIndexes = "";
      for (let i=0; i < listContainer.childElementCount; i++){
          newBlockIndexes += ";" + listContainer.children[i].id;
      }

      let params = "listId=" + list.dataset.listid + "&blockIndexes=" + newBlockIndexes;
      makeRequest('updateListIndexes.php', params, callBackAjax);
  })

  //Function to call after ajax finished
  function callBackAjax(response) {
      try {
          const responseJSON = JSON.parse(response);
          if (responseJSON.success == 1) {
              setTimeout(function() {
                  reloadPage("index.php?c=Home&a=run");
              }, 300);
          } else {
              setTimeout(function() {
                  createAlertMsg(responseJSON.message);
              }, 300);
          }
      } catch (error) {
          alert(response);
      }
  }

  //Redirect to adress specified in parameters
  function reloadPage(adress) {
      const newLocation = adress;
      window.location = newLocation;
  }

}
