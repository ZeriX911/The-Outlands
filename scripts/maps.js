const dcs = document.getElementsByClassName("menu-chooser");

function clickedBR(params) {
    removeSelector(0);
    params.classList.add('activeIcon');
    let content = document.getElementById("br-content");
    cleanClassList(content);
    content.classList.add("br-" + params.id);
}

function clickedAR(params) {
    removeSelector(1);
    params.classList.add('activeIcon');
    let content = document.getElementById("ar-content");
    cleanClassList(content);
    content.classList.add("ar-" + params.id);
}

function clickedSPEC(params) {
    removeSelector(2);
    params.classList.add('activeIcon');
    let content = document.getElementById("spec-content");
    cleanClassList(content);
    content.classList.add("sp-" + params.id);
    console.log(params.id)
}

function removeSelector(index) {
    dcs[index].childNodes.forEach(element => {
        if (element.hasChildNodes()) {
            element.classList.remove('activeIcon')

        }
    });
}

function cleanClassList(Element) {
    Element.classList.forEach(elem => {
        if (elem != "content") {
            Element.classList.remove(elem);
        }
    });
}