function FILTER_SHOW(obj) {
    $("#FILTER_FORM").modal('show');
}
// Получение данных с формы
function filter_save(obj) {
    var filter_begin_date = $('#filter_begin_date').val();
    var filter_end_date = $('#filter_end_date').val();
    var OPERATION_ID = '14'; // добавление устройства
    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID +
        "& filter_begin_date= " + filter_begin_date +
        "& filter_end_date= " + filter_end_date
        ,
        success: function (data) {
            data = JSON.parse(data);
            var MSG = data.MSG;
            location.reload();
        }
    }).done(function () {
        $("#load").fadeOut(400);
    });

}

function filter_clear(obj) {
    var OPERATION_ID = '15'; // добавление устройства
    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID
        ,
        success: function (data) {
            data = JSON.parse(data);
            var MSG = data.MSG;
            location.reload();
        }
    }).done(function () {
        $("#load").fadeOut(400);
    });

}
/**********************************************************************************************************************/
