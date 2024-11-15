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
    if (window.pageYOffset > 100) {
      fh.classList.add("js-show");
    } else {
      fh.classList.remove("js-show");
    }
  });
})();


/* ===============================================
# 改行が必要なplaceholderの処理
=============================================== */
// ページ読み込み時にプレースホルダーの表示状態を設定
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
// ... 既存のコード ...