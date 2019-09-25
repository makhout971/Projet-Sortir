
function switchReadOnly(e) {
    document.getElementsByName('prenom').readOnly = false;

    document.getElementsByName('prenom').removeAttribute('readOnly');

    document.getElementById('prenom').removeAttribute('readOnly');
    document.getElementById('prenom').readOnly = false;
    e.preventDefault();
}