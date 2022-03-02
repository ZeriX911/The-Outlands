function ShowName(id) {
    writeHeader(document.getElementById(id).getElementsByClassName('txt')[0].innerText);

}

function writeHeader(NAME) {
    document.getElementById('legend-name').innerText = NAME;
}