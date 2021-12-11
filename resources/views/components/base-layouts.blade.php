@if (auth()->user()->role === 'admin')
    @php
        $menus = [
            [
                'name' => 'Dashboard',
                'path' => 'admin',
                'icon' => "fa-tachometer-alt"
            ],
            [
                'name' => 'Data User',
                'path' => 'admin/users',
                'icon' => "fa-users"
            ],
            [
                'name' => 'Jabatan',
                'path' => 'admin/jabatans',
                'icon' => "fa-user-tag"
            ],
            [
                'name' => 'Data Gaji',
                'path' => 'admin/gajis',
                'icon' => "fa-money-bill"
            ],
        ];
    @endphp
@endif

@if (auth()->user()->role === 'user')
    @php
        $menus = [
            [
                'name' => 'Dashboard',
                'path' => 'user',
                'icon' => "fa-tachometer-alt"
            ],
            [
                'name' => 'Data Diri',
                'path' => 'data-diri',
                'icon' => "fa-user"
            ],
            [
                'name' => 'Data Gaji',
                'path' => 'user/gajis',
                'icon' => "fa-money-bill"
            ],
            [
                'name' => 'Pengaturan Akun',
                'path' => 'akun',
                'icon' => "fa-sliders-h"
            ],
        ];
    @endphp
@endif

<x-dashboard title="{{ $title }}">
    <x-slot name="desktopNavbar">
        @foreach ($menus as $menu)
            <a href="{{ url($menu['path']) }}" class="flex items-center text-white opacity-75 @if(url()->current() == url($menu['path'])) active-nav-link @else hover:opacity-100 @endif py-4 pl-6 nav-item">
                <i class="fas {{ $menu['icon'] }} mr-3"></i>
                {{ $menu['name'] }}
            </a>
        @endforeach
    </x-slot>

    <x-slot name="main">
        {{ $slot }}
    </x-slot>

    <x-slot name="mobileMenu">
        @foreach ($menus as $menu)
        <a href="{{ url($menu['path']) }}" class="flex items-center text-white opacity-75  @if(url()->current() == url($menu['path'])) active-nav-link @else hover:opacity-100 @endif py-2 pl-4 nav-item">
            <i class="fas {{ $menu['icon'] }} mr-3"></i>
            {{ $menu['name'] }}
        </a>
        @endforeach
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Sign Out
            </button>
        </form>
    </x-slot>
</x-dashboard>