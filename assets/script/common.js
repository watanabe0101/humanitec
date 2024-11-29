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
$(function () {
  var headerHeight = $("header").height();

  // ハッシュを含むすべてのリンクに対応するようセレクタを変更
  $('a[href*="#"]').click(function (e) {
    var href = $(this).attr("href");

    // 現在のページのURLと遷移先URLを比較
    var currentUrlBase =
      window.location.protocol +
      "//" +
      window.location.host +
      window.location.pathname;
    var clickedUrlBase = href.split("#")[0];

    // クリックされたURLのベース部分が空か現在のページと同じ場合のみスクロール処理を実行
    if (clickedUrlBase === "" || clickedUrlBase === currentUrlBase) {
      var targetId = href.split("#")[1]; // #以降の部分を取得
      var target = targetId ? $("#" + targetId) : $("html"); // ターゲットの特定

      if (target.length) {
        // ターゲットが存在する場合のみ処理
        e.preventDefault();
        var position = target.offset().top - headerHeight;

        // スクロール実行
        $.when(
          $("html, body").animate(
            {
              scrollTop: position,
            },
            400,
            "swing"
          )
        ).done(function () {
          var diff = target.offset().top - headerHeight;
          if (diff !== position) {
            $("html, body").animate(
              {
                scrollTop: diff,
              },
              10,
              "swing"
            );
          }
        });
      }
    }
  });
});


const urlHash = location.hash;
if (urlHash) {
  const target = jQuery(urlHash);
  if (target.length) {
    // ページトップから開始（ブラウザ差異を考慮して併用）
    history.replaceState(null, "", window.location.pathname);
    jQuery("html,body").stop().scrollTop(0);

    // ページが完全にロードされたときの処理
    jQuery(window).on("load", function () {
      const headerHeight = jQuery("header").outerHeight();
      let position = target.offset().top - headerHeight - 20;

      // 最初のスクロール
      jQuery("html, body").animate(
        { scrollTop: position },
        400,
        "swing",
        function () {
          // 微調整: 再計算してズレを修正
          position = target.offset().top - headerHeight - 20;
          jQuery("html, body").animate({ scrollTop: position }, 100, "swing");
        }
      );

      // ハッシュを再設定
      history.replaceState(null, "", window.location.pathname + urlHash);
    });

    // 遅延読み込みされた画像にも対応
    jQuery(window).on("lazyloaded", function () {
      const headerHeight = jQuery("header").outerHeight();
      const position = target.offset().top - headerHeight - 20;

      jQuery("html, body").animate({ scrollTop: position }, 300, "swing");
    });
  }
}



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
# 文字数制限
=============================================== */
document.addEventListener("DOMContentLoaded", () => {
  const textLimit = document.querySelectorAll(".limited-text");
  textLimit.forEach((text) => {
    const textContent = text.textContent;
    const textLength = textContent.length;
    if (textLength > 35) {
      text.textContent = text.textContent.slice(0, 35) + "...";
    }
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