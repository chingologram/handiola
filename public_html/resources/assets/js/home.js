var $ = require('jquery');
var scroll = require('scroll')
var page = require('scroll-doc')()

$(function() {
    $('#banner .button').click(function() {
        scroll.top(page, $('#servicios').position().top - $('#header').height());
        $('#servicios header').removeClass('focustext');
        window.setTimeout(function() { $('#servicios header').addClass('focustext') }, 0);
        return false;
    });
});
