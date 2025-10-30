@extends('layouts.app')

@section('title')
<title>About Us - Sanlive Pharmacy</title>
@endsection

@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('styles')
<style>
  body {
    font-family: 'Inter', sans-serif;
    color: #222;
    background-color: #fafafa;
  }

  /* ===== Breadcrumb ===== */
  .page-title {
    padding: 8px 0;
    background: #f5f6fa;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 0;
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

  /* ===== About Wrapper ===== */
  .about-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px 20px 40px; /* top padding small, bottom moderate */
  }

  .about-main {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: center;
    margin-bottom: 20px; /* reduced from 70px */
    animation: fadeInUp 0.8s ease forwards;
  }

  @media (max-width: 900px) {
    .about-main {
      grid-template-columns: 1fr;
      text-align: center;
      gap: 30px;
    }
  }

  /* ===== Left Column ===== */
  .about-content h2 {
    font-size: 26px;
    color: #111827;
    margin-bottom: 10px;
  }

  .about-content p {
    color: #555;
    line-height: 1.6;
    font-size: 15px;
    margin-bottom: 18px;
  }

  .about-section {
    margin-bottom: 10px;
  }

  /* ===== Right Column ===== */
  .about-image img {
    width: 100%;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    margin-bottom: 12px;
    transition: transform 0.4s ease;
  }

  .about-image img:hover {
    transform: scale(1.03);
  }

  .contact-btn {
    display: inline-block;
    background: #4f46e5;
    color: #fff;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.3s ease;
  }

  .contact-btn:hover {
    background: #3730a3;
  }

  /* ===== Team Section ===== */
  .team-section {
    margin-top: 0; /* remove gap above */
    padding-top: 5px;
    animation: fadeInUp 1s ease forwards;
  }

  .team-section h2 {
    text-align: center;
    font-size: 24px;
    color: #111827;
    margin-bottom: 24px;
  }

  .team-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
  }

  .team-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.05);
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .team-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.1);
  }

  .team-card img {
    width: 100%;
    height: 240px;
    object-fit: cover;
  }

  .team-card h4 {
    margin: 10px 0 4px;
    color: #4f46e5;
    font-size: 18px;
  }

  .team-card p {
    font-size: 14px;
    color: #555;
    margin-bottom: 12px;
  }

  /* ===== Animation ===== */
  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(25px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>
@endsection

@section('content')

<!-- ===== Breadcrumb Section ===== -->
<section class="page-title">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-0 mb-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
      </ol>
    </nav>
  </div>
</section>

<!-- ===== About Main Section ===== -->
<div class="about-wrapper">
  <section class="about-main">
    <div class="about-content">
      <div class="about-section">
        <h2>Our Mission</h2>
        <p>To inspire, empower, and connect people through innovative ideas, creative design, and impactful technology that improves everyday lives.</p>
      </div>

      <div class="about-section">
        <h2>What We Are About</h2>
        <p>We are a passionate team dedicated to building meaningful experiences. Our approach blends strategy, creativity, and technology to help individuals and brands grow authentically.</p>
      </div>

      <div class="about-section">
        <h2>Our Vision</h2>
        <p>To be a global leader in digital storytelling and innovation — shaping the future by creating spaces where ideas and people thrive together.</p>
      </div>
    </div>

    <div class="about-image">
      <img src="{{ asset('images/Picture1.png') }}" alt="About Us Image">
      <a href="" class="contact-btn">Contact Us</a>
    </div>
  </section>

  <!-- ===== Meet Our Team Section ===== -->
  <section class="team-section">
    <h2>Meet Our Team</h2>
    <div class="team-grid">
      <div class="team-card">
        <img src="https://via.placeholder.com/400x400?text=Jane+Doe" alt="Jane Doe">
        <h4>Jane Doe</h4>
        <p>Founder & CEO</p>
      </div>
      <div class="team-card">
        <img src="https://via.placeholder.com/400x400?text=John+Smith" alt="John Smith">
        <h4>John Smith</h4>
        <p>Lead Developer</p>
      </div>
      <div class="team-card">
        <img src="https://via.placeholder.com/400x400?text=Mary+Johnson" alt="Mary Johnson">
        <h4>Mary Johnson</h4>
        <p>Creative Director</p>
      </div>
      <div class="team-card">
        <img src="https://via.placeholder.com/400x400?text=David+Brown" alt="David Brown">
        <h4>David Brown</h4>
        <p>Marketing Strategist</p>
      </div>
    </div>
  </section>
</div>

@endsection
