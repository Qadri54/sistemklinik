<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sehat Selalu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <style>
        /* CSS Kustom Anda atau untuk override Bootstrap */
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font dari Gogle Fonts */
        }
        .navbar-brand {
            font-weight: 700;
            color: rgb(21, 66, 114) !important; /* Warna biru primer Bootstrap */
        }
        .btn-primary {
            background-color:rgb(21, 66, 114);
            border-color:rgb(21, 66, 114);
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .hero-section {
    background: url('{{ asset('Storage/images/image8.jpg') }}') no-repeat center center/cover; /* UBAH PATH INI */
    height: 600px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: #fff;
    position: relative;
    overflow: hidden;
}
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5); /* Overlay gelap */
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color:rgb(21, 66, 114);
        }
        .feature-box, .service-card, .doctor-card {
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.05);
            border-radius: 0.5rem;
            padding: 1.5rem;
            text-align: center;
            background-color: #fff;
            transition: transform 0.3s ease;
        }
        .feature-box:hover, .service-card:hover, .doctor-card:hover {
            transform: translateY(-5px);
        }
        .feature-box i, .service-card i {
            font-size: 3rem;
            color:rgb(21, 66, 114);
            margin-bottom: 1rem;
        }

        .services img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 50%;
}
.services h6 {
  color: #007bff;
  font-weight: 600;
}
.services h2 {
  font-weight: bold;
}
.services p {
  font-size: 0.9rem;
  color: #6c757d;
}

        .doctor-card img {
            width: 150px; /* Ukuran gambar dokter */
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
            border: 3px solidrgb(21, 66, 114);
        }
        .social-icons a {
            color: #333;
            margin: 0 0.5rem;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }
        .social-icons a:hover {
            color: #007bff;
        }
        .footer-cta {
            background-color:rgb(21, 66, 114);
            color: #fff;
            padding: 3rem 0;
            text-align: center;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="index.php">
    <img src="{{ asset('Storage/images/image4.jpg') }}" alt="Klinik Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
    Medis Care </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#home">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#about">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#doctors">Dokter</a></li>
                </ul>
                <div class="d-flex">
                      <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Sign In</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a> 
                </div>
            </div>
        </div>
    </nav>

    <section id="home" class="hero-section">
        <div class="hero-content">
            <h1 class="display-3 fw-bold mb-3">Senyum Cemerlang, Hidup Gemilang!</h1>
            <p class="lead mb-4">Kami hadir untuk memberikan perawatan terbaik dengan sentuhan profesionalisme dan keramahan.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Book Appointment</a>
        </div>
    </section>

    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h2 class="section-title">Tentang Medis Care</h2>
                    <p class="lead">Medis Care Selalu didirikan dengan visi untuk memberikan pelayanan kesehatan yang komprehensif dan berkualitas tinggi bagi seluruh masyarakat.</p>
                    <p>Kami percaya bahwa senyum sehat adalah kunci kebahagiaan dan kepercayaan diri. Dengan tim dokter spesialis yang handal, perawat yang peduli, dan teknologi mutakhir, kami berkomitmen untuk menciptakan pengalaman kunjungan ke dokter yang nyaman dan menyenangkan.</p>
                    <a href="#" class="btn btn-outline-primary">Pelajari Lebih Lanjut</a>
                </div>
                <div class="col-md-6">
                   <img src="{{ asset('Storage/images/image1.jpg') }}" class="img-fluid rounded shadow-lg" alt="Tentang Kami">
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h2 class="section-title text-center">Mengapa Memilih Kami?</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fas fa-stethoscope mb-3"></i>
                        <h3>Dokter Berpengalaman</h3>
                        <p>Tim dokter profesional dan berpengalaman siap melayani Anda.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fas fa-tooth mb-3"></i>
                        <h3>Layanan Lengkap</h3>
                        <p>Mulai dari pemeriksaan rutin hingga perawatan kompleks, kami punya solusinya.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fas fa-hospital mb-3"></i>
                        <h3>Fasilitas Modern</h3>
                        <p>Didukung peralatan medis terbaru untuk hasil terbaik dan kenyamanan Anda.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-box">
                        <i class="fas fa-handshake mb-3"></i>
                        <h3>Pelayanan Ramah</h3>
                        <p>Prioritas kami adalah kenyamanan dan kepuasan pasien.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <section class="layanan py-5 text-center" id="layanan">
  <div class="container">
    <h2 class="section-title text-center">Layanan Kami</h2>
    <h2 class="fw-bold mb-5">Providing dental care for families<br>in our community</h2>
    <div class="row">
      <div class="col-md-3">
        <img src="{{ asset('Storage/images/tht.jpg') }}" class="rounded-circle mb-3" width="120" height="120" alt="Spesialis Telinga, Hidung, dan Tenggorokan">
        <h5 class="fw-bold">Spesialisasi THT</h5>
        <p class="text-muted small">Spesialis THT kami memberikan perawatan komprehensif untuk gangguan dan penyakit telinga, hidung, dan tenggorokan.</p>
      </div>
      <div class="col-md-3">
        <img src="{{ asset('Storage/images/Dokter_Umum.jpg.webp') }}" class="rounded-circle mb-3" width="120" height="120" alt="Dokter Umum">
        <h5 class="fw-bold">Kedokteran Anak</h5>
        <p class="text-muted small">Dokter anak kami memberikan perawatan yang lembut dan penuh kasih sayang kepada anak-anak dari segala usia.</p>
      </div>
      <div class="col-md-3">
        <img src="{{ asset('Storage/images/dokteranak.jpg') }}" class="rounded-circle mb-3" width="120" height="120" alt="Dokter Anak">
        <h5 class="fw-bold">Dokter Anak</h5>
        <p class="text-muted small">Dokter anak kami memberikan perawatan yang komprehensif kepada anak-anak dari lahir hingga remaja.</p>
      </div>
      <div class="col-md-3">
        <img src="{{ asset('Storage/images/image12.jpg') }}" class="rounded-circle mb-3" width="120" height="120" alt="Prostodentis">
        <h5 class="fw-bold">Prostodentis</h5>
        <p class="text-muted small">Prostodentis kami mengkhususkan diri dalam mengembalikan dan menggantikan gigi dengan restorasi yang natural dan tahan lama.</p>
      </div>
    </div>
  </div>
</section>


    <section id="doctors" class="bg-light py-5">
        <div class="container">
            <h2 class="section-title text-center">Meet Our Dentist</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-3 col-sm-6">
                    <div class="doctor-card">
                        <img src="{{ asset('Storage/images/image6.jpg') }}" alt="Dr. Brain Adam" class="img-fluid">
                        <h5>Dr. Brain Adam</h5>
                        <p class="text-muted">Restorative Dentist</p>
                       <a href="{{ route('register') }}" class="btn btn-primary btn-sm mt-2">Book Now</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="doctor-card">
                        <img src="{{ asset('Storage/images/image7.jpg') }}" alt="Dr. Jessica Brown" class="img-fluid">
                        <h5>Dr. Belly White</h5>
                        <p class="text-muted">Restorative Dentist</p>
                       <a href="{{ route('register') }}" class="btn btn-primary btn-sm mt-2">Book Now</a>
                    </div>
                </div>
                 <div class="col-md-3 col-sm-6">
                    <div class="doctor-card">
                        <img src="{{ asset('Storage/images/image5.jpg') }}" alt="Dr. Jessica Brown" class="img-fluid">
                        <h5>Dr. Jessica Brown</h5>
                        <p class="text-muted">Restorative Dentist</p>
                        <a href="{{ route('register') }}" class="btn btn-primary btn-sm mt-2">Book Now</a>

                    </div>
                </div>
                </div>
        </div>
    </section>

    <section class="footer-cta py-5">
        <div class="container">
            <h2 class="mb-4">Subscribe To Our Newsletter</h2>
            <div class="input-group mb-3 w-50 mx-auto">
                <input type="email" class="form-control" placeholder="Enter your email address" aria-label="Email address" aria-describedby="button-addon2">
                <button class="btn btn-dark" type="button" id="button-addon2">Subscribe</button>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Medis Care</h5>
                    <p>Solusi kesehatan terpercaya untuk senyum cemerlang Anda.</p>
                    <div class="social-icons">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Useful Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#about" class="text-white text-decoration-none">Tentang Kami</a></li>
                        <li><a href="#services" class="text-white text-decoration-none">Layanan</a></li>
                        <li><a href="#doctors" class="text-white text-decoration-none">Dokter</a></li>
                        <li><a href="#" class="text-white text-decoration-none">FAQ</a></li>
                        <li><a href="#contact" class="text-white text-decoration-none">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Get In Touch</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Kesehatan No. 123, Kota Senyum, Indonesia</p>
                    <p><i class="fas fa-phone me-2"></i> (021) 12345678</p>
                    <p><i class="fas fa-envelope me-2"></i> info@Medis.com</p>
                </div>
            </div>
            <hr class="my-4">
            <p class="text-center mb-0">&copy; <?php echo date("Y"); ?> Medis Care. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>