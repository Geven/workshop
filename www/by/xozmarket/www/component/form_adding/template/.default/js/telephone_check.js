$(document).ready(function(){
    $('#companyShiftInput').click(function(){
        $('.companyShiftHide').show();
    });
    $('.companyCloseButtonDiv').click(function(){
        $('.companyShiftHide').hide();
    });

});

function checkTel() {
    var strTel = $('#companyTelephoneInput').val();

    var check = new RegExp('^[0-9-]{16,17}$');
    if (!check.test(strTel)) {
        $('.telerr').html('Пожалуйста укажите телефон в формате код страны-код города-телефон, например' +
        ' 375-29-222-22-22');

    }
    if (check.test(strTel)) {
        $('.telerr').html('');
        ;
    }

}
