
const burgerMenu = document.getElementById("burgerMenu");
const navMenu = document.getElementById("navMenu");

burgerMenu.addEventListener("click", () => {
    burgerMenu.classList.toggle("active");
    navMenu.classList.toggle("active");
});
