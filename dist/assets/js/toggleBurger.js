document.addEventListener("DOMContentLoaded", () => {
    const navContainer = document.querySelector(".nav-container");

    if (navContainer) {
        const navToggle = navContainer.querySelector(".nav-toggle");

        if (navToggle) {
            navToggle.addEventListener("click", () => {
                if (navContainer.classList.contains("is-active")) {
                    navContainer.classList.remove("is-active");
                } else {
                    navContainer.classList.add("is-active");
                }
            });
        }
    }
});
