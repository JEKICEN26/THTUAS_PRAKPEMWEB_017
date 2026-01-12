@extends('layout')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    
    <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-xl border border-slate-200 p-8 shadow-sm">
            <div class="flex justify-between items-start mb-6">
                <h1 class="text-2xl font-bold text-slate-900">{{ $ticket->title }}</h1>
                @if($ticket->status == 'pending')
                    <span class="bg-amber-50 text-amber-700 border border-amber-100 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>
                @elseif($ticket->status == 'in_progress')
                    <span class="bg-blue-50 text-blue-700 border border-blue-100 px-3 py-1 rounded-full text-xs font-semibold">Proses</span>
                @else
                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-100 px-3 py-1 rounded-full text-xs font-semibold">Selesai</span>
                @endif
            </div>

            <div class="flex gap-6 text-sm text-slate-500 mb-8 border-b border-slate-100 pb-6">
                <div>
                    <span class="block text-xs uppercase text-slate-400 font-semibold mb-1">Pelapor</span>
                    {{ $ticket->user->name }}
                </div>
                <div>
                    <span class="block text-xs uppercase text-slate-400 font-semibold mb-1">Lokasi</span>
                    {{ $ticket->location }}
                </div>
                <div>
                    <span class="block text-xs uppercase text-slate-400 font-semibold mb-1">Kategori</span>
                    {{ $ticket->category->name }}
                </div>
            </div>

            <div class="prose prose-slate max-w-none text-slate-700 text-sm leading-relaxed">
                {{ $ticket->description }}
            </div>

            @if($ticket->image_path)
                <div class="mt-8">
                    <span class="text-xs font-semibold text-slate-900 block mb-3">Lampiran Foto</span>
                    <img src="{{ asset('storage/' . $ticket->image_path) }}" class="rounded-lg border border-slate-200 max-h-96 w-full object-cover bg-slate-50">
                </div>
            @endif
        </div>
    </div>

    <div class="space-y-6">
        
        @if(auth()->user()->is_admin)
        <div class="bg-slate-900 text-white rounded-xl p-6 shadow-md">
            <h3 class="font-semibold text-sm mb-4 text-slate-200">Update Status</h3>
            <form action="{{ route('tickets.status.update', $ticket->id) }}" method="POST" class="flex gap-2">
                @csrf @method('PATCH')
                <select name="status" class="flex-1 bg-slate-800 border-none text-sm rounded-lg focus:ring-1 focus:ring-slate-500 text-white">
                    <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>Proses</option>
                    <option value="resolved" {{ $ticket->status == 'resolved' ? 'selected' : '' }}>Selesai</option>
                </select>
                <button class="bg-white text-slate-900 hover:bg-slate-100 px-4 py-2 rounded-lg text-sm font-medium transition">
                    Simpan
                </button>
            </form>
        </div>
        @endif

        <div class="bg-white rounded-xl border border-slate-200 flex flex-col h-125 shadow-sm">
            <div class="p-4 border-b border-slate-100 font-semibold text-sm text-slate-800 bg-slate-50/50 rounded-t-xl">
                Diskusi
            </div>
            
            <div class="flex-1 p-4 overflow-y-auto space-y-4">
                @forelse($ticket->comments as $c)
                    <div class="flex flex-col {{ $c->user->is_admin ? 'items-end' : 'items-start' }}">
                        <div class="max-w-[85%] px-4 py-3 text-sm rounded-2xl 
                            {{ $c->user->is_admin 
                                ? 'bg-slate-900 text-white rounded-tr-sm' 
                                : 'bg-slate-100 text-slate-800 rounded-tl-sm' }}">
                            <p>{{ $c->message }}</p>
                        </div>
                        <span class="text-[10px] text-slate-400 mt-1 px-1">
                            {{ $c->user->name }} • {{ $c->created_at->format('H:i') }}
                        </span>
                    </div>
                @empty
                    <div class="h-full flex flex-col items-center justify-center text-slate-400 text-sm">
                        <span>Belum ada pesan</span>
                    </div>
                @endforelse
            </div>

            <div class="p-3 border-t border-slate-100">
                <form action="{{ route('tickets.comments.store', $ticket->id) }}" method="POST" class="flex gap-2">
                    @csrf
                    <input type="text" name="message" class="flex-1 rounded-lg border-slate-200 bg-slate-50 text-sm focus:ring-2 focus:ring-slate-900 focus:border-transparent px-4 py-2.5" placeholder="Tulis pesan..." required>
                    <button class="bg-slate-900 hover:bg-slate-800 text-white rounded-lg px-4 py-2 text-sm font-medium transition">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection