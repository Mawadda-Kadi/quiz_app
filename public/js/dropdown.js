/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/dropdown.js ***!
  \**********************************/
__webpack_require__.r(__webpack_exports__);
document.addEventListener('DOMContentLoaded', function () {
  var menuIcon = document.querySelector('.menu-icon');
  var navMenu = document.querySelector('nav ul');
  if (!menuIcon || !navMenu) {
    console.error("Menu icon or navigation menu not found!");
    return;
  }
  menuIcon.addEventListener('click', function () {
    navMenu.classList.toggle('show');

    // Ensure menu closes when clicking outside
    document.addEventListener('click', function (event) {
      if (!navMenu.contains(event.target) && event.target !== menuIcon) {
        navMenu.classList.remove('show');
      }
    });
  });
});
/******/ })()
;