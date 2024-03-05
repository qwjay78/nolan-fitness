document.addEventListener("DOMContentLoaded", function() {
    const testimonials = document.querySelectorAll('.testimonial');
    const flecheGauche = document.querySelector('.temoignages__fleche-gauche');
    const flecheDroite = document.querySelector('.temoignages__fleche-droite');
    let index = 0;
  
    function showTestimonial(n) {
      testimonials.forEach(testimonial => {
        testimonial.classList.remove('active');
      });
  
      index = (n + testimonials.length) % testimonials.length;
      testimonials[index].classList.add('active');
    }
  
    function nextTestimonial() {
      showTestimonial(index + 1);
    }
  
    function prevTestimonial() {
      showTestimonial(index - 1);
    }
  
    flecheDroite.addEventListener('click', nextTestimonial);
    flecheGauche.addEventListener('click', prevTestimonial);
  
    setInterval(nextTestimonial, 5000);
  
    showTestimonial(index);
  });
  
//   remonter en haut (footer)
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById('scrollToTopButton').onclick = null;

  document.getElementById('scrollToTopButton').addEventListener('click', function() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
});

  
  