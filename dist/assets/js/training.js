var dropdownButton = document.getElementById("dropdownButton");
var dropdownMenu = document.getElementById("dropdownMenu");

// Toggle visibility of the dropdown menu
dropdownButton.addEventListener("click", function () {
  dropdownMenu.classList.toggle("hidden");
});

// Close dropdown when clicking outside of it
document.addEventListener("click", function (event) {
  var isClickInside =
    dropdownButton.contains(event.target) ||
    dropdownMenu.contains(event.target);
  if (!isClickInside) {
    dropdownMenu.classList.add("hidden");
  }
});

// dropdown menu
document.addEventListener("DOMContentLoaded", function () {
  const categoryList = document.getElementById("categoryList");
  const selectedContainer = document.querySelector(".selected-item");

  function toggleDropdown() {
    if (categoryList.style.display === "block") {
      categoryList.style.display = "none";
    } else {
      categoryList.style.display = "block";
    }
  }

  function closeDropdown(event) {
    if (!event.target.closest(".custom-dropdown")) {
      categoryList.style.display = "none";
      document.body.removeEventListener("click", closeDropdown);
    }
  }

  selectedContainer.addEventListener("click", function (event) {
    event.stopPropagation();
    toggleDropdown();

    if (categoryList.style.display === "block") {
      document.body.addEventListener("click", closeDropdown);
    }
  });
});
