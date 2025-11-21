@extends('layouts.front')

@section('title', 'Course Details | Orpheus UG - Music Academy Uganda')
@section('description', 'Explore our professional music courses in detail. Learn about curriculum, duration, and enrollment process at Orpheus UG, Uganda\'s premier music academy.')

@section('content')

<!-- Course Hero -->
<section class="course-hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/') }}#courses">Courses</a></li>
            <li class="breadcrumb-item active">Beat-Making & Music Production</li>
          </ol>
        </nav>
        <span class="course-category-tag">Music Production</span>
        <h1>Beat-Making & Music Production</h1>
        <p class="course-intro">Master the art of music production with industry-standard tools and techniques. From beat creation to full track production, become a professional producer.</p>
        <div class="course-meta">
          <div class="meta-item"><i class="bi bi-clock"></i><span>3 Months</span></div>
          <div class="meta-item"><i class="bi bi-calendar3"></i><span>2-3 Days/Week</span></div>
          <div class="meta-item"><i class="bi bi-award"></i><span>Certificate</span></div>
        </div>
        <a href="#enroll-form" class="btn btn-primary-custom mt-4">Enroll Now</a>
      </div>
      <div class="col-lg-6 mt-4 mt-lg-0">
        <div class="course-hero-img">
          <img src="https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=600" alt="Music Production Course">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Course Overview -->
