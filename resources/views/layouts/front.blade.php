<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- SEO Meta Tags -->
  <title>@yield('title', 'Orpheus UG | Premier Music Academy & Digital Services in Uganda')</title>
  <meta name="description" content="@yield('description', 'Orpheus UG is Uganda\'s leading music academy offering professional courses in music production, audio engineering, digital marketing, and artist development. Transform your passion into a career.')">
  <meta name="keywords" content="@yield('keywords', 'music academy Uganda, music production courses Kampala, audio engineering training Africa, beat making classes, digital marketing for musicians, artist development Uganda, music school East Africa, FL Studio training, mixing mastering courses')">
  <meta name="author" content="Orpheus UG">
  <meta name="robots" content="index, follow">

  <!-- Open Graph Meta Tags -->
  <meta property="og:title" content="@yield('og_title', 'Orpheus UG | Premier Music Academy & Digital Services')">
  <meta property="og:description" content="@yield('og_description', 'Transform your passion into a profession. Uganda\'s leading music academy offering courses in production, engineering, marketing, and artist development.')">
  <meta property="og:image" content="{{ asset('img/logo-dark.PNG') }}">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Orpheus UG">

  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="@yield('twitter_title', 'Orpheus UG | Music Academy & Digital Services')">
  <meta name="twitter:description" content="@yield('twitter_description', 'Uganda\'s premier music academy. Learn production, engineering, marketing & artist development.')">
  <meta name="twitter:image" content="{{ asset('img/logo-dark.PNG') }}">

  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/logo-dark.PNG') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo-dark.PNG') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/logo-dark.PNG') }}">

  <!-- Canonical URL -->
  <link rel="canonical" href="{{ url()->current() }}">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('custom/custom.css') }}">

  <!-- Structured Data for SEO -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "EducationalOrganization",
    "name": "Orpheus UG",
    "description": "Premier music academy and digital services provider in Uganda",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('img/logo-dark.PNG') }}",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Kampala",
      "addressCountry": "UG"
    },
    "sameAs": [
      "https://facebook.com/orpheusug",
      "https://instagram.com/orpheusug",
      "https://twitter.com/orpheusug",
      "https://tiktok.com/@orpheusug"
    ],
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Music Courses",
      "itemListElement": [
        {"@type": "Course", "name": "Beat-Making & Music Production"},
        {"@type": "Course", "name": "Audio Engineering & Mixing"},
        {"@type": "Course", "name": "Digital Music Marketing"},
        {"@type": "Course", "name": "Artist Development Program"}
      ]
    }
  }
  </script>
</head>

<body>
  <!-- Contact Bar -->
  <section class="contact-bar">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 col-md-12">
          <div class="contact-info d-flex flex-wrap align-items-center">
            <div class="contact-item me-4">
              <a href="tel:+256700000000" class="text-decoration-none">
                <i class="bi bi-telephone-fill me-2"></i>+256 700 000 000
              </a>
            </div>
            <div class="contact-item me-4">
              <a href="mailto:info@orpheusug.com" class="text-decoration-none">
                <i class="bi bi-envelope-fill me-2"></i>info@orpheusug.com
              </a>
            </div>
            <div class="contact-item">
              <i class="bi bi-geo-alt-fill me-2"></i>Kampala, Uganda
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="social-links d-flex justify-content-lg-end justify-content-start mt-2 mt-lg-0">
            <a href="#" class="social-link me-2" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-link me-2" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-link me-2" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="social-link me-2" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            <a href="#" class="social-link" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logo-dark.PNG') }}" alt="Orpheus UG Logo" class="nav-logo">
        <span class="brand-text">ORPHEUS</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#hero">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#courses">Courses</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-enroll" href="#courses">Enroll Now</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Scroll to Top Button -->
  <button id="scrollToTop" class="scroll-to-top" aria-label="Scroll to top">
    <i class="bi bi-arrow-up"></i>
  </button>

  <!-- Footer -->
  <footer class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="footer-brand">
            <img src="{{ asset('img/logo-white.PNG') }}" alt="Orpheus UG" class="footer-logo">
            <h5>ORPHEUS UG</h5>
          </div>
          <p class="footer-desc">Uganda's premier music academy and digital services provider. Transform your passion into a profession with industry-standard training and mentorship.</p>
          <div class="footer-socials">
            <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-6 mb-4">
          <h5>Quick Links</h5>
          <ul class="footer-links">
            <li><a href="#hero">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#courses">Courses</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#training">Training Models</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Our Courses</h5>
          <ul class="footer-links">
            <li><a href="#courses">Music Production</a></li>
            <li><a href="#courses">Audio Engineering</a></li>
            <li><a href="#courses">Digital Marketing</a></li>
            <li><a href="#courses">Artist Development</a></li>
            <li><a href="#courses">Creative Technology</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Contact Us</h5>
          <div class="footer-contact">
            <p><i class="bi bi-geo-alt-fill me-2"></i>Kampala, Uganda</p>
            <p><i class="bi bi-telephone-fill me-2"></i>+256 700 000 000</p>
            <p><i class="bi bi-envelope-fill me-2"></i>info@orpheusug.com</p>
            <p><i class="bi bi-clock-fill me-2"></i>Mon - Sat: 8AM - 6PM</p>
          </div>
        </div>
      </div>

      <hr class="footer-divider">

      <div class="row align-items-center">
        <div class="col-md-6">
          <p class="copyright-text">&copy; {{ date('Y') }} Orpheus UG. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-end">
          <p class="copyright-text">Empowering Africa's Music Industry</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom Scripts -->
  <script src="{{ asset('custom/custom.js') }}"></script>
</body>
</html>
