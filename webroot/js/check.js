var validNavigation = 'N';
var verifyMainUrl = SITE_URL + 'system-usages/';
function endSession(e) {
    var typeId = event.currentTarget.performance.navigation.type;
    $.post(verifyMainUrl + "update-last-online/", {validNavigation: validNavigation, typeId: typeId}, function (_data) {

    });


}

$(document).ready(function () {
    $(document).bind('keypress', function (e) {
        if (e.keyCode == 116) {
            validNavigation = 'Y';
        }
    });

    // Attach the event click for all links in the page
    $("a").bind("click", function () {
        validNavigation = 'Y';
    });

    // Attach the event submit for all forms in the page
    $("form").bind("submit", function () {
        validNavigation = 'Y';
    });

    // Attach the event click for all inputs in the page
    $("input[type=submit]").bind("click", function () {
        validNavigation = 'Y';
    });

    $(window).bind("beforeunload", function (e) {
        endSession(e);
    });

    setInterval(function () {
        $.post(verifyMainUrl + "verifysession/", {ischeck: 'Y'}, function (_data) {
            if (_data !== 'ok') {
                swal("Session หมดอายุ", "กรุณาเข้าสู่ระบบใหม่อีกครั้ง");
                swal({
                    title: "Session หมดอายุ",
                    text: "กรุณาเข้าสู่ระบบใหม่อีกครั้ง",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-warning',
                    confirmButtonText: "เข้าสู่ระบบ",
                    closeOnConfirm: false
                }, function () {
                    //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    window.location = SITE_URL;
                });

            }
        });
    }, 30000);
});
