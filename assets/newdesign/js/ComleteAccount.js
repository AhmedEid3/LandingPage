$(function () {
    //navbar
    $("#navbarToggle").blur(function (event) {
        var screenWidth = window.innerWidth;
        if (screenWidth < 768) {
            $("#mobile").collapse('hide');
        }
    });
    // End navbar //

    // Account //
    $('.menu.account .panel').on('show.bs.collapse', function (e) {
        var x = $(this).find('.glyphicon');
        $(x).fadeOut("slow", function () {
            $(x).removeClass('glyphicon-triangle-bottom');
        });

        var i = $(this).find('.panel-heading');
        $(i).css({
            "border-bottom-width": "2px",
            "border-bottom-left-radius": "0",
            "border-bottom-right-radius": "0"
        });
    });

    $('.menu.account .panel').on('hide.bs.collapse', function (e) {
        var y = $(this).find('.glyphicon');
        $(y).fadeIn( function () {
            $(y).addClass('glyphicon-triangle-bottom');
        });
    });

    $('.menu.account .panel').on('hidden.bs.collapse', function (e) {
        var z = $(this).find('.panel-heading');
        console.log(z);
        $(z).css({
            "border-bottom-width": "0",
            "border-bottom-left-radius": "7px",
            "border-bottom-right-radius": "7px"
        });
    });
    // End Account //

});