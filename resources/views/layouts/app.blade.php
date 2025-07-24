<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Sarpras')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        :root {
            --gold-primary:rgb(24, 40, 216);
            --gold-secondary:rgb(0, 11, 128);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        .sidebar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-right: 1px solid rgba(255, 255, 255, 0.18);
        }

        .gold-gradient {
            background: linear-gradient(135deg, var(--gold-primary) 0%, var(--gold-secondary) 100%);
        }

        .gold-text {
            background: linear-gradient(135deg, var(--gold-primary) 0%, var(--gold-secondary) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .nav-item.active {
            background: rgba(212, 175, 55, 0.1);
            border-left: 3px solid var(--gold-primary);
        }

        .nav-item.active .nav-icon {
            color: var(--gold-primary);
        }

        .nav-item:hover {
            background: rgba(212, 175, 55, 0.05);
        }
    </style>
</head>

<body class="min-h-screen flex">

    <!-- Luxury Sidebar -->
    <aside class="sidebar w-64 flex flex-col fixed h-full z-10">
        <!-- Logo Branding -->
        <div class="h-20 flex items-center justify-center border-b border-gray-100 px-4">
            <a href="{{ route('dashboard') }}" class="text-xl font-semibold flex items-center">
                <div class="p-1 gold-gradient rounded-lg mr-3">
                    <!-- <i class="fas fa-cubes text-white p-2"></i> -->
                     <img src="{{asset('images/tb.jpg')}}" alt="" width="80">
                </div>
                <span class="gold-text">Sarpras</span>
            </a>
        </div>

        <!-- Navigation Menu -->
        <div class="flex-1 px-3 py-6 space-y-1 overflow-y-auto">
            <div class="px-3 py-2">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Menu Utama</p>
            </div>

            <a href="{{ route('dashboard') }}"
                class="nav-item flex items-center p-3 text-gray-700 rounded-lg transition-all duration-200">
                <i class="nav-icon fas fa-tachometer-alt w-6 text-center text-gray-500"></i>
                <span class="ml-3">Dashboard</span>
            </a>

            <a href="{{ route('categories.index') }}"
                class="nav-item flex items-center p-3 text-gray-700 rounded-lg transition-all duration-200">
                <i class="nav-icon fas fa-tags w-6 text-center text-gray-500"></i>
                <span class="ml-3">Kategori Barang</span>
            </a>

            <a href="{{ route('items.index') }}"
                class="nav-item flex items-center p-3 text-gray-700 rounded-lg transition-all duration-200">
                <i class="nav-icon fas fa-box-open w-6 text-center text-gray-500"></i>
                <span class="ml-3">Manajemen Barang</span>
            </a>

            <a href="{{ route('loans.index') }}"
                class="nav-item flex items-center p-3 text-gray-700 rounded-lg transition-all duration-200">
                <i class="nav-icon fas fa-exchange-alt w-6 text-center text-gray-500"></i>
                <span class="ml-3">Peminjaman</span>

            </a>
             <a href="{{ route('laporan.pengembalian') }}"
                class="nav-item flex items-center p-3 text-gray-700 rounded-lg transition-all duration-200">
                <i class="nav-icon fas fa-exchange-alt w-6 text-center text-gray-500"></i>
                <span class="ml-3">Laporan Pengembalian</span>
            </a>

            <a href="{{ route('users.index') }}"
                class="nav-item flex items-center p-3 text-gray-700 rounded-lg transition-all duration-200">
                <i class="nav-icon fas fa-users w-6 text-center text-gray-500"></i>
                <span class="ml-3">Manajemen Pengguna</span>
            </a>

            <!-- Account Section -->
            <div class="px-3 py-2 mt-6">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Akun</p>
            </div>

            <form action="/logout" method="POST">
                @csrf
                <button type="submit"
                    class="w-full text-left nav-item flex items-center p-3 text-gray-700 rounded-lg hover:text-red-500 transition-all duration-200">
                    <i class="fas fa-sign-out-alt w-6 text-center text-gray-500"></i>
                    <span class="ml-3">Keluar</span>
                </button>
            </form>
        </div>

        <!-- User Profile -->
        <div class="p-4 border-t border-gray-100">
            <div class="flex items-center">
                <div class="h-10 w-10 rounded-full gold-gradient flex items-center justify-center text-white">
                    <i class="fas fa-user text-sm"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-800">Admin User</p>
                    <p class="text-xs text-gray-500">Administrator Sistem</p>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 ml-64 p-8 min-h-screen bg-gray-50">
        <!-- Content Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800 flex items-center">
                @yield('icon')
                <span class="ml-2">@yield('title')</span>
            </h1>
            <div class="flex items-center mt-2 text-sm text-gray-500">
                <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Dashboard</a>
                <span class="mx-2">/</span>
                <span>@yield('breadcrumb')</span>
            </div>
        </div>

        <!-- Page Content -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            @yield('content')
        </div>
    </div>

    <script>
        // Add active class to current menu item
        document.querySelectorAll('.nav-item').forEach(item => {
            if (item.href === window.location.href) {
                item.classList.add('active');
            }

            // Add hover effects
            item.addEventListener('mouseenter', () => {
                const icon = item.querySelector('.nav-icon');
                icon.classList.add('transform', 'scale-110');
            });

            item.addEventListener('mouseleave', () => {
                const icon = item.querySelector('.nav-icon');
                icon.classList.remove('transform', 'scale-110');
            });
        });
    </script>
</body>

</html>
