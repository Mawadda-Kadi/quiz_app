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
  var menuIcon = document.querySelector('.menu-icon'); // Select the menu icon
  var navMenu = document.querySelector('nav ul'); // Select the navigation menu (ul)

  // Ensure both elements exist in the DOM before attaching events
  if (menuIcon && navMenu) {
    menuIcon.addEventListener('click', function () {
      navMenu.classList.toggle('show'); // Toggle the "show" class
    });
  } else {
    console.error("Menu icon or navigation menu not found!");
  }
});
/******/ })()
;