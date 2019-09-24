
function switchReadOnly(e) {
    document.getElementsByName('prenom').readOnly = false;

    document.getElementsByName('prenom').removeAttribute('readOnly');

    e.preventDefault();
}