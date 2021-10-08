

const readMore = document.getElementById('readMore');
const text = document.getElementById('text');




readMore.addEventListener("click", (e) => {
    text.classList.toggle("showmore");
})
