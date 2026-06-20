document.addEventListener('DOMContentLoaded', () => {
  const carousel = document.querySelector('.carousel');
  const prevButton = document.getElementById('prev');
  const nextButton = document.getElementById('next');

  // Get total number of courses
  const courses = document.querySelectorAll('.course-card');

  // Check if courses exist to prevent errors
  if (!courses || courses.length === 0) {
    console.error("No courses found in the carousel!");
    return;
  }

  const courseWidth = courses[0].offsetWidth + 20; // Course width + gap

  // Duplicate first and last courses for smooth looping
  const firstClone = courses[0].cloneNode(true);
  const lastClone = courses[courses.length - 1].cloneNode(true);
  carousel.appendChild(firstClone); // Add first course at the end
  carousel.insertBefore(lastClone, courses[0]); // Add last course at the beginning

  // Variables for tracking position
  let currentIndex = 1; // Start at the first real course
  carousel.style.transform = `translateX(-${courseWidth * currentIndex}px)`;

  // Add event listeners for buttons
  nextButton.addEventListener('click', () => {
    if (currentIndex >= courses.length) {
      // If at the cloned last course, reset to the first course
      currentIndex = 1;
      carousel.style.transition = 'none';
      carousel.style.transform = `translateX(-${courseWidth * currentIndex}px)`;
      setTimeout(() => {
        carousel.style.transition = 'transform 0.3s ease-in-out';
        currentIndex++;
        carousel.style.transform = `translateX(-${courseWidth * currentIndex}px)`;
      }, 0);
    } else {
      currentIndex++;
      carousel.style.transform = `translateX(-${courseWidth * currentIndex}px)`;
    }
  });

  prevButton.addEventListener('click', () => {
    if (currentIndex <= 0) {
      // If at the cloned first course, reset to the last course
      currentIndex = courses.length - 1;
      carousel.style.transition = 'none';
      carousel.style.transform = `translateX(-${courseWidth * currentIndex}px)`;
      setTimeout(() => {
        carousel.style.transition = 'transform 0.3s ease-in-out';
        currentIndex--;
        carousel.style.transform = `translateX(-${courseWidth * currentIndex}px)`;
      }, 0);
    } else {
      currentIndex--;
      carousel.style.transform = `translateX(-${courseWidth * currentIndex}px)`;
    }
  });
});
