function initTheme() {
    let theme = localStorage.getItem("theme");
    if (!theme) {
        theme = window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light";

        localStorage.setItem("theme", theme);
    }

    if (theme === "dark") {
        document.documentElement.classList.add("dark");
    } else {
        document.documentElement.classList.remove("dark");
    }
}

initTheme();

function toggleTheme() {
    const theme = localStorage.getItem("theme");

    if (theme === "dark") {
        localStorage.setItem("theme", "light");
        document.documentElement.classList.remove("dark");
    }
    if (theme === "light") {
        localStorage.setItem("theme", "dark");
        document.documentElement.classList.add("dark");
    }
}

const element = document.getElementById("toggle-theme");
if (element) element.addEventListener("click", toggleTheme);
