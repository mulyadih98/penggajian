<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ url('images/logo/favicon.ico') }}">
    <meta name="author" content="Mulyadih1998">
    <meta name="description" content="Aplikasi penggajian guru di SMP IT Bina Adzkia">
    <meta name="robots" content="index, follow" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/mobius1/vanilla-Datatables@latest/vanilla-dataTables.min.js"></script>
    <!-- Tailwind -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
        [x-cloak] { display: none !important; }
    </style>
    <!-- vanila datatable -->
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            {{-- <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a> --}}
            <div class="w-52 text-center">
                <img src="{{ asset('images/logo/logo.png') }}" alt="" class="p-1 w-24 h-24 bg-white rounded-full mx-auto">
                <p class="font-semibold text-white mt-2">YAYASAN NURUL AMIN</p>
                <p class="font-semibold text-white text-xl">SMPIT BINA ADZKIA</p>
            </div>
            {{-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> --}}
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            {{ $desktopNavbar }}
        </nav>
        <div class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            
        </div>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
                <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden  hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="{{ asset('images/default.png') }}">
                </button>
                <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
                <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16" x-cloak>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="block w-full px-4 py-2 account-link hover:text-white">Sign Out</button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300 flex items-center">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="" class="p-1 w-14 h-1w-14 bg-white rounded-full mx-auto">
                    <div class="ml-2">
                        <p class="text-xs">YaYasan Nurul Amin</p>
                        <p class="text-sm">SMPIT BINA ADZKIA</p>
                    </div>
                </a>
                <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
                    <i x-show="!isOpen" class="fas fa-bars"></i>
                    <i x-show="isOpen" class="fas fa-times"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4" x-cloak>
                {{ $mobileMenu }}
            </nav>
            <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                @if (session("err"))
                    <x-alert type="danger" message="{{ session('err') }}"></x-alert>
                @endif

                @if (session("scc"))
                    <x-alert type="success" message="{{ session('scc') }}"></x-alert>
                @endif

                {{ $main }}
                <!-- Content goes here! 😁 -->
            </main>
    
            <footer class="w-full bg-white text-right p-4">
                <a target="_blank" href="#" class="underline">SMPIT BINA ADZKIA</a>.
            </footer>
        </div>
        
    </div>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>