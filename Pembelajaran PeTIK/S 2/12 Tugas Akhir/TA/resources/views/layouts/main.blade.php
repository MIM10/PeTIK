<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <style>
        #progress-bar {
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 10;
            transition: opacity 0.3s ease-in-out;
        }

        #progress-bar.hide {
            opacity: 0;
            pointer-events: none;
        }
    </style>
    
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    {{-- navbar --}}
    <nav class="p-3 px-5 bg-white shadow nav:flex nav:items-center nav:justify-between">
        <div class="flex  items-center">
            <span {{ url('url', []) }} class="text-2xl font-semibold cursor-pointer">
                <img class="h-10 inline mr-4" src="{{ asset('/img/Logo-HNI.png') }}" alt="Logo">
                HNI Catalog
            </span>

            <span class="text-3xl cursor-pointer ml-auto mx-2 nav:hidden block">
                <ion-icon name="menu" id="menuBtn"></ion-icon>
            </span>
        </div>

        <ul id="menuItem"
            class="nav:flex nav:items-center z-[50] nav:z-auto nav:static absolute bg-white w-full left-0 nav:w-auto nav:py-0 py-4 nav:pl-0 pl-7 nav:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
            <li class="mr-6 my-5 nav:my-0">
                <a href="/" class="text-xl duration-500">
                    <p class="px-2 py-1 rounded hover:bg-gray-200 duration-500">Home</p>
                </a>
            </li>
            <li class="mr-6 my-5 nav:my-0" id="categoryDropdown">
                <p class="text-xl cursor-pointer duration-500 px-2 py-1 rounded hover:bg-gray-200">Category</p>
                <ul class="absolute z-50 text-[13px] rounded hidden mt-2 p-5 bg-white shadow" id="categoryMenu">
                    <a href="{{ route('user.kategori1') }}">
                        <li class="p-3 rounded hover:bg-gray-200">HERBS PRODUCTS</li>
                    </a>
                    <a href="{{ route('user.kategori2') }}">
                        <li class="p-3 rounded hover:bg-gray-200">COSMETICS & HOME CARE</li>
                    </a>
                    <a href="{{ route('user.kategori3') }}">
                        <li class="p-3 rounded hover:bg-gray-200">HEALTH FOOD & BEVERAGES</li>
                    </a>
                </ul>
            </li>
            <li class="mr-6 my-5 nav:my-0">
                <a href="https://wasap.at/mNsK61" class="text-xl duration-500" target="_blank">
                    <p class="px-2 py-1 rounded hover:bg-gray-200 duration-500">Contact</p>
                </a>
            </li>
            <li class="mr-2 my-5 nav:my-0">
                <form class="flex items-center" action="{{ url('/') }}">
                    <input name="keyword" type="text" value="{{ Request::get('keyword') }}" placeholder="Search"
                        class="border-2 w-full hover:border-sky-700 p-1 rounded-md">
                    <span class="text-xl font-weight-bold cursor-pointer ml-3 mr-8 nav:mr-0">
                        <button type="submit">
                            <ion-icon class="mb-[-2px]" name="search"></ion-icon>
                        </button>
                    </span>
                </form>
            </li>
        </ul>
    </nav>


    {{-- section --}}
    @yield('container')

    
    {{-- footer --}}
    <footer class="bg-gray-800 text-white py-6 mt-20">
        <div class="container mx-auto grid grid-cols-1 gap-4">
            <div class="flex flex-col text-center items-center">
                <p class="text-lg font-semibold">HNI Catalog</p>
                <p class="text-sm max-w-[560px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum condimentum ipsum ac elit fringilla, at eleifend arcu hendrerit.</p>
            </div>
            <iframe class="flex justify-self-center rounded  h-[200px] w-[230px] my-5" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3962.747773155784!2d106.8597861766969!3d-6.678138893317111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNDAnNDEuMyJTIDEwNsKwNTEnNDQuNSJF!5e0!3m2!1sid!2sid!4v1689315905335!5m2!1sid!2sid" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="text-center ">
                <ul class="flex flex-wrap justify-center  space-x-4">
                    <li><a href="/" class="text-sm">Home</a></li>
                    <li><a href="/" class="text-sm">Category</a></li>
                    <li><a href="https://wasap.at/mNsK61" class="text-sm">Contact Us</a></li>
                    <li><a href="#" class="text-sm">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="text-center ">
                <p class="text-sm">© 2023 HNI Catalog. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

<script>
    // burgerMenu
        let btn = document.getElementById('menuBtn');
        let list = document.getElementById('menuItem');

        btn.addEventListener('click', function() {
            btn.name === 'menu' ? btn.name = "close" : btn.name = "menu";
            list.classList.toggle('top-[60px]');
            list.classList.toggle('opacity-100');
            list.classList.toggle('shadow');
        });
    // endBurgerMenu

    // modal
        // Get the category dropdown elements
        var categoryDropdown = document.getElementById('categoryDropdown');
        var categoryMenu = document.getElementById('categoryMenu');

        // Toggle visibility of the category menu on click
        categoryDropdown.addEventListener('click', function() {
            categoryMenu.classList.toggle('hidden');
        });


        // Function to toggle modal visibility
        function toggleModal(productId) {
            const modal = document.getElementById('modal' + productId);
            modal.classList.toggle('hidden');
        }
    // endModal

    // carousel
        const carouselItems = document.querySelectorAll('[data-carousel-item]');
        const sliderIndicators = document.querySelectorAll('[data-carousel-slide-to]');

        const carouselPrevButton = document.querySelector('[data-carousel-prev]');
        const carouselNextButton = document.querySelector('[data-carousel-next]');

        let currentSlide = 0;
        let intervalId;

        // Jalankan kode setelah halaman dimuat sepenuhnya
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan elemen pertama dalam carousel
            const firstCarouselItem = document.querySelector('[data-carousel-item]');

            // Hapus kelas .hidden dari elemen pertama
            firstCarouselItem.classList.remove('hidden');
        });

        function showSlide(index) {
            carouselItems.forEach(item => {
                item.classList.add('hidden');
            });

            carouselItems[index].classList.remove('hidden');
        }

        function updateSliderIndicators(index) {
            sliderIndicators.forEach(indicator => {
                const slideTo = parseInt(indicator.getAttribute('data-carousel-slide-to'));
                if (slideTo === index) {
                    indicator.classList.add('bg-gray-400');
                    indicator.setAttribute('aria-current', 'true');
                } else {
                    indicator.classList.remove('bg-gray-400');
                    indicator.setAttribute('aria-current', 'false');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % carouselItems.length;
            showSlide(currentSlide);
            updateSliderIndicators(currentSlide);
        }

        carouselPrevButton.addEventListener('click', () => {
            currentSlide = (currentSlide - 1 + carouselItems.length) % carouselItems.length;
            showSlide(currentSlide);
            updateSliderIndicators(currentSlide);
        });

        carouselNextButton.addEventListener('click', () => {
            nextSlide();
        });

        sliderIndicators.forEach(indicator => {
            indicator.addEventListener('click', () => {
                const slideTo = parseInt(indicator.getAttribute('data-carousel-slide-to'));
                currentSlide = slideTo;
                showSlide(currentSlide);
                updateSliderIndicators(currentSlide);
            });
        });

        function startAutoSlide() {
            intervalId = setInterval(() => {
                nextSlide();
            }, 3000); // Ganti angka 3000 dengan durasi interval yang diinginkan (dalam milidetik)
        }

        function stopAutoSlide() {
            clearInterval(intervalId);
        }

        startAutoSlide();

        // Pause slide on hover
        const carousel = document.getElementById('default-carousel');
        carousel.addEventListener('mouseenter', stopAutoSlide);
        carousel.addEventListener('mouseleave', startAutoSlide);

        // progres bar
        // Jalankan kode setelah halaman dimuat sepenuhnya
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan elemen progres bar
            const progressBar = document.querySelector('.carousel-progress');

            // Sembunyikan progres bar saat halaman dimuat
            progressBar.style.display = 'none';
        });

        // Jalankan kode saat semua konten (termasuk gambar) telah dimuat
        window.addEventListener('load', function() {
            // Dapatkan elemen progres bar
            const progressBar = document.querySelector('.carousel-progress');

            // Sembunyikan progres bar setelah semua konten selesai dimuat
            progressBar.style.display = 'none';
        });


        // Jalankan kode setelah halaman dimuat sepenuhnya
        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan elemen progress bar
            const progressBar = document.getElementById('progress-bar');

            // Tambahkan event listener saat gambar di-load
            document.querySelectorAll('[data-carousel-item] img').forEach(function(img) {
                img.addEventListener('load', function() {
                    // Sembunyikan progress bar setelah gambar selesai dimuat
                    progressBar.classList.add('hide');
                });
            });
        });
    // endCarousel
</script>

</html>
