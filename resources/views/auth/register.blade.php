<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar - Lapor Pak!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-sm bg-white p-8 rounded-xl shadow-sm border border-slate-100">
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-slate-900">Buat Akun</h1>
            <p class="text-slate-500 text-sm mt-1">Daftar untuk membuat laporan</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1 uppercase tracking-wide">Nama Lengkap</label>
                <input type="text" name="name" class="w-full px-3 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-slate-800 outline-none text-sm" required>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1 uppercase tracking-wide">Email Kampus</label>
                <input type="email" name="email" class="w-full px-3 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-slate-800 outline-none text-sm" required>
            </div>
            
            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1 uppercase tracking-wide">Password</label>
                <input type="password" name="password" class="w-full px-3 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-slate-800 outline-none text-sm" required>
            </div>

            <div>
                <label class="block text-xs font-medium text-slate-700 mb-1 uppercase tracking-wide">Ulangi Password</label>
                <input type="password" name="password_confirmation" class="w-full px-3 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-slate-800 outline-none text-sm" required>
            </div>
            
            <button class="w-full bg-slate-900 hover:bg-slate-800 text-white font-medium py-2.5 rounded-lg transition text-sm mt-2">
                Daftar Sekarang
            </button>
        </form>

        <div class="mt-6 text-center text-sm text-slate-500">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-slate-900 font-semibold hover:underline">Masuk</a>
        </div>
    </div>

</body>
</html>