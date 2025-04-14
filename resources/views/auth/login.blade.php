@extends('layout')

@section('content')
<div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>

    @if ($errors->any())
    <div class="text-red-600 text-sm text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>* {{ $error }} *</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('login') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium">Username</label>
            <input type="text" name="username" class="w-full px-4 py-2 border rounded-md" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Password</label>
            <input type="password" name="password" class="w-full px-4 py-2 border rounded-md" required>
        </div>
        <button type="submit" class="w-full py-2 bg-green-600 text-white rounded hover:bg-green-700">
            <i class="fas fa-sign-in-alt mr-2"></i> Login
        </button>
        <p class="text-sm text-center text-gray-600 mt-2">
            Belum punya akun? <a href="/register" class="text-blue-600 hover:underline">Daftar di sini</a>
        </p>
    </form>
</div>
@endsection
