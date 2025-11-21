@extends('layouts.front')

@section('title', 'Orpheus UG | Premier Music Academy & Digital Services in Uganda')
@section('description', 'Uganda\'s leading music academy offering professional courses in music production, audio engineering, digital marketing, and artist development. Join our 3-month certificate programs or intensive bootcamps.')
@section('keywords', 'music academy Uganda, music production courses Kampala, audio engineering training, beat making classes Uganda, FL Studio training Africa, mixing mastering courses, artist development, music school East Africa')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero-section">
  <div class="hero-overlay"></div>
  <div class="container">
    <div class="row align-items-center min-vh-100">
      <div class="col-lg-7">
        <div class="hero-content">
          <span class="hero-badge">🎵 Uganda's Premier Music Academy</span>
          <h1 class="hero-title">Transform Your <span class="text-highlight">Passion</span> Into a <span class="text-highlight">Profession</span></h1>
          <p class="hero-description">Master music production, audio engineering, digital marketing, and artist development with industry-leading instructors. Join Orpheus UG and launch your career in the music industry.</p>
          <div class="hero-stats">
            <div class="stat-item">
              <span class="stat-number">500+</span>
              <span class="stat-label">Graduates</span>
            </div>
            <div class="stat-item">
              <span class="stat-number">15+</span>
              <span class="stat-label">Courses</span>
            </div>
            <div class="stat-item">
              <span class="stat-number">95%</span>
              <span class="stat-label">Success Rate</span>
            </div>
          </div>
          <div class="hero-cta">
            <a href="#courses" class="btn btn-primary-custom">Explore Courses</a>
            <a href="#about" class="btn btn-outline-custom">Learn More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-5 d-none d-lg-block">
        <div class="hero-image-container">
          <img src="https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600" alt="Music Production Studio" class="hero-img">
          <div class="floating-card card-1">
            <i class="bi bi-music-note-beamed"></i>
            <span>Production</span>
          </div>
          <div class="floating-card card-2">
            <i class="bi bi-mic-fill"></i>
            <span>Recording</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="hero-wave">
    <svg viewBox="0 0 1440 120" preserveAspectRatio="none">
      <path d="M0,60 C360,120 1080,0 1440,60 L1440,120 L0,120 Z" fill="#ffffff"/>
    </svg>
  </div>
</section>

<!-- About Overview Section -->
<section id="about" class="about-section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mb-4 mb-lg-0">
        <div class="about-image-wrapper">
          <img src="https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600" alt="Orpheus Music Academy Studio" class="about-img">
          <div class="experience-badge">
            <span class="years">5+</span>
            <span class="text">Years of Excellence</span>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about-content">
          <span class="section-label">About Orpheus UG</span>
          <h2 class="section-title">Empowering Africa's Next Generation of <span class="text-highlight">Music Professionals</span></h2>
          <p class="lead-text">Orpheus UG is more than a music academy – we're a launchpad for creative careers across East Africa.</p>
          <p>Founded with a vision to bridge the gap between raw talent and industry-ready professionals, we offer comprehensive training in music production, audio engineering, digital marketing, and artist development. Our programs combine theoretical knowledge with hands-on practical experience in state-of-the-art facilities.</p>
          <div class="about-features">
            <div class="feature-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Industry-Standard Equipment & Software</span>
            </div>
            <div class="feature-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Experienced Industry Professionals</span>
            </div>
            <div class="feature-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Career Placement Support</span>
            </div>
            <div class="feature-item">
              <i class="bi bi-check-circle-fill"></i>
              <span>Networking Opportunities</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-label">What We Offer</span>
      <h2 class="section-title">Our Professional <span class="text-highlight">Services</span></h2>
      <p class="section-subtitle">Comprehensive solutions for artists, labels, and music businesses</p>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-soundwave"></i>
          </div>
          <h4>Music Production Reviews</h4>
          <p>Professional feedback and critique on your productions from industry experts to help refine your sound and elevate your craft.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-sliders"></i>
          </div>
          <h4>Post-Production</h4>
          <p>Expert mixing, mastering, and audio post-production services to give your tracks that polished, radio-ready sound.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-megaphone-fill"></i>
          </div>
          <h4>Digital Marketing</h4>
          <p>Strategic social media campaigns, content creation, and online presence management tailored for musicians and artists.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-broadcast"></i>
          </div>
          <h4>Music Promotion & Distribution</h4>
          <p>Get your music on all major streaming platforms and reach audiences worldwide with our distribution partnerships.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-calendar-event"></i>
          </div>
          <h4>Artist Booking</h4>
          <p>Connect with event organizers and secure performance opportunities through our extensive network in the entertainment industry.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="service-card">
          <div class="service-icon">
            <i class="bi bi-people-fill"></i>
          </div>
          <h4>Producer Selection & Contacts</h4>
          <p>Access our curated database of talented producers and industry contacts to find the perfect collaborators for your projects.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Training Models Section -->
