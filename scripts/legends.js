function ShowName(id) {
    writeHeader(document.getElementById(id).getElementsByClassName('txt')[0].innerText, id);

}

function writeHeader(NAME, id) {
    document.getElementById('legend-name').innerText = NAME;
    switch (id) {
        case 'BHD':
            ROLE = 'Technological Tracker';
            break;
        case 'GIB':
            ROLE = 'Shielded Fortress';
            break;
        case 'LIF':
            ROLE = 'Combat Medic';
            break;
        case 'PAT':
            ROLE = 'Forward Scout';
            break;
        case 'WRA':
            ROLE = 'Interdimensional Skirmisher';
            break;
        case 'BAN':
            ROLE = 'Professional Soldier';
            break;
        case 'CAU':
            ROLE = 'Toxic Trapper';
            break;
        case 'MIR':
            ROLE = 'Holographic Trickster';
            break;
        case 'OCT':
            ROLE = 'High-Speed Daredevil';
            break;
        case 'WAT':
            ROLE = 'Static Defender';
            break;
        case 'CRY':
            ROLE = 'Surveillance Expert';
            break;
        case 'REV':
            ROLE = 'Synthetic Nightmare';
            break;
        case 'LOB':
            ROLE = 'Translocating Thief';
            break;
        case 'RAM':
            ROLE = 'Base of Fire';
            break;
        case 'HOR':
            ROLE = 'Gravitational Manipulator';
            break;
        case 'FUS':
            ROLE = 'Explosives Enthusiast';
            break;
        case 'VAL':
            ROLE = 'Winged Avenger';
            break;
        case 'SEE':
            ROLE = 'Ambush Artist';
            break;
        case 'ASH':
            ROLE = 'Incisive Instigator';
            break;
        case 'MMG':
            ROLE = 'Rebel Warlord';
            break;
        default:
            ROLE = 'Description'
            break;
    }
    document.getElementById('legend-desc').innerText = ROLE
}