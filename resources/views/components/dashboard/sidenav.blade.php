<aside class="min-h-screen col-span-1 px-8 bg-white shadow w-56">
    <div class="py-6 space-y-7">
        <div>
            <div>
                <x-sidenav.link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    <x-zondicon-user class="w-3  ml-2 mr-3" style="color:#FC9B5C;"/>
                    <span>{{ __('Profil') }}</span>
                </x-sidenav.link>
            </div>

            @if(auth()->user()->isAdmin())
            <div>
                <x-sidenav.link href="{{ route('admin.users.active') }}" :active="request()->routeIs('admin.users.active')">
                    <x-zondicon-user-group class="w-3  ml-2 mr-3" style="color:#FC9B5C;"/>
                    <span>{{ __('Pengguna') }}</span>
                </x-sidenav.link>
            </div>
            @endif
        </div>

        @if(auth()->user()->isAdmin())
        {{-- Categories --}}
        <div>
            <x-sidenav.title>
                {{ __('Kategori') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('admin.categories.index') }}" :active="request()->routeIs('admin.categories.index')">
                    <x-zondicon-view-tile class="w-3  ml-2 mr-3" style="color:#FC9B5C;"/>
                    <span>{{ __('Indeks') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                <x-sidenav.link href="{{ route('admin.categories.create') }}" :active="request()->routeIs('admin.categories.create')">
                    <x-zondicon-compose class="w-3 ml-2 mr-3" style="color:#FC9B5C;"/>
                    <span>{{ __('Tambah Baru') }}</span>
                </x-sidenav.link>
            </div>
        </div>
        @endif

        

        {{-- Threads --}}
        <div>
            <x-sidenav.title>
                {{ __('Postingan') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('threads.index') }}" :active="request()->routeIs('threads.index')">
                    <x-heroicon-o-home class="w-4 ml-2 mr-3" style="color:#FC9B5C;"/>
                    <span>{{ __('Beranda') }}</span>
                </x-sidenav.link>
            </div>
        </div>

        {{-- Threads --}}
        <div>
            <x-sidenav.title>
                {{ __('Autentikasi') }}
            </x-sidenav.title>
            <div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-sidenav.link href="{{ route('logout') }}" onclick="event.preventDefault();                                               this.closest('form').submit();">
                        <x-heroicon-o-logout class="w-4 ml-2 mr-3" style="color:#FC9B5C;"/>
                        <span>{{ __('Keluar') }}</span>
                    </x-sidenav.link>

                </form>

            </div>
        </div>

    </div>
</aside>
