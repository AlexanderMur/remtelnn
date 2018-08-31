(function (d) {
    var g = {
        type: "html",
        content: "",
        url: "",
        ajax: {},
        ajax_request: null,
        closeOnEsc: !0,
        closeOnOverlayClick: !0,
        clone: !1,
        overlay: {
            block: void 0,
            tpl: '<div class="arcticmodal-overlay"></div>',
            css: {backgroundColor: "#000", opacity: 0.6}
        },
        container: {
            block: void 0,
            tpl: '<div class="arcticmodal-container"><table class="arcticmodal-container_i"><tr><td class="arcticmodal-container_i2"></td></tr></table></div>'
        },
        wrap: void 0,
        body: void 0,
        errors: {
            tpl: '<div class="arcticmodal-error arcticmodal-close"></div>', autoclose_delay: 2E3,
            ajax_unsuccessful_load: "Error"
        },
        openEffect: {type: "fade", speed: 400},
        closeEffect: {type: "fade", speed: 400},
        beforeOpen: d.noop,
        afterOpen: d.noop,
        beforeClose: d.noop,
        afterClose: d.noop,
        afterLoading: d.noop,
        afterLoadingOnShow: d.noop,
        errorLoading: d.noop
    }, j = 0, e = d([]), m = {
        isEventOut: function (a, b) {
            var c = !0;
            d(a).each(function () {
                d(b.target).get(0) == d(this).get(0) && (c = !1);
                0 == d(b.target).closest("HTML", d(this).get(0)).length && (c = !1)
            });
            return c
        }
    }, f = {
        getParentEl: function (a) {
            var b = d(a);
            return b.data("arcticmodal") ? b : (b =
                d(a).closest(".arcticmodal-container").data("arcticmodalParentEl")) ? b : !1
        }, transition: function (a, b, c, e) {
            e = void 0 == e ? d.noop : e;
            switch (c.type) {
                case "fade":
                    "show" == b ? a.fadeIn(c.speed, e) : a.fadeOut(c.speed, e);
                    break;
                case "none":
                    "show" == b ? a.show() : a.hide(), e()
            }
        }, prepare_body: function (a, b) {
            d(".arcticmodal-close", a.body).unbind("click.arcticmodal").bind("click.arcticmodal", function () {
                b.arcticmodal("close");
                return !1
            })
        }, init_el: function (a, b) {
            var c = a.data("arcticmodal");
            if (!c) {
                c = b;
                j++;
                c.modalID = j;
                c.overlay.block =
                    d(c.overlay.tpl);
                c.overlay.block.css(c.overlay.css);
                c.container.block = d(c.container.tpl);
                c.body = d(".arcticmodal-container_i2", c.container.block);
                b.clone ? c.body.html(a.clone(!0)) : (a.before('<div id="arcticmodalReserve' + c.modalID + '" style="display: none" />'), c.body.html(a));
                f.prepare_body(c, a);
                c.closeOnOverlayClick && c.overlay.block.add(c.container.block).click(function (b) {
                    m.isEventOut(d(">*", c.body), b) && a.arcticmodal("close")
                });
                c.container.block.data("arcticmodalParentEl", a);
                a.data("arcticmodal", c);
                e = d.merge(e, a);
                d.proxy(h.show, a)();
                if ("html" == c.type) return a;
                if (void 0 != c.ajax.beforeSend) {
                    var k = c.ajax.beforeSend;
                    delete c.ajax.beforeSend
                }
                if (void 0 != c.ajax.success) {
                    var g = c.ajax.success;
                    delete c.ajax.success
                }
                if (void 0 != c.ajax.error) {
                    var l = c.ajax.error;
                    delete c.ajax.error
                }
                var n = d.extend(!0, {
                    url: c.url, beforeSend: function () {
                        void 0 == k ? c.body.html('<div class="arcticmodal-loading" />') : k(c, a)
                    }, success: function (b) {
                        a.trigger("afterLoading");
                        c.afterLoading(c, a, b);
                        void 0 == g ? c.body.html(b) : g(c, a, b);
                        f.prepare_body(c,
                            a);
                        a.trigger("afterLoadingOnShow");
                        c.afterLoadingOnShow(c, a, b)
                    }, error: function () {
                        a.trigger("errorLoading");
                        c.errorLoading(c, a);
                        void 0 == l ? (c.body.html(c.errors.tpl), d(".arcticmodal-error", c.body).html(c.errors.ajax_unsuccessful_load), d(".arcticmodal-close", c.body).click(function () {
                            a.arcticmodal("close");
                            return !1
                        }), c.errors.autoclose_delay && setTimeout(function () {
                            a.arcticmodal("close")
                        }, c.errors.autoclose_delay)) : l(c, a)
                    }
                }, c.ajax);
                c.ajax_request = d.ajax(n);
                a.data("arcticmodal", c)
            }
        }, init: function (a) {
            a =
                d.extend(!0, {}, g, a);
            if (d.isFunction(this)) if (void 0 == a) d.error("jquery.arcticmodal: Uncorrect parameters"); else if ("" == a.type) d.error('jquery.arcticmodal: Don\'t set parameter "type"'); else switch (a.type) {
                case "html":
                    if ("" == a.content) {
                        d.error('jquery.arcticmodal: Don\'t set parameter "content"');
                        break
                    }
                    var b = a.content;
                    a.content = "";
                    return f.init_el(d(b), a);
                case "ajax":
                    if ("" == a.url) {
                        d.error('jquery.arcticmodal: Don\'t set parameter "url"');
                        break
                    }
                    return f.init_el(d("<div />"), a)
            } else return this.each(function () {
                f.init_el(d(this),
                    d.extend(!0, {}, a))
            })
        }
    }, h = {
        show: function () {
            var a = f.getParentEl(this);
            if (!1 === a) d.error("jquery.arcticmodal: Uncorrect call"); else {
                var b = a.data("arcticmodal");
                b.overlay.block.hide();
                b.container.block.hide();
                d("BODY").append(b.overlay.block);
                d("BODY").append(b.container.block);
                b.beforeOpen(b, a);
                a.trigger("beforeOpen");
                if ("hidden" != b.wrap.css("overflow")) {
                    b.wrap.data("arcticmodalOverflow", b.wrap.css("overflow"));
                    var c = b.wrap.outerWidth(!0);
                    b.wrap.css("overflow", "hidden");
                    var g = b.wrap.outerWidth(!0);
                    g !=
                    c && b.wrap.css("marginRight", g - c + "px")
                }
                e.not(a).each(function () {
                    d(this).data("arcticmodal").overlay.block.hide()
                });
                f.transition(b.overlay.block, "show", 1 < e.length ? {type: "none"} : b.openEffect);
                f.transition(b.container.block, "show", 1 < e.length ? {type: "none"} : b.openEffect, function () {
                    b.afterOpen(b, a);
                    a.trigger("afterOpen")
                });
                return a
            }
        }, close: function () {
            if (d.isFunction(this)) e.each(function () {
                d(this).arcticmodal("close")
            }); else return this.each(function () {
                var a = f.getParentEl(this);
                if (!1 === a) d.error("jquery.arcticmodal: Uncorrect call");
                else {
                    var b = a.data("arcticmodal");
                    !1 !== b.beforeClose(b, a) && (a.trigger("beforeClose"), e.not(a).last().each(function () {
                        d(this).data("arcticmodal").overlay.block.show()
                    }), f.transition(b.overlay.block, "hide", 1 < e.length ? {type: "none"} : b.closeEffect), f.transition(b.container.block, "hide", 1 < e.length ? {type: "none"} : b.closeEffect, function () {
                        b.afterClose(b, a);
                        a.trigger("afterClose");
                        b.clone || d("#arcticmodalReserve" + b.modalID).replaceWith(b.body.find(">*"));
                        b.overlay.block.remove();
                        b.container.block.remove();
                        a.data("arcticmodal",
                            null);
                        d(".arcticmodal-container").length || (b.wrap.data("arcticmodalOverflow") && b.wrap.css("overflow", b.wrap.data("arcticmodalOverflow")), b.wrap.css("marginRight", 0))
                    }), "ajax" == b.type && b.ajax_request.abort(), e = e.not(a))
                }
            })
        }, setDefault: function (a) {
            d.extend(!0, g, a)
        }
    };
    d(function () {
        g.wrap = d(document.all && !document.querySelector ? "html" : "body")
    });
    d(document).bind("keyup.arcticmodal", function (a) {
        var b = e.last();
        b.length && b.data("arcticmodal").closeOnEsc && 27 === a.keyCode && b.arcticmodal("close")
    });
    d.arcticmodal =
        d.fn.arcticmodal = function (a) {
            if (h[a]) return h[a].apply(this, Array.prototype.slice.call(arguments, 1));
            if ("object" === typeof a || !a) return f.init.apply(this, arguments);
            d.error("jquery.arcticmodal: Method " + a + " does not exist")
        }
})(jQuery);

