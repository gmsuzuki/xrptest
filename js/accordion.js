//アコーディオン

// レビュー
const girlReviewTriggers = document.querySelectorAll(".girl_review_head");

girlReviewTriggers.forEach((trigger) =>
  trigger.addEventListener("click", reviewAccordion)
);

function reviewAccordion() {
  const reviews = document.querySelectorAll(".girl_review_wrap");
  const thisReview = this.parentNode;

  reviews.forEach((review) => {
    if (thisReview == review) {
      thisReview.classList.toggle("is-open");
      return;
    }
    review.classList.remove("is-open");
  });
}

// footer
const accSingleTriggers = document.querySelectorAll(".js-acc-single-trigger");

accSingleTriggers.forEach((trigger) =>
  trigger.addEventListener("click", toggleAccordion)
);

function toggleAccordion() {
  const items = document.querySelectorAll(".js-acc-item");
  const thisItem = this.parentNode;

  items.forEach((item) => {
    if (thisItem == item) {
      thisItem.classList.toggle("is-open");
      return;
    }
    item.classList.remove("is-open");
  });
}

//footer
const PageTopBtn = document.getElementById("js-scroll-top");
PageTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
});
