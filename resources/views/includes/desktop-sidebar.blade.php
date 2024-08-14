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
           PELADEN
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
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z"/>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z"/>
                  </svg>
                  
                  
                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin' || Auth::user()->role == 'opd')
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.layananZoom') || request()->routeIs('opd.layananZoom.create'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                @endif

                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.layananZoom') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}" href="{{ route('admin.layananZoom') }}">
                @elseif (Auth::user()->role == 'opd')
                    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('opd.layananZoom.create') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}" href="{{ route('opd.layananZoom.create') }}">
                @endif

                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M4 18V8a1 1 0 0 1 1-1h1.5l1.707-1.707A1 1 0 0 1 8.914 5h6.172a1 1 0 0 1 .707.293L17.5 7H19a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Z"/>
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                  </svg>
                    <span class="ml-4">Layanan Zoom</span>
                </a>
            </li>
        @endif   
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin' || Auth::user()->role == 'opd')
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.layananVPN') || request()->routeIs('opd.layananVPN.create'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.layananVPN') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.layananVPN') }}"
                >
                @elseif (Auth::user()->role == 'opd')
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('opd.layananVPN.create') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('opd.layananVPN.create') }}"
                >
                @endif

                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m10.051 8.102-3.778.322-1.994 1.994a.94.94 0 0 0 .533 1.6l2.698.316m8.39 1.617-.322 3.78-1.994 1.994a.94.94 0 0 1-1.595-.533l-.4-2.652m8.166-11.174a1.366 1.366 0 0 0-1.12-1.12c-1.616-.279-4.906-.623-6.38.853-1.671 1.672-5.211 8.015-6.31 10.023a.932.932 0 0 0 .162 1.111l.828.835.833.832a.932.932 0 0 0 1.111.163c2.008-1.102 8.35-4.642 10.021-6.312 1.475-1.478 1.133-4.77.855-6.385Zm-2.961 3.722a1.88 1.88 0 1 1-3.76 0 1.88 1.88 0 0 1 3.76 0Z"/>
                  </svg>
                  
                    <span class="ml-4">Layanan VPN</span>
                </a>
            </li>
            @endif
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin' || Auth::user()->role == 'opd')            
            <li class="relative px-6 py-3">            
                @if (request()->routeIs('admin.layananSPLP')|| request()->routeIs('opd.layananSPLP.create'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.layananSPLP') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.layananSPLP') }}"
                >
                @elseif (Auth::user()->role == 'opd')
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('opd.layananSPLP.create') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('opd.layananSPLP.create') }}"
                >
            @endif

                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                  </svg>
                  
                    <span class="ml-4">Layanan SPLP</span>
                </a>
            </li>
            @endif
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin' || Auth::user()->role == 'opd')            
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.layananKM')|| request()->routeIs('opd.layananKM.create'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.layananKM') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.layananKM') }}"
                >
                @elseif (Auth::user()->role == 'opd')
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('opd.layananKM.create') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('opd.layananKM.create') }}"
                >
                @endif
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M9 16H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v1M9 12H4m8 8V9h8v11h-8Zm0 0H9m8-4a1 1 0 1 0-2 0 1 1 0 0 0 2 0Z"/>
                  </svg>                  
                    <span class="ml-4">Layanan Konten Multimedia</span>
                </a>
            </li>
            @endif
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin' || Auth::user()->role == 'opd')            
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.layananTTE')|| request()->routeIs('opd.layananTTE.create'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.layananTTE') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.layananTTE') }}"
                >
                @elseif (Auth::user()->role == 'opd')
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('opd.layananTTE.create') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('opd.layananTTE.create') }}"
                >
                @endif
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="1.9" d="M7.111 20A3.111 3.111 0 0 1 4 16.889v-12C4 4.398 4.398 4 4.889 4h4.444a.89.89 0 0 1 .89.889v12A3.111 3.111 0 0 1 7.11 20Zm0 0h12a.889.889 0 0 0 .889-.889v-4.444a.889.889 0 0 0-.889-.89h-4.389a.889.889 0 0 0-.62.253l-3.767 3.665a.933.933 0 0 0-.146.185c-.868 1.433-1.581 1.858-3.078 2.12Zm0-3.556h.009m7.933-10.927 3.143 3.143a.889.889 0 0 1 0 1.257l-7.974 7.974v-8.8l3.574-3.574a.889.889 0 0 1 1.257 0Z"/>
                  </svg>
                    <span class="ml-4">Layanan TTE</span>
                </a>
            </li>
            @endif
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')            
            <li class="relative px-6 py-3">
                @if (request()->routeIs('admin.service'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                        aria-hidden="true"></span>
                @endif
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                <a
                    class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 {{ request()->routeIs('admin.service') ? 'text-gray-800 dark:text-gray-100 font-bold' : 'text-gray-500' }}"
                    href="{{ route('admin.service') }}"
                >
                @endif

                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M9 16H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v1M9 12H4m8 8V9h8v11h-8Zm0 0H9m8-4a1 1 0 1 0-2 0 1 1 0 0 0 2 0Z"/>
                  </svg>                  
                    <span class="ml-4">Services</span>
                </a>
            </li>
            @endif
        </ul>
        @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'superadmin')
        <div class="px-6 my-6">
            <button
                    class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
                Create Users
                <span class="ml-2" aria-hidden="true">+</span>                
            </button>
        </div>
        @endif
        
        
    </div>
</aside>