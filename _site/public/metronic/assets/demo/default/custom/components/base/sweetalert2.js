//== Class definition
var SweetAlert2Demo = function() {

    //== Demos
    var initDemos = function() {
        
        $('#m_sweetalert_demo_8').click(function(event) {
            event.preventDefault();
            swal({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Borrar pagina'
            }).then(function(result) {
                if (result.value) {
                    swal(
                        'página eliminada',
                        '',
                        'success'
                    )
                }
            });
        });



    };

    return {
        //== Init
        init: function() {
            initDemos();
        },
    };
}();

//== Class Initialization
jQuery(document).ready(function() {
    SweetAlert2Demo.init();
});