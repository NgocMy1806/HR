// open-close dropdown avatar
window.onload = function () {
    document.getElementById("ava").onclick = function () { myFunction() };
    const x = document.getElementById("dropdown_content")
    function myFunction() {
        setTimeout(() => {
            if (x.style.display === "none") {
                x.style.display = "block";
            }
            else {
                x.style.display = "none";
            }

        }, 250);
    };
    document.addEventListener("click", (e) => {
        const b = e.target.matches(".dropdown_content");
        const c = e.target.matches(".ava");
        if (!b && !c && x.style.display == ("block")) {
            x.style.display = "none";
        }
    });
}
// active nav menu
