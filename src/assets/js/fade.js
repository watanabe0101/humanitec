"use strict";

/*=================================================
要素が画面に入ったらフワッと表示
===================================================*/
export function initializeFade() {
  jQuery(function () {
    /*================================================
    フワッとアニメーション（下から/上から）
  =================================================*/
    if (
      jQuery(".js-fadeIn").length ||
      jQuery(".js-fadeUp").length ||
      jQuery(".js-fadeDown").length ||
      jQuery(".js-fadeLeft").length ||
      jQuery(".js-fadeRight").length
    ) {
      scrollAnimation();
    }

    function scrollAnimation() {
      jQuery(window).scroll(function () {
        const windowWidth = jQuery(window).width();
        const offsetValue = windowWidth <= 640 ? -100 : 200;

        jQuery(
          ".js-fadeUp, .js-fadeDown, .js-fadeLeft, .js-fadeRight, .js-fadeIn"
        ).each(function () {
          let position = jQuery(this).offset().top,
            scroll = jQuery(window).scrollTop(),
            windowHeight = jQuery(window).height();

          if (scroll > position - windowHeight + offsetValue) {
            jQuery(this).addClass("js-show");
          }
        });
      });
    }

    /*================================================
    フワッとアニメーション（時間差）
  =================================================*/
    $(function () {
      $(window).scroll(function () {
        const wHeight = $(window).height();
        const wScroll = $(window).scrollTop();
        const wWidth = $(window).width();

        const offsetValue = wWidth <= 640 ? -100 : 200;

        $(".js-delay").each(function () {
          const bPosition = $(this).offset().top;
          if (wScroll > bPosition - wHeight + offsetValue) {
            $(this).find(".js-fadeIn0ms").addClass("js-show");
            $(this).find(".js-fadeIn300ms").addClass("js-show");
            $(this).find(".js-fadeIn600ms").addClass("js-show");
            $(this).find(".js-fadeIn900ms").addClass("js-show");
            $(this).find(".js-fadeLeft0ms").addClass("js-show");
            $(this).find(".js-fadeLeft300ms").addClass("js-show");
            $(this).find(".js-fadeLeft600ms").addClass("js-show");
            $(this).find(".js-fadeLeft900ms").addClass("js-show");
            $(this).find(".js-fadeUp0ms").addClass("js-show");
            $(this).find(".js-fadeUp300ms").addClass("js-show");
            $(this).find(".js-fadeUp600ms").addClass("js-show");
            $(this).find(".js-fadeUp900ms").addClass("js-show");
            $(this).find(".js-fadeRight0ms").addClass("js-show");
            $(this).find(".js-fadeRight300ms").addClass("js-show");
            $(this).find(".js-fadeRight600ms").addClass("js-show");
            $(this).find(".js-fadeRight900ms").addClass("js-show");
          }
        });
      });
    });

    /*=================================================
  フワッと表示（スクロールに応じて時間差）
  ===================================================*/
    $(document).ready(function () {
      checkScrollPosition();

      $(window).on("scroll", function () {
        checkScrollPosition();
      });
    });

    function checkScrollPosition() {
      var scrollPos = $(window).scrollTop();
      var windowHeight = $(window).height();
      var windowWidth = $(window).width();

      var offsetValue = windowWidth <= 640 ? -100 : 100;

      $(
        ".js-fadeUp--delay, .js-fadeLeft--delay, .js-fadeRight--delay, .js-fadeIn--delay"
      ).each(function (index) {
        var elem = $(this);
        var elemOffset = elem.offset().top;
        var isVisible =
          elemOffset < scrollPos + windowHeight + offsetValue &&
          elemOffset + elem.height() > scrollPos;

        setTimeout(function () {
          if (isVisible) {
            elem.addClass("js-show--delay");
          }
        }, index * 200);
      });
    }
  });
}