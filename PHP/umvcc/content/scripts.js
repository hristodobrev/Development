window.onload = function (){
    var headerHeight = $('header').height();
    var footerHeight = $('footer').height();
    var windowHeight = $(document).height();

    var mainPadding = $('main').css('padding');
    mainPadding = (Number)(mainPadding.substr(0, mainPadding.length - 2)) * 2;

    var footerPadding = $('footer').css('padding');
    footerPadding = (Number)(footerPadding.substr(0, footerPadding.length - 2)) * 2;

    var headerPadding = $('header').css('padding');
    headerPadding = (Number)(headerPadding.substr(0, headerPadding.length - 2)) * 2;

    $('main').height(windowHeight - (footerHeight + footerPadding + headerHeight + headerPadding) - mainPadding - 2);
};

$(function() {
    $('#messages li').click(function() {
        $(this).fadeOut();
    });
    setTimeout(function() {
        $('#messages li.info').fadeOut();
    }, 3000);
});

function showValidationError(fieldName, errorMsg) {
    let field = $("input[name='" + fieldName + "'], textarea[name='" + fieldName + "']");
    field.after(
        $("<span class='validation-error'>").text(errorMsg)
    );
    field.focus();
}
