<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SMK Taruna Bhakti</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('/images/bg.png') no-repeat center center fixed;
            background-size: cover;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
        }

        .gold-gradient {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
        }

        .input-style {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .input-style:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.3);
            background: rgba(255, 255, 255, 0.1);
        }

        ::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen p-6">

    <div class="glass-card w-full max-w-md p-10 rounded-3xl text-white animate__animated animate__fadeInDown animate__faster">
        
        <!-- Logo -->
        <div class="flex justify-center mb-6 animate__animated animate__zoomIn animate__delay-1s">
            <div class="p-1 gold-gradient rounded-full">
                <img src="/images/tb.jpg" alt="Logo SMK" class="w-20 h-20 rounded-full border-4 border-white shadow-md">
            </div>
        </div>

        <!-- Header -->
        <div class="text-center mb-6 animate__animated animate__fadeInDown animate__delay-1s">
            <h2 class="text-2xl font-bold tracking-wide">SMK TARUNA BHAKTI</h2>
            <p class="text-sm text-white/70">Sistem Informasi Akademik</p>
        </div>

        <!-- Error Session -->
        @if(session('error'))
            <div class="bg-red-600/20 border border-red-500 text-white text-sm p-3 rounded-lg mb-4 animate__animated animate__fadeIn animate__delay-1s">
                {{ session('error') }}
            </div>
        @endif

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
        <form method="POST" action="{{ route('register.post') }}" class="space-y-5 animate__animated animate__fadeInUp animate__delay-2s">
            @csrf

            <div>
                <label for="name" class="block text-sm text-white/80 mb-2">Nama Lengkap</label>
                <input type="text" name="name" id="name" required
                       class="w-full px-4 py-3 input-style text-white placeholder-white/50 rounded-lg focus:outline-none"
                       placeholder="Nama Lengkap">
            </div>

            <div>
                <label for="email" class="block text-sm text-white/80 mb-2">Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full px-4 py-3 input-style text-white placeholder-white/50 rounded-lg focus:outline-none"
                       placeholder="email@smktarunabhakti.sch.id">
            </div>

            <div>
                <label for="password" class="block text-sm text-white/80 mb-2">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-3 input-style text-white placeholder-white/50 rounded-lg focus:outline-none"
                       placeholder="••••••••">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm text-white/80 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="w-full px-4 py-3 input-style text-white placeholder-white/50 rounded-lg focus:outline-none"
                       placeholder="••••••••">
            </div>

            <button type="submit"
                    class="w-full gold-gradient hover:opacity-90 text-white font-semibold py-3 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 hover:brightness-110">
                DAFTAR
            </button>
        </form>

        <p class="text-center text-sm text-white/70 mt-4 animate__animated animate__fadeInUp animate__delay-3s">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-cyan-300 hover:underline">Masuk di sini</a>
        </p>
    </div>

</body>
</html>
