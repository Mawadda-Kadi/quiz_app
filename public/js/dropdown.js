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
  var mainElement = document.querySelector('main');
  if (menuIcon && navMenu && mainElement) {
    menuIcon.addEventListener('click', function () {
      navMenu.classList.toggle('show');

      // Adjust main padding to push content down when menu opens
      if (navMenu.classList.contains('show')) {
        mainElement.style.paddingTop = "".concat(navMenu.clientHeight, "px");
      } else {
        mainElement.style.paddingTop = '0px';
      }
    });
  } else {
    console.error("Menu icon, navigation menu, or main element not found!");
  }
});
/******/ })()
;