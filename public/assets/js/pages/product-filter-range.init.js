/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************************!*\
  !*** ./resources/js/pages/product-filter-range.init.js ***!
  \*********************************************************/
/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesdesign
Website: https://Themesdesign.in/
Contact: Themesdesign@gmail.com
File: product range slider init js
*/

var slider = document.getElementById('priceslider');
noUiSlider.create(slider, {
  start: [250, 800],
  connect: true,
  tooltips: true,
  range: {
    'min': 0,
    'max': 1000
  },
  pips: {
    mode: 'count',
    values: 5
  }
});
/******/ })()
;