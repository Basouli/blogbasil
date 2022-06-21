function setDiv(id, classes) {
    const div = document.createElement("div");
    div.id = id;
    div.className = classes;
    return div;
}

function setText(id, classes, text) {
    const p = document.createElement("p");
    p.id = id;
    p.className = classes;
    p.innerHTML = text;
    return p;
}

function setButton(id, classes, text) {
    const div = setDiv(id, classes);
    div.appendChild(setText(null, null, text));
    return div;
}

function setSvgButton(id, classes, left, svg, text) {
    const div = setDiv(id, classes);
    if (left) {
        div.innerHTML = svg;
        div.appendChild(setText(null, null, text));
    } else {
        div.appendChild(setText(null, null, text));
        div.innerHTML = div.innerHTML + svg;
    }
    return div;
}
