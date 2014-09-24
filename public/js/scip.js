$(document).ready(function () {
    // Android menu hack
    // This is a hack to enable scrolling of mobile
    // menu in android
    function e() {
        try {
            document.createEvent("TouchEvent");
            return !0
        } catch (e) {
            return !1
        }
    }
    function t(t) {
        if (e()) {
            var n = document.getElementById(t),
                r = 0;
            document.getElementById(t).addEventListener("touchstart", function (e) {
                r = this.scrollTop + e.touches[0].pageY;
                e.preventDefault()
            }, !1);
            document.getElementById(t).addEventListener("touchmove", function (e) {
                this.scrollTop = r - e.touches[0].pageY;
                e.preventDefault()
            }, !1)
        }
    };
    // END Android menu hack

    $("ul.nav li.dropdown").hover(function () {
        $(this).find(".dropdown-menu").stop(!0, !0).delay(200).show()
    }, function () {
        $(this).find(".dropdown-menu").stop(!0, !0).delay(200).hide()
    });
    $(".dropdown-menu").hover(function () {
        $(this).closest(".dropdown").find(".dropdown-toggle").addClass("dropdown-hover")
    }, function () {
        $(this).closest(".dropdown").find(".dropdown-toggle").removeClass("dropdown-hover")
    });

    $("#responsive-menu-button").sidr({
        name: "sidr-main",
        speed: 200,
        body: "#region-main, .navbar-fixed-top",
        source: ".editbtn, #region-pre, #user-context-menu"
    });
    $("#responsive-menu-button").click(function (e) {
        $(".brand").fadeToggle();
        e.preventDefault()
    }); 

    (function calculateIframeRatio(){
        echo "Hi Aaron";
        var iFrame = $('#region-main').find('.google-form iframe');
        console.log(iFrame);
    })();
});