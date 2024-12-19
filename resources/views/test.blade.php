<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fine Taste Restaurant</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100">

<!-- Hero Section -->
<header class="relative h-screen bg-cover bg-center flex items-center justify-center text-center" style="background-image: url('https://source.unsplash.com/1600x900/?fine-dining,restaurant');">
    <div class="absolute inset-0 bg-black/60"></div>
    <div class="z-10 text-white px-6">
        <h1 class="text-5xl font-extrabold sm:text-6xl lg:text-7xl">
            Welcome to <span class="text-yellow-400">Fine Taste</span>
        </h1>
        <p class="mt-4 text-lg sm:text-xl lg:text-2xl text-gray-300">
            Where every bite tells a story of elegance and flavor.
        </p>
        <a href="#menu" class="mt-6 inline-block px-8 py-3 bg-yellow-400 text-gray-900 rounded-lg text-lg font-bold hover:bg-yellow-500 shadow-lg">
            Explore Our Menu
        </a>
    </div>
</header>

<!-- About Section -->
<section id="about" class="py-16 bg-gradient-to-r from-yellow-50 via-gray-100 to-yellow-50 dark:from-gray-800 dark:via-gray-900 dark:to-gray-800">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <img src="https://source.unsplash.com/800x600/?chef,restaurant" alt="Our Story" class="rounded-lg shadow-lg">
            <div>
                <h2 class="text-4xl font-bold text-gray-800 dark:text-gray-100">About Us</h2>
                <p class="mt-4 text-gray-700 dark:text-gray-300 leading-relaxed">
                    At Fine Taste, we blend exquisite culinary techniques with fresh, seasonal ingredients to deliver a unique dining experience. Our world-renowned chefs craft dishes that celebrate the art of food.
                </p>
                <a href="#contact" class="mt-6 inline-block px-6 py-3 bg-yellow-400 text-gray-900 rounded-lg text-lg font-bold hover:bg-yellow-500 shadow-md">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Menu Section -->
<section id="menu" class="py-16 bg-gray-100 dark:bg-gray-800">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold text-gray-800 dark:text-gray-100">Our Menu Highlights</h2>
        <p class="mt-4 text-gray-700 dark:text-gray-300">
            A curated selection of our most loved dishes.
        </p>
        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Menu Item -->
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/400x300/?steak" alt="Dish" class="w-full">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Grilled Steak</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Perfectly seasoned with a smoky finish.</p>
                    <span class="block mt-4 text-yellow-500 font-bold text-lg">$25.99</span>
                </div>
            </div>
            <!-- Menu Item -->
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/400x300/?seafood" alt="Dish" class="w-full">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Seafood Platter</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">A medley of fresh, ocean-inspired flavors.</p>
                    <span class="block mt-4 text-yellow-500 font-bold text-lg">$32.99</span>
                </div>
            </div>
            <!-- Menu Item -->
            <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/400x300/?dessert" alt="Dish" class="w-full">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Signature Dessert</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">A sweet treat to end your meal perfectly.</p>
                    <span class="block mt-4 text-yellow-500 font-bold text-lg">$12.99</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section id="cta" class="py-16 bg-yellow-400 text-gray-900">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold">Reserve Your Table Today</h2>
        <p class="mt-4 text-lg">Don’t miss out on an unforgettable dining experience.</p>
        <a href="#reservation" class="mt-6 inline-block px-8 py-3 bg-gray-900 text-yellow-400 rounded-lg text-lg font-bold hover:bg-gray-700 shadow-lg">
            Book Now
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 py-8">
    <div class="container mx-auto px-6 text-center">
        <p class="text-sm">&copy; 2024 Fine Taste. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