$(function () {
    new WOW().init();
    $(".callback_what_model").on("click", function () {
        $(".popup_what_model").arcticmodal();
        return false;
    });
    $('.popup_what_model button').on('click', function (event) {
        $.arcticmodal('close');
    });
    $(".bg2 .container_calc .nav_btn").click(function () {
        $('html, body').animate({
            scrollTop: $(".bg2").offset().top
        }, 400);
    });
    $('.bg2 div:not(.container_calc) .btn-group1 button').on('click', function (event) {
        var device = $(this).data('device');
        $('.bg2 .devices').fadeOut(0);
        $('.bg2 .devices .models').fadeOut(0);
        $('.bg2 .' + device).fadeIn(300);
        $('.bg2 .' + device + ' .models.active').fadeIn(300);
        $(this).closest('.devices').removeClass('active');
        $(this).addClass('active');
        $('.bg2 .btn-group1 button').removeClass('active');
        $(this).addClass('active');
        new WOW().init();
    });
    $('.bg2 div:not(.container_calc) .btn-group2 button').on('click', function (event) {
        var btn = $(this).data('btn');
        $(this).closest('.devices').find('.models').fadeOut(0);
        $(this).closest('.devices').find('.models').removeClass('active');
        $('.bg2 .models[data-model="' + btn + '"]').fadeIn(300).addClass('active');
        $(this).closest('.devices').find('.btn-group2').find('button').removeClass('active');
        $(this).addClass('active');
        new WOW().init();
    });
    var levels = [1, 2, 3, 4, 5, 6];
    var device;
    var model;
    var minPrice;
    var maxPrice;
    var iphoneTriggerDisplay = false;
    var mailDevice = '';
    var mailModel = '';
    var mailPolomka = '';
    var mailDisplay = '';
    var mailGeo = '';
    var stringforMail = 'Ничего не выбрано. ';
    var mailMinPrice = '';
    var mailMaxPrice = '';
    var mailResult = '';
    $('.bg2 .container_calc button.nav_btn').on('click', function (event) {
        var databtn = $(this).data('btn');
        if ($(this).hasClass('device_target')) {
            device = $(this).data('btn');
            mailDevice = $(this).text();
            mailModel = '';
            mailPolomka = '';
            mailDisplay = '';
            mailGeo = '';
            stringforMail = 'Ничего не выбрано. ';
            mailMinPrice = '';
            mailMaxPrice = '';
            mailResult = '';
        }
        if ($(this).hasClass('model_target')) {
            model = $(this).data('model');
            var strokeDataMin2 = model + '-min';
            var strokeDataMax2 = model + '-max';
            $.each($('.bg2 .container_calc button'), function (index, val) {
                $(val).fadeIn(0);
                if ($(val).data(strokeDataMin2) == 'none' && $(this).data(strokeDataMax2) == 'none') {
                    $(val).fadeOut(0);
                }
            });
            if ($(this).data('model') == 'pro') {
                mailPolomka = '';
                mailDisplay = '';
                mailGeo = '';
                stringforMail = 'Ничего не выбрано. ';
                mailMinPrice = '';
                mailMaxPrice = '';
                mailResult = '';
            }
            mailModel = $(this).text();
            if ($(this).data('trade') == 'no') {
                $('.block_iphone_breaking,.block_ipad_breaking').find('button[data-price="b11"]').fadeOut(0);
            }
        }
        if ($(this).hasClass('polomka_target')) {
            var strokeDataMin = model + '-min';
            console.log(strokeDataMin);
            var strokeDataMax = model + '-max';
            minPrice = $(this).data(strokeDataMin.toLowerCase());
            maxPrice = $(this).data(strokeDataMax.toLowerCase());
            console.log(minPrice + ';' + maxPrice);
            mailPolomka = $(this).text();
        }
        if ($(this).hasClass('polomka_target')) {
            if ($(this).data('breaking') == "Коммерческая замена") {
                $('.block_result .price.max .text').html('Доплата за замену устройства <br>на новое с такими же характеристиками.');
            } else {
                $('.block_result .price.max .text').html('Запчасти оригинального класса');
            }
        }
        if ($(this).hasClass('display_target')) {
            var strokeDataMin = model + '-min';
            var strokeDataMax = model + '-max';
            minPrice = $(this).data(strokeDataMin);
            maxPrice = $(this).data(strokeDataMax);
            console.log(minPrice + ';' + maxPrice);
            mailDisplay = $(this).text();
        }
        if ($(this).hasClass('crushglass')) {
            iphoneTriggerDisplay = true;
        }
        if ($(this).hasClass('display_target') || $(this).hasClass('polomka_target')) {
            if (minPrice == 'none') {
                $('.bg2 .container_calc .block_result .price.min').addClass('pricenone').css('display', 'none');
            } else {
                $('.block_result .min .zag span').text(minPrice + ' ')
                $('.bg2 .container_calc .block_result .price.min').removeClass('pricenone').css('display','block');
            }
            if (maxPrice == 'none') {
                $('.bg2 .container_calc .block_result .price.max').addClass('pricenone').css('display', 'none');
            } else {
                $('.block_result .max .zag span').text(maxPrice + ' ')
                $('.bg2 .container_calc .block_result .price.max').removeClass('pricenone').css('display','block');
            }
            mailGeo = $(this).data('result');
            if ($('.block_result .price.min').hasClass('pricenone')) {
                mailMinPrice = 'Цена аналога отсутствует; ';
            } else {
                mailMinPrice = 'Цена аналога: ' + minPrice + ' руб. ';
            }
            if ($('.block_result .price.max').hasClass('pricenone')) {
                mailMaxPrice = 'Цена ориг. отсутствует';
            } else {
                mailMaxPrice = 'Цена ориг.: ' + maxPrice + ' руб. ';
            }
        }
        $('.bg2 .container_calc .views').fadeOut(0).addClass('faded').removeClass('active_view');
        $('.bg2 .container_calc .views[data-view="' + databtn + '_view"]').fadeIn(300).removeClass('faded').addClass('active_view').addClass('breadcrumb');
        var lvl = parseInt($('.bg2 .active_view').data('lvl'));
        $.each($('.bg2 .container_calc #hashNav .link_href'), function (index, val) {
            console.log(lvl);
            if (parseInt($(val).data('href')) < lvl) {
                if (iphoneTriggerDisplay == false) {
                    if ($(val).hasClass('displayhash') == false) {
                        $(val).fadeIn(300).removeClass('hidden_nav');
                    }
                } else {
                    $(val).fadeIn(300).removeClass('hidden_nav');
                }
            } else if (parseInt($(val).data('href')) >= lvl) {
                $(val).fadeOut(0).addClass('hidden_nav');
            }
        });
    });
    $('.container_calc .padding .block_start .btn-groups .block img').on('click', function (event) {
        $(this).closest('.block').find('button').click();
    });
    $('.bg2 .container_calc #hashNav p.link_href').on('click', function (event) {
        var hrefLvl = $(this).data('href');
        $('.bg2 .container_calc .views').fadeOut(0).addClass('faded').removeClass('active_view');
        if ($(this).data('href') == 1) {
            $('.bg2 .container_calc .block_result .price.min').css('display', 'block');
            iphoneTriggerDisplay = false;
            $('.bg2 .container_calc .views').removeClass('breadcrumb');
            $('.bg2 .container_calc .views.block_start').fadeIn(300).removeClass('faded').addClass('active_view');
        } else {
            $('.bg2 .container_calc .views.breadcrumb[data-lvl="' + hrefLvl + '"]').fadeIn(300).removeClass('faded').addClass('active_view');
        }
        if ($(this).data('href') == 2) {
            $('.bg2 .container_calc .block_result .price.min').css('display', 'block');
            iphoneTriggerDisplay = false;
        }
        if ($(this).data('href') == 3) {
            $('.bg2 .container_calc .block_result .price.min').css('display', 'block');
            iphoneTriggerDisplay = false;
        }
        var lvl = parseInt($('.bg2 .active_view').data('lvl'));
        $.each($('.bg2 .container_calc #hashNav .link_href'), function (index, val) {
            if (parseInt($(val).data('href')) < lvl) {
                $(val).fadeIn(0).removeClass('hidden_nav');
            } else if (parseInt($(val).data('href')) >= lvl) {
                $(val).fadeOut(0).addClass('hidden_nav');
            }
        });
        if ($(this).data('href') == 5) {
            $('.bg2 .container_calc .block_result .price.min').css('display', 'block');
            if (iphoneTriggerDisplay == false) {
                $('.bg2 #hashNav .link_href.displayhash').addClass('hidden_nav').fadeOut(0);
            }
            iphoneTriggerDisplay = false;
        }
    });
});
!function ($) {
    "use strict";
    var Progressbar = function (element) {
        this.$element = $(element);
    }
    Progressbar.prototype.update = function (value) {
        var $div = this.$element.find('div');
        var $span = $div.find('span');
        $div.attr('aria-valuenow', value);
        $div.css('width', value + '%');
        $span.text(value + '% Complete');
    }
    Progressbar.prototype.finish = function () {
        this.update(100);
    }
    Progressbar.prototype.reset = function () {
        this.update(0);
    }
    $.fn.progressbar = function (option) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('jbl.progressbar');
            if (!data) $this.data('jbl.progressbar', (data = new Progressbar(this)));
            if (typeof option == 'string') data[option]();
            if (typeof option == 'number') data.update(option);
        })
    };
    $(document).on('click', '[data-toggle="progressbar"]', function (e) {
        var $this = $(this);
        var $target = $($this.data('target'));
        var value = $this.data('value');
        e.preventDefault();
        $target.progressbar(value);
    });
}(window.jQuery);

!function ($) {

    $(document).on('click', '.model_target', function () {

            var dataValue = $(this).data().model;


            $('[data-device]').each(function() {

                var dataCurrentValue = $(this).data().device;

                if (dataCurrentValue != dataValue) {

                    $(this).hide();

                } else {

                    $(this).show();
                }

            });

    });

}(window.jQuery);