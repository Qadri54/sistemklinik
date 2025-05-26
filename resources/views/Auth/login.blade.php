<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Pasien</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

    @if(session('error'))
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <label class="block mb-2 font-semibold" for="email">Email</label>
      <input id="email" type="email" name="email" required autofocus
             class="w-full border border-gray-300 rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" />

      <label class="block mb-2 font-semibold" for="password">Password</label>
      <input id="password" type="password" name="password" required
             class="w-full border border-gray-300 rounded px-3 py-2 mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500" />

      <button type="submit" 
              class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition font-semibold">
        Login
      </button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
      Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Daftar disini</a>
    </p>
    <p class="text-center text-sm text-gray-600">
      kembali ke halaman <a href="/" class="text-blue-600 hover:underline">sebelumnya</a>
    </p>
  </div>

</body>
</html>
