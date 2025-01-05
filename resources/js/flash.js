const flashes = document.querySelectorAll(".flash");

for (const flast of flashes) {
    setTimeout(() => {
        flast.style.display = "none";
    }, 5100);
}
