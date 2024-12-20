import "select2";
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
      $(".alfabet_filter_item").removeClass("is-active");
      $(this).parent(".alfabet_filter_item").addClass("is-active");
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
      $(".filter_category_title").addClass("is-hide");
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
      $(".alfabet_filter_item").removeClass("is-active");
      $(".filter_category_title").removeClass("is-hide");
    }
  });

  // Doctors filter

  const doctorsFilterItems = $(".doctor_filter_item");
  const filteredDoctors = $(".filter_doctors .doctors_list .doctor_item");
  if (filteredDoctors.length > 0 && doctorsFilterItems.length > 0) {
    doctorsFilterItems.on("change", function (item) {
      let valueDirection = "";
      let valueType = "";
      let valueName = "";
      doctorsFilterItems.each(function () {
        if ($(this).attr("name") === "name") {
          valueName = $(this).val();
        } else if ($(this).attr("name") === "type") {
          valueType = $(this).val();
        } else if ($(this).attr("name") === "direction") {
          valueDirection = $(this).val();
        }
        if (!$(this).val() || $(this).val() == "none" || $(this).val() == "") {
          $(this).addClass("is-empty");
        } else {
          $(this).removeClass("is-empty");
        }
        console.log(valueDirection, valueType, valueName);
      });
      filteredDoctors.each(function () {
        // get doctors filter values
        const directionID = $(this).attr("data-direction");
        const type = $(this).attr("data-type");
        const doctorName = $(this).find(".doctor_name").text();

        let filtered = true;
        doctorsFilterItems.each(function () {
          if (!$(this).hasClass("is-empty")) {
            console.log("NOT EMPTY: ", $(this).attr("name"));
            if (
              $(this).attr("name") === "name" &&
              !doctorName.includes(valueName)
            ) {
              filtered = false;
            } else if (
              $(this).attr("name") === "type" &&
              !type.includes(valueType)
            ) {
              filtered = false;
            } else if (
              $(this).attr("name") === "direction" &&
              !directionID.includes(valueDirection)
            ) {
              filtered = false;
            }
          }
        });
        if (filtered) {
          $(this).css("display", "flex");
          $(this).addClass("is-active");
        } else {
          $(this).css("display", "none");
          $(this).removeClass("is-active");
        }
      });

      // show no result
      if (
        $(".filter_doctors .doctors_list .doctor_item.is-active").length == 0
      ) {
        $(".no_result").addClass("is-active");
      } else {
        $(".no_result").removeClass("is-active");
      }
    });
  }

  // front services tabs
  const frontServicesTabs = document.querySelectorAll(
    ".front_services .services_tabs .tab_item"
  );
  const frontServicesTabsContent = document.querySelectorAll(
    ".front_services .tab_content"
  );
  if (frontServicesTabs.length > 0) {
    frontServicesTabs.forEach((tab) => {
      tab.addEventListener("click", (e) => {
        const tabValue = e.target.dataset.tab;
        frontServicesTabsContent.forEach((item) => {
          item.classList.remove("is-active");
        });
        frontServicesTabs.forEach((item) => {
          item.classList.remove("is-active");
        });
        e.target.classList.add("is-active");
        e.target
          .closest(".front_services")
          .querySelector(`.tab_content[data-content="${tabValue}Content"]`)
          .classList.add("is-active");
      });
    });
  }

  // promo list Tabs

  const promoTabs = document.querySelectorAll(
    ".promo_tabs_wrap .tabs .promo_tab"
  );
  if (promoTabs.length > 0) {
    const promoTabContents = document.querySelectorAll(
      ".promo_list_wrap .promo_item"
    );
    promoTabs.forEach((tab) => {
      tab.addEventListener("click", (e) => {
        const target = e.target;
        const dataTab = target.dataset.tab;

        document
          .querySelector(".promo_tabs_wrap .tabs .promo_tab.is-active")
          .classList.remove("is-active");
        target.classList.add("is-active");

        if (dataTab == "all") {
          promoTabContents.forEach((content) => {
            content.classList.add("is-active");
          });
          return;
        }

        promoTabContents.forEach((tabContent) => {
          const dataContent = tabContent.dataset.content;
          if (dataContent.includes(dataTab)) {
            tabContent.classList.add("is-active");
          } else {
            tabContent.classList.remove("is-active");
          }
        });
      });
    });
  }

  // table of content on the single page of journal
  const tableOfContent = document.querySelectorAll(
    ".journal_table_of_content .table_of_content_wrap"
  );
  if (tableOfContent.length > 0) {
    // create table of content
    let tableItems = "";
    const headers = document.querySelectorAll("h2");
    headers.forEach((header, index) => {
      header.setAttribute("id", `headerContent${index}`);
      tableItems += `
      <li>
        <a href="#headerContent${index}">${header.innerText}</a>
      </li>`;
    });
    let tableOfContentHTML = `<ol>${tableItems}</ol>`;

    tableOfContent.forEach((table) => {
      table.innerHTML = tableOfContentHTML;
    });
  }

  //journal_place_for_contact_form_on_mobile
  const mobileContactFormContainer = document.querySelectorAll(
    ".journal_place_for_contact_form_on_mobile"
  );

  if (window.outerWidth < 1024) {
    if (mobileContactFormContainer.length > 0) {
      const contact_form_widget = document.querySelector(
        ".contact_form_widget"
      );
      if (contact_form_widget) {
        mobileContactFormContainer.forEach((container) => {
          container.querySelector(
            ".place_for_contact_form_on_mobile"
          ).innerHTML = contact_form_widget.innerHTML;
        });
      }
    }
  }

  let page = 2;
  const postsPerPage = 9;

  $("#load-more").on("click", function () {
    let button = $(this);
    let type = $(this).attr("data-type") ?? "";
    let maxPages = $(this).attr("data-maxpage");
    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      type: "POST",
      data: {
        action: "load_more_posts",
        page: page,
        posts_per_page: postsPerPage,
        type: type,
      },
      beforeSend: function () {
        button.text("Загрузка...");
      },
      success: function (response) {
        if (response) {
          $(".blog_posts_listing").append(response);
          button.text("Показать еще");
          page++;
          if (page >= maxPages) {
            button.css("display", "none");
          }
        } else {
          button.css("display", "none");
        }
      },
    });
  });
});
