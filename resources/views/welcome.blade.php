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
<body class="bg-custom-green font-sans antialiased">
    <header class="bg-custom-green text-white py-6">
        <div class="container mx-auto flex justify-between items-center px-6">
            <h1 class="text-3xl font-bold">Bank Sampah</h1>
            <nav class="space-x-4">
                <a href="#features" class="hover:text-gray-200">Features</a>
                <a href="#about" class="hover:text-gray-200">About</a>
                <a href="#contact" class="hover:text-gray-200">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="bg-custom-green text-white text-center py-20">
            <div class="container mx-auto">
                <img src="{{ asset('img/favicon.png') }}" alt="Logo Bank Sampah" class="mx-auto w-35 h-60 rounded-full mb-8" />
                <p class="text-lg mb-8">Your solution for waste management and recycling.</p>
                <div class="flex justify-center gap-4 mb-8">
                    <a href="{{ route('login') }}" class="bg-white text-custom-green px-6 py-3 rounded-full hover:bg-gray-200">Login Admin</a>
                    <a href="{{ route('login') }}" class="bg-white text-custom-green px-6 py-3 rounded-full hover:bg-gray-200">Login User</a>
                </div>
            </div>
        </section>

        <section id="features" class="py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-8">Features</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Feature One</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nunc lectus, rutrum et pellentesque ac, vestibulum in ligula. Vestibulum interdum metus magna, vitae egestas metus sodales et. Aenean ante massa, varius vel nisl at, tempor mattis ante. Donec metus erat, imperdiet at dignissim id, finibus sed dolor. Nullam feugiat in nibh nec rhoncus. Sed eu nisl nibh. Quisque suscipit lectus eu risus mollis pulvinar.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Feature Two</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nunc lectus, rutrum et pellentesque ac, vestibulum in ligula. Vestibulum interdum metus magna, vitae egestas metus sodales et. Aenean ante massa, varius vel nisl at, tempor mattis ante. Donec metus erat, imperdiet at dignissim id, finibus sed dolor. Nullam feugiat in nibh nec rhoncus. Sed eu nisl nibh. Quisque suscipit lectus eu risus mollis pulvinar.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-4">Feature Three</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nunc lectus, rutrum et pellentesque ac, vestibulum in ligula. Vestibulum interdum metus magna, vitae egestas metus sodales et. Aenean ante massa, varius vel nisl at, tempor mattis ante. Donec metus erat, imperdiet at dignissim id, finibus sed dolor. Nullam feugiat in nibh nec rhoncus. Sed eu nisl nibh. Quisque suscipit lectus eu risus mollis pulvinar.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="bg-gray-100 py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-8">About Us</h2>
                <p class="text-lg text-center">Information about the bank sampah, its mission, and values.</p>
            </div>
        </section>

        <section id="contact" class="py-20">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-8">Contact Us</h2>
                <div class="text-center">
                    <p class="text-lg mb-4">Feel free to reach out to us with any questions or feedback.</p>
                    <a href="mailto:info@banksampah.com" class="bg-custom-green text-white px-6 py-3 rounded-full hover:bg-green-700">Email Us</a>
                </div>
            </div>
        </section>

        <section id="signup" class="bg-custom-green text-white text-center py-20">
            <div class="container mx-auto">
                <h2 class="text-3xl font-bold mb-4">Ready to Join Us?</h2>
                <p class="text-lg mb-8">Sign up today and start managing your waste more effectively.</p>
                <a href="#login" class="bg-white text-custom-green px-6 py-3 rounded-full hover:bg-gray-200">Sign Up</a>
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
