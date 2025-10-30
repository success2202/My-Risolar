@extends('layouts.app')

@section('title')
<title>Contact Us - Risolar</title>
@endsection

@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')
<!-- ===== Breadcrumb Section ===== -->

<section class="page-title">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
      </ol>
    </nav>
  </div>
</section>

<!-- ===== Contact Section ===== -->
<section class="contact-section">
  <div class="container">
    <div class="row align-items-start">
      
      <!-- Left: Info Cards -->
      <div class="col-lg-5 mb-4 mb-lg-0">
        <h2 class="contact-title">Get in Touch</h2>
        <p class="contact-subtitle">We’d love to hear from you. Reach out with any inquiries, feedback, or business opportunities.</p>

        <div class="contact-info">
          <div class="info-item">
            <i class="fa-solid fa-location-dot"></i>
            <div>
              <h5>Our Office</h5>
              <p>123 Risolar Street, Lagos, Nigeria</p>
            </div>
          </div>
          <div class="info-item">
            <i class="fa-solid fa-phone"></i>
            <div>
              <h5>Phone</h5>
              <p>+234 802 123 4567</p>
            </div>
          </div>
          <div class="info-item">
            <i class="fa-solid fa-envelope"></i>
            <div>
              <h5>Email</h5>
              <p>support@risolar.com</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Contact Form -->
      <div class="col-lg-7">
        <form action="" method="POST" class="contact-form">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Your Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Your Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" rows="5" class="form-control" required></textarea>
          </div>

          <button type="submit" class="btn contact-btn">Send Message</button>
        </form>
      </div>

    </div>

    <!-- Optional: Embedded Map -->
    <div class="map-container mt-5">
      <iframe
        src="https://www.google.com/maps?q=Lagos,+Nigeria&output=embed"
        width="100%" height="350" style="border:0; border-radius:12px;" allowfullscreen>
      </iframe>
    </div>
  </div>
</section>
@endsection

@section('styles')
<style>
/* General */
body {
  font-family: 'Inter', sans-serif;
  background-color: #fafafa;
  color: #222;
}

  /* ===== Breadcrumb ===== */
  .page-title {
    padding: 10px 0;
    background: #f5f6fa;
    border-bottom: 1px solid #e5e7eb;
  }

  .breadcrumb {
    background: none;
    margin: 0;
    font-size: 14px;
  }

  .breadcrumb a {
    color: #4f46e5;
    text-decoration: none;
  }

  .breadcrumb a:hover {
    text-decoration: underline;
  }

/* Contact Layout */
.contact-section {
  padding: 50px 0 80px;
}

.contact-title {
  font-size: 28px;
  font-weight: 700;
  color: #111827;
  margin-bottom: 12px;
}

.contact-subtitle {
  color: #555;
  margin-bottom: 30px;
  line-height: 1.6;
}

/* Contact Info */
.contact-info {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.info-item {
  display: flex;
  align-items: center;
  gap: 15px;
  background: #fff;
  padding: 14px 18px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transition: transform 0.3s ease;
}

.info-item:hover {
  transform: translateY(-3px);
}

.info-item i {
  font-size: 20px;
  color: #4f46e5;
}

/* Form */
.contact-form .form-control {
  border-radius: 8px;
  border: 1px solid #ddd;
  padding: 10px 12px;
  font-size: 14px;
  transition: border-color 0.3s ease;
}

.contact-form .form-control:focus {
  border-color: #4f46e5;
  box-shadow: none;
}

.contact-btn {
  background: #4f46e5;
  color: #fff;
  border: none;
  border-radius: 8px;
  padding: 10px 20px;
  font-weight: 600;
  transition: background 0.3s ease;
}

.contact-btn:hover {
  background: #3730a3;
}

/* Map */
.map-container iframe {
  box-shadow: 0 6px 16px rgba(0,0,0,0.08);
}

/* Responsive */
@media (max-width: 768px) {
  .contact-section {
    padding: 30px 0 50px;
  }

  .contact-title {
    text-align: center;
  }

  .contact-info {
    margin-bottom: 40px;
  }
}
</style>
@endsection
