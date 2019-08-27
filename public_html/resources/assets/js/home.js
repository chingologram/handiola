var $ = require('jquery');
var scroll = require('scroll')
var page = require('scroll-doc')()

// nl2br polyfill
String.prototype.nl2br = function()
{
    return this.replace(/\n/g, "<br />");
}

$(function() {

    var reservaChangeHandler = function() {
        var result = validarReserva();
        if (result != "OK") {
            $('.overlay .errors').html(result.nl2br()).css({opacity: 1});
            $('#GuardarReserva').attr('disabled', 'disabled');
        } else {
            $('#GuardarReserva').attr('disabled', null);
            $('.overlay .errors').empty().css({opacity: 0});
        }
    }

    $('#banner .button').click(function() {
        scroll.top(page, $('#servicios').position().top - $('#header').height());
        $('#servicios header').removeClass('focustext');
        window.setTimeout(function() { $('#servicios header').addClass('focustext') }, 0);
        return false;
    });
    $('#open-nav').click(function() {
        openNav();
    });
    $('.overlay select, .overlay input').change(reservaChangeHandler);
});