<section id="training" class="training-section">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-label">How We Train</span>
      <h2 class="section-title">Training Models & <span class="text-highlight">Student Structure</span></h2>
      <p class="section-subtitle">Flexible learning paths designed to fit your schedule and goals</p>
    </div>
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="training-card">
          <div class="training-header">
            <span class="training-badge">Popular</span>
            <h3>Standard Certificate</h3>
            <div class="training-duration">
              <i class="bi bi-clock"></i> 3 Months
            </div>
          </div>
          <div class="training-body">
            <ul class="training-features">
              <li><i class="bi bi-check"></i> 2-3 days per week</li>
              <li><i class="bi bi-check"></i> Practical sessions</li>
              <li><i class="bi bi-check"></i> Assignments & projects</li>
              <li><i class="bi bi-check"></i> Final portfolio project</li>
              <li><i class="bi bi-check"></i> Certificate awarded</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="training-card">
          <div class="training-header">
            <span class="training-badge">Intensive</span>
            <h3>Bootcamps</h3>
            <div class="training-duration">
              <i class="bi bi-clock"></i> 1-2 Weeks
            </div>
          </div>
          <div class="training-body">
            <ul class="training-features">
              <li><i class="bi bi-check"></i> Intensive daily classes</li>
              <li><i class="bi bi-check"></i> Hands-on learning</li>
              <li><i class="bi bi-check"></i> Fast-track skills</li>
              <li><i class="bi bi-check"></i> Industry workshops</li>
              <li><i class="bi bi-check"></i> Completion certificate</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="training-card featured">
          <div class="training-header">
            <span class="training-badge">Elite</span>
            <h3>Talent Accelerator</h3>
            <div class="training-duration">
              <i class="bi bi-clock"></i> 6 Months
            </div>
          </div>
          <div class="training-body">
            <ul class="training-features">
              <li><i class="bi bi-check"></i> Top 10 creatives selected yearly</li>
              <li><i class="bi bi-check"></i> Internship at Power Records</li>
              <li><i class="bi bi-check"></i> Orpheus Talent Consult track</li>
              <li><i class="bi bi-check"></i> Join agency campaigns</li>
              <li><i class="bi bi-check"></i> Graduation show launch</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Courses Section -->
