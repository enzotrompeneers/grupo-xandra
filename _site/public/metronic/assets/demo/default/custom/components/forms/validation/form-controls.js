//== Class definition

var FormControls = function () {
    //== Private functions
    
    var demo1 = function () {
        $( "#m_form_1" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true,
                    minlength: 10 
                },
                url: {
                    required: true 
                },
                digits: {
                    required: true,
                    digits: true
                },
                creditcard: {
                    required: true,
                    creditcard: true 
                },
                phone: {
                    required: true,
                    phoneUS: true 
                },
                option: {
                    required: true
                },
                options: {
                    required: true,
                    minlength: 2,
                    maxlength: 4
                },
                memo: {
                    required: true,
                    minlength: 10,
                    maxlength: 100
                },

                checkbox: {
                    required: true
                },
                checkboxes: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                radio: {
                    required: true
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_1_msg');
                alert.removeClass('m--hide').show();
                mApp.scrollTo(alert, -200);
            },

            submitHandler: function (form) {
                //form[0].submit(); // submit the form
            }
        });       
    }

    var demo2 = function () {
        $( "#m_form_2" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true 
                },
                url: {
                    required: true 
                },
                digits: {
                    required: true,
                    digits: true
                },
                creditcard: {
                    required: true,
                    creditcard: true 
                },
                phone: {
                    required: true,
                    phoneUS: true 
                },
                option: {
                    required: true
                },
                options: {
                    required: true,
                    minlength: 2,
                    maxlength: 4
                },
                memo: {
                    required: true,
                    minlength: 10,
                    maxlength: 100
                },

                checkbox: {
                    required: true
                },
                checkboxes: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                radio: {
                    required: true
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_2_msg');
                alert.removeClass('m--hide').show();
                mApp.scrollTo(alert, -200);
            },

            submitHandler: function (form) {
                //form[0].submit(); // submit the form
            }
        });       
    }

    return {
        // public functions
        init: function() {
            demo1(); 
            demo2(); 
        }
    };
}();

jQuery(document).ready(function() {    
    FormControls.init();
});



// textarea
var text_max = 160;
var text_length = 0;
var text_remaining = 0;
var id = $('#meta-descr-en');
var id_feedback = $('#meta-descr-en_feedback');

id_feedback.html(text_length + '/' + text_max + ' caracteres');
id.keyup(function() {
    text_length = id.val().length;
    if (text_length > text_max) {
        id_feedback.html(text_length + '/' + text_max + ' caracteres');
        id_feedback.addClass( "warning-color");
    }

    if (text_length <= text_max) {
        text_remaining = text_max - text_length;
        id_feedback.html(text_length + '/' + text_max + ' caracteres');
        id_feedback.removeClass( "warning-color");

    }
});



// begin: textarea chars left and warning
var descr_names = [
    'es',
    'en',
    'nl',
];

jQuery.each( descr_names, function( i, val ) {
    var meta_id = "#meta-descr-" + val;
    var meta_feedback_id = meta_id + "-feedback";

    $(meta_feedback_id).html(text_length + '/' + text_max + ' caracteres');
    $(meta_id).keyup(function() {
        text_length = $(meta_id).val().length;
        $(meta_feedback_id).html(text_length + '/' + text_max + ' caracteres');
        if (text_length > text_max) {
            $(meta_feedback_id).addClass( "warning-color");
        } else {
            $(meta_feedback_id).removeClass( "warning-color");
        }
    });
});
// end: textarea chars left and warning

// begin: create meta tags out of textarea input
var meta_names = [
    'es',
    'en',
    'nl'
];

jQuery.each( meta_names, function( i, val ) {
    var meta_tag_name = "";
    var meta_name = '#meta-key-' + val;
    var btn_key = meta_name + '-btn';
    var tag_name = meta_name + '-tag';

    $(btn_key).click( function (e) {
        e.preventDefault();
        meta_tag_name = $(meta_name).val();
        $(tag_name).append('<div type="button" class="btn btn-default tag">'+ meta_tag_name +' <i class="fa fa-close"></i></div>');
        $(meta_name).val('');
    })

    $('body').on('click', 'i.fa-close', function() {
        $(this).parent().remove();
    } );
});
// end: create meta tags out of textarea input