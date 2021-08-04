function localizeID(item) {
    return document.getElementById(item);
}

function addInPage(content) {
    document.querySelector('body').innerHTML += content;
}

function toArray(stringItem) {
    return String(stringItem).split("");
}

function addClass(element,className){
    element.classList.add(className);
}

function removeClass(element,className){
    element.classList.remove(className);
}