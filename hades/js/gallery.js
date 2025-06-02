document.addEventListener("DOMContentLoaded", function() {
    const galleries = document.querySelectorAll(".slideshow-container");
    galleries.forEach(gallery => {
        const id = gallery.id;
        slideIndices[id] = 1;
        showSlides(1, id);
    });
});

let slideIndices = {};

function plusSlides(n, galleryId) {
    showSlides(slideIndices[galleryId] += n, galleryId);
}

function showSlides(n, galleryId) {
    let gallery = document.getElementById(galleryId);
    let slides = gallery.getElementsByClassName("mySlides");

    if (n > slides.length) slideIndices[galleryId] = 1;
    if (n < 1) slideIndices[galleryId] = slides.length;

    for (let slide of slides) slide.style.display = "none";

    slides[slideIndices[galleryId] - 1].style.display = "block";
}