document.addEventListener("DOMContentLoaded", function () {
    // Xử lý menu footer
    document.querySelectorAll(".footer-click .title-menu").forEach(title => {
        title.addEventListener("click", function () {
            let content = this.nextElementSibling;
            if (content) {
                content.classList.toggle("hidden-mobile");
            }
            this.classList.toggle("active");
        });
    });

    // Xử lý user box toggle
    const userBtn = document.querySelector("#user-bot .icon");
    const userBox = document.querySelector("#user-bot .information");

    if (userBtn && userBox) {
        userBtn.addEventListener("click", () => {
            userBtn.classList.toggle("expanded");
            setTimeout(() => {
                userBox.classList.toggle("expanded");
            }, 100);
        });
    }
});
