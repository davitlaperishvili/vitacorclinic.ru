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

  // zabolevania alfabet filter

  const alfabetFilterItems = $(".alfabet_filter .alfabet_filter_item .letter");
  if (alfabetFilterItems.length > 0) {
    alfabetFilterItems.on("click", function (e) {
      $(".alfabet_list").addClass("filtered");
      const letter = $(this).text();
      console.log(letter);
      $(".alfabet_list .alfabet_item").each(function () {
        console.log($(this).find(".letter").text());
        if ($(this).find(".letter").text() == letter) {
          $(this).addClass("filter-is-active");
        } else {
          $(this).removeClass("filter-is-active");
        }
      });
    });
  }

  // Text filter

  const textFilter = $(".text_filter");
  if (textFilter) {
    const textFiledForm = $(".text_filter .text_field .form_item");
    textFiledForm.on("click", function (e) {
      e.preventDefault();
      const inputText = $(this).find("input").val();
      console.log("INPUT VALUE: ", inputText);
      if (inputText) {
        $(".alfabet_list").addClass("filtered");
        $(".text_filter ul").html("");
        $(".text_filter").addClass("filter-is-active");
        $(".alfabet_list .alfabet_item").each(function () {
          $(this)
            .find(".alfabet_services li a")
            .each(function () {
              console.log("INCLUDES: ", $(this).text().includes(inputText));
              if ($(this).text().includes(inputText)) {
                $(".text_filter ul").prepend(`
                <li>
                    <a href="${$(this).attr("href")}">${$(this).text()}</a>
                </li>
              `);
              }
            });
        });
      }
    });
  }

  // Remove all filters

  const resetFilterBtn = $(".reset_all_filter");
  resetFilterBtn.on("click", function () {
    if ($(".filter-is-active")) {
      $(".filter-is-active").removeClass("filter-is-active");
      $(".alfabet_list").removeClass("filtered");
    }
  });
});
