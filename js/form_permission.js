window.addEventListener("DOMContentLoaded", (event) => {
  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  const submitButton = document.querySelector('input[type="submit"]');

  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener("change", () => {
      const checkedCount = document.querySelectorAll(
        'input[type="checkbox"]:checked'
      ).length;
      submitButton.disabled = checkedCount === 0;

      // Submitボタンの色を変更
      if (submitButton.disabled) {
        submitButton.classList.remove("submit_color");
      } else {
        submitButton.classList.add("submit_color");
      }
    });
  });
});
