@extends('layout')

@section('content')
<div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4">
    <div>
        <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Laporan Saya</h2>
        <p class="text-slate-500 text-sm mt-1">Daftar riwayat pengaduan fasilitas.</p>
    </div>
    <a href="{{ route('tickets.create') }}" class="bg-slate-900 hover:bg-slate-800 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition shadow-sm">
        + Buat Laporan
    </a>
</div>

<div class="bg-white rounded-xl border border-slate-200 overflow-hidden shadow-sm">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-semibold">
                <th class="px-6 py-4">Judul & Lokasi</th>
                <th class="px-6 py-4">Kategori</th>
                <th class="px-6 py-4">Status</th>
                <th class="px-6 py-4 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
            @forelse($tickets as $ticket)
            <tr class="hover:bg-slate-50/50 transition group">
                <td class="px-6 py-4">
                    <div class="font-medium text-slate-900">{{ $ticket->title }}</div>
                    <div class="text-xs text-slate-400 mt-0.5">{{ $ticket->location }}</div>
                </td>
                <td class="px-6 py-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-600 border border-slate-200">
                        {{ $ticket->category->name }}
                    </span>
                </td>
                <td class="px-6 py-4">
                    @if($ticket->status == 'pending')
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                        </span>
                    @elseif($ticket->status == 'in_progress')
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Proses
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Selesai
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="{{ route('tickets.show', $ticket->id) }}" class="text-slate-400 hover:text-slate-900 font-medium text-sm transition">
                        Detail &rarr;
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-12 text-center text-slate-400 text-sm">
                    Belum ada laporan yang dibuat.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection