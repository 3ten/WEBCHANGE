/*********************************************************************************************************************/
// Файл который помогает нам двигаться по сайту
/*********************************************************************************************************************/
// 1. Правило никаких кнопок назаж
window.onload = function () {
    if (typeof history.pushState === "function") {
        history.pushState("jibberish", null, null);
        window.onpopstate = function () {
            history.pushState('newjibberish', null, null);
        };
    } else {
        var ignoreHashChange = true;
        window.onhashchange = function () {
            if (!ignoreHashChange) {
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
/*********************************************************************************************************************/
// Перенаправление на страицу устройств
function show_reports(obj) {
    location.href = 'REPORTS.php';
}
//Перенаправление на страницу Форм
function show_forms(obj) {
    location.href = 'VOICE.php';
}
// Перенаправление на страницу Виджетов
function show_admin(obj) {
    location.href = 'ADMIN.php';
    //location.href = 'ADMIN.php';
}
// Перенаправление на страницу касс
function show_cash(obj) {
  //  location.href = 'CASH.php';
}
// Перенаправление на страницу Филиалов
function show_filial(obj) {
  //  location.href = 'FILIAL.php';
}
// Перенаправление на страницу устройств
/**********************************************************************************************************************/
function show_device(obj) {
    location.href = 'DEVICE.php';
}
function show_chart_two(obj) {
    $("#content-tab1").fadeOut(0);
    $("#content-tab2").fadeIn(0);
}
function show_chart_one(obj) {
    $("#content-tab2").fadeOut(0);
    $("#content-tab1").fadeIn(0);
}
