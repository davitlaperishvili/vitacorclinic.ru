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

  // custom table of content

  const tableContentWrap = document.querySelector("#tableOfContent");

  if (tableContentWrap) {
    const allTitles = document.querySelectorAll(
      ".dl_page .main_wraper h2, .dl_page .main_wraper h3"
    );
    let contentLi = "";
    allTitles.forEach((title, index) => {
      title.setAttribute("id", `title${index}`);
      contentLi += `<li><a href="#title${index}">${title.innerText}</a></li>`;
    });
    const contentHTML = `
      <div class="content_list">
        <ul>${contentLi}</ul>
      </div>
    `;
    tableContentWrap.innerHTML = contentHTML;
  }
});
