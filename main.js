"use strict";
function openrepmenu(id) {
    const allMenus = document.querySelectorAll(".dwlksl");
    allMenus.forEach((menu) => {
        const el = menu;
        el.style.display = "none";
        el.style.opacity = "0";
        el.style.height = "0";
        el.classList.remove("open");
    });
    const repmenu = document.getElementById(`allmenu_${id}`);
    if (repmenu) {
        repmenu.style.display = "flex";
        setTimeout(() => {
            repmenu.style.opacity = "1";
            repmenu.style.height = "90px";
            repmenu.classList.add("open");
        }, 100);
    }
}
document.addEventListener("click", function (event) {
    const target = event.target;
    const openMenu = document.querySelector(".dwlksl.open");
    if (!openMenu)
        return;
    const isButton = target.closest("#repbut") || target.id === "repbut";
    const isInsideMenu = openMenu.contains(target);
    if (!isButton && !isInsideMenu) {
        const allMenus = document.querySelectorAll(".dwlksl");
        allMenus.forEach((menu) => {
            const el = menu;
            el.style.opacity = "0";
            el.style.height = "0px";
            setTimeout(() => {
                el.style.display = "none";
                el.classList.remove("open");
            }, 100);
        });
    }
});
