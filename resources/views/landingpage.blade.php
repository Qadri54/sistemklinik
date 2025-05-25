<!DOCTYPE html>
<html lang="id">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Klinik Sehat Selalu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  </head>

  <body class="font-sans bg-white text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
      <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <a href="#" class="flex items-center space-x-3">
          <img src="{{ asset('Storage/images/image3.jpg') }}" alt="Logo" class="w-10 h-10 rounded-full shadow" />
          <span class="text-xl font-bold text-blue-900">Medintist Care</span>
        </a>
        <div class="space-x-6 text-sm md:text-base">
          <a href="#home" class="text-blue-900 hover:text-blue-600 transition">Beranda</a>
          <a href="{{ route('login') }}" class="text-blue-900 hover:text-blue-600 transition">Login</a>
          <a href="{{ route('register') }}"
            class="bg-blue-900 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow">Sign Up</a>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative bg-cover bg-center h-screen"
      style="background-image: url('{{ asset('Storage/images/image10.jpg') }}')">
      <div class="absolute inset-0 bg-blue-900 bg-opacity-60"></div>
      <div class="relative z-10 flex flex-col items-center justify-center h-full text-white text-center px-4">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Hidup Sehat, Masa Depan Cerah!</h1>
        <p class="text-lg md:text-xl mb-6 max-w-2xl">Kami hadir untuk memberikan layanan kesehatan umum terbaik dengan
          tenaga profesional dan fasilitas modern.</p>
        <a href="{{ route('register') }}"
          class="px-6 py-3 bg-white text-blue-900 font-semibold rounded-lg hover:bg-gray-100 transition">Registrasi
          Sekarang</a>
      </div>
    </section>

    <!-- About Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
        <div>
          <h2 class="text-3xl font-bold text-blue-900 mb-6">Tentang Medintist Care</h2>
          <p class="text-lg text-gray-700 mb-4">Medintist Care adalah klinik umum yang berkomitmen memberikan layanan
            kesehatan menyeluruh dan berkualitas untuk masyarakat.</p>
          <p class="text-gray-600 mb-6">Kami percaya bahwa kesehatan adalah aset utama dalam menjalani kehidupan yang
            produktif dan bahagia.</p>
          <a href="#"
            class="text-blue-900 border border-blue-900 px-6 py-2 rounded hover:bg-blue-900 hover:text-white transition">Pelajari
            Lebih Lanjut</a>
        </div>
        <div>
          <img src="{{ asset('Storage/images/image1.jpg') }}" alt="Tentang Kami" class="rounded-xl shadow-lg w-full">
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section class="bg-gray-100 py-16">
      <div class="container mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-blue-900 mb-10">Mengapa Memilih Kami?</h2>
        <div class="grid md:grid-cols-4 gap-8">
          <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
            <i class="fas fa-user-md text-4xl text-blue-900 mb-4"></i>
            <h3 class="text-lg font-semibold mb-2">Tenaga Medis Profesional</h3>
            <p class="text-sm text-gray-600">Dokter dan perawat berpengalaman siap membantu Anda.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
            <i class="fas fa-notes-medical text-4xl text-blue-900 mb-4"></i>
            <h3 class="text-lg font-semibold mb-2">Layanan Lengkap</h3>
            <p class="text-sm text-gray-600">Pemeriksaan umum, laboratorium, vaksinasi, dan lainnya.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
            <i class="fas fa-clinic-medical text-4xl text-blue-900 mb-4"></i>
            <h3 class="text-lg font-semibold mb-2">Fasilitas Modern</h3>
            <p class="text-sm text-gray-600">Dilengkapi dengan peralatan terbaru untuk diagnosis akurat.</p>
          </div>
          <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition">
            <i class="fas fa-smile-beam text-4xl text-blue-900 mb-4"></i>
            <h3 class="text-lg font-semibold mb-2">Pelayanan Ramah</h3>
            <p class="text-sm text-gray-600">Kami mengutamakan kenyamanan dan kepuasan pasien.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Layanan Section -->
    <section class="py-16 bg-white text-center">
      <div class="container mx-auto px-6">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Layanan Kami</h2>
        <p class="text-gray-700 mb-10">Solusi kesehatan menyeluruh untuk Anda dan keluarga</p>
        <div class="grid md:grid-cols-4 gap-10">
          <div>
            <img src="{{ asset('Storage/images/pemeriksaanumum.jpg') }}" alt="Pemeriksaan Umum"
              class="w-28 h-28 rounded-full mx-auto mb-4 shadow object-cover">
            <h5 class="font-bold text-blue-900">Pemeriksaan Umum</h5>
            <p class="text-sm text-gray-500">Deteksi dini dan penanganan berbagai penyakit.</p>
          </div>
          <div>
            <img src="{{ asset('Storage/images/kesehatananak.jpeg') }}" alt="Kesehatan Anak"
              class="w-28 h-28 rounded-full mx-auto mb-4 shadow object-cover">
            <h5 class="font-bold text-blue-900">Kesehatan Anak</h5>
            <p class="text-sm text-gray-500">Perawatan dan vaksinasi khusus untuk si kecil.</p>
          </div>
          <div>
            <img src="{{ asset('Storage/images/tht.jpg') }}" alt="Layanan Vaksinasi"
              class="w-28 h-28 rounded-full mx-auto mb-4 shadow object-cover">
            <h5 class="font-bold text-blue-900">Layanan THT</h5>
            <p class="text-sm text-gray-500">THT untuk pemeriksaan telinga, hidung, dan tenggorokan.</p>
          </div>
          <div>
            <img src="{{ asset('Storage/images/lab.jpg') }}" alt="Laboratorium"
              class="w-28 h-28 rounded-full mx-auto mb-4 shadow object-cover">
            <h5 class="font-bold text-blue-900">Laboratorium</h5>
            <p class="text-sm text-gray-500">Tes laboratorium untuk menunjang diagnosis akurat.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white py-6 mt-12 text-center">
      <p class="text-sm">&copy; 2025 Medintist Care. All rights reserved.</p>
    </footer>

  </body>

</html>