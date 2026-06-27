<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-sans antialiased text-gray-900">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-slate-800 text-white flex flex-col shadow-lg">
            <div class="p-5 text-xl font-bold border-b border-slate-700 tracking-wide text-indigo-400">
                SIAKAD WEB II
            </div>
            <nav class="flex-1 p-4 space-y-2">
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2.5 rounded-lg hover:bg-slate-700 transition">Dashboard</a>
                    <a href="{{ route('dosen.index') }}" class="block px-4 py-2.5 rounded-lg hover:bg-slate-700 transition">Data Dosen</a>
                    <a href="{{ route('mahasiswa.index') }}" class="block px-4 py-2.5 rounded-lg hover:bg-slate-700 transition">Data Mahasiswa</a>
                    <a href="{{ route('matakuliah.index') }}" class="block px-4 py-2.5 rounded-lg hover:bg-slate-700 transition">Data Mata Kuliah</a>
                    <a href="{{ route('jadwal.index') }}" class="block px-4 py-2.5 rounded-lg hover:bg-slate-700 transition">Manajemen Jadwal</a>
                @else
                    <a href="{{ route('krs.index') }}" class="block px-4 py-2.5 rounded-lg hover:bg-slate-700 transition">Kartu Rencana Studi (KRS)</a>
                @endif
            </nav>
            <div class="p-4 border-t border-slate-700">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-red-400 hover:bg-slate-700 rounded-lg transition font-semibold">
                        Logout
                    </button>
                </form>
            </div>
        </aside>
        <main class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white border-b border-gray-200 px-8 py-4 flex justify-between items-center shadow-xs">
                <h1 class="text-xl font-semibold text-gray-700">@yield('page_title', 'Halaman Utama')</h1>
                <div class="text-sm font-medium text-gray-600 bg-gray-100 px-3 py-1.5 rounded-full">
                    Masuk sebagai: <span class="text-indigo-600 font-bold uppercase">{{ Auth::user()->role }}</span> ({{ Auth::user()->name }})
                </div>
            </header>
            <div class="flex-1 overflow-x-hidden overflow-y-auto p-8">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-emerald-100 border-l-4 border-emerald-500 text-emerald-800 rounded-r-lg shadow-xs font-medium">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error') || $errors->any())
                    <div class="mb-6 p-4 bg-rose-100 border-l-4 border-rose-500 text-rose-800 rounded-r-lg shadow-xs font-medium">
                        <ul class="list-disc list-inside">
                            @if(session('error')) <li>{{ session('error') }}</li> @endif
                            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>