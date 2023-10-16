<nav x-data="{ open: false }" class="h-full bg-white border-r-4 border-gray-100 text-white">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Primary Nav bar -->
    <div class="h-full" style="background-image: linear-gradient(45deg,#ff748c,#9799ba);">
        <div class="md:p-5">
            <div style="transform: rotate(90deg);" class="pl-6">
                <a href="{{ route('dashboard') }}">
                    <x-application-mark/>
                </a>
            </div>
            <div class="w-full flex justify-center" style="position: relative; top: 265px;">
                <img class="hidden md:h-12 md:w-12 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            </div>

            <div style="position: relative; top: 250px; width: 100%;" class="grid grid-cols-1 h-full pt-10">
                <x-nav-link href="{{ route('dashboard') }}" class="flex justify-center text-3xl" :active="request()->routeIs('dashboard')">
                    <i class="bi bi-clipboard"></i>
                </x-nav-link>
                
                <x-nav-link href="{{ route('profile.show') }}" class="flex justify-center text-3xl" :active="request()->routeIs('profile.show')">
                    <i class="bi bi-person"></i>
                </x-nav-link>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-dropdown-link href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                        <i class="bi bi-box-arrow-right"></i>
                    </x-dropdown-link>
                </form>
            </div>
        </div>
    </div>
</nav>