<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SMK Taruna Bhakti</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('/images/smk-tb.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .blue-gradient {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        .input-style {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-style:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.3);
        }

        ::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">

    <div class="glass w-full max-w-md p-10 rounded-3xl text-white animate__animated animate__fadeInDown animate__faster">
        
        <!-- Logo -->
        <div class="flex justify-center mb-6 animate__animated animate__zoomIn animate__delay-1s">
            <div class="p-1 blue-gradient rounded-full">
                <img src="/images/tb.jpg" alt="Logo SMK" class="w-20 h-20 rounded-full border-4 border-white shadow-lg">
            </div>
        </div>

        <!-- Header -->
        <div class="text-center mb-6 animate__animated animate__fadeInDown animate__delay-1s">
            <h1 class="text-2xl font-bold tracking-wide">SMK TARUNA BHAKTI</h1>
            <p class="text-sm text-white/70 mt-1">Sistem Informasi Akademik</p>
        </div>

        <!-- Error Session -->
        @if (session('error'))
            <div class="bg-red-600/20 border border-red-500 text-white text-sm p-3 rounded-lg mb-4 animate__animated animate__fadeIn animate__delay-1s">
                {{ session('error') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-600/20 border border-red-500 text-sm text-white p-3 rounded-lg mb-4 animate__animated animate__fadeIn animate__delay-1s">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5 animate__animated animate__fadeInUp animate__delay-2s">
            @csrf

            <div>
                <label for="email" class="block text-sm text-white/80 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3 rounded-lg input-style text-white focus:outline-none"
                       placeholder="email@smktarunabhakti.sch.id">
            </div>

            <div>
                <label for="password" class="block text-sm text-white/80 mb-2">Kata Sandi</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-3 rounded-lg input-style text-white focus:outline-none"
                       placeholder="••••••••">
            </div>

            <button type="submit"
                    class="w-full blue-gradient text-white font-semibold py-3 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 hover:brightness-110">
                MASUK
            </button>

            <div class="text-center mt-4">
                <p class="text-sm text-white/70">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-cyan-300 hover:underline">Daftar sekarang</a>
                </p>
            </div>
        </form>

        <!-- Footer -->
        <div class="text-center mt-8 animate__animated animate__fadeInUp animate__delay-3s">
            <p class="text-white/60 text-xs">© {{ now()->year }} SMK Taruna Bhakti. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
