// menu

document.addEventListener("DOMContentLoaded", function () {
    const menuHamburger = document.querySelector(".menu-hamburger")
    const navLinks = document.querySelector(".menu__list")
    
    menuHamburger.addEventListener('click',()=>{
      navLinks.classList.toggle('mobile-menu')
    })
    
  });
  
  
