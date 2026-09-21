<?php
$services = [
  ['Preventive dentistry', 'Regular check-ups, cleanings, and oral hygiene education to keep your teeth and gums healthy.', 'our_services.jpg'],
  ['Cosmetic dentistry', 'Smile makeovers, teeth whitening, porcelain veneers, and more to enhance the appearance of your smile.', 'Cosmetic Dentistry.jpg'],
  ['Restorative dentistry', 'Dental implants, crowns, bridges, and dentures to restore the function and aesthetics of your teeth.', 'Rectangle.jpg'],
  ['General dentistry', 'Routine care and treatment to maintain a healthy smile and address everyday dental needs.', 'general.jpg'],
  ['Implants', 'A durable, natural-looking solution for replacing missing teeth and restoring your confidence.', 'implant-image.jpg'],
  ['Dental surgery', 'Professional surgical care tailored to your oral health needs and comfort.', 'surgery.jpg'],
  ['Teeth braces', 'Orthodontic treatment to improve your bite, alignment, and smile.', 'Teeth Braces.jpg'],
  ['Teeth protection', 'Protective care and guidance to help prevent dental damage and maintain oral health.', 'care.jpg'],
  ['Alignment', 'Personalized alignment treatment for a straighter, healthier smile.', 'aligm.jpg'],
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'css.php'; ?>
</head>

<body>
  <header class="navbar-white w-nav" data-animation="over-left" data-collapse="medium" data-duration="400" role="banner">
    <div class="nav-container w-container">
      <?php include_once 'menubar.php'; ?>
    </div>
    <div class="w-nav-overlay" data-wf-ignore id="w-nav-overlay-0"></div>
  </header>

  <main>
    <section class="banner-our-services light-background">
      <div class="base-container w-container">
        <div class="images-container">
          <div class="text-wrap-banner services">
            <div class="home-subtitle-block">
              <img src="images/Award-Winning-icon.png" loading="lazy" alt="Award icon" class="banner-subtitle-icon">
              <h6 class="home-banner-subtitle">Services</h6>
            </div>
            <div class="service-banner-text">
              <h1 class="text-center">Give your smile unrivaled brilliance with our services</h1>
            </div>
            <a href="contact_us.php" class="primary-button w-button">Book Consultation</a>
          </div>
          <img src="images/user1.webp" loading="lazy" alt="Smiling patient" class="smile-image-banner-3">
          <img src="images/user2.webp" loading="lazy" width="60" height="60" alt="Smiling patient" class="smile-image-banner-2">
          <img src="images/user3.webp" loading="lazy" alt="Smiling patient" class="smile-image-banner-5">
          <img src="images/user4.png" loading="lazy" alt="Smiling patient" class="smile-image-banner-4">
          <img src="images/user5.webp" loading="lazy" alt="Smiling patient" class="smile-image-banner-1">
        </div>
      </div>
    </section>

    <section class="section">
      <div class="w-layout-blockcontainer base-container w-container">
        <div class="service-list-wrapper">
          <div class="service-list">
            <div class="service-collection" role="list">
              <?php foreach ($services as $index => $service): ?>
                <article class="service-item" role="listitem">
                  <div class="cards-number"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?></div>
                  <div class="gorizontal-line"><div class="gorizontal-line-red"></div></div>
                  <div class="service-card-text">
                    <h4 class="service-header h4"><?= htmlspecialchars($service[0], ENT_QUOTES, 'UTF-8'); ?></h4>
                    <p class="service-description"><?= htmlspecialchars($service[1], ENT_QUOTES, 'UTF-8'); ?></p>
                  </div>
                  <img src="images/<?= rawurlencode($service[2]); ?>" loading="lazy" alt="<?= htmlspecialchars($service[0], ENT_QUOTES, 'UTF-8'); ?>" class="service-image service-image-link">
                </article>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section bottom-gap">
      <div class="w-layout-blockcontainer base-container w-container">
        <div class="content-wrap-grid">
          <h2>We provide high quality &amp; cost effective services</h2>
          <div class="values-wrapper service-list">
            <div class="vertical-line"></div>
            <div class="value-block-with-icon">
              <div class="icon-24-size"></div>
              <h4 class="text-center">Patient-Centered Approach</h4>
              <p class="text-center">Our patients are at the heart of everything we do. We prioritize their comfort, well-being, and satisfaction.</p>
            </div>
            <div class="value-block-with-icon">
              <div class="icon-24-size"></div>
              <h4 class="text-center">Compassion and Empathy</h4>
              <p class="text-center">We approach dentistry with empathy, understanding that each patient is unique and may have different fears or concerns.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section bottom-gap">
      <div class="w-layout-blockcontainer base-container w-container">
        <div class="testimonials-wrapper">
          <article class="review-slide">
            <div class="review-slide-inner">
              <div class="review-text-container">
                <div class="author-image"><img src="images/iza.png" loading="lazy" alt="Emily S."></div>
                <h3>Emily S.</h3>
                <div class="review-rating"><div class="rating"><img src="images/rating.svg" loading="lazy" alt="Five-star rating" class="star"></div></div>
                <p class="min-height text-center">Exceptional dental service! The staff was welcoming and professional, and the dentist took the time to address all my concerns with care and expertise.</p>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>
  </main>

  <footer class="footer">
    <div class="base-container w-container">
      <div class="footer-bottom-wrapper" style="margin-bottom: 30px;">
        <div class="footer-copyright">&copy; 2026 SmileCare. All Rights Reserved.</div>
      </div>
    </div>
  </footer>

  <?php include_once 'js.php'; ?>
</body>

</html>
