// this to make the rating stars
const stars = document.querySelectorAll("#rating-stars i");
const ratingInput = document.getElementById("rating-value");

stars.forEach((star) => {
    star.addEventListener("click", () => {
        const rating = parseInt(star.getAttribute("data-index"));
        ratingInput.value = rating;

        // Color all stars up to the clicked one
        stars.forEach((s, i) => {
            if (i < rating) {
                s.classList.remove("bi-star");
                s.classList.add("bi-star-fill", "text-warning");
            } else {
                s.classList.remove("bi-star-fill", "text-warning");
                s.classList.add("bi-star");
            }
        });
    });
});
