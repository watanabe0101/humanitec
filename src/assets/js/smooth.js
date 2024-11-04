"use strict";

/*=================================================
  スムーススクロール
===================================================*/
export function initializeSmoothScroll() {
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
}