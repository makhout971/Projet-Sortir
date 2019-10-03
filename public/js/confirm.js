
function confirmation() {
    if ( confirm( "Confirmez votre inscription" ) ) {
        window.location.href = '{{ path(home) }}';
    } else {
           this.close;
    }

}