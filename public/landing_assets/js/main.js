(window.oncontextmenu = function () {
  return !1;
}),
  jQuery(document).ready(function (e) {
    (document.onkeypress = function (e) {
      if (123 == (e = e || window.event).keyCode) return !1;
    }),
      e(document).keydown(function (e) {
        var n = String.fromCharCode(e.keyCode).toLowerCase();
        return !e.ctrlKey || ("c" != n && "u" != n)
          ? "{" == n
            ? (alert("Sorry, This Functionality Has Been Disabled!"), !1)
            : void 0
          : (alert("Sorry, This Functionality Has Been Disabled!"), !1);
      });
  });
function ecCreateCookie(b, c, d) {
  var a = new Date();
  a.setTime(a.getTime() + 864e5 * d),
    (document.cookie = b + "=" + c + "; expires=" + a.toGMTString());
}
function ecDeleteCookie(a, b) {
  var c = new Date(0).toGMTString();
  document.cookie = a + "=" + b + "; expires=" + c;
}
function ecAccessCookie(e) {
  for (
    var c = e + "=", d = document.cookie.split(";"), a = 0;
    a < d.length;
    a++
  ) {
    var b = d[a].trim();
    if (0 == b.indexOf(c)) return b.substring(c.length, b.length);
  }
  return "";
}
function ecCheckCookie() {
  var c = ecAccessCookie("bgImageModeCookie");
  if ("" != c) {
    var d = c.split("||"),
      e = d[0],
      f = d[1];
    $("body").removeClass("body-bg-1"),
      $("body").removeClass("body-bg-2"),
      $("body").removeClass("body-bg-3"),
      $("body").removeClass("body-bg-4"),
      $("body").addClass(f),
      $("#bg-switcher-css").attr(
        "href",
        "assets/css/backgrounds/" + e + ".css"
      );
  }
  if ("" != ecAccessCookie("rtlModeCookie")) {
    var b = $("<link>", {
      rel: "stylesheet",
      href: "assets/css/rtl.css",
      class: "rtl",
    });
    $(".ec-tools-sidebar .ec-change-rtl").toggleClass("active"),
      b.appendTo("head");
  }
  if ("" != ecAccessCookie("darkModeCookie")) {
    var b = $("<link>", {
      rel: "stylesheet",
      href: "assets/css/dark.css",
      class: "dark",
    });
    $("link[href='assets/css/responsive.css']").before(b),
      $(".ec-tools-sidebar .ec-change-mode").toggleClass("active"),
      $("body").addClass("dark");
  } else {
    var a = ecAccessCookie("themeColorCookie");
    "" != a &&
      ($("li[data-color = " + a + "]")
        .toggleClass("active")
        .siblings()
        .removeClass("active"),
      $("li[data-color = " + a + "]").addClass("active"),
      "01" != a &&
        $("link[href='assets/css/responsive.css']").before(
          '<link rel="stylesheet" href="assets/css/skin-' +
            a +
            '.css" rel="stylesheet">'
        ));
  }
}
!(function (g) {
  "use strict";
  ecCheckCookie(),
    $(".clear-cach").on("click", function (a) {
      jQuery("#\\:1\\.container").contents().find("#\\:1\\.restore").click(),
        ecDeleteCookie("rtlModeCookie", ""),
        ecDeleteCookie("darkModeCookie", ""),
        ecDeleteCookie("themeColorCookie", ""),
        ecDeleteCookie("bgImageModeCookie", ""),
        location.reload();
    }),
    $(window).load(function () {
      $("#ec-overlay").fadeOut("slow"),
        setTimeout(function () {
          if ("file:" === window.location.protocol) {
            var a =
              '<div id="ec-direct-run" class="ec-direct-run"><div class="ec-direct-body"><h4>Template Running Directly</h4><p>As we seeing you are try to load template without Local | Live server. it will affect missed or lost content. Please try to use Local | Live Server. </p></div></div>';
            $("body").append(a);
          }
        }, 3e3);
    }),
    $(".ec-search-bar").focus(function () {
      $(".ec-search-tab").addClass("active");
    }),
    $(".ec-search-bar").focusout(function () {
      setTimeout(function () {
        $(".ec-search-tab").removeClass("active");
      }, 100);
    }),
    new (function ({ offset: b } = { offset: 10 }) {
      var c,
        d = (b * window.innerHeight) / 100,
        g = window.innerHeight - d,
        h = window.innerWidth;
      function e(a) {
        (a.style.animationDelay = a.dataset.animationDelay),
          (a.style.animationDuration = a.dataset.animationDuration),
          a.classList.add(a.dataset.animation),
          (a.dataset.animated = "true");
      }
      function f(b) {
        var a = b.getBoundingClientRect(),
          c = a.top + parseInt(b.dataset.animationOffset) || a.top,
          e = a.bottom - parseInt(b.dataset.animationOffset) || a.bottom,
          f = a.left,
          i = a.right;
        return c <= g && e >= d && f <= h && i >= 0;
      }
      function i(c) {
        for (var b = c, a = 0, d = b.length; a < d; a++)
          !b[a].dataset.animated && f(b[a]) && e(b[a]);
      }
      function a() {
        i(
          (c = document.querySelectorAll(
            "[data-animation]:not([data-animated])"
          ))
        );
      }
      return (
        (c = document.querySelectorAll(
          "[data-animation]:not([data-animated])"
        )),
        window.addEventListener("load", a, !1),
        window.addEventListener("scroll", () => i(c), { passive: !0 }),
        window.addEventListener("resize", () => i(c), !1),
        { start: e, isElementOnScreen: f, update: a }
      );
    })({ offset: 20 });
  var b,
    h = document.documentElement,
    i = window,
    n = i.scrollY || h.scrollTop,
    o = 0,
    p = 0;
  $(window).scrollTop(), document.getElementById("ec-main-menu-desk");
  var q,
    c,
    j,
    k,
    r = function () {
      (q = i.scrollY || h.scrollTop) > n ? (o = 2) : q < n && (o = 1),
        o !== p && s(o, q),
        (n = q);
    },
    s = function (a, b) {
      2 === a && b > 52
        ? ((p = a), $("#ec-main-menu-desk").addClass("menu_fixed_up"))
        : 1 === a &&
          ((p = a),
          $("#ec-main-menu-desk").addClass("menu_fixed"),
          $("#ec-main-menu-desk").removeClass("menu_fixed_up"));
    };
  $(window).on("scroll", function () {
    var a = $(".sticky-header-next-sec").offset().top,
      b = $(window);
    b.scrollTop() <= a + 50
      ? $("#ec-main-menu-desk").removeClass("menu_fixed")
      : r();
  }),
    $(document).ready(function () {
      $(".scroll-to ul li a.nav-scroll").bind("click", function (b) {
        $(".scroll-to ul li").removeClass("active"),
          $(this).parents("li").addClass("active");
        var a = $(this).attr("data-scroll");
        $("html, body").animate(
          { scrollTop: $("#" + a).offset().top - 50 },
          500
        );
      });
    }),
    $(".dropdown").on("show.bs.dropdown", function () {
      $(this).find(".dropdown-menu").first().stop(!0, !0).slideDown();
    }),
    $(".dropdown").on("hide.bs.dropdown", function () {
      $(this).find(".dropdown-menu").first().stop(!0, !0).slideUp();
    }),
    $(document).ready(function () {
      $(".header-top-lan li").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
      }),
        $(".header-top-curr li").click(function () {
          $(this).addClass("active").siblings().removeClass("active");
        });
    }),
    $(".search-btn").on("click", function () {
      $(this).toggleClass("active"),
        $(".dropdown_search").slideToggle("medium");
    }),
    $(".ec-sidebar-toggle").on("click", function () {
      $(".ec-side-cat-overlay").fadeIn(),
        $(".category-sidebar").addClass("ec-open");
    }),
    $(".ec-close").on("click", function () {
      $(".category-sidebar").removeClass("ec-open"),
        $(".ec-side-cat-overlay").fadeOut();
    }),
    $(".ec-side-cat-overlay").on("click", function () {
      $(".category-sidebar").removeClass("ec-open"),
        $(".ec-side-cat-overlay").fadeOut();
    }),
    $(document).ready(function () {
      $(".ec-sidebar-block .ec-sb-block-content ul li ul").addClass(
        "ec-cat-sub-dropdown"
      ),
        $(".ec-sidebar-block .ec-sidebar-block-item").on("click", function () {
          var a = $(this)
            .closest(".ec-sb-block-content")
            .find(".ec-cat-sub-dropdown");
          a.slideToggle("slow"),
            $(".ec-cat-sub-dropdown").not(a).slideUp("slow");
        });
    }),
    $(document).ready(function () {
      $(".ec-sidebar-slider-cat .ec-sb-pro-sl").slick({
        rows: 4,
        dots: !1,
        arrows: !0,
        infinite: !0,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: !0,
        autoplaySpeed: 8e3,
        responsive: [
          {
            breakpoint: 992,
            settings: { rows: 4, slidesToShow: 1, slidesToScroll: 1, dots: !1 },
          },
          {
            breakpoint: 479,
            settings: { rows: 4, slidesToShow: 1, slidesToScroll: 1, dots: !1 },
          },
        ],
      });
    }),
    $(function () {
      $(".insta-auto, .cat-auto").infiniteslide({
        direction: "left",
        speed: 50,
        clone: 10,
      }),
        $('[data-toggle="tooltip"]').tooltip();
    }),
    $("#shop_sidebar").stickySidebar({ topSpacing: 30, bottomSpacing: 30 }),
    $(".sidebar-toggle-icon").on("click", function () {
      $(".filter-sidebar-overlay").fadeIn(),
        $(".filter-sidebar").addClass("toggle-sidebar-swipe");
    }),
    $(".filter-cls-btn").on("click", function () {
      $(".filter-sidebar").removeClass("toggle-sidebar-swipe"),
        $(".filter-sidebar-overlay").fadeOut();
    }),
    $(".filter-sidebar-overlay").on("click", function () {
      $(".filter-sidebar").removeClass("toggle-sidebar-swipe"),
        $(".filter-sidebar-overlay").fadeOut();
    }),
    $(".ec-remove-wish").on("click", function () {
      $(this).parents(".pro-gl-content").remove(),
        0 == $(".pro-gl-content").length &&
          $(".ec-wish-rightside, .wish-empt").html(
            '<p class="emp-wishlist-msg">Your wishlist is empty!</p>'
          );
    }),
    $(".ec-remove-compare").on("click", function () {
      $(this).parents(".pro-gl-content").remove(),
        0 == $(".pro-gl-content").length &&
          $(".ec-compare-rightside").html(
            '<p class="emp-wishlist-msg">Your Compare list is empty!</p>'
          );
    }),
    $("body").on("click", ".add-to-cart", function () {
      $(".ec-cart-float").fadeIn();
      var a = $(".cart-count-lable").html();
      a++,
        $(".cart-count-lable").html(a),
        $(".emp-cart-msg").parent().remove(),
        setTimeout(function () {
          $(".ec-cart-float").fadeOut();
        }, 5e3);
      var b = $(this)
          .parents()
          .parents()
          .children(".image")
          .find(".main-image")
          .attr("src"),
        c = $(this)
          .parents()
          .parents()
          .parents()
          .children(".ec-pro-content")
          .children("h5")
          .children("a")
          .html(),
        d = $(this)
          .parents()
          .parents()
          .parents()
          .children(".ec-pro-content")
          .children(".ec-price")
          .children(".new-price")
          .html();
      $(".eccart-pro-items").append(
        '<li><a href="product-left-sidebar.html" class="sidekka_pro_img"><img src="' +
          b +
          '" alt="product"></a><div class="ec-pro-content"><a href="product-left-sidebar.html" class="cart_pro_title">' +
          c +
          '</a><span class="cart-price"><span>' +
          d +
          '</span> x 1</span><div class="qty-plus-minus"><div class="dec ec_qtybtn">-</div><input class="qty-input" type="text" name="ec_qtybtn" value="1"><div class="inc ec_qtybtn">+</div></div><a href="javascript:void(0)" class="remove">\xd7</a></div></li>'
      );
    }),
    (c = $(".ec-side-toggle")),
    (j = $(".ec-side-cart")),
    (k = $(".mobile-menu-toggle")),
    c.on("click", function (b) {
      b.preventDefault();
      var a = $(this),
        c = a.attr("href");
      $(".ec-side-cart-overlay").fadeIn(),
        $(c).addClass("ec-open"),
        a.parent().hasClass("mobile-menu-toggle") &&
          (a.addClass("close"), $(".ec-side-cart-overlay").fadeOut());
    }),
    $(".ec-side-cart-overlay").on("click", function (a) {
      $(".ec-side-cart-overlay").fadeOut(),
        j.removeClass("ec-open"),
        k.find("a").removeClass("close");
    }),
    $(".ec-close").on("click", function (a) {
      a.preventDefault(),
        $(".ec-side-cart-overlay").fadeOut(),
        j.removeClass("ec-open"),
        k.find("a").removeClass("close");
    }),
    $("body").on("click", ".ec-pro-content .remove", function () {
      var a = $(".eccart-pro-items li").length;
      $(this).closest("li").remove(),
        1 == a &&
          $(".eccart-pro-items").html(
            '<li><p class="emp-cart-msg">Your cart is empty!</p></li>'
          );
      var b = $(".cart-count-lable").html();
      b--, $(".cart-count-lable").html(b), a--;
    }),
    (b = $(".ec-menu-content, .overlay-menu"))
      .find(".sub-menu")
      .parent()
      .prepend('<span class="menu-toggle"></span>'),
    b.on("click", "li a, .menu-toggle", function (b) {
      var a = $(this);
      ("#" === a.attr("href") || a.hasClass("menu-toggle")) &&
        (b.preventDefault(),
        a.siblings("ul:visible").length
          ? (a.parent("li").removeClass("active"),
            a.siblings("ul").slideUp(),
            a.parent("li").find("li").removeClass("active"),
            a.parent("li").find("ul:visible").slideUp())
          : (a.parent("li").addClass("active"),
            a
              .closest("li")
              .siblings("li")
              .removeClass("active")
              .find("li")
              .removeClass("active"),
            a.closest("li").siblings("li").find("ul:visible").slideUp(),
            a.siblings("ul").slideDown()));
    }),
    new Swiper(".ec-slider.swiper-container", {
      loop: !0,
      speed: 2e3,
      effect: "slide",
      autoplay: { delay: 7e3, disableOnInteraction: !1 },
      pagination: { el: ".swiper-pagination", clickable: !0 },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    }),
    $(".qty-product-cover").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: !1,
      fade: !1,
      asNavFor: ".qty-nav-thumb",
    }),
    $(".qty-nav-thumb").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: ".qty-product-cover",
      dots: !1,
      arrows: !0,
      focusOnSelect: !0,
      responsive: [
        { breakpoint: 479, settings: { slidesToScroll: 1, slidesToShow: 2 } },
      ],
    }),
    $(".zoom-image-hover").zoom();
  var d = $(".qty-plus-minus");
  d.prepend('<div class="dec ec_qtybtn">-</div>'),
    d.append('<div class="inc ec_qtybtn">+</div>'),
    $("body").on("click", ".ec_qtybtn", function () {
      var a = $(this),
        b = a.parent().find("input").val();
      if ("+" === a.text()) var c = parseFloat(b) + 1;
      else if (b > 1) var c = parseFloat(b) - 1;
      else c = 1;
      a.parent().find("input").val(c);
    }),
    new Swiper(".single-product-slider", {
      slidesPerView: 4,
      spaceBetween: 20,
      speed: 1500,
      loop: !0,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        0: { slidesPerView: 1 },
        478: { slidesPerView: 1 },
        576: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        992: { slidesPerView: 3 },
        1024: { slidesPerView: 4 },
        1200: { slidesPerView: 4 },
      },
    }),
    $.scrollUp({
      scrollText: '<i class="ecicon eci-arrow-up" aria-hidden="true"></i>',
      easingType: "linear",
      scrollSpeed: 900,
      animation: "fade",
    }),
    $("#ec-fs-count-1").countdowntimer({
      startDate: "2021/10/01 00:00:00",
      dateAndTime: "2023/01/01 00:00:00",
      labelsFormat: !0,
      displayFormat: "DHMS",
    }),
    $("#ec-fs-count-2").countdowntimer({
      startDate: "2021/10/01 00:00:00",
      dateAndTime: "2022/12/01 00:00:00",
      labelsFormat: !0,
      displayFormat: "DHMS",
    }),
    $("#ec-fs-count-3").countdowntimer({
      startDate: "2021/10/01 00:00:00",
      dateAndTime: "2022/11/01 00:00:00",
      labelsFormat: !0,
      displayFormat: "DHMS",
    }),
    $("#ec-fs-count-4").countdowntimer({
      startDate: "2021/10/01 00:00:00",
      dateAndTime: "2023/03/01 00:00:00",
      labelsFormat: !0,
      displayFormat: "DHMS",
    }),
    $(".ec-fre-products").slick({
      rows: 1,
      dots: !1,
      arrows: !0,
      infinite: !0,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
    }),
    $(".ec-spe-products").slick({
      rows: 1,
      dots: !1,
      arrows: !0,
      infinite: !0,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
    }),
    $(".ec-change-color").on("click", "li", function () {
      $('link[href^="assets/css/skin-"]').remove(),
        $("link.dark").remove(),
        $(".ec-change-mode").removeClass("active");
      var a = $(this).attr("data-color");
      if (!$(this).hasClass("active"))
        return (
          $(this).toggleClass("active").siblings().removeClass("active"),
          void 0 != a &&
            ($("link[href='assets/css/responsive.css']").before(
              '<link rel="stylesheet" href="assets/css/skin-' +
                a +
                '.css" rel="stylesheet">'
            ),
            ecCreateCookie("themeColorCookie", a, 1)),
          !1
        );
    }),
    $(".ec-tools-sidebar .ec-change-rtl .ec-rtl-switch").click(function (a) {
      a.preventDefault();
      var b = $("<link>", {
        rel: "stylesheet",
        href: "assets/css/rtl.css",
        class: "rtl",
      });
      $(this).parent().toggleClass("active");
      $(this).parent().hasClass("ec-change-rtl") &&
      $(this).parent().hasClass("active")
        ? (b.appendTo("head"), ecCreateCookie("rtlModeCookie", "rtl", 1))
        : $(this).parent().hasClass("ec-change-rtl") &&
          !$(this).parent().hasClass("active") &&
          ($("link.rtl").remove(), ecDeleteCookie("rtlModeCookie", "ltr"));
    }),
    $(".ec-tools-sidebar .ec-change-mode .ec-mode-switch").click(function (b) {
      b.preventDefault();
      var c = $("<link>", {
        rel: "stylesheet",
        href: "assets/css/dark.css",
        class: "dark",
      });
      $(this).parent().toggleClass("active");
      var a = "light";
      $(this).parent().hasClass("ec-change-mode") &&
      $(this).parent().hasClass("active")
        ? $("link[href='assets/css/responsive.css']").before(c)
        : $(this).parent().hasClass("ec-change-mode") &&
          !$(this).parent().hasClass("active") &&
          ($("link.dark").remove(), (a = "light")),
        $(this).parent().hasClass("active")
          ? ($("#ec-fixedbutton .ec-change-color").css(
              "pointer-events",
              "none"
            ),
            $("body").addClass("dark"),
            ecCreateCookie("darkModeCookie", (a = "dark"), 1))
          : ($("#ec-fixedbutton .ec-change-color").css("pointer-events", "all"),
            $("body").removeClass("dark"),
            ecDeleteCookie("darkModeCookie", a));
    }),
    $(".ec-tools-sidebar .ec-fullscreen-mode .ec-fullscreen-switch").click(
      function (a) {
        a.preventDefault(),
          $(this).parent().toggleClass("active"),
          document.fullscreenElement ||
          document.mozFullScreenElement ||
          document.webkitFullscreenElement ||
          document.msFullscreenElement
            ? document.exitFullscreen
              ? document.exitFullscreen()
              : document.msExitFullscreen
              ? document.msExitFullscreen()
              : document.mozCancelFullScreen
              ? document.mozCancelFullScreen()
              : document.webkitExitFullscreen && document.webkitExitFullscreen()
            : document.documentElement.requestFullscreen
            ? document.documentElement.requestFullscreen()
            : document.documentElement.msRequestFullscreen
            ? document.documentElement.msRequestFullscreen()
            : document.documentElement.mozRequestFullScreen
            ? document.documentElement.mozRequestFullScreen()
            : document.documentElement.webkitRequestFullscreen &&
              document.documentElement.webkitRequestFullscreen(
                Element.ALLOW_KEYBOARD_INPUT
              );
      }
    );
  var t = location.href;
  $(".ec-main-menu ul li a").each(function () {
    if ("#" !== $(this).attr("href") && $(this).prop("href") == t)
      return (
        $(".ec-main-menu a").parents("li, ul").removeClass("active"),
        $(this).parent("li").addClass("active"),
        !1
      );
  });
  var u = $(
    ".ec-pro-color, .ec-product-tab, .shop-pro-inner, .ec-new-product, .ec-releted-product, .ec-checkout-pro"
  ).find(".ec-opt-swatch");
  function v(a) {
    a.each(function () {
      var a = $(this),
        b = a.hasClass("ec-change-img");
      function c(c) {
        var a = c,
          d = a.find("a"),
          e = a.closest(".ec-product-inner").find(".ec-pro-image");
        return (
          d.hasClass("loaded") || e.addClass("pro-loading"),
          a.find("a").addClass("loaded"),
          a.addClass("active").siblings().removeClass("active"),
          b && w(a),
          setTimeout(function () {
            e.removeClass("pro-loading");
          }, 1e3),
          !1
        );
      }
      a.on("mouseenter", "li", function () {
        c($(this));
      }),
        a.on("click", "li", function () {
          c($(this));
        });
    });
  }
  function w(c) {
    var d = c.find(".ec-opt-clr-img"),
      a = d.attr("data-src"),
      e = d.attr("data-src-hover") || !1,
      f = c.closest(".ec-product-inner").find(".ec-pro-image"),
      h = f.find(".image img.main-image"),
      b = f.find(".image img.hover-image");
    if ((a.length && h.attr("src", a), a.length)) {
      var g = b.closest("img.hover-image");
      b.attr("src", e), g.hasClass("disable") && g.removeClass("disable");
    }
    !1 === e && b.closest("img.hover-image").addClass("disable");
  }
  $(window).on("load", function () {
    v(u);
  }),
    $("document").ready(function () {
      v(u);
    }),
    $(".ec-opt-size").each(function () {
      function a(b) {
        var a = b,
          c = a.find("a").attr("data-old"),
          d = a.find("a").attr("data-new"),
          e = a.closest(".ec-pro-content").find(".old-price"),
          f = a.closest(".ec-pro-content").find(".new-price");
        e.text(c),
          f.text(d),
          a.addClass("active").siblings().removeClass("active");
      }
      $(this).on("mouseenter", "li", function () {
        a($(this));
      }),
        $(this).on("click", "li", function () {
          a($(this));
        });
    }),
    $(document).ready(function () {
      $('img.svg_img[src$=".svg"]').each(function () {
        var a = $(this),
          b = a.attr("src"),
          c = a.prop("attributes");
        $.get(
          b,
          function (d) {
            var b = $(d).find("svg");
            (b = b.removeAttr("xmlns:a")),
              $.each(c, function () {
                b.attr(this.name, this.value);
              }),
              a.replaceWith(b);
          },
          "xml"
        );
      });
    }),
    $("#ec-testimonial-slider").slick({
      rows: 1,
      dots: !0,
      arrows: !1,
      centerMode: !0,
      infinite: !1,
      speed: 500,
      centerPadding: 0,
      slidesToShow: 1,
      slidesToScroll: 1,
    }),
    $("#ec-testimonial-slider")
      .find(".slick-slide")
      .each(function (a) {
        var b = $(this).find(".ec-test-img").html();
        $("#ec-testimonial-slider")
          .find(".slick-dots")
          .find("li:eq(" + a + ")")
          .html(b);
      }),
    $("#ec-brand-slider").slick({
      rows: 1,
      dots: !1,
      arrows: !0,
      infinite: !0,
      speed: 500,
      slidesToShow: 7,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 992,
          settings: { slidesToShow: 4, slidesToScroll: 1, dots: !1 },
        },
        { breakpoint: 600, settings: { slidesToScroll: 1, slidesToShow: 3 } },
        { breakpoint: 360, settings: { slidesToScroll: 1, slidesToShow: 2 } },
      ],
    }),
    $(document).ready(function () {
      $("footer .footer-top .ec-footer-widget .ec-footer-links").addClass(
        "ec-footer-dropdown"
      ),
        $(".ec-footer-heading").append(
          "<div class='ec-heading-res'><i class='ecicon eci-angle-down'></i></div>"
        ),
        $(".ec-footer-heading .ec-heading-res").click(function () {
          var a = $(this)
            .closest(".footer-top .col-sm-12")
            .find(".ec-footer-dropdown");
          a.slideToggle("slow"),
            $(".ec-footer-dropdown").not(a).slideUp("slow");
        });
    }),
    $(".popup-gallery").magnificPopup({
      type: "image",
      mainClass: "mfp-with-zoom",
      gallery: { enabled: !0 },
      zoom: {
        enabled: !0,
        duration: 300,
        easing: "ease-in-out",
        opener: function (a) {
          return a.is("img") ? a : a.find("img");
        },
      },
    }),
    $(".ec-gl-btn").on("click", "button", function () {
      $(this).addClass("active").siblings().removeClass("active");
    }),
    $(document).on("click", ".btn-grid", function (a) {
      var b = $(".shop-pro-inner"),
        c = $(".pro-gl-content");
      a.preventDefault(),
        b.removeClass("list-view"),
        c.removeClass("width-100");
    }),
    $(document).on("click", ".btn-list", function (a) {
      var b = $(".shop-pro-inner"),
        c = $(".pro-gl-content");
      a.preventDefault(), b.addClass("list-view"), c.addClass("width-100");
    }),
    $(document).on("click", ".btn-grid-50", function (a) {
      var b = $(".shop-pro-inner"),
        c = $(".pro-gl-content");
      a.preventDefault(),
        b.removeClass("list-view-50"),
        c.removeClass("width-50");
    }),
    $(document).on("click", ".btn-list-50", function (a) {
      var b = $(".shop-pro-inner"),
        c = $(".pro-gl-content");
      a.preventDefault(), b.addClass("list-view-50"), c.addClass("width-50");
    }),
    $(document).ready(function () {
      $(
        ".ec-shop-leftside .ec-sidebar-block .ec-sb-block-content,.ec-blogs-leftside .ec-sidebar-block .ec-sb-block-content,.ec-cart-rightside .ec-sidebar-block .ec-sb-block-content,.ec-checkout-rightside .ec-sidebar-block .ec-sb-block-content"
      ).addClass("ec-sidebar-dropdown"),
        $(".ec-sidebar-title").append(
          "<div class='ec-sidebar-res'><i class='ecicon eci-angle-down'></i></div>"
        ),
        $(".ec-sidebar-title .ec-sidebar-res").click(function () {
          var a = $(this)
            .closest(
              ".ec-shop-leftside .ec-sidebar-block,.ec-blogs-leftside .ec-sidebar-block,.ec-cart-rightside .ec-sidebar-block,.ec-checkout-rightside .ec-sidebar-wrap"
            )
            .find(".ec-sidebar-dropdown");
          a.slideToggle("slow"),
            $(".ec-sidebar-dropdown").not(a).slideUp("slow");
        });
    }),
    $(document).ready(function () {
      $(".ec-more-toggle").click(function () {
        "More Categories" == $(".ec-more-toggle #ec-more-toggle").text()
          ? ($(".ec-more-toggle #ec-more-toggle").text("Less Categories"),
            $(".ec-more-toggle").toggleClass("active"),
            $("#ec-more-toggle-content").slideDown())
          : ($(".ec-more-toggle  #ec-more-toggle").text("More Categories"),
            $(".ec-more-toggle").removeClass("active"),
            $("#ec-more-toggle-content").slideUp());
      });
    }),
    $(document).ready(function () {
      $(".ec-sidebar-block.ec-sidebar-block-clr li").click(function () {
        $(this).addClass("active").siblings().removeClass("active");
      });
    }),
    $(document).ready(function () {
      $(".ec-faq-wrapper .ec-faq-block .ec-faq-content").addClass(
        "ec-faq-dropdown"
      ),
        $(".ec-faq-block .ec-faq-title ").click(function () {
          var a = $(this)
            .closest(".ec-faq-wrapper .ec-faq-block")
            .find(".ec-faq-dropdown");
          a.slideToggle("slow"), $(".ec-faq-dropdown").not(a).slideUp("slow");
        });
    }),
    $(document).ready(function () {
      $(
        ".product_page .ec-sidebar-block .ec-sb-block-content ul li ul"
      ).addClass("ec-cat-sub-dropdown"),
        $(".product_page .ec-sidebar-block .ec-sidebar-block-item").click(
          function () {
            var a = $(this)
              .closest(".ec-sb-block-content")
              .find(".ec-cat-sub-dropdown");
            a.slideToggle("slow"),
              $(".ec-cat-sub-dropdown").not(a).slideUp("slow");
          }
        );
    }),
    $(document).ready(function () {
      $(".ec-sidebar-slider .ec-sb-pro-sl").slick({
        rows: 4,
        dots: !1,
        arrows: !0,
        infinite: !0,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 992,
            settings: { rows: 2, slidesToShow: 2, slidesToScroll: 2, dots: !1 },
          },
          {
            breakpoint: 479,
            settings: { rows: 2, slidesToShow: 1, slidesToScroll: 1, dots: !1 },
          },
        ],
      });
    }),
    $(".ec-category-section .ec_cat_slider").slick({
      rows: 1,
      dots: !1,
      arrows: !0,
      infinite: !0,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        { breakpoint: 1200, settings: { slidesToShow: 3, slidesToScroll: 3 } },
        { breakpoint: 992, settings: { slidesToScroll: 3, slidesToShow: 3 } },
        { breakpoint: 600, settings: { slidesToScroll: 2, slidesToShow: 2 } },
        { breakpoint: 425, settings: { slidesToScroll: 1, slidesToShow: 1 } },
      ],
    }),
    $(".ec-catalog-multi-vendor .ec-multi-vendor-slider").slick({
      rows: 1,
      dots: !1,
      arrows: !0,
      infinite: !0,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        { breakpoint: 1200, settings: { slidesToShow: 3, slidesToScroll: 3 } },
        { breakpoint: 992, settings: { slidesToScroll: 2, slidesToShow: 2 } },
        { breakpoint: 600, settings: { slidesToScroll: 2, slidesToShow: 2 } },
        { breakpoint: 425, settings: { slidesToScroll: 1, slidesToShow: 1 } },
      ],
    }),
    $(".single-product-cover").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: !1,
      fade: !1,
      asNavFor: ".single-nav-thumb",
    }),
    $(".single-nav-thumb").slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: ".single-product-cover",
      dots: !1,
      arrows: !0,
      focusOnSelect: !0,
    }),
    $("#ec-single-countdown").countdowntimer({
      startDate: "2021/10/01 00:00:00",
      dateAndTime: "2023/01/01 00:00:00",
      labelsFormat: !0,
      displayFormat: "DHMS",
    }),
    $(document).ready(function () {
      $(
        ".single-pro-content .ec-pro-variation .ec-pro-variation-content li"
      ).click(function () {
        $(this).addClass("active").siblings().removeClass("active");
      });
    });
  let a = document.getElementById("ec-sliderPrice");
  if (a) {
    let e = parseInt(a.dataset.min),
      f = parseInt(a.dataset.max),
      l = parseInt(a.dataset.step),
      m = document.querySelectorAll("input.filter__input");
    noUiSlider.create(a, {
      start: [e, f],
      connect: !0,
      step: l,
      range: { min: e, max: f },
      format: { to: (a) => a, from: (a) => a },
    }),
      a.noUiSlider.on("update", (b, a) => {
        m[a].value = b[a];
      }),
      m.forEach((b, c) => {
        b.addEventListener("change", () => {
          a.noUiSlider.setHandle(c, b.value);
        });
      });
  }
  function x(a, b) {
    $("body").removeClass("body-bg-1"),
      $("body").removeClass("body-bg-2"),
      $("body").removeClass("body-bg-3"),
      $("body").removeClass("body-bg-4"),
      $("body").addClass(b),
      $("#bg-switcher-css").attr(
        "href",
        "assets/css/backgrounds/" + a + ".css"
      ),
      ecCreateCookie("bgImageModeCookie", a + "||" + b, 1);
  }
  $(".cart-qty-plus-minus").append(
    '<div class="ec_cart_qtybtn"><div class="inc ec_qtybtn">+</div><div class="dec ec_qtybtn">-</div></div>'
  ),
    $(".cart-qty-plus-minus .ec_cart_qtybtn .ec_qtybtn").on(
      "click",
      function () {
        var a = $(this),
          b = a.parent().parent().find("input").val();
        if ("+" === a.text()) var c = parseFloat(b) + 1;
        else if (b > 1) var c = parseFloat(b) - 1;
        else c = 1;
        a.parent().parent().find("input").val(c);
      }
    ),
    $(document).ready(function () {
      $(".ec-sb-block-content .ec-ship-title").click(function () {
        $(".ec-sb-block-content .ec-cart-form").slideToggle("slow");
      });
    }),
    $(document).ready(function () {
      $("button.add-to-cart").click(function () {}),
        $(".ec-btn-group.wishlist").click(function () {
          $(this).hasClass("active")
            ? $(this).removeClass("active")
            : $(this).addClass("active"),
            $("#wishlist_toast").addClass("show"),
            setTimeout(function () {
              $("#wishlist_toast").removeClass("show");
            }, 3e3);
        });
    }),
    $(document).ready(function () {
      $(".ec-pro-image").append("<div class='ec-pro-loader'></div>");
    }),
    $(document).ready(function () {
      $(".ec-cart-coupan").click(function () {
        $(".ec-cart-coupan-content").slideToggle("slow");
      }),
        $(".ec-checkout-coupan").click(function () {
          $(".ec-checkout-coupan-content").slideToggle("slow");
        });
    }),
    setInterval(function () {
      $(".recent-purchase").stop().slideToggle("slow");
    }, 1e4),
    $(".recent-close").click(function () {
      $(".recent-purchase").stop().slideToggle("slow");
    }),
    $(document).ready(function () {
      $(".ec-list").on("click", function () {
        var a = $(this).attr("data-number"),
          b = $(this).attr("data-message");
        /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
          navigator.userAgent
        )
          ? window.open("https://wa.me/" + a + "/?text=" + b, "-blank")
          : window.open(
              "https://web.WhatsApp.com/send?phone=" + a + "&text=" + b,
              "-blank"
            );
      }),
        $("ec-style1").launchBtn({ openDuration: 400, closeDuration: 300 });
    }),
    ($.fn.launchBtn = function (e) {
      var a, b, f, g, h, i, c, d;
      (a = $(".ec-button")),
        (b = $(".ec-panel")),
        (f = 0),
        (g = $.extend(
          { openDuration: 600, closeDuration: 200, rotate: !0 },
          e
        )),
        (h = function () {
          b.animate({ opacity: "toggle", height: "toggle" }, g.openDuration);
        }),
        (i = function () {
          b.animate({ opacity: "hide", height: "hide" }, g.closeDuration);
        }),
        (c = function (a) {
          return (
            0 === f
              ? (g.rotate &&
                  $(this)
                    .removeClass("rotateBackward")
                    .toggleClass("rotateForward"),
                h(),
                f++)
              : (g.rotate &&
                  $(this)
                    .removeClass("rotateForward")
                    .toggleClass("rotateBackward"),
                i(),
                f--),
            a.preventDefault(),
            !1
          );
        }),
        (d = function (a) {
          a.stopPropagation();
        }),
        a.on("click", c),
        b.click(d),
        $(document).click(function () {
          i(),
            1 === f &&
              a.removeClass("rotateForward").toggleClass("rotateBackward"),
            (f = 0);
        });
    }),
    $("body").on("change", ".ec-image-upload", function (b) {
      var c = $(this);
      if (this.files && this.files[0]) {
        var a = new FileReader();
        (a.onload = function (b) {
          var a = c
            .parent()
            .parent()
            .children(".ec-preview")
            .find(".ec-image-preview")
            .attr("src", b.target.result);
          a.hide(), a.fadeIn(650);
        }),
          a.readAsDataURL(this.files[0]);
      }
    }),
    $().appendTo($("body")),
    $(".bg-option-box").on("click", function (a) {
      return (
        a.preventDefault(),
        $(this).hasClass("in-out")
          ? ($(".bg-switcher").stop().animate({ right: "0px" }, 100),
            $(".color-option-box").not("in-out") &&
              ($(".skin-switcher").stop().animate({ right: "-163px" }, 100),
              $(".color-option-box").addClass("in-out")),
            $(".layout-option-box").not("in-out") &&
              ($(".layout-switcher").stop().animate({ right: "-163px" }, 100),
              $(".layout-option-box").addClass("in-out")))
          : $(".bg-switcher").stop().animate({ right: "-163px" }, 100),
        $(this).toggleClass("in-out"),
        !1
      );
    }),
    $(".back-bg-1").on("click", function (b) {
      var a = $(this).attr("id");
      x(a, "body-bg-1");
    }),
    $(".back-bg-2").on("click", function (b) {
      var a = $(this).attr("id");
      x(a, "body-bg-2");
    }),
    $(".back-bg-3").on("click", function (b) {
      var a = $(this).attr("id");
      x(a, "body-bg-3");
    }),
    $(".back-bg-4").on("click", function (b) {
      var a = $(this).attr("id");
      x(a, "body-bg-4");
    }),
    $(".lang-option-box").on("click", function (a) {
      return (
        a.preventDefault(),
        $(this).hasClass("in-out")
          ? ($(".lang-switcher").stop().animate({ right: "0px" }, 100),
            $(".color-option-box").not("in-out") &&
              ($(".skin-switcher").stop().animate({ right: "-163px" }, 100),
              $(".color-option-box").addClass("in-out")),
            $(".layout-option-box").not("in-out") &&
              ($(".layout-switcher").stop().animate({ right: "-163px" }, 100),
              $(".layout-option-box").addClass("in-out")))
          : $(".lang-switcher").stop().animate({ right: "-163px" }, 100),
        $(this).toggleClass("in-out"),
        !1
      );
    }),
    $(".ec-tools-sidebar-toggle").on("click", function (a) {
      return (
        a.preventDefault(),
        $(this).hasClass("in-out")
          ? ($(".ec-tools-sidebar").stop().animate({ right: "0px" }, 100),
            $(".ec-tools-sidebar-overlay").fadeIn(),
            $(".ec-tools-sidebar-toggle").not("in-out") &&
              ($(".ec-tools-sidebar").stop().animate({ right: "-200px" }, 100),
              $(".ec-tools-sidebar-toggle").addClass("in-out")),
            $(".ec-tools-sidebar-toggle").not("in-out") &&
              ($(".ec-tools-sidebar").stop().animate({ right: "0" }, 100),
              $(".ec-tools-sidebar-toggle").addClass("in-out"),
              $(".ec-tools-sidebar-overlay").fadeIn()))
          : ($(".ec-tools-sidebar").stop().animate({ right: "-200px" }, 100),
            $(".ec-tools-sidebar-overlay").fadeOut()),
        $(this).toggleClass("in-out"),
        !1
      );
    }),
    $(".ec-tools-sidebar-overlay").on("click", function (a) {
      $(".ec-tools-sidebar-toggle").addClass("in-out"),
        $(".ec-tools-sidebar").stop().animate({ right: "-200px" }, 100),
        $(".ec-tools-sidebar-overlay").fadeOut();
    })
})(jQuery);
