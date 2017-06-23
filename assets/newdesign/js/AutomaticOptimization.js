$(function () {
    //navbar
    $("#navbarToggle").blur(function (event) {
        var screenWidth = window.innerWidth;
        if (screenWidth < 768) {
            $("#mobile").collapse('hide');
        }
    });
    // End navbar //

    // menu //

    $('.menu .panel').on('show.bs.collapse', function (e) {
        var x = $(this).find('.glyphicon');
        $(x).removeClass('glyphicon-triangle-right');
        $(x).addClass('glyphicon-triangle-bottom');
    });
    $('.menu .panel').on('hide.bs.collapse', function (e) {
        var y = $(this).find('.glyphicon');
        $(y).addClass('glyphicon-triangle-right');
        $(y).removeClass('glyphicon-triangle-bottom');
    });

    // End menu //
});