"use strict";

/* ===============================================
# ビューポート
=============================================== */
  function viewportSet() {
    var wsw = window.screen.width;
    var initialScale = wsw / 375;
    if (wsw <= 375) {
      $("meta[name='viewport']").attr("content", "width=device-width");
    } else {
      // それ以外
      $("meta[name='viewport']").attr(
        "content",
        "width=device-width,initial-scale=1.0"
      );
    }
  }
  viewportSet();
  $(window).on("resize orientationchange", viewportSet);
