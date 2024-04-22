// payments
document.addEventListener("DOMContentLoaded", function () {
  const urlParams = new URLSearchParams(window.location.search);
  const selectedPackage = urlParams.get("package");

  // Set nilai berdasarkan paket yang dipilih
  switch (selectedPackage) {
    case "essential":
      setPackageValues("Essential", 50);
      break;
    case "premium":
      setPackageValues("Premium", 75);
      break;
    case "ultimate":
      setPackageValues("Ultimate", 100);
      break;
    default:
      // Set nilai default jika paket tidak valid
      setPackageValues("Monthly subscription", 9.99);
  }

  function setPackageValues(title, price) {
    // Set nilai pada elemen HTML
    document.getElementById("subscriptionTitle").innerText = title + " plan ";
    document.getElementById("subscriptionPrice").innerText =
      "$" + price.toFixed(2);
    document.getElementById("subscriptionDescription").innerText =
      "$" + price.toFixed(2) + " billed every purchase";

    // Set nilai subtotal dan total
    const subtotalValue = price.toFixed(2);
    document.getElementById("subtotalValue").innerText = "$" + subtotalValue;
    document.getElementById("totalValue").innerText = "$" + subtotalValue;
  }

  // ... (bagian skrip JavaScript lainnya yang mungkin diperlukan)
});

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
