/*
function showPriorityElement(element) {
    const doc = document.documentElement;
    doc.classList.add('overflow-hidden');
    const top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);

    const parentDiv = document.createElement("div");
    parentDiv.id = "priorityParent"
    parentDiv.className = 'absolute left-0 w-full h-full bg-black bg-opacity-60 flex justify-center items-center text-3xl lg:text-base';
    parentDiv.style.top = top + "px";
    parentDiv.style.zIndex = "999";

    parentDiv.appendChild(element);
    body.appendChild(parentDiv);
}
*/

function showFullScreenPriorityElement(element) {
    const doc = document.documentElement;
    doc.classList.add('overflow-hidden');
    const top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);

    const parentDiv = document.createElement("div");
    parentDiv.id = "priorityParent"
    parentDiv.className = 'absolute left-0 w-full h-full flex justify-center items-center';
    parentDiv.style.top = top + "px";
    parentDiv.style.zIndex = "100";

    parentDiv.appendChild(element);
    body.appendChild(parentDiv);
}

function showPriorityElement(element) {
    const doc = document.documentElement;
    doc.classList.add('overflow-hidden');
    const top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);

    const parentDiv = document.createElement("div");
    parentDiv.id = "priorityParent"
    parentDiv.className = 'absolute left-0 w-full h-full flex justify-center items-center text-3xl lg:text-base';
    parentDiv.style.top = top + "px";
    parentDiv.style.zIndex = "999";

    parentDiv.appendChild(element);
    body.appendChild(parentDiv);
}
