@extends('layouts.app')

@section('title', 'Profil Petugas')

@section('content')
    <h1>Profil Petugas</h1>

    {{-- Alert jika password berhasil diubah --}}
    @if (session('success'))
        <div style="padding: 10px; background-color: #dcfce3; color: #166534; border: 1px solid #bbf7d0; border-radius: 4px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom: 30px;">
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ ucfirst($user->role ?? 'Petugas') }}</p>
    </div>

    <hr>

    <h2>Ganti Password</h2>
    <form action="{{ route('profil.password.update') }}" method="POST" style="max-width: 400px;">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="current_password" style="display:block; font-weight:bold;">Password Lama</label>
            <input type="password" name="current_password" id="current_password" required style="width: 100%; padding: 8px;">
            @error('current_password')
                <div style="color: red; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display:block; font-weight:bold;">Password Baru</label>
            <input type="password" name="password" id="password" required style="width: 100%; padding: 8px;">
            @error('password')
                <div style="color: red; font-size: 14px; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display:block; font-weight:bold;">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required style="width: 100%; padding: 8px;">
        </div>

        {{-- CHECKBOX UNTUK MELIHAT PASSWORD --}}
        <div style="margin-bottom: 20px; display: flex; align-items: center; gap: 8px;">
            <input type="checkbox" id="showPassword" onclick="togglePassword()" style="cursor: pointer;">
            <label for="showPassword" style="cursor: pointer; font-size: 14px;">Tampilkan Password</label>
        </div>

        <button type="submit" style="padding: 10px 15px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer;">
            Simpan Password Baru
        </button>
    </form>

    {{-- SCRIPT JAVASCRIPT --}}
    <script>
        function togglePassword() {
            const currentPass = document.getElementById('current_password');
            const newPass = document.getElementById('password');
            const confirmPass = document.getElementById('password_confirmation');
            const checkbox = document.getElementById('showPassword');

            const type = checkbox.checked ? 'text' : 'password';
            
            currentPass.type = type;
            newPass.type = type;
            confirmPass.type = type;
        }
    </script>
@endsection