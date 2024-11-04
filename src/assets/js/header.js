"use strict";

/*==================================================*/
// ヘッダーが上から出現
/*==================================================*/

export function initializeHeader() {
  (function () {
    const fh = document.querySelector(".js-fixed");
    window.addEventListener("scroll", () => {
      if (window.pageYOffset > 500) {
        fh.classList.add("js-show");
      } else {
        fh.classList.remove("js-show");
      }
    });
  })();
}
