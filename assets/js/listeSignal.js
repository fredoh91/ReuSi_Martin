const chp = document.querySelectorAll(".chpRq");
const btnRest = document.querySelector("#Reset");
btnRest.addEventListener('click',resetChp)

function resetChp () {
    chp.forEach(ch => {
        ch.value = "";
    });
}