<section id="courses" class="courses-section">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-label">Our Programs</span>
      <h2 class="section-title">Professional <span class="text-highlight">Courses</span></h2>
      <p class="section-subtitle">Industry-standard training to launch your music career</p>
    </div>

    <!-- Courses Carousel -->
    <div class="courses-carousel-wrapper">
      <button class="carousel-btn prev-btn" id="prevBtn">
        <i class="bi bi-chevron-left"></i>
      </button>
      <div class="courses-carousel" id="coursesCarousel">
        <!-- Course 1 -->
        <div class="course-card">
          <div class="course-image">
            <img src="https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=400" alt="Beat-Making Course">
            <span class="course-badge">3 Months</span>
          </div>
          <div class="course-content">
            <span class="course-category">Music Production</span>
            <h4>Beat-Making & Music Production</h4>
            <p>Master FL Studio, Logic, Ableton. Learn sound design, drum programming, and producer branding.</p>
            <a href="" class="course-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <!-- Course 2 -->
        <div class="course-card">
          <div class="course-image">
            <img src="https://images.unsplash.com/photo-1520523839897-bd0b52f945a0?w=400" alt="Audio Engineering Course">
            <span class="course-badge">3 Months</span>
          </div>
          <div class="course-content">
            <span class="course-category">Audio Engineering</span>
            <h4>Audio Engineering & Mixing</h4>
            <p>Studio equipment, recording techniques, EQ, compression, advanced mixing, and mastering basics.</p>
            <a href="" class="course-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <!-- Course 3 -->
        <div class="course-card">
          <div class="course-image">
            <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=400" alt="Digital Marketing Course">
            <span class="course-badge">3 Months</span>
          </div>
          <div class="course-content">
            <span class="course-category">Digital Marketing</span>
            <h4>Digital Music Marketing</h4>
            <p>Social media strategy, ads management, streaming platforms, content creation, and fan engagement.</p>
            <a href="" class="course-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <!-- Course 4 -->
        <div class="course-card">
          <div class="course-image">
            <img src="https://images.unsplash.com/photo-1516280440614-37939bbacd81?w=400" alt="Artist Development Course">
            <span class="course-badge">3 Months</span>
          </div>
          <div class="course-content">
            <span class="course-category">Artist Development</span>
            <h4>Artist Development Program</h4>
            <p>Vocal training, stage performance, branding, music business, contracts, and media training.</p>
            <a href="" class="course-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <!-- Course 5 -->
        <div class="course-card">
          <div class="course-image">
            <img src="https://images.unsplash.com/photo-1626785774573-4b799315345d?w=400" alt="Creative Technology Course">
            <span class="course-badge">3 Months</span>
          </div>
          <div class="course-content">
            <span class="course-category">Creative Technology</span>
            <h4>Creative Digital Skills</h4>
            <p>Graphic design, video editing, photography, podcast production, and content monetization.</p>
            <a href="" class="course-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <!-- Course 6 - Bootcamp -->
        <div class="course-card">
          <div class="course-image">
            <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?w=400" alt="Beat-Making Bootcamp">
            <span class="course-badge bootcamp">1-2 Weeks</span>
          </div>
          <div class="course-content">
            <span class="course-category">Bootcamp</span>
            <h4>Beat-Making Bootcamp</h4>
            <p>Intensive hands-on beat creation workshop. Perfect for beginners wanting to start producing quickly.</p>
            <a href="" class="course-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <!-- Course 7 - Bootcamp -->
        <div class="course-card">
          <div class="course-image">
            <img src="https://images.unsplash.com/photo-1478737270239-2f02b77fc618?w=400" alt="Mixing Essentials">
            <span class="course-badge bootcamp">1-2 Weeks</span>
          </div>
          <div class="course-content">
            <span class="course-category">Bootcamp</span>
            <h4>Mixing Essentials</h4>
            <p>Learn the fundamentals of mixing in this intensive short course. EQ, compression, and effects.</p>
            <a href="" class="course-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>

        <!-- Course 8 -->
        <div class="course-card">
          <div class="course-image">
            <img src="https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=400" alt="TikTok for Musicians">
            <span class="course-badge bootcamp">Short Course</span>
          </div>
          <div class="course-content">
            <span class="course-category">Digital Marketing</span>
            <h4>TikTok for Musicians</h4>
            <p>Master TikTok algorithms, viral content creation, and grow your fanbase on the platform.</p>
            <a href="" class="course-link">Learn More <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <button class="carousel-btn next-btn" id="nextBtn">
        <i class="bi bi-chevron-right"></i>
      </button>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
  <div class="container">
    <div class="cta-content text-center">
      <h2>Ready to Start Your Music Journey?</h2>
      <p>Join hundreds of successful graduates who have launched their careers through Orpheus UG</p>
      <div class="cta-buttons">
        <a href="#courses" class="btn btn-primary-custom">View All Courses</a>
        <a href="https://wa.me/256700000000?text=Hi! I'm interested in enrolling at Orpheus UG. Please send me more information about your courses." class="btn btn-whatsapp" target="_blank">
          <i class="bi bi-whatsapp me-2"></i>Chat With Us
        </a>
      </div>
    </div>
  </div>
</section>

@endsection
