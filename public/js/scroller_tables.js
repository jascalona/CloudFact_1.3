const btnright = document.getElementById("scroll-button-right");
const btnleft = document.getElementById("scroll-button-left");


const content = document.querySelector(".content-table");

//Funtion click
btnright.addEventListener("click", () =>{
    content.scrollLeft += 800;
});

btnleft.addEventListener("click", () => {
    content.scrollLeft -= 800;
});