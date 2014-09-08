$(document).ready(function () {
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
    t("sidr-main")
});
$(document).ready(function () {



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
    // $("body").fitVids();



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
    
    
});
// $(document).ready(function (e) {
//     e("form.quform").Quform();
//     e("#display-instant-feedback-form").on("click", function (t) {
//         t.preventDefault();
//         e("#instant-feedback-form").slideToggle()
//     });
//     e.isFunction(e.fn.qtip) && e(".quform-tooltip").qtip({
//         content: {
//             text: !1
//         },
//         style: {
//             classes: "qtip-default qtip-shadow quform-tt",
//             width: "180px"
//         },
//         position: {
//             my: "left center",
//             at: "right center"
//         }
//     });
//     e("#subject").replaceSelectWithTextInput({
//         onValue: "Other"
//     })
// })