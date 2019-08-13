

// скрипт запрещающий работать с кнопкой назад
window.onload = function () {
    if (typeof history.pushState === "function") {
        history.pushState("jibberish", null, null);
        window.onpopstate = function () {

//alert('гыгыгыгы');

            history.pushState('newjibberish', null, null);
            // Handle the back (or forward) buttons here
            // Will NOT handle refresh, use onbeforeunload for this.
        };
    } else {
        var ignoreHashChange = true;
        window.onhashchange = function () {
            if (!ignoreHashChange) {
//навкрно тутуа , проверить не где
//alert('гыгыгыгы');

                ignoreHashChange = true;
                window.location.hash = Math.random();
                // Detect and redirect change here
                // Works in older FF and IE9
                // * it does mess with your hash symbol (anchor?) pound sign
                // delimiter on the end of the URL
            } else {
                ignoreHashChange = false;
            }
        };
    }
}

/* Показать устройства*/

function show_device(obj) {
    location.href = 'DEVICE.php';
}

function show_reports(obj) {
    location.href = 'REPORTS.php';
}

function new_device_show(obj) {
    $("#device_new").modal('show');
}

function show_forms(obj) {
    location.href = 'VOICE.php';
}

function show_admin(obj) {
    location.href = 'OPERDAY.php';
}

function show_cash(obj) {
    location.href = 'CASH.php';
}

function show_filial(obj) {
    location.href = 'FILIAL.php';
}

function new_device_save(obj) {

    var DEVICE_NAME = $('#FORM_DEVICE_NAME').val();
    var DEVICE_FILIAL = $('#FORM_DEVICE_FILIAL').val();
    var DEVICE_CASH = $('#FORM_DEVICE_CASH').val();
    var DEVICE_SNUMBER = $('#FORM_DEVICE_SNUMBER').val();
    var DEVICE_COMMENT = $('#FORM_DEVICE_COMMENT').val();
    var OPERATION_ID = '1'; // добавление устройства




    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID + "& DEVICE_NAME= " + DEVICE_NAME + "& DEVICE_FILIAL= " + DEVICE_FILIAL + "& DEVICE_CASH= " + DEVICE_CASH + "& DEVICE_SNUMBER= " + DEVICE_SNUMBER + "& DEVICE_COMMENT= " + DEVICE_COMMENT,
        success: function (data) {
            data = JSON.parse(data);
            var MSG = data.MSG;

            location.reload();

        }
    }).done(function () {
        $("#load").fadeOut(400);
    });
}

// ВЫДЕЛЕНИЕ ЗАПИСИ ФИЛИАЛА
function sel_filial(obj) {
    var ID_FILIAL = obj.id;
    var OPERATION_ID = 4;
    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID + "&ID_FILIAL=" + ID_FILIAL,
        success: function (data) {
            data = JSON.parse(data);
            var MSG = data.MSG;

            if (MSG == 'filial_add') {
                document.getElementById(ID_FILIAL).style.background = '#CAD8EF';
            }
            if (MSG == 'filial_del') {
                document.getElementById(ID_FILIAL).style.background = 'white';
            }
        }
    }).done(function () {
        $("#load").fadeOut(400);
    });

}

// УДАЛЕНИЕ ЗАПИСИ ФИЛИАЛА
function delete_filial(obj) {
    var OPERATION_ID = 5;
    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID,
        success: function (data) {
            data = JSON.parse(data);
            var MSG = data.MSG;
            location.reload();
        }
    }).done(function () {
        $("#load").fadeOut(400);
    });

}

// ВЫДЕЛЕНИЕ ЗАПИСИ УСТРОЙСТВА
function sel_device(obj) {
    var ID_DEVICE = obj.id;
    var OPERATION_ID = 6;

    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID + "&ID_DEVICE=" + ID_DEVICE,
        success: function (data) {
            data = JSON.parse(data);
            var MSG = data.MSG;

            if (MSG == 'device_add') {
                document.getElementById(ID_DEVICE).style.background = '#CAD8EF';
            }
            if (MSG == 'device_del') {
                document.getElementById(ID_DEVICE).style.background = 'white';
            }
        }
    }).done(function () {
        $("#load").fadeOut(400);
    });

}

