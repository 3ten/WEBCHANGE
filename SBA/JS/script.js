$(document).ready(function () {
    $(".dws-progress-bar").circularProgress({
        color: "#25ffe4",
        line_width: 15,
        height: "350px",
        width: "350px",
        percent: 0,
     //    counter_clockwise: true,
        starting_position: 15
    }).circularProgress('animate', 100, 1500);
});

$(window).on('load', function () {
   var $preloader = $('#preloader');
   $preloader.delay(1000).fadeOut('slow');
});