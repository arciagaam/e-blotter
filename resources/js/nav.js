const burger = document.querySelector('#burger');
const navbar = document.querySelector('nav');

const container = document.querySelector("#logo-container");
const logo = document.querySelector("#logo");
const label = document.querySelector("#barangay-label");

let state = !navbar.getAttribute("data-open");

/**
 * 
 * @param {HTMLElement} element 
 * @param {boolean} state 
 */
const toggleElementVisibility = (element, state) => {
    if (state) {
        element.classList.remove("opacity-0");
        element.classList.remove("hidden");
    } else {
        element.classList.add("opacity-0");

        setTimeout(() => {
            element.classList.add("hidden");
        }, 200);
    }
};

window.addEventListener("DOMContentLoaded", () => {
    burger.addEventListener('click', () => {
        state = !state;

        navbar.classList.toggle('!max-w-full');
        navbar.setAttribute("data-open", new String(state));

        toggleElementVisibility(label, state);
    })
});