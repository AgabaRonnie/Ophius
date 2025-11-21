/* ========================================
   ORPHEUS UG - Custom JavaScript
======================================== */

document.addEventListener('DOMContentLoaded', function() {

  /* === Smooth Scrolling for Nav Links === */
  const navLinks = document.querySelectorAll('a[href^="#"]');
  navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href === '#') { e.preventDefault(); return; }
      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        const navHeight = document.querySelector('.navbar').offsetHeight;
        const targetPos = target.offsetTop - navHeight - 20;
        window.scrollTo({ top: targetPos, behavior: 'smooth' });
        // Close mobile menu
        const navCollapse = document.querySelector('.navbar-collapse');
        if (navCollapse.classList.contains('show')) {
          const bsCollapse = bootstrap.Collapse.getInstance(navCollapse);
          if (bsCollapse) bsCollapse.hide();
        }
      }
    });
  });

  /* === Active Nav Link on Scroll === */
  const sections = document.querySelectorAll('section[id]');
  const navItems = document.querySelectorAll('.navbar-nav .nav-link');

  function updateActiveNav() {
    const scrollY = window.pageYOffset;
    const navHeight = document.querySelector('.navbar').offsetHeight;

    sections.forEach(section => {
      const sectionTop = section.offsetTop - navHeight - 100;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute('id');

      if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
        navItems.forEach(item => {
          item.classList.remove('active');
          if (item.getAttribute('href') === '#' + sectionId) {
            item.classList.add('active');
          }
        });
      }
    });
  }
  window.addEventListener('scroll', throttle(updateActiveNav, 100));

  /* === Navbar Scroll Effect === */
  const navbar = document.querySelector('.navbar');
  function handleNavbarScroll() {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }
  window.addEventListener('scroll', throttle(handleNavbarScroll, 50));

  /* === Scroll to Top Button === */
  const scrollBtn = document.getElementById('scrollToTop');
  if (scrollBtn) {
    window.addEventListener('scroll', throttle(function() {
      if (window.pageYOffset > 400) {
        scrollBtn.classList.add('show');
      } else {
        scrollBtn.classList.remove('show');
      }
    }, 100));

    scrollBtn.addEventListener('click', function() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* === Courses Carousel === */
  const carousel = document.getElementById('coursesCarousel');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');

  if (carousel && prevBtn && nextBtn) {
    const cardWidth = 345; // card width + gap

    prevBtn.addEventListener('click', function() {
      carousel.scrollBy({ left: -cardWidth, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', function() {
      carousel.scrollBy({ left: cardWidth, behavior: 'smooth' });
    });

    // Touch/swipe support for mobile
    let isDown = false;
    let startX;
    let scrollLeft;

    carousel.addEventListener('mousedown', (e) => {
      isDown = true;
      startX = e.pageX - carousel.offsetLeft;
      scrollLeft = carousel.scrollLeft;
    });

    carousel.addEventListener('mouseleave', () => { isDown = false; });
    carousel.addEventListener('mouseup', () => { isDown = false; });

    carousel.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - carousel.offsetLeft;
      const walk = (x - startX) * 2;
      carousel.scrollLeft = scrollLeft - walk;
    });
  }

  /* === Intersection Observer for Animations === */
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('animate-visible');
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
      }
    });
  }, observerOptions);

  const animateElements = document.querySelectorAll('.service-card, .training-card, .course-card, .about-content, .about-image-wrapper');
  animateElements.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(30px)';
    el.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
    observer.observe(el);
  });

  /* === Stats Counter Animation === */
  const stats = document.querySelectorAll('.stat-number');
  let statsAnimated = false;

  function animateStats() {
    if (statsAnimated) return;
    stats.forEach(stat => {
      const target = parseInt(stat.textContent.replace(/[^0-9]/g, ''));
      const suffix = stat.textContent.replace(/[0-9]/g, '');
      let current = 0;
      const increment = target / 50;
      const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
          stat.textContent = target + suffix;
          clearInterval(timer);
        } else {
          stat.textContent = Math.floor(current) + suffix;
        }
      }, 30);
    });
    statsAnimated = true;
  }

  const heroSection = document.getElementById('hero');
  if (heroSection) {
    const statsObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateStats();
        }
      });
    }, { threshold: 0.5 });
    statsObserver.observe(heroSection);
  }

  /* === Form Handling (Footer) === */
  const forms = document.querySelectorAll('form');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      const btn = this.querySelector('button[type="submit"]');
      const originalText = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Sending...';

      setTimeout(() => {
        this.reset();
        btn.disabled = false;
        btn.innerHTML = originalText;
        showNotification('Thank you! We\'ll get back to you soon.', 'success');
      }, 1500);
    });
  });

  /* === Notification System === */
  function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = 'custom-notification';
    notification.innerHTML = `
      <i class="bi bi-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
      <span>${message}</span>
    `;
    notification.style.cssText = `
      position: fixed;
      top: 20px;
      right: 20px;
      background: ${type === 'success' ? '#0C2439' : '#17a2b8'};
      color: white;
      padding: 15px 25px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.2);
      z-index: 9999;
      display: flex;
      align-items: center;
      gap: 10px;
      transform: translateX(120%);
      transition: transform 0.3s ease;
    `;
    document.body.appendChild(notification);

    setTimeout(() => { notification.style.transform = 'translateX(0)'; }, 100);
    setTimeout(() => {
      notification.style.transform = 'translateX(120%)';
      setTimeout(() => document.body.removeChild(notification), 300);
    }, 4000);
  }

  /* === Utility Functions === */
  function throttle(func, limit) {
    let inThrottle;
    return function() {
      const args = arguments;
      const context = this;
      if (!inThrottle) {
        func.apply(context, args);
        inThrottle = true;
        setTimeout(() => inThrottle = false, limit);
      }
    };
  }

  /* === Initialization Complete === */
  console.log('Orpheus UG website initialized');
  document.body.classList.add('loaded');
});
