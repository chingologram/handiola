/*
$(function(){
    $('#modelButton').click(function(){
        $('.modal').modal('show')
            .find('#modelContent')
            .load($(this).attr('value'));
    });
});
*/

$(function () {
    $('.pagar-modal-click').click(function () {
        $('#pagar-modal')
            .modal('show')
            .find('#pagarModalContent')
            .load($(this).attr('value'));
    });
    $('.view-modal-click').click(function () {
        $('#view-modal')
            .modal('show')
            .find('#viewModalContent')
            .load($(this).attr('value'));
    });    
});