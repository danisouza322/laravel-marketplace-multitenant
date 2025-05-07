/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************!*\
  !*** ./resources/js/pages/email-editor.init.js ***!
  \*************************************************/
/*
Template Name: Symox - Admin & Dashboard Template
Author: Themesdesign
Website: https://Themesdesign.in/
Contact: Themesdesign@gmail.com
File: Email summernote Js File
*/

ClassicEditor.create(document.querySelector('#email-editor')).then(function (editor) {
  editor.ui.view.editable.element.style.height = '200px';
})["catch"](function (error) {
  console.error(error);
});
/******/ })()
;