<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bank Sampah</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-custom-green { background-color: #8BC34A; }
        .text-custom-green { color: #8BC34A; }
        .hover-bg-custom-green:hover { background-color: #7CB342; } /* Slightly darker shade on hover */
    </style>
</head>
<body class="font-sans antialiased">

    <header class="bg-custom-green text-white py-6">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-3xl font-bold">Bank Sampah</h1>
            <nav class="space-x-4">
                <a href="#features" class="hover:text-gray-200 transition-colors duration-300">Features</a>
                <a href="#about" class="hover:text-gray-200 transition-colors duration-300">About</a>
                <a href="#contact" class="hover:text-gray-200 transition-colors duration-300">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="bg-custom-green text-white text-center py-20 relative overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://source.unsplash.com/random/1600x900?nature'); opacity: 0.2;"></div>
            <div class="relative z-10 container mx-auto">
                <img src="{{ asset('img/favicon.png') }}" alt="Logo Bank Sampah" class="mx-auto w-35 h-60 rounded-full mb-8" />
                <p class="text-lg mb-8">Your solution for waste management and recycling.</p>
                <div class="flex justify-center gap-4 mb-8">
                    <a href="{{ route('login') }}" class="bg-white text-custom-green px-6 py-3 rounded-full hover:bg-gray-200 transition-colors duration-300">Login Admin</a>
                    <a href="{{ route('home_user') }}" class="bg-white text-custom-green px-6 py-3 rounded-full hover:bg-gray-200 transition-colors duration-300">Lihat Sebagai User</a>
                </div>
            </div>
        </section>

        <section id="features" class="py-20 bg-gradient-to-br from-blue-900 to-blue-600 text-white">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-8">Fitur</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-semibold mb-4">Setor Sampah</h3>
                        <p>Pengguna dapat memasukkan data jenis sampah, kategori, dan beratnya, serta melacak riwayat setor sampah mereka secara efisien. Dengan fitur ini, pengguna berkontribusi pada pengelolaan sampah dengan cara yang terorganisir dan mudah.</p>
                    </div>
                    <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-semibold mb-4">Setor Kerajinan</h3>
                        <p>Fitur ini mendukung pembuatan kerajinan daur ulang yang inovatif dan membantu pengguna mengelola dan mempromosikan hasil karya mereka.</p>
                    </div>
                    <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <h3 class="text-xl font-semibold mb-4">Jual Sampah</h3>
                        <p>Fitur ini memfasilitasi transaksi jual beli sampah dan mendukung pengelolaan keuangan untuk pengguna dan bank sampah.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="bg-gradient-to-r from-gray-200 via-gray-300 to-gray-200 py-20">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-8 text-gray-800">Tentang Kami</h2>
                <p class="text-lg text-gray-700">Bank Sampah SD Islam Bintang Juara</p>
            </div>
        </section>

        <section id="contact" class="py-20 bg-custom-green text-white">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-8">Contact Us</h2>
                <p class="text-lg mb-4">Feel free to reach out to us with any questions or feedback.</p>
                <a href="mailto:info@banksampah.com" class="bg-white text-custom-green px-6 py-3 rounded-full hover:bg-gray-200 transition-colors duration-300">Email Us</a>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Bank Sampah. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
