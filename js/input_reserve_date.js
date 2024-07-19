document.addEventListener("DOMContentLoaded", function () {
  const radioButtons = document.querySelectorAll(
    'input[name="reserve_date_check"]'
  );
  const sections = document.querySelectorAll(".day_section");

  radioButtons.forEach((radio) => {
    radio.addEventListener("change", function () {
      const selectedDay = this.getAttribute("data-day");

      sections.forEach((section) => {
        if (section.id === `day_${selectedDay}`) {
          section.style.display = "";
        } else {
          section.style.display = "none";
        }
      });
    });
  });
});
