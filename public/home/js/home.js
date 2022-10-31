let btn_go_to_top = document.querySelector(".go-to-head");
btn_go_to_top.onclick = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
};
