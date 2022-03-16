const dcs = document.getElementsByClassName("menu-chooser");

function clickedBR(params) {
    removeSelector(0);
    params.classList.add('activeIcon');
    let content = document.getElementById("br-content");

}

function clickedAR(params) {
    removeSelector(1);
    params.classList.add('activeIcon');
}

function clickedSPEC(params) {
    removeSelector(2);
    params.classList.add('activeIcon');
}

function removeSelector(index) {
    dcs[index].childNodes.forEach(element => {
        if (element.hasChildNodes()) {
            element.classList.remove('activeIcon')

        }
    });
}