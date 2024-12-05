function toggleTheme(e) {
    document.documentElement.classList.toggle("dark");
}

window.onload = () => {
    document.documentElement.classList.toggle(
        "dark",
        localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-scheme: dark)").matches)
    );

    const element = document.getElementById("toggle-theme");
    if (element) element.addEventListener("click", toggleTheme);
};

window.onbeforeunload = () => {
    const element = document.getElementById("toggle-theme");
    if (element) element.removeEventListener("click", toggleTheme);
};