// УДАЛЕНИЕ ЗАПИСИ ДЕВАЙСА
function delete_device(obj) {

    var OPERATION_ID = 7;
    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID,
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
                                       /*БЛОК УПРАВЛЕНИЯ ФИЛИАЛАМИ*/
/*СОЗДАНИЕ НОВОГО ФИЛИАЛА*/
   // Открытие модального окна
        function new_filial_show(obj) {$("#filial_form").modal('show');}
   // Получение данных с формы
function filial_save(obj) {

    var FILIAL_NAME = $('#FORM_FILAL_NAME').val();
    var FILIAL_ADDRESS = $('#FORM_FILAL_ADDRES').val();
    var FILIAL_COMMENT = $('#FORM_FILIAL_COMMENT').val();
    var OPERATION_ID = '9'; // добавление устройства
    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID +
              "& FILIAL_NAME= " + FILIAL_NAME +
              "& FILIAL_ADDRESS= " + FILIAL_ADDRESS +
              "& FILIAL_COMMENT= " + FILIAL_COMMENT
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
/*Удаление филиала*/
/**********************************************************************************************************************/

/**********************************************************************************************************************/
                                      /*БЛОК УПРАВЛЕНИЯ КАССАМИ*/
  function new_cash_show(obj) {$("#cash_form").modal('show');}

// Получение данных с формы
function cash_save(obj) {

    var CASH_NAME = $('#FORM_CASH_NAME').val();
    var FORM_CASH_FILIAL = $('#FORM_CASH_FILIAL').val();
    var CASH_COMMENT = $('#FORM_CASH_COMMENT').val();
    var OPERATION_ID = '10'; // добавление устройства

    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID +
            "& CASH_NAME= " + CASH_NAME +
            "& FORM_CASH_FILIAL= " + FORM_CASH_FILIAL +
            "& CASH_COMMENT= " + CASH_COMMENT
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

function sel_cash(obj) {
    var ID_CASH = obj.id;
    var OPERATION_ID = 11;


    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID + "&ID_CASH=" + ID_CASH,
        success: function (data) {
            data = JSON.parse(data);
            var MSG = data.MSG;

            if (MSG == 'device_add') {
                document.getElementById(ID_CASH).style.background = '#CAD8EF';
            }
            if (MSG == 'device_del') {
                document.getElementById(ID_CASH).style.background = 'white';
            }
        }
    }).done(function () {
        $("#load").fadeOut(400);
    });

}
// УДАЛЕНИЕ ЗАПИСИ
function delete_cash(obj) {
    var OPERATION_ID = 12;
    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID,
        success: function (data) {
            data = JSON.parse(data);
            var MSG = data.MSG;
            location.reload();
        }
    }).done(function () {
        $("#load").fadeOut(400);
    });

}

function update_voice_params(obj) {
    $("#form_voice_params").modal('show');
}

// Получение данных с формы
function save_voice_params(obj) {

    var FORM_VOICE_NAME = $('#FORM_VOICE_NAME').val();
    var FORM_VOICE_COMMENT = $('#FORM_VOICE_COMMENT').val();
    var OPERATION_ID = '13'; // добавление устройства

    $.ajax({
        url: "OPERATIONS.php",
        beforeSend: function () {
            $("#load").fadeIn(400);
        },
        type: "post",
        data: "OPERATION_ID=" + OPERATION_ID +
            "& FORM_VOICE_NAME= " + FORM_VOICE_NAME +
            "& FORM_VOICE_COMMENT= " + FORM_VOICE_COMMENT
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
