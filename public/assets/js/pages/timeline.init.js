/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************************!*\
  !*** ./resources/js/pages/timeline.init.js ***!
  \*********************************************/
/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesdesign
Website: https://Themesdesign.in/
Contact: Themesdesign@gmail.com
File: Timeline Init Js File
*/

var swiper = new Swiper(".slider", {
  slidesPerView: 1,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  breakpoints: {
    768: {
      slidesPerView: 2
    },
    1024: {
      slidesPerView: 4
    }
  }
});
var swiper = new Swiper("#timeline-card-slider", {
  slidesPerView: 1,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  breakpoints: {
    768: {
      slidesPerView: 3
    },
    1024: {
      slidesPerView: 5
    }
  }
});
/******/ })()
;