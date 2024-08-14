<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Login</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/logo_suarakarta.png') }}" type="image/x-icon" />
    <!-- Roboto font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <!-- awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                fontFamily: {
                    sans: ['Roboto', 'sans-serif'],
                    body: ['Roboto', 'sans-serif'],
                    mono: ['ui-monospace', 'monospace'],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };

        function togglePassword(fieldId, iconId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);
            if (field && icon) {
                const isPassword = field.type === 'password';
                field.type = isPassword ? 'text' : 'password';
                icon.classList.toggle('fa-eye', !isPassword);
                icon.classList.toggle('fa-eye-slash', isPassword);
            }
        }

        function validateInput(inputId, warningId) {
            const input = document.getElementById(inputId);
            const warning = document.getElementById(warningId);
            if (!input.value) {
                warning.classList.remove('hidden');
            } else {
                warning.classList.add('hidden');
            }
        }
    </script>
    <!-- TW Elements CSS -->
    <link rel="stylesheet" href="{{ asset('css/tw-elements.min.css') }}" />
    <!-- Custom styles -->
    <style></style>
</head>
<body class="font-semibold">
<div class="flex items-center min-h-screen bg-slate-100">
    <div class="container mx-auto p-5 flex flex-col md:flex-row justify-center md:justify-between space-y-6 md:space-y-0 md:space-x-6">
        <!-- Left Image -->
        <div class="hidden md:block ml-0 md:ml-28">
            <img src="{{ asset('assets/img/side-login.png') }}" alt="Left Image" class="max-w-md h-full" />
        </div>
        <!-- Right Form -->
        <div class="w-full max-w-full md:max-w-xl md:w-1/2 px-3">
            <div class="flex flex-col rounded-lg border py-8 px-5 md:py-16 md:px-10 shadow-xl bg-slate-50">
                <div class="flex items-center space-x-4 border-b pb-4 mx-4 md:mx-8 border-gray-400">
                    <img src="{{ asset('assets/img/logo_suarakarta.png') }}" alt="Logo" class="w-12 h-12 md:w-16 md:h-16" />
                    <a href="/">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-700">PELADEN</h1>
                            <p class="text-sm md:text-base text-gray-500">Pengelolaan Layanan Administrasi Sistem Elektronik Pemda Surakarta</p>
                        </div>
                    </a>
                    


                </div>

                <div class="mt-6 mx-4 md:mx-8">
                    <x-auth-session-status class="mb-4" :status="session('status')"/>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <h1 class="text-lg md:text-xl text-gray-900">Login</h1>
                    <h3 class="font-normal text-sm md:text-base text-gray-500">Masukkan Informasi Dibawah Ini</h3>
                    <form method="POST" action="{{ route('login') }}" onsubmit="return validateForm()">
                        @csrf
                        <div class="relative mt-4 w-full">
                            <input
                                type="text"
                                id="email"
                                name="email"
                                onblur="validateInput('email', 'emailWarning')"
                                class="peer block w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-2.5 pb-2.5 pt-4 text-sm text-gray-900 focus:border-green-600 focus:outline-none focus:ring-0"
                                placeholder=" "
                                value="{{ old('email') }}"
                                required
                            />
                            <label
                                for="email"
                                class="absolute top-2 left-1 z-10 origin-[0] -translate-y-4 scale-75 transform cursor-text select-none bg-slate-50 px-2 text-sm text-gray-500 duration-300 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:scale-100 peer-focus:top-2 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:px-2 peer-focus:text-green-600"
                            >
                                Email
                            </label>
                        </div>
                        <p id="emailWarning" class="text-red-600 text-xs ml-2 mt-1 hidden">Form belum diisi</p>
                        <div class="relative mt-6 w-full">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                onblur="validateInput('password', 'passwordWarning')"
                                class="peer block w-full appearance-none rounded-lg border border-gray-300 bg-transparent px-2.5 pb-2.5 pt-4 text-sm text-gray-900 focus:border-green-600 focus:outline-none focus:ring-0"
                                placeholder=" "
                                required
                            />
                            <label
                                for="password"
                                class="absolute top-2 left-1 z-10 origin-[0] -translate-y-4 scale-75 transform cursor-text select-none bg-slate-50 px-2 text-sm text-gray-500 duration-300 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:scale-100 peer-focus:top-2 peer-focus:-translate-y-4 peer-focus:scale-75 peer-focus:px-2 peer-focus:text-green-600"
                            >
                                Password
                            </label>
                            <i class="fa fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer" id="togglePasswordIcon" onclick="togglePassword('password', 'togglePasswordIcon')"></i>
                        </div>
                        <p id="passwordWarning" class="text-red-600 text-xs ml-2 mt-1 hidden">Form belum diisi</p>
                        
                        <button
                            type="submit"
                            data-twe-ripple-init
                            data-twe-ripple-color="light"
                            class="w-full mt-6 rounded-lg bg-success px-6 pb-2 pt-2.5 font-bold leading-normal text-white shadow-success-3 transition duration-150 ease-in-out hover:bg-success-accent-300 hover:shadow-success-2 focus:bg-success-accent-300 focus:shadow-success-2 focus:outline-none focus:ring-0 active:bg-success-600 active:shadow-success-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                        >
                            Login
                        </button>
                        
                        <div class="text-center mt-4 px-5">
                            <p class="text-sm md:text-base text-gray-500">Belum punya akun? <a href="#" class="text-blue-600">Hubungi Kami</a></p>
                        </div>
                        
            </div>
        </div>
    </div>
</div>
<!-- TW Elements JS -->
<script type="text/javascript" src="{{ asset('js/tw-elements.umd.min.js') }}"></script>
<script>
    function validateForm() {
        let isValid = true;
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const emailWarning = document.getElementById('emailWarning');
        const passwordWarning = document.getElementById('passwordWarning');

        if (!email.value) {
            emailWarning.classList.remove('hidden');
            isValid = false;
        } else {
            emailWarning.classList.add('hidden');
        }

        if (!password.value) {
            passwordWarning.classList.remove('hidden');
            isValid = false;
        } else {
            passwordWarning.classList.add('hidden');
        }

        return isValid;
    }
</script>
</body>
</html>
