document.addEventListener("DOMContentLoaded", function () {
  // Section pour le carrousel de témoignages
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

  // Section pour le bouton de retour en haut (footer)
  document.getElementById('scroll-to-top-button').onclick = null;

  document.getElementById('scroll-to-top-button').addEventListener('click', function () {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });



  
});
