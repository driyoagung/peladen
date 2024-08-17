@extends('layouts.admin')

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit User
    </h2>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
            });
        </script>
    @endif

    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{ isset($user) ? route('superadmin.users.update', $user->id) : route('superadmin.users.store') }}" method="POST">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" name="name" value="{{ old('name', $user->name ?? '') }}" required />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" name="email" value="{{ old('email', $user->email ?? '') }}" required />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-input" name="password" {{ isset($user) ? '' : 'required' }} />
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Role</span>
                <select class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 form-select" name="role" required>
                    @foreach(['superadmin', 'admin', 'opd', 'verifikator'] as $roleOption)
                        <option value="{{ $roleOption }}" {{ old('role', $user->role ?? '') == $roleOption ? 'selected' : '' }}>
                            {{ ucfirst($roleOption) }}
                        </option>
                    @endforeach
                </select>
            </label>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700">
                    {{ isset($user) ? 'Update' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
