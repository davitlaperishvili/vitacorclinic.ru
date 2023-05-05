// import 'select2';
// import 'magnific-popup';

// import hamburderMenu from "./libs/hamburger_menu.js";
// import formFunctions from "./libs/form_functions.js";
// import additionalFunctions from "./libs/additional_functions.js";
import plugindParameters from "./libs/plugin_parameters.js";
//import treeMenu from './libs/tree_menu.js';

// import $ from 'jquery';
// window.jQuery = $;
// window.$ = $;

$(window).on("load", function () {
  //formFunctions();
  //additionalFunctions();
  plugindParameters();
  // hamburderMenu();
  console.log("ready");

  // faq sectoin

  const faqQuestions = $(".faq_question");
  faqQuestions.each(function () {
    $(this).on("click", function () {
      if ($(this).hasClass("is-active")) {
        $(this).next().slideUp(400);
        $(this).removeClass("is-active");
      } else {
        $(this).next().slideDown(400);
        $(this).addClass("is-active");
      }
    });
  });
});
