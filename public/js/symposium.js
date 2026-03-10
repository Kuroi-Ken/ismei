document.addEventListener("DOMContentLoaded", () => {

    const accordions = document.querySelectorAll(".accordion-toggle");

    accordions.forEach(button => {

        const content = button.nextElementSibling;
        const icon    = button.querySelector(".accordion-icon");

        button.addEventListener("click", () => {

            if (content.style.maxHeight) {

                content.style.maxHeight = null;
                icon.classList.remove("rotate-90");

            } else {

                content.style.maxHeight = content.scrollHeight + "px";
                icon.classList.add("rotate-90");

            }

        });

    });

});