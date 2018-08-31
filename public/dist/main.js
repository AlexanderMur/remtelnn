! function(e) { var a = {};

    function t(o) { if (a[o]) return a[o].exports; var r = a[o] = { i: o, l: !1, exports: {} }; return e[o].call(r.exports, r, r.exports, t), r.l = !0, r.exports } t.m = e, t.c = a, t.d = function(e, a, o) { t.o(e, a) || Object.defineProperty(e, a, { configurable: !1, enumerable: !0, get: o }) }, t.n = function(e) { var a = e && e.__esModule ? function() { return e.default } : function() { return e }; return t.d(a, "a", a), a }, t.o = function(e, a) { return Object.prototype.hasOwnProperty.call(e, a) }, t.p = "", t(t.s = 7) }({ 7: function(e, a, t) { e.exports = t(8) }, 8: function(e, a, t) { "use strict";
        Object.defineProperty(a, "__esModule", { value: !0 }); var o = t(9);
        t.n(o) }, 9: function(e, a) { var t, o, r, c, n, i, l, s = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) { return typeof e } : function(e) { return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e };
        t = jQuery, o = { type: "html", content: "", url: "", ajax: {}, ajax_request: null, closeOnEsc: !0, closeOnOverlayClick: !0, clone: !1, overlay: { block: void 0, tpl: '<div class="arcticmodal-overlay"></div>', css: { backgroundColor: "#000", opacity: .6 } }, container: { block: void 0, tpl: '<div class="arcticmodal-container"><table class="arcticmodal-container_i"><tr><td class="arcticmodal-container_i2"></td></tr></table></div>' }, wrap: void 0, body: void 0, errors: { tpl: '<div class="arcticmodal-error arcticmodal-close"></div>', autoclose_delay: 2e3, ajax_unsuccessful_load: "Error" }, openEffect: { type: "fade", speed: 400 }, closeEffect: { type: "fade", speed: 400 }, beforeOpen: t.noop, afterOpen: t.noop, beforeClose: t.noop, afterClose: t.noop, afterLoading: t.noop, afterLoadingOnShow: t.noop, errorLoading: t.noop }, r = 0, c = t([]), n = function(e, a) { var o = !0; return t(e).each(function() { t(a.target).get(0) == t(this).get(0) && (o = !1), 0 == t(a.target).closest("HTML", t(this).get(0)).length && (o = !1) }), o }, i = { getParentEl: function(e) { var a = t(e); return a.data("arcticmodal") ? a : !!(a = t(e).closest(".arcticmodal-container").data("arcticmodalParentEl")) && a }, transition: function(e, a, o, r) { switch (r = void 0 == r ? t.noop : r, o.type) {
                        case "fade":
                            "show" == a ? e.fadeIn(o.speed, r) : e.fadeOut(o.speed, r); break;
                        case "none":
                            "show" == a ? e.show() : e.hide(), r() } }, prepare_body: function(e, a) { t(".arcticmodal-close", e.body).unbind("click.arcticmodal").bind("click.arcticmodal", function() { return a.arcticmodal("close"), !1 }) }, init_el: function(e, a) { var o = e.data("arcticmodal"); if (!o) { if (r++, (o = a).modalID = r, o.overlay.block = t(o.overlay.tpl), o.overlay.block.css(o.overlay.css), o.container.block = t(o.container.tpl), o.body = t(".arcticmodal-container_i2", o.container.block), a.clone ? o.body.html(e.clone(!0)) : (e.before('<div id="arcticmodalReserve' + o.modalID + '" style="display: none" />'), o.body.html(e)), i.prepare_body(o, e), o.closeOnOverlayClick && o.overlay.block.add(o.container.block).click(function(a) { n(t(">*", o.body), a) && e.arcticmodal("close") }), o.container.block.data("arcticmodalParentEl", e), e.data("arcticmodal", o), c = t.merge(c, e), t.proxy(l.show, e)(), "html" == o.type) return e; if (void 0 != o.ajax.beforeSend) { var s = o.ajax.beforeSend;
                            delete o.ajax.beforeSend } if (void 0 != o.ajax.success) { var d = o.ajax.success;
                            delete o.ajax.success } if (void 0 != o.ajax.error) { var f = o.ajax.error;
                            delete o.ajax.error } var u = t.extend(!0, { url: o.url, beforeSend: function() { void 0 == s ? o.body.html('<div class="arcticmodal-loading" />') : s(o, e) }, success: function(a) { e.trigger("afterLoading"), o.afterLoading(o, e, a), void 0 == d ? o.body.html(a) : d(o, e, a), i.prepare_body(o, e), e.trigger("afterLoadingOnShow"), o.afterLoadingOnShow(o, e, a) }, error: function() { e.trigger("errorLoading"), o.errorLoading(o, e), void 0 == f ? (o.body.html(o.errors.tpl), t(".arcticmodal-error", o.body).html(o.errors.ajax_unsuccessful_load), t(".arcticmodal-close", o.body).click(function() { return e.arcticmodal("close"), !1 }), o.errors.autoclose_delay && setTimeout(function() { e.arcticmodal("close") }, o.errors.autoclose_delay)) : f(o, e) } }, o.ajax);
                        o.ajax_request = t.ajax(u), e.data("arcticmodal", o) } }, init: function(e) { if (e = t.extend(!0, {}, o, e), !t.isFunction(this)) return this.each(function() { i.init_el(t(this), t.extend(!0, {}, e)) }); if (void 0 == e) t.error("jquery.arcticmodal: Uncorrect parameters");
                    else if ("" == e.type) t.error('jquery.arcticmodal: Don\'t set parameter "type"');
                    else switch (e.type) {
                        case "html":
                            if ("" == e.content) { t.error('jquery.arcticmodal: Don\'t set parameter "content"'); break } var a = e.content; return e.content = "", i.init_el(t(a), e);
                        case "ajax":
                            if ("" == e.url) { t.error('jquery.arcticmodal: Don\'t set parameter "url"'); break } return i.init_el(t("<div />"), e) } } }, l = { show: function() { var e = i.getParentEl(this); if (!1 !== e) { var a = e.data("arcticmodal"); if (a.overlay.block.hide(), a.container.block.hide(), t("BODY").append(a.overlay.block), t("BODY").append(a.container.block), a.beforeOpen(a, e), e.trigger("beforeOpen"), "hidden" != a.wrap.css("overflow")) { a.wrap.data("arcticmodalOverflow", a.wrap.css("overflow")); var o = a.wrap.outerWidth(!0);
                            a.wrap.css("overflow", "hidden"); var r = a.wrap.outerWidth(!0);
                            r != o && a.wrap.css("marginRight", r - o + "px") } return c.not(e).each(function() { t(this).data("arcticmodal").overlay.block.hide() }), i.transition(a.overlay.block, "show", 1 < c.length ? { type: "none" } : a.openEffect), i.transition(a.container.block, "show", 1 < c.length ? { type: "none" } : a.openEffect, function() { a.afterOpen(a, e), e.trigger("afterOpen") }), e } t.error("jquery.arcticmodal: Uncorrect call") }, close: function() { if (!t.isFunction(this)) return this.each(function() { var e = i.getParentEl(this); if (!1 === e) t.error("jquery.arcticmodal: Uncorrect call");
                        else { var a = e.data("arcticmodal");!1 !== a.beforeClose(a, e) && (e.trigger("beforeClose"), c.not(e).last().each(function() { t(this).data("arcticmodal").overlay.block.show() }), i.transition(a.overlay.block, "hide", 1 < c.length ? { type: "none" } : a.closeEffect), i.transition(a.container.block, "hide", 1 < c.length ? { type: "none" } : a.closeEffect, function() { a.afterClose(a, e), e.trigger("afterClose"), a.clone || t("#arcticmodalReserve" + a.modalID).replaceWith(a.body.find(">*")), a.overlay.block.remove(), a.container.block.remove(), e.data("arcticmodal", null), t(".arcticmodal-container").length || (a.wrap.data("arcticmodalOverflow") && a.wrap.css("overflow", a.wrap.data("arcticmodalOverflow")), a.wrap.css("marginRight", 0)) }), "ajax" == a.type && a.ajax_request.abort(), c = c.not(e)) } });
                    c.each(function() { t(this).arcticmodal("close") }) }, setDefault: function(e) { t.extend(!0, o, e) } }, t(function() { o.wrap = t(document.all && !document.querySelector ? "html" : "body") }), t(document).bind("keyup.arcticmodal", function(e) { var a = c.last();
                a.length && a.data("arcticmodal").closeOnEsc && 27 === e.keyCode && a.arcticmodal("close") }), t.arcticmodal = t.fn.arcticmodal = function(e) { return l[e] ? l[e].apply(this, Array.prototype.slice.call(arguments, 1)) : "object" !== (void 0 === e ? "undefined" : s(e)) && e ? void t.error("jquery.arcticmodal: Method " + e + " does not exist") : i.init.apply(this, arguments) }, $(function() {
                (new WOW).init(), $(".callback_what_model").on("click", function() { return $(".popup_what_model").arcticmodal(), !1 }), $(".popup_what_model button").on("click", function(e) { $.arcticmodal("close") }), $(".bg2 .container_calc .nav_btn").click(function() { if ('parentIFrame' in window) window.parentIFrame.sendMessage('Hello from the iFrame'); $("html, body").animate({ scrollTop: $(".bg2").offset().top }, 400) } ), $(".bg2 div:not(.container_calc) .btn-group1 button").on("click", function(e) { var a = $(this).data("device");
                    $(".bg2 .devices").fadeOut(0), $(".bg2 .devices .models").fadeOut(0), $(".bg2 ." + a).fadeIn(300), $(".bg2 ." + a + " .models.active").fadeIn(300), $(this).closest(".devices").removeClass("active"), $(this).addClass("active"), $(".bg2 .btn-group1 button").removeClass("active"), $(this).addClass("active"), (new WOW).init() }), $(".bg2 div:not(.container_calc) .btn-group2 button").on("click", function(e) { var a = $(this).data("btn");
                    $(this).closest(".devices").find(".models").fadeOut(0), $(this).closest(".devices").find(".models").removeClass("active"), $('.bg2 .models[data-model="' + a + '"]').fadeIn(300).addClass("active"), $(this).closest(".devices").find(".btn-group2").find("button").removeClass("active"), $(this).addClass("active"), (new WOW).init() }); var e, a, t, o = !1;
                $(".bg2 .container_calc button.nav_btn").on("click", function(r) { var c = $(this).data("btn"); if ($(this).hasClass("device_target") && ($(this).data("btn"), $(this).text(), "", "", "", "", "Ничего не выбрано. ", "", "", ""), $(this).hasClass("model_target")) { var n = (e = $(this).data("model")) + "-min",
                            i = e + "-max";
                        $.each($(".bg2 .container_calc button"), function(e, a) { $(a).fadeIn(0), "none" == $(a).data(n) && "none" == $(this).data(i) && $(a).fadeOut(0) }), "pro" == $(this).data("model") && ("", "", "", "Ничего не выбрано. ", "", "", ""), $(this).text(), "no" == $(this).data("trade") && $(".block_iphone_breaking,.block_ipad_breaking").find('button[data-price="b11"]').fadeOut(0) } if ($(this).hasClass("polomka_target")) { var l = e + "-min";
                        console.log(l); var s = e + "-max";
                        a = $(this).data(l.toLowerCase()), t = $(this).data(s.toLowerCase()), console.log(a + ";" + t), $(this).text() } if ($(this).hasClass("polomka_target") && ("Коммерческая замена" == $(this).data("breaking") ? $(".block_result .price.max .text").html("Доплата за замену устройства <br>на новое с такими же характеристиками.") : $(".block_result .price.max .text").html("Запчасти оригинального класса")), $(this).hasClass("display_target")) { l = e + "-min", s = e + "-max";
                        a = $(this).data(l), t = $(this).data(s), console.log(a + ";" + t), $(this).text() } $(this).hasClass("crushglass") && (o = !0), ($(this).hasClass("display_target") || $(this).hasClass("polomka_target")) && ("none" == a ? $(".bg2 .container_calc .block_result .price.min").addClass("pricenone").css("display", "none") : ($(".block_result .min .zag span").text(a + " "), $(".bg2 .container_calc .block_result .price.min").removeClass("pricenone").css("display", "block")), "none" == t ? $(".bg2 .container_calc .block_result .price.max").addClass("pricenone").css("display", "none") : ($(".block_result .max .zag span").text(t + " "), $(".bg2 .container_calc .block_result .price.max").removeClass("pricenone").css("display", "block")), $(this).data("result"), $(".block_result .price.min").hasClass("pricenone") ? "Цена аналога отсутствует; " : "Цена аналога: " + a + " руб. ", $(".block_result .price.max").hasClass("pricenone") ? "Цена ориг. отсутствует" : "Цена ориг.: " + t + " руб. "), $(".bg2 .container_calc .views").fadeOut(0).addClass("faded").removeClass("active_view"), $('.bg2 .container_calc .views[data-view="' + c + '_view"]').fadeIn(300).removeClass("faded").addClass("active_view").addClass("breadcrumb"); var d = parseInt($(".bg2 .active_view").data("lvl"));
                    $.each($(".bg2 .container_calc #hashNav .link_href"), function(e, a) { console.log(d), parseInt($(a).data("href")) < d ? 0 == o ? 0 == $(a).hasClass("displayhash") && $(a).fadeIn(300).removeClass("hidden_nav") : $(a).fadeIn(300).removeClass("hidden_nav") : parseInt($(a).data("href")) >= d && $(a).fadeOut(0).addClass("hidden_nav") }) }), $(".container_calc .padding .block_start .btn-groups .block img").on("click", function(e) { $(this).closest(".block").find("button").click() }), $(".bg2 .container_calc #hashNav p.link_href").on("click", function(e) { var a = $(this).data("href");
                    $(".bg2 .container_calc .views").fadeOut(0).addClass("faded").removeClass("active_view"), 1 == $(this).data("href") ? ($(".bg2 .container_calc .block_result .price.min").css("display", "block"), o = !1, $(".bg2 .container_calc .views").removeClass("breadcrumb"), $(".bg2 .container_calc .views.block_start").fadeIn(300).removeClass("faded").addClass("active_view")) : $('.bg2 .container_calc .views.breadcrumb[data-lvl="' + a + '"]').fadeIn(300).removeClass("faded").addClass("active_view"), 2 == $(this).data("href") && ($(".bg2 .container_calc .block_result .price.min").css("display", "block"), o = !1), 3 == $(this).data("href") && ($(".bg2 .container_calc .block_result .price.min").css("display", "block"), o = !1); var t = parseInt($(".bg2 .active_view").data("lvl"));
                    $.each($(".bg2 .container_calc #hashNav .link_href"), function(e, a) { parseInt($(a).data("href")) < t ? $(a).fadeIn(0).removeClass("hidden_nav") : parseInt($(a).data("href")) >= t && $(a).fadeOut(0).addClass("hidden_nav") }), 5 == $(this).data("href") && ($(".bg2 .container_calc .block_result .price.min").css("display", "block"), 0 == o && $(".bg2 #hashNav .link_href.displayhash").addClass("hidden_nav").fadeOut(0), o = !1) }) }),
            function(e) { "use strict"; var a = function(a) { this.$element = e(a) };
                a.prototype.update = function(e) { var a = this.$element.find("div"),
                        t = a.find("span");
                    a.attr("aria-valuenow", e), a.css("width", e + "%"), t.text(e + "% Complete") }, a.prototype.finish = function() { this.update(100) }, a.prototype.reset = function() { this.update(0) }, e.fn.progressbar = function(t) { return this.each(function() { var o = e(this),
                            r = o.data("jbl.progressbar");
                        r || o.data("jbl.progressbar", r = new a(this)), "string" == typeof t && r[t](), "number" == typeof t && r.update(t) }) }, e(document).on("click", '[data-toggle="progressbar"]', function(a) { var t = e(this),
                        o = e(t.data("target")),
                        r = t.data("value");
                    a.preventDefault(), o.progressbar(r) }) }(window.jQuery),
            function(e) { e(document).on("click", ".model_target", function() { var a = e(this).data().model;
                    e("[data-device]").each(function() { e(this).data().device != a ? e(this).hide() : e(this).show() }) }) }(window.jQuery) } });



    