<section class="course-overview">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="overview-content">
          <h2>Course Overview</h2>
          <p>This comprehensive 3-month program transforms beginners into skilled music producers. You'll learn to create professional beats, understand sound design, and develop your unique sonic identity. Our hands-on approach ensures you leave with a portfolio of original productions.</p>

          <h3>What You'll Learn</h3>
          <div class="modules-grid">
            <div class="module-card">
              <div class="module-num">01</div>
              <h4>Introduction to DAWs</h4>
              <p>Master FL Studio, Logic Pro, Cubase, and Ableton Live. Understand workflow optimization and project management.</p>
            </div>
            <div class="module-card">
              <div class="module-num">02</div>
              <h4>Sound Design & Sampling</h4>
              <p>Create original sounds, manipulate samples, and build your own sound library for unique productions.</p>
            </div>
            <div class="module-card">
              <div class="module-num">03</div>
              <h4>Drum Programming</h4>
              <p>Learn drum patterns for African genres, trap, hip-hop, and more. Master rhythm and groove creation.</p>
            </div>
            <div class="module-card">
              <div class="module-num">04</div>
              <h4>Melody & Arrangement</h4>
              <p>Craft memorable melodies, understand music theory basics, and arrange full songs professionally.</p>
            </div>
            <div class="module-card">
              <div class="module-num">05</div>
              <h4>Vocal Production</h4>
              <p>Record, edit, and process vocals. Learn pitch correction, harmonies, and vocal arrangement.</p>
            </div>
            <div class="module-card">
              <div class="module-num">06</div>
              <h4>Producer Branding</h4>
              <p>Create your producer tag, build your brand identity, and market yourself in the music industry.</p>
            </div>
            <div class="module-card">
              <div class="module-num">07</div>
              <h4>Portfolio Creation</h4>
              <p>Compile your best works, create a professional portfolio, and prepare for industry opportunities.</p>
            </div>
          </div>

          <h3>Who Is This Course For?</h3>
          <ul class="audience-list">
            <li><i class="bi bi-check-circle-fill"></i> Aspiring music producers looking to start their career</li>
            <li><i class="bi bi-check-circle-fill"></i> Artists who want to produce their own music</li>
            <li><i class="bi bi-check-circle-fill"></i> DJs wanting to create original tracks</li>
            <li><i class="bi bi-check-circle-fill"></i> Hobbyists ready to take their skills to a professional level</li>
          </ul>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="course-sidebar">
          <div class="sidebar-card">
            <h4>Course Includes</h4>
            <ul class="includes-list">
              <li><i class="bi bi-check2"></i> 48+ hours of instruction</li>
              <li><i class="bi bi-check2"></i> Hands-on studio sessions</li>
              <li><i class="bi bi-check2"></i> Software tutorials</li>
              <li><i class="bi bi-check2"></i> Assignments & projects</li>
              <li><i class="bi bi-check2"></i> Final portfolio project</li>
              <li><i class="bi bi-check2"></i> Certificate of completion</li>
              <li><i class="bi bi-check2"></i> Career guidance</li>
            </ul>
          </div>

          <div class="sidebar-card cta-card">
            <h4>Ready to Start?</h4>
            <p>Limited spots available for the next intake</p>
            <a href="#enroll-form" class="btn btn-primary-custom w-100">Apply Now</a>
            <a href="https://wa.me/256700000000?text=Hi! I'm interested in the Beat-Making & Music Production course. Please send me more details." class="btn btn-whatsapp w-100 mt-3" target="_blank">
              <i class="bi bi-whatsapp me-2"></i>Ask Questions
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Enrollment Form Section -->
<section id="enroll-form" class="enroll-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="enroll-card">
          <div class="text-center mb-4">
            <span class="section-label">Join Orpheus UG</span>
            <h2 class="section-title">Enrollment Application</h2>
            <p>Fill out the form below to apply for this course. Our team will contact you within 24 hours.</p>
          </div>

          <form class="enroll-form" id="enrollmentForm" method="POST" action="">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">First Name *</label>
                <input type="text" class="form-control" name="first_name" placeholder="Enter your first name" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Last Name *</label>
                <input type="text" class="form-control" name="last_name" placeholder="Enter your last name" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Email Address *</label>
                <input type="email" class="form-control" name="email" placeholder="your@email.com" required>
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Phone Number *</label>
                <input type="tel" class="form-control" name="phone" placeholder="+256754538317" required>
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Course Interested In *</label>
              <select class="form-select" name="course" required>
                <option value="">Select a course</option>
                <option value="beat-making" selected>Beat-Making & Music Production (3 Months)</option>
                <option value="audio-engineering">Audio Engineering & Mixing (3 Months)</option>
                <option value="digital-marketing">Digital Music Marketing (3 Months)</option>
                <option value="artist-development">Artist Development Program (3 Months)</option>
                <option value="creative-digital">Creative Digital Skills (3 Months)</option>
                <option value="bootcamp-beats">Beat-Making Bootcamp (1-2 Weeks)</option>
                <option value="bootcamp-mixing">Mixing Essentials Bootcamp (1-2 Weeks)</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Your Experience Level</label>
              <select class="form-select" name="experience">
                <option value="beginner">Complete Beginner</option>
                <option value="some-experience">Some Experience</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced - Looking to Refine Skills</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Tell Us About Yourself</label>
              <textarea class="form-control" name="message" rows="4" placeholder="Share your goals, background, or any questions you have..."></textarea>
            </div>

            <div class="mb-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                <label class="form-check-label" for="agreeTerms">
                  I agree to be contacted by Orpheus UG regarding my application
                </label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary-custom btn-lg w-100">
              <i class="bi bi-send me-2"></i>Submit Application
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Other Courses -->
<section class="other-courses">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="section-title">Explore Other <span class="text-highlight">Courses</span></h2>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="other-course-card">
          <img src="https://images.unsplash.com/photo-1520523839897-bd0b52f945a0?w=400" alt="Audio Engineering">
          <div class="other-course-content">
            <span class="course-category">Audio Engineering</span>
            <h4>Audio Engineering & Mixing</h4>
            <a href="" class="course-link">View Course <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="other-course-card">
          <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=400" alt="Digital Marketing">
          <div class="other-course-content">
            <span class="course-category">Digital Marketing</span>
            <h4>Digital Music Marketing</h4>
            <a href="" class="course-link">View Course <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="other-course-card">
          <img src="https://images.unsplash.com/photo-1516280440614-37939bbacd81?w=400" alt="Artist Development">
          <div class="other-course-content">
            <span class="course-category">Artist Development</span>
            <h4>Artist Development Program</h4>
            <a href="" class="course-link">View Course <i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
