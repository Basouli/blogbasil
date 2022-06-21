window.onload=function() {
  //document.documentElement.style.setProperty('--your-variable', '#YOURCOLOR');

  //Reload la page
  function reloadPage() {
      const newLocation = "index.php?c=Home&a=run";
      redirect(newLocation);
  }

  //Redirect
  function redirect(newUrl) {
      window.location = encodeURI(newUrl);
  }

  //REDIRECT IF SUCCESS OR MAKE FLOATING MESSAGE TO INFORM RESULT OF REQUEST
  function finalInsert(response) {
      try {
          const responseJSON = JSON.parse(response);
          if (responseJSON.success == 1) {
              setTimeout(function() {
                  reloadPage();
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

  function finalAJAXShow(response) {
      try {
          const responseJSON = JSON.parse(response);
          alert(responseJSON.message);
      } catch (error) {
          alert(response);
      }
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

  let userLists;
  function setUserLists(response) {
    userLists = JSON.parse(response);
  }
  makeRequest('manageList', "manageListAction=getSessionLists", setUserLists);

  let currentList;
  let currentBlock;

  /*
  function setIntervalX(callback, delay, repetitions) {
      var x = 0;
      var intervalID = window.setInterval(function () {

         callback();

         if (++x === repetitions) {
             window.clearInterval(intervalID);
         }
      }, delay);
  }
  */

  // SLIDE FRAME //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// SLIDE FRAME

  const slideFrame = document.getElementById('slideFrame');
  const colorFrame = document.getElementById('colorFrame');
  let finalColorChooser;
  let finalFrameColorChooser;

  document.querySelectorAll('.colorChooser').forEach(item => {
      item.addEventListener('click', e => {
          setColor(item.dataset.color, finalColorChooser.id);

          if (finalFrameColorChooser == blockFrame) {
              finalBlockColorText.classList.add('opacity-0');
          }

          addClass(colorFrame, 'hidden');
          finalFrameColorChooser.classList.remove('hidden');
      })
  })

  document.getElementById('colorChooserBackBtn').addEventListener('click', e => {
      addClass(colorFrame, 'hidden');
      finalFrameColorChooser.classList.remove('hidden');
  })

  // OPTION ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// OPTION

  const optionFrame = document.getElementById('optionFrame');
  document.getElementById('optionBtn').addEventListener('click', event => {
      optionFrame.classList.remove('hidden');
      openSlideFrame();
  })

  document.getElementById('cancelOptionBtn').addEventListener('click', event => {
      closeSlideFrame();
  })

  // LIST //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// LIST

  const listFrame = document.getElementById('listFrame');

  const listFrameDetails = document.getElementById('listFrame-Details');
  const listTitle = document.getElementById('listTitle');
  const listDescription = document.getElementById('listDescription');
  const finalListDescription = document.getElementById('finalListDescription');
  const backListBtn = document.getElementById('backListBtn');
  const updateListBtn = document.getElementById('updateListBtn');

  const listFrameEditor = document.getElementById('listFrame-Editor');
  const createListBtn = document.getElementById('createListBtn');
  const confirmUpdateListBtn = document.getElementById('confirmUpdateListBtn');
  const deleteListSection = document.getElementById('deleteListSection');

  //DONNE A TOUT LES TITRE DE LISTES UN LISTENER D'OUVRIR LA FRAME D'UPDATE DE LISTE
  document.querySelectorAll('.list-update').forEach(item => {
      item.addEventListener('click', event => {
          document.documentElement.classList.add('overflow-hidden');

          currentList = getList(item.parentNode.parentNode.id);

          //Set the value to the form who call move
          document.getElementById('moveListId').value = currentList['id'];

          addClass(listFrameEditor, 'hidden');
          listFrameDetails.classList.remove('hidden');

          addClass(createListBtn, 'hidden');
          confirmUpdateListBtn.classList.remove('hidden');

          //Set title
          listTitle.innerHTML = currentList['title'];
          finalListTitle.value = currentList['title'];
          //Set description
          listDescription.innerHTML = currentList['description'];
          finalListDescription.value = currentList['description'];
          //Set color
          setColor(currentList['color'], "finalListColor");

          deleteListSection.classList.remove('hidden');

          //show slideframe
          listFrame.classList.remove('hidden');
          openSlideFrame();
      })
  })

  //Back list frame
  backListBtn.addEventListener('click', event => {
      closeSlideFrame();
  })

  //Switch block frame
  updateListBtn.addEventListener('click', event => {
      addClass(listFrameDetails, 'hidden');
      listFrameEditor.classList.remove('hidden');
  })
  cancelListBtn.addEventListener('click', event => {
      addClass(listFrame, 'hidden');
      closeSlideFrame();
  })

  finalListColor.addEventListener('click', e => {
      finalColorChooser = finalListColor;
      finalFrameColorChooser = listFrame;
      addClass(listFrame, 'hidden');
      colorFrame.classList.remove('hidden');
  })

  let addFirstList = document.getElementById('addFirstList');
  if (typeof(addFirstList) != 'undefined' && addFirstList != null) {
      addFirstList.addEventListener('click', newList);
  }

  document.getElementById('newListBtn').addEventListener('click', newList);

  function newList() {
      addClass(listFrameDetails, 'hidden');
      listFrameEditor.classList.remove('hidden');

      addClass(confirmUpdateListBtn, 'hidden');
      createListBtn.classList.remove('hidden');

      addClass(confirmUpdateListBtn, 'hidden');
      createListBtn.classList.remove('hidden');

      //set values
      listTitle.innerHTML = "";
      finalListDescription.value = "";
      finalListTitle.value = "";
      setColor("bg-indigo-600", "finalListColor");

      addClass(deleteListSection, 'hidden');

      //show slideframe
      listFrame.classList.remove('hidden');
      openSlideFrame();
  }

  createListBtn.addEventListener('click', e => {
      callListService("insert");
  })

  confirmUpdateListBtn.addEventListener('click', e => {
      callListService("update");
  })

  function callListService(action) {
      let params = "";

      let finalListTitleValue = (finalListTitle.value != null) ? finalListTitle.value : "";
      params += "title=" + finalListTitleValue;

      let finalListDescriptionValue = (finalListDescription.value != null) ? finalListDescription.value : "";
      params += "&description=" + finalListDescriptionValue;

      let finalListColorValue = (finalListColor.dataset.color != null && finalListColor.dataset.color != "") ? finalListColor.dataset.color : "bg-indigo-600";
      params += "&color=" + finalListColorValue;

      let useColor = (showColor.checked ? 1 : 0);
      params += "&useColor=" + useColor;

      if (action == "update") {
          params += "&listId=" + currentList['id'];
      }

      finalListColor.classList.remove(finalListColorValue);
      finalListColor.dataset.color = "bg-indigo-600";
      finalListColor.classList.add("bg-indigo-600");

      //makeRequest(action + 'List.php', params, finalInsert);

      params += "&manageListAction=insert";
      makeRequest('manageList', params, finalInsert);
  }

  const confirmDeleteListStatus = document.getElementById('confirmDeleteListStatus');
  const deleteListConfirmFrame = document.getElementById('deleteListConfirmFrame');
  const confirmDeleteListStatusTxt = confirmDeleteListStatus.innerHTML;
  let confirmDeleteListReady = false;
  let intervalDeleteListID;
  const deleteListBtn = document.getElementById('deleteListBtn');
  deleteListBtn.addEventListener('click', event => {
      deleteListBtn.classList.add('border-gray-500');
      deleteListConfirmFrame.classList.remove('hidden');
      let timer = 3;
      confirmDeleteListStatus.innerHTML = timer;
      timer--;
      intervalDeleteListID = window.setInterval(function () {
          if (timer > 0) {
              confirmDeleteListStatus.innerHTML = timer;
          } else {
              confirmDeleteListStatus.innerHTML = confirmDeleteListStatusTxt;
              window.clearInterval(intervalDeleteListID);
              confirmDeleteListReady = true;
          }
          timer--;
      }, 1000);

  })
  document.getElementById('confirmDeleteList').addEventListener('click', event => {
      if (confirmDeleteListReady) {
          var params = "listId=" + currentList['id'];
          params += "&manageListAction=delete";
          makeRequest('manageList', params, finalInsert);

          clearDelete(deleteListBtn, deleteListConfirmFrame, confirmDeleteListReady);
      }
  })
  document.getElementById('cancelDeleteList').addEventListener('click', event => {
      window.clearInterval(intervalDeleteListID);
      clearDelete(deleteListBtn, deleteListConfirmFrame, confirmDeleteListReady);
  })

  // EXPEND / COLLAPSE
  var readyCollapse = true;
  var readyExpend = true;
  document.querySelectorAll('.collapse-list').forEach(item => {
      item.addEventListener('click', event => {
          if (readyCollapse) {
              const currentListContainer = item.parentNode.parentNode.parentNode;
              currentListContainer.children[1].classList.remove('p-2');
              currentListContainer.children[1].classList.remove('lg:p-0.5');
              addClass(currentListContainer.children[1], 'p-0');
              addClass(currentListContainer.children[1], 'h-0');
              addClass(currentListContainer, 'pb-0');
              addClass(currentListContainer, 'lg:pb-0');

              item.parentNode.children[1].classList.remove('hidden');
              item.classList.add('hidden');

              readyExpend = false;
              setTimeout(function() {
                  readyExpend = true;
              }, 2000);

              var params = "listId=" + currentListContainer.id;
              params += "&manageListAction=updateListCollapse";
              params += "&collapse=1";
              makeRequest('manageList', params, null);
          }
      })
  })
  document.querySelectorAll('.expend-list').forEach(item => {
      item.addEventListener('click', event => {
          if (readyExpend) {
              const currentListContainer = item.parentNode.parentNode.parentNode;
              currentListContainer.classList.remove('pb-0');
              currentListContainer.classList.remove('lg:pb-0');

              currentListContainer.children[1].classList.remove('p-0');
              currentListContainer.children[1].classList.remove('h-0');
              addClass(currentListContainer.children[1], 'p-2');
              addClass(currentListContainer.children[1], 'lg:p-0.5');

              oppositeBtn = item.parentNode.children[0];
              oppositeBtn.classList.remove('hidden');
              item.classList.add('hidden');

              readyCollapse = false;
              setTimeout(function() {
                  readyCollapse = true;
              }, 2000);

              var params = "listId=" + currentListContainer.id;
              params += "&manageListAction=updateListCollapse";
              params += "&collapse=0";
              makeRequest('manageList', params, null);
          }
      })
  })

  // BLOCK /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// BLOCK

  const blockFrame = document.getElementById('blockFrame');

  const blockFrameDetails = document.getElementById('blockFrame-Details');
  const blockTitle = document.getElementById('blockTitle');
  const backBlockBtn = document.getElementById('backBlockBtn');
  const updateBlockBtn = document.getElementById('updateBlockBtn');

  const blockFrameEditor = document.getElementById('blockFrame-Editor');
  const finalBlockTitle = document.getElementById('finalBlockTitle');
  const blockTypeSelect = document.getElementById('blockTypeSelect');
  const dateDiv = document.getElementById('dateDiv');
  const recurringDiv = document.getElementById('recurringDiv');
  const parentColorBtn = document.getElementById('parentColorBtn');
  const finalBlockColorText = document.getElementById('finalBlockColorText');
  const finalBlockColor = document.getElementById('finalBlockColor');
  const cancelBlockBtn = document.getElementById('cancelBlockBtn');
  const createBlockBtn = document.getElementById('createBlockBtn');
  const confirmUpdateBlockBtn = document.getElementById('confirmUpdateBlockBtn');
  const deleteBlockSection = document.getElementById('deleteBlockSection');

  //Add Block Event
  document.querySelectorAll('.add-block').forEach(item => {
      item.addEventListener('click', e => {

          currentList = getList(item.parentNode.parentNode.id);

          addClass(blockFrameDetails, 'hidden');
          blockFrameEditor.classList.remove('hidden');

          addClass(confirmUpdateBlockBtn, 'hidden');
          createBlockBtn.classList.remove('hidden');

          //set values
          blockTitle.innerHTML = "";
          finalBlockTitle.value = "";
          setColor("bg-gray-500", "finalBlockColor");
          finalBlockColorText.classList.remove('opacity-0');
          blockTypeSelect.options.selectedIndex = 0;
          addClass(dateDiv, 'hidden');
          document.getElementById('dateBlock').valueAsDate = new Date();
          addClass(recurringDiv, 'hidden');

          addClass(deleteBlockSection, 'hidden');

          //show slideframe
          blockFrame.classList.remove('hidden');
          openSlideFrame();
      })
  })

  //Update Block Event
  document.querySelectorAll('.update-block').forEach(item => {
      item.addEventListener('click', e => {
          if (e.target === e.currentTarget || e.target.tagName == 'P') { //target IS THE REAL CLICKED AND currentTarget IS THE ITEM
              finalItem = item;
              if (e.target.tagName == 'P') {
                  finalItem = e.target.parentNode;
              }

              currentList = getList(finalItem.parentNode.parentNode.parentNode.id);

              let blockId = finalItem.id;
              currentBlock = getBlock(currentList['id'], blockId);

              addClass(blockFrameEditor, 'hidden');
              blockFrameDetails.classList.remove('hidden');

              addClass(createBlockBtn, 'hidden');
              confirmUpdateBlockBtn.classList.remove('hidden');

              //Set values
              blockTitle.innerHTML = currentBlock['title'];
              finalBlockTitle.value = currentBlock['title'];
              blockDescription.innerHTML = currentBlock['description'];
              finalBlockDescription.value = currentBlock['description'];
              if (currentBlock['color'] == "bg-gray-500") {
                  setColor("bg-gray-500", "finalBlockColor");
                  finalBlockColorText.classList.remove('opacity-0');
              } else {
                  setColor(currentBlock['color'], "finalBlockColor");
                  if (!finalBlockColorText.classList.contains('opacity-0')) {
                      finalBlockColorText.classList.add('opacity-0');
                  }
              }
              var blockType = currentBlock['type'];
              blockTypeSelect.value = blockType;
              if (blockType == "date") {
                  document.getElementById('dateBlock').value = currentBlock['date'];
                  dateDiv.classList.remove('hidden');
              }
              if (blockType == "recurring") {
                  //
              }

              deleteBlockSection.classList.remove('hidden');

              //show slideframe
              blockFrame.classList.remove('hidden');
              openSlideFrame();
          }
      })
  })

  confirmUpdateBlockBtn.addEventListener('click', e => {
      callBlockService("update");
  })

  createBlockBtn.addEventListener('click', e => {
      callBlockService("insert");
  })

  function callBlockService(action) {
      let params = "idList=" + currentList['id'];

      let finalBlockTitleValue = (finalBlockTitle.value != null) ? finalBlockTitle.value : "";
      params += "&title=" + finalBlockTitleValue;

      let finalBlockDescriptionValue = (finalBlockDescription.value != null) ? finalBlockDescription.value : "";
      params += "&description=" + finalBlockDescriptionValue;

      let finalBlockColorValue = (finalBlockColor.dataset.color != null && finalBlockColor.dataset.color != "") ? finalBlockColor.dataset.color : "bg-indigo-600";
      params += "&color=" + finalBlockColorValue;

      let blockTypeSelectValue = blockTypeSelect.value;
      params += "&type=" + blockTypeSelectValue;

      if (blockTypeSelectValue == 'date') {
          params += "&date=" + document.getElementById('dateBlock').value;
      } else {
          params += "&date=";
      }

      if (blockTypeSelectValue == 'check') {
          params += "&checked=" + currentBlock['checked'];
      } else {
          params += "&checked=";
      }

      /*
      if (blockTypeSelectValue == 'recurring') {
          params += "&recurring=" + updateBlockBtn.dataset.blockid;
      } else {
          params += "&recurring=";
      }
      */
      params += "&recurring=";

      if (action == "update") {
          params += "&blockId=" + currentBlock['id'];
      }

      params += "&manageBlockAction=" + action;
      makeRequest('manageBlock', params, finalInsert);
  }

  const confirmDeleteBlockStatus = document.getElementById('confirmDeleteBlockStatus');
  const deleteBlockConfirmFrame = document.getElementById('deleteBlockConfirmFrame');
  const confirmDeleteBlockStatusTxt = confirmDeleteBlockStatus.innerHTML;
  let intervalDeleteBlock;
  let confirmDeleteBlockReady = false;
  const deleteBlockBtn = document.getElementById('deleteBlockBtn');
  deleteBlockBtn.addEventListener('click', event => {

      deleteBlockBtn.classList.add('border-gray-500');
      deleteBlockConfirmFrame.classList.remove('hidden');
      let timer = 3;
      confirmDeleteBlockStatus.innerHTML = timer;
      timer--;
      intervalDeleteBlock = window.setInterval(function () {
          if (timer > 0) {
              confirmDeleteBlockStatus.innerHTML = timer;
          } else {
              confirmDeleteBlockStatus.innerHTML = confirmDeleteBlockStatusTxt;
              window.clearInterval(intervalDeleteBlock);
              confirmDeleteBlockReady = true;
          }
          timer--;
      }, 1000);

  })
  document.getElementById('confirmDeleteBlock').addEventListener('click', event => {
      if (confirmDeleteBlockReady) {
          var params = "id=" + currentBlock['id'];
          params += "&manageBlockAction=delete";
          makeRequest('manageBlock', params, finalInsert);

          clearDelete(deleteBlockBtn, deleteBlockConfirmFrame, confirmDeleteBlockReady);
      }
  })
  document.getElementById('cancelDeleteBlock').addEventListener('click', event => {
      window.clearInterval(intervalDeleteBlock);
      clearDelete(deleteBlockBtn, deleteBlockConfirmFrame, confirmDeleteBlockReady);
  })

  //Back block frame
  backBlockBtn.addEventListener('click', event => {
      closeSlideFrame();
  })

  //Switch block frame
  updateBlockBtn.addEventListener('click', event => {
      addClass(createListBtn, 'hidden');
      confirmUpdateListBtn.classList.remove('hidden');

      addClass(blockFrameDetails, 'hidden');
      blockFrameEditor.classList.remove('hidden');
  })
  cancelBlockBtn.addEventListener('click', event => {
      addClass(blockFrame, 'hidden');
      closeSlideFrame();
  })

  blockTypeSelect.addEventListener('change', showBlockDiv, false);
  function showBlockDiv() {
      switch(this.value){
          case "simple":
          case "check":
              if (!dateDiv.classList.contains('hidden')) {
                  dateDiv.classList.add('hidden');
              }
              if (!recurringDiv.classList.contains('hidden')) {
                  recurringDiv.classList.add('hidden');
              }
              break;
          case "date":
              if (dateDiv.classList.contains('hidden')) {
                  dateDiv.classList.remove('hidden');
              }
              if (!recurringDiv.classList.contains('hidden')) {
                  recurringDiv.classList.add('hidden');
              }
              break;
          case "recurring":
              if (!dateDiv.classList.contains('hidden')) {
                  dateDiv.classList.add('hidden');
              }
              if (recurringDiv.classList.contains('hidden')) {
                  recurringDiv.classList.remove('hidden');
              }
              break;
      }
  }

  parentColorBtn.addEventListener('click', e => {
      setColor("bg-gray-500", finalBlockColor.id);
      finalBlockColorText.style.opacity = "100%";
  })

  finalBlockColor.addEventListener('click', e => {
      finalColorChooser = finalBlockColor;
      finalFrameColorChooser = blockFrame;
      addClass(blockFrame, 'hidden');
      colorFrame.classList.remove('hidden');
  })

  // SET EVENT OF CHECK TASK
  document.querySelectorAll('.checktask').forEach(item => {
      item.addEventListener('click', e => {
          item.disabled = true;
          setTimeout(function() {
              item.disabled = false;
          }, 2000);

          let params = "checked=" + item.checked;
          params += "&blockId=" + item.parentNode.parentNode.parentNode.id;
          params += "&manageBlockAction=updateCheck";

          makeRequest('manageBlock', params, null);
      })
  })

  // FUNCTIONS /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// FUNCTIONS

  function getList(listId) {
      let currentList;
      for (i = 0; i < userLists.length; i++) {
          currentList = JSON.parse(userLists[i]);
          if (currentList['id'] == listId) {
              return currentList;
          }
      }
      return null;
  }

  function getBlock(listId, blockId) {
      let block;
      let currentList;
      let currentBlock;
      for (i = 0; i < userLists.length; i++) {
          currentList = JSON.parse(userLists[i]);
          if (currentList['id'] == listId) {
              for (j = 0; j < currentList['blocks'].length; j++) {
                  currentBlock = currentList['blocks'][j];
                  if (currentBlock['id'] == blockId) {
                      block = currentBlock;
                      continue;
                  }
              }
              continue;
          }
      }
      return block;
  }

  function addClass(element, className) {
      if (!element.classList.contains(className)) {
          element.classList.add(className);
      }
  }

  //Slide Frame Open and Close
  function closeSlideFrame() {
      slideFrame.classList.remove('bg-opacity-50');
      slideFrame.style.transform = "translate(0%, 100%)";
      document.documentElement.classList.remove('overflow-hidden');

      addClass(blockFrame, 'hidden');
      addClass(optionFrame, 'hidden');
      addClass(listFrame, 'hidden');
  }
  function openSlideFrame() {
      document.documentElement.classList.add('overflow-hidden');
      addClass(slideFrame, 'bg-opacity-50');
      slideFrame.style.transform = "translate(0%, 0%)";
  }

  function setColor(color, final) {
      const colorPicker = document.getElementById(final);
      var oldColor = colorPicker.dataset.color;

      colorPicker.dataset.color = color;
      colorPicker.classList.remove(oldColor);
      colorPicker.classList.add(color);
  };

  function clearDelete(deleteBtn, deleteFrame, confirmDeleteReady) {
      deleteBtn.classList.remove('border-gray-500');
      deleteFrame.classList.add('hidden');
      confirmDeleteListReady = false;
  }

  /*
    //messagerieContentScroll.scrollTop = messagerieContentScroll.scrollHeight;
	const selector = document.getElementById('selector');

  	actionBtn.addEventListener('click', event => {select(-200);});

    function select(position) {
      actionLayout.style.transform = "translate(-400%, 0%)";
    }

    //doc.scrollIntoView({behavior: "smooth", block: "start"});
  */

}
