@extends('layout')

@section('content')
<div class="w-full max-w-md p-8 space-y-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-center text-gray-800">Register</h2>

    @if ($errors->any())
        <div class="text-red-600 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded-md" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Username</label>
            <input type="text" name="username" class="w-full px-4 py-2 border rounded-md" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Password</label>
            <input type="password" name="password" class="w-full px-4 py-2 border rounded-md" required>
        </div>
        <div>
            <label class="block text-sm font-medium">Role</label>
            <select name="role" class="w-full px-4 py-2 border rounded-md" required>
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="manager">Manager</option>
            </select>
        </div>
        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            <i class="fas fa-user-plus mr-2"></i> Register
        </button>
        <p class="text-sm text-center text-gray-600 mt-2">
            Sudah punya akun? <a href="/login" class="text-blue-600 hover:underline">Login di sini</a>
        </p>
    </form>
</div>
@endsection
