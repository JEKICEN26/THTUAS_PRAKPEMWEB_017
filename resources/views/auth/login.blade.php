<!DOCTYPE html>
<html lang="id">
<head>
    <title>Masuk - Lapor Pak!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-sm bg-white p-8 rounded-xl shadow-sm border border-slate-100">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-slate-900">Lapor Pak!</h1>
            <p class="text-slate-500 text-sm mt-1">Silakan masuk ke akun Anda</p>
        </div>

        <form action="{{ url('/login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1 uppercase tracking-wide">Email</label>
                <input type="email" name="email" class="w-full px-3 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-slate-800 focus:border-transparent outline-none transition text-sm" placeholder="nama@kampus.ac.id" required>
            </div>
            
            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1 uppercase tracking-wide">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-slate-800 focus:border-transparent outline-none transition text-sm" placeholder="••••••••" required>
            </div>
            
            <button class="w-full bg-slate-900 hover:bg-slate-800 text-white font-medium py-2.5 rounded-lg transition text-sm">
                Masuk Aplikasi
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-slate-500">
            Belum punya akun? <a href="{{ route('register') }}" class="text-slate-900 font-semibold hover:underline">Daftar</a>
        </div>
        
        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <a href="/login-admin" class="text-xs text-slate-400 hover:text-slate-600 transition">
                Masuk sebagai Admin (Demo)
            </a>
        </div>
    </div>

</body>
</html>