<!-- Desktop sidebar -->
<aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
>
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <img src="{{ asset('assets/img/home-side.png') }}"  alt="WWW" class="h-32 w-32 md:h-40 md:w-40" />
        <a
                class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                href="{{ route('admin.home')}}"
        >
           Peladen
        </a>
        <ul class="mt-6">
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.home'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
        
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.home') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.home') }}"
                >
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                        ></path>
                    </svg>
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
            @endif
            <li class="relative px-6 py-3">
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                @if (request()->routeIs('admin.layananZoom'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.layananZoom') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.layananZoom') }}"
                >
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
                        ></path>
                    </svg>
                    <span class="ml-4">Layanan Zoom</span>
                </a>
            </li>
            @endif
            <li class="relative px-6 py-3">
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                @if (request()->routeIs('admin.layananVPN'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.layananVPN') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.layananVPN') }}"
                >
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Layanan VPN</span>
                </a>
            </li>
            @endif
            <li class="relative px-6 py-3">
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                @if (request()->routeIs('admin.layananSPLP'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.layananSPLP') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.layananSPLP') }}"
                >
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Layanan SPLP</span>
                </a>
            </li>
            @endif

            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.layananKM'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.layananKM') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.layananKM') }}"
                >
                    <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Layanan Konten Multimedia</span>
                </a>
            </li>
            
        </ul>
        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'superadmin')

        <div class="px-6 my-6">
            <button
                    class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div>
        @endif
    </div>
</aside>