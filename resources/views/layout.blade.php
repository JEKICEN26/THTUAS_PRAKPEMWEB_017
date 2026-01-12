<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Pak!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; background-color: #F9FAFB; }</style>
</head>
<body class="text-slate-800">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <a href="/tickets" class="text-lg font-bold tracking-tight text-slate-900 flex items-center gap-2">
                    Lapor Pak!
                </a>

                <div class="flex items-center gap-6">
                    @auth
                        <div class="hidden md:flex flex-col text-right">
                            <span class="text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</span>
                            <span class="text-xs text-slate-500 uppercase tracking-wide">{{ auth()->user()->is_admin ? 'Administrator' : 'Mahasiswa' }}</span>
                        </div>
                        
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="text-sm text-red-600 hover:text-red-700 font-medium transition">
                                Keluar
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4 py-8">
        @yield('content')
    </div>

</body>
</html>