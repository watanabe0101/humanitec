"use strict";

/* ===============================================
# ハンバーガーボタン
=============================================== */
  $(document).on("click", function (e) {
    if (!$(e.target).closest(".js-hamburger").length) {
      if ($(".js-hamburger").hasClass("active")) {
        $(".js-hamburger").removeClass("active");
        $(".js-drawer").removeClass("panelactive");
        $("body").removeClass("js-ScrollAllowed");
        $(".js-drawer").attr("aria-hidden", "true");
        $(".js-hamburger").attr("aria-expanded", "false");
        $(".js-hamburger").attr("aria-label", "メニュー");
      }
    } else {
      if ($(".js-hamburger").hasClass("active")) {
        $(".js-hamburger").removeClass("active");
        $(".js-drawer").removeClass("panelactive");
        $("body").removeClass("js-ScrollAllowed");
        $(".js-hamburger").attr("aria-expanded", "false");
        $(".js-drawer").attr("aria-hidden", "true");
        $(".js-hamburger").attr("aria-label", "メニュー");
      } else {
        $(".js-hamburger").addClass("active");
        $(".js-drawer").addClass("panelactive");
        $("body").addClass("js-ScrollAllowed");
        $(".js-hamburger").attr("aria-expanded", "true");
        $(".js-drawer").attr("aria-hidden", "false");
        $(".js-hamburger").attr("aria-label", "閉じる");
      }
    }
  });

  /*==================================================*/
// ヘッダーが上から出現
/*==================================================*/
(function () {
  const fh = document.querySelector(".js-fixed");
  window.addEventListener("scroll", () => {
    if (window.pageYOffset > 300) {
      fh.classList.add("js-show");
    } else {
      fh.classList.remove("js-show");
    }
  });
})();



/*=================================================
  スムーススクロール
===================================================*/
document.addEventListener("DOMContentLoaded", function () {
  var links = document.querySelectorAll('a[href*="#"]');

  links.forEach(function (link) {
    link.addEventListener("click", function (e) {
      var href = link.getAttribute("href");
      var url = new URL(href, window.location.href);

      if (url.hash) {
        var target = document.querySelector(url.hash);

        if (target) {
          e.preventDefault();
          var position =
            target.getBoundingClientRect().top + window.pageYOffset;

          window.scrollTo({
            top: position,
            behavior: "smooth",
          });

          // URLのハッシュを更新
          history.pushState(null, null, url.hash);
        }
      }
    });
  });
});

  document.addEventListener("DOMContentLoaded", function () {
    // 別ページ遷移後のスムーススクロール
    var urlHash = location.hash;
    if (urlHash) {
      var target = document.querySelector(urlHash);
      if (target) {
        // ページトップから開始（ブラウザ差異を考慮して併用）
        history.replaceState(null, "", window.location.pathname);
        window.scrollTo(0, 0);

        window.addEventListener("load", function () {
          var headerHeight = document.querySelector("header").offsetHeight;
          var position = target.offsetTop - headerHeight - 20;
          window.scrollTo({
            top: position,
            behavior: "smooth",
          });

          // ハッシュを再設定
          history.replaceState(null, "", window.location.pathname + urlHash);
        });
      }
    }
  });


/* ===============================================
# 改行が必要なplaceholderの処理
=============================================== */
$(document).ready(function() {
  $("textarea").each(function() {
    const placeholder = $(this).siblings(".placeholder");
    if ($(this).val().length > 0) {
      placeholder.addClass("hidden"); // 値がある場合、プレースホルダーを隠す
    }
  });

  $("input[type='text']").each(function() {
    const placeholder = $(this).siblings(".placeholder");
    if ($(this).val().length > 0) {
      placeholder.addClass("hidden"); // 値がある場合、プレースホルダーを隠す
    }
  });
});

// textareaの入力イベント
$("textarea").on("input", function () {
  const placeholder = $(this).siblings(".placeholder");
  if ($(this).val().length > 0) {
    placeholder.addClass("hidden"); // 入力がある場合、対象のプレースホルダーを隠す
  } else {
    placeholder.removeClass("hidden"); // 入力がない場合、対象のプレースホルダーを表示
  }
});

// input[type='text']の入力イベント
$("input[type='text']").on("input", function () {
  const placeholder = $(this).siblings(".placeholder");
  if ($(this).val().length > 0) {
    placeholder.addClass("hidden"); // 入力がある場合、対象のプレースホルダーを隠す
  } else {
    placeholder.removeClass("hidden"); // 入力がない場合、対象のプレースホルダーを表示
  }
});


/*================================================
    フワッとアニメーション（下から/上から）
=================================================*/
if (
  document.querySelector(".js-fadeIn") ||
  document.querySelector(".js-fadeUp") ||
  document.querySelector(".js-fadeDown") ||
  document.querySelector(".js-fadeLeft") ||
  document.querySelector(".js-fadeRight") ||
  document.querySelector(".js-fadeIn-sp") ||
  document.querySelector(".js-fadeUp-sp") ||
  document.querySelector(".js-fadeDown-sp") ||
  document.querySelector(".js-fadeLeft-sp") ||
  document.querySelector(".js-fadeRight-sp")
) {
  scrollAnimation();
}

function scrollAnimation() {
  window.addEventListener('scroll', function() {
    const windowWidth = window.innerWidth;
    const offsetValue = windowWidth <= 767 ? 0 : 200;
    
    const elements = document.querySelectorAll(
      ".js-fadeUp, .js-fadeDown, .js-fadeLeft, .js-fadeRight, .js-fadeIn, .js-fadeUp-sp, .js-fadeDown-sp, .js-fadeLeft-sp, .js-fadeRight-sp, .js-fadeIn-sp"
    );
    
    elements.forEach(function(element) {
      const position = element.getBoundingClientRect().top + window.pageYOffset;
      const scroll = window.pageYOffset;
      const windowHeight = window.innerHeight;
      
      if (scroll > position - windowHeight + offsetValue) {
        element.classList.add("js-show");
      }
    });
  });
}


/*================================================
    フワッとアニメーション（時間差）
=================================================*/
document.addEventListener('DOMContentLoaded', function() {
  window.addEventListener('scroll', function() {
    const wHeight = window.innerHeight;
    const wScroll = window.pageYOffset;
    const wWidth = window.innerWidth;
    
    const offsetValue = wWidth <= 767 ? 0 : 200;
    
    const delayElements = document.querySelectorAll('.js-delay');
    
    delayElements.forEach(function(element) {
      const bPosition = element.getBoundingClientRect().top + window.pageYOffset;
      
      if (wScroll > bPosition - wHeight + offsetValue) {
        const animationsPC = [
          "fadeIn",
          "fadeLeft",
          "fadeUp",
          "fadeRight",
        ];
        const animationsSP = [
          "fadeIn-sp",
          "fadeLeft-sp",
          "fadeUp-sp",
          "fadeRight-sp",
        ];
        const delays = ['0ms', '300ms', '600ms', '900ms'];
        
        // PCの場合のアニメーション
        if (wWidth > 767) {
          animationsPC.forEach(function(animation) {
            delays.forEach(function(delay) {
              const elements = element.querySelectorAll(`.js-${animation}${delay}`);
              elements.forEach(function(el) {
                el.classList.add("js-show");
              });
            });
          });
        } else {
          // スマホの場合のアニメーション
          animationsSP.forEach(function(animation) {
            delays.forEach(function(delay) {
              const elements = element.querySelectorAll(`.js-${animation}${delay}`);
              elements.forEach(function(el) {
                el.classList.add("js-show");
              });
            });
          });
        }
      }
    });
  });
});


/* ===============================================
# スマホの場合にbodyにクラスを付与
=============================================== */
if (navigator.userAgent.indexOf("iPhone") > 0) {
  let body = document.getElementsByTagName("body")[0];
  body.classList.add("iPhone");
}

if (navigator.userAgent.indexOf("iPad") > 0) {
  let body = document.getElementsByTagName("body")[0];
  body.classList.add("iPad");
}

if (navigator.userAgent.indexOf("Android") > 0) {
  let body = document.getElementsByTagName("body")[0];
  body.classList.add("Android");
}