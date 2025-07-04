<?php
session_start();
include('config.php');

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("Location: login_register.php");
    exit();
}

if (empty($_SESSION['email'])) {
    header('Location: login_register.php');
    exit();
}

$email = htmlspecialchars($_SESSION['email']);
$name = $email;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | HD Freelance</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>

<header class="navbar">
    <a href="user_page.php"><img src="image/logo-removebg-preview.png" alt="Logo"></a>
    <nav>
        <a href="user_page.php">Home</a>
        <a href="browsejob.php">Browse Jobs</a>
        <a href="profile.html">Profiles</a>
        <a href="aboutus.php">About</a>
        <a href="contact.php">Contact</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="role">
        <img src="image/user.webp" alt="User">
        <p><?php echo $_SESSION['role']; ?></p>
    </div>
</header>

<div class="slider">
  <div class="slides">
    <div class="slide active">
      <img src="image/3d-modeling.png" alt="Slide 1">
    </div>
    <div class="slide">
      <img src="image/how-build-.jpg" alt="Slide 2">
    </div>
    <div class="slide">
      <img src="image/how-it-works-bg-img.jpg" alt="Slide 3">
    </div>
    <div class="slide">
      <img src="image/footerbg1.webp" alt="Slide 4">
    </div>
  </div>
</div>



<div class="section">
    <h2>Website IT and Software</h2>
    <div class="imageportion">
        <?php
        $webCategories = [
            ['img' => 'image/website1.png', 'label' => 'Website Design'],
            ['img' => 'image/wordpress2.jpg', 'label' => 'Website Mockup'],
            ['img' => 'image/mobile-design1.jpg', 'label' => 'Mobile Design']
        ];
        foreach ($webCategories as $cat) {
            echo "<div class='card'>
                    <img src='{$cat['img']}' alt='{$cat['label']}'>
                    <div class='middle'>
                        <a href='browsejob.php'><button>{$cat['label']}</button></a>
                    </div>
                  </div>";
        }
        ?>
    </div>
</div>

<div class="section">
    <h2>Mobile Applications</h2>
    <div class="imageportion">
        <?php
        $mobileCategories = [
            ['img' => 'image/mobile-design1.jpg', 'label' => 'Android App'],
            ['img' => 'image/mobile-design2.jpg', 'label' => 'Apple App'],
            ['img' => 'image/logo-design3.jpg', 'label' => 'Logo Design']
        ];
        foreach ($mobileCategories as $app) {
            echo "<div class='card'>
                    <img src='{$app['img']}' alt='{$app['label']}'>
                    <div class='middle'>
                        <a href='browsejob.php'><button>{$app['label']}</button></a>
                    </div>
                  </div>";
        }
        ?>
    </div>
</div>

<div class="feedback">
    <a href="feedback.php">
       <img src="https://cdn-icons-png.flaticon.com/128/813/813419.png" alt="Feedback">
    </a>
</div>

<div class="footer">
    <h2>Need Work Done?</h2>
    <p>Post your project and get offers from top freelancers. It's simple, safe, and efficient with HD.com.</p>
    <p>From web design to mobile apps and beyond — we’ve got the talent you need.</p>
    
    <a href="aboutus.php"><button>About Us</button></a>
    <a href="contact.php"><button>Contact Us</button></a>

    <div class="logo">
        <img src="image/logo-removebg-preview.png" alt="HD Logo">
    </div>

    <div class="social">
        <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a>
        <a href="#"><i class="fab fa-twitter"></i>Twitter</a>
        <a href="#"><i class="fab fa-instagram"></i>Instagram</a>
    </div>

    <div class="developer">
        Developer: <strong>@HD</strong> | © 2025 HD.com
    </div>
</div>

<section class="sponsor-banner">
    <h2>Sponsored By</h2>
    <div class="sponsor-images">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft Logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple Logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google.png" alt="Google Logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Netflix_2015_logo.svg" alt="Netflix Logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft Logo">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple Logo">
        
    </div>
</section>

 <!-- Footer Start -->
 <footer>
  <div class="footer-container">

    <!-- Logo/About -->
    <div class="footer-section">
      <img src="image/logo-removebg-preview.png" alt="Logo" style="max-width: 150px;">
      <p>FreelancerHub is Pakistan’s trusted freelancing platform helping talented individuals grow and succeed online.</p>
    </div>

    <!-- Quick Links -->
    <div class="footer-section">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="browsejob.php">Browse Jobs</a></li>
        <li><a href="profile.html">Profiles</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
    </div>

    <!-- Top Services -->
    <div class="footer-section">
      <h4>Top Services</h4>
      <ul>
        <li>Graphic Design</li>
        <li>Web Development</li>
        <li>Content Writing</li>
        <li>Digital Marketing</li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div class="footer-section">
      <h4>Contact Us</h4>
      <p>Email: support@freelancerhub.com</p>
      <p>Phone: +92-301-1234567</p>
      <p>Address: Lahore, Pakistan</p>
    </div>

    <!-- Social Links -->
    <div class="footer-section footer-social">
      <h4>Follow Us</h4>
      <a href="#">Facebook</a><br>
      <a href="#">Instagram</a><br>
      <a href="#">LinkedIn</a>
    </div>
  </div>

  <!-- Subscribe & Map Section -->
  <div class="footer-wrapper">

    <div class="newsletter-box">
      <h4>Subscribe to Our Newsletter</h4>
      <form class="newsletter-form" id="newsletterForm">
        <input type="email" name="email" id="emailInput" placeholder="Enter your email address" required>
        <br>
        <button type="submit" onclick="submitEmail()">Subscribe</button>
      </form>
      <p class="subscription-success" id="successMessage">You have successfully subscribed!</p>
    </div>

    <div class="map-box">
      <h4>Find Us on Map</h4>
      <iframe class="map-frame"
        src="https://maps.google.com/maps?q=lahore&t=&z=13&ie=UTF8&iwloc=&output=embed"
        allowfullscreen loading="lazy"></iframe>
    </div>

  </div>

  <!-- Footer Bottom -->
  <div class="footer-bottom" style="text-align:center; padding: 10px; ">
    &copy; 2025 FreelancerHub.com | Built with in Pakistan
  </div>
</footer>

<script>
  const switchToggle = document.getElementById('darkModeSwitch');
  if (switchToggle) {
    const isDark = localStorage.getItem('dark-mode') === 'enabled';
    if (isDark) {
        document.body.classList.add('dark-mode');
        switchToggle.checked = true;
    }
    switchToggle.addEventListener('change', () => {
        if (switchToggle.checked) {
            document.body.classList.add('dark-mode');
            localStorage.setItem('dark-mode', 'enabled');
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('dark-mode', 'disabled');
        }
    });
  }
let currentSlide = 0;
  const slides = document.querySelectorAll('.slide');

  function showSlide(index) {
    slides.forEach((slide, i) => {
      slide.classList.remove('active');
      if (i === index) {
        slide.classList.add('active');
      }
    });
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }


  showSlide(currentSlide);


  setInterval(nextSlide, 4000);

   const form = document.getElementById('subscribeForm');
  const message = document.getElementById('subscribeMessage');

  form.addEventListener('submit', function (e) {
    const email = document.getElementById('emailInput').value.trim();

    if (email) {
      message.style.display = 'block';
      form.reset();
    }
  });

  function submitEmail() {
      alert("Email Submitted");
    }
</script>

</body>
</html>