$(function(){

    $('.callback8').on('click', function(event) {
        event.preventDefault();
        $('.views').fadeOut(0);
        $('.help_view').fadeIn(300);
        
    });


    window.addEventListener("message", receiveMessage, false);


    function receiveMessage(event)
    {
        if(event.data == 'iphone'){
            $('button[data-btn="iPhone"]').click()    
        }
        if(event.data == 'macbook'){
            $('button[data-btn="MacBook"]').click()    
        }
        if(event.data == 'ipad'){
            $('button[data-btn="iPad"]').click()    
        }
        if(event.data == 'watch'){
            $('button[data-btn="Watch"]').click()    
        }
        
    }   
        
    
    // var iFrameResizer = {
    //     messageCallback: function(message){
    //         if(messageData.message == 'iphone'){ 
    //             $('button[data-btn="iPhone"]').click()
    //         }
    //         alert(message,parentIFrame.getId());
    //     } 
    // }


    $('.contactform2').submit(function() { 
      if ( $(this).validationEngine('validate') ) {
          $(this).ajaxSubmit();
          $(this).clearForm();
          $('.views').fadeOut(0);
          $('.thanks_view').fadeIn(300);
      }
      return false;
    }); 

    $.each($('.minconf span.textbtn'), function(index, val) {
        $(val).text($(val).closest('form').find('button, input[type="submit"]').text());
    });
})