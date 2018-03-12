import 'jquery';
import foundation from 'foundation-sites';
import '../css/style.scss';


// START: animation from the fixed footer to go to the form
$('.arrow-down').click(function(e){
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $('#contact-form').offset().top
    }, 500);
});
// END


$(document).foundation()
