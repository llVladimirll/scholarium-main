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

function redirectToPayment(package) {
  // Mengarahkan pengguna ke halaman pembayaran dengan menyertakan parameter query string
  window.location.href = `payment.php?package=${package}`;
}


let currentIndex = 0;
const feedbackEntries = document.querySelectorAll(
  ".carousel-content .feedback-entry"
);

function showFeedback(index) {
  const transformValue = `translateX(${-index * 100}%)`;
  document.querySelector(".carousel-content").style.transform = transformValue;
}

function prevFeedback() {
  currentIndex =
    (currentIndex - 1 + feedbackEntries.length) % feedbackEntries.length;
  showFeedback(currentIndex);
}

function nextFeedback() {
  currentIndex = (currentIndex + 1) % feedbackEntries.length;
  showFeedback(currentIndex);
}

// Initial display
showFeedback(currentIndex);

function showElement(element) {
  var hiddenDiv = element.querySelector("#hiddenDiv");
  if (hiddenDiv) {
    hiddenDiv.classList.remove("hidden");
    hiddenDiv.classList.add("active");
  }
}

function hideElement(element) {
  var hiddenDiv = element.querySelector("#hiddenDiv");
  if (hiddenDiv) {
    hiddenDiv.classList.remove("active");
    hiddenDiv.addEventListener(
      "transitionend",
      function () {
        hiddenDiv.classList.add("hidden");
      },
      { once: true }
    );
  }
}

// dropdown button profile
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

document.getElementById("search_query").addEventListener("keydown", function(event) {
  if (event.key === "Enter") {
    event.preventDefault(); // Prevents the default behavior of form submission
    
    var search = document.getElementById("search_query").value.trim();
    if (search !== "") {
      window.location.href = "./scholarshipPage.php?search_query=" + encodeURIComponent(search);
    }
  }
});

