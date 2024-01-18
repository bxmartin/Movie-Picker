const topBtn = document.querySelector("#topButton");
window.onscroll = () => {
    if (window.pageYOffset > 50) {
        // unhide
        topBtn.classList.add("flex");
        topBtn.classList.remove("hidden");
    } else {
        // hide
        topBtn.classList.remove("flex");
        topBtn.classList.add("hidden");
    }
}
