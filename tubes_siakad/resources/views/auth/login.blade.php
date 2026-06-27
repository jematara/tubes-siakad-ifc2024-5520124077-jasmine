<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Akademik</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-100 font-sans flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-200">
        <div class="text-center mb-8">
            <h2 class="text-2xl font-black text-slate-800 tracking-tight">SIAKAD</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan masuk untuk mengakses dashboard akademis Anda</p>
        </div>
        @if(session('success'))
            <div class="mb-5 p-3.5 bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-semibold rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="mb-5 p-3.5 bg-rose-50 border border-rose-200 text-rose-800 text-xs font-medium rounded-lg">
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-3 outline-none transition" placeholder="nama@kampus.ac.id" required autofocus>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">Kata Sandi</label>
                <input type="password" name="password" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-3 outline-none transition" placeholder="••••••••" required>
            </div>
            <div class="flex items-center">
                <input id="remember" type="checkbox" name="remember" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-indigo-500 focus:ring-2">
                <label for="remember" class="ms-2 text-xs font-medium text-gray-600 select-none">Ingat akun saya di perangkat ini</label>
            </div>
            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-xl text-sm shadow-md shadow-indigo-600/10 transition duration-200 cursor-pointer">
                Masuk ke Sistem
            </button>
        </form>
    </div>
</body>
</html>