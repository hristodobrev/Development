$(function (){
    $('ul#messages li').click(function () {
        $(this).fadeOut();
    });

    setInterval(function () {
        $('ul#messages li.info, ul#messages li.success').fadeOut();
    }, 2000)
});

function showValidationError(fieldName, errorMsg) {
    let field = $("input[name='" + fieldName + "'], textarea[name='" + fieldName + "']");
    field.after(
        $("<span class='validation-error'>").text(errorMsg)
    );
    field.focus();
}

(function(){
    window.onload = fixFooter;
    function fixFooter (){
        let footerHeight = $('footer').height();
        let headerHeight = $('header').height();
        let footerPadding = (Number)($('footer').css('padding').replace(/px/, "")) * 2;
        let headerPadding = (Number)($('header').css('padding').replace(/px/, "")) * 2;
        let mainPaddingTop = (Number)($('main').css('padding-top').replace(/px/, ""));
        let mainPaddingBottom = (Number)($('main').css('padding-bottom').replace(/px/, ""));
        footerHeight += footerPadding;
        headerHeight += headerPadding;

        let borders =
            (Number)($('header').css('border-top-width').replace(/px/, "")) +
            (Number)($('header').css('border-bottom-width').replace(/px/, "")) +
            (Number)($('footer').css('border-top-width').replace(/px/, "")) +
            (Number)($('footer').css('border-bottom-width').replace(/px/, ""));

        let documentHeight = $(document).height();
        $('main').height(documentHeight - (footerHeight + headerHeight + borders + mainPaddingBottom + mainPaddingTop));
    };
})();