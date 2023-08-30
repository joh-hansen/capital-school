document.addEventListener("DOMContentLoaded", function () {
  // Get all slides
  const slides = document.querySelectorAll(".slide");
  let currentSlideIndex = 0;

  // Function to show the next slide
  function showNextSlide() {
    slides[currentSlideIndex].style.display = "none";
    currentSlideIndex = (currentSlideIndex + 1) % slides.length;
    slides[currentSlideIndex].style.display = "block";
  }

  // Automatically switch to the next slide every 5 seconds
  setInterval(showNextSlide, 2000);
});

