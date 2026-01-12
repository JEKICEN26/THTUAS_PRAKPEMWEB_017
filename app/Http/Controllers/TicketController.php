<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin) {
            $tickets = Ticket::with('category', 'user')->latest()->get();
        } else {
            $tickets = Ticket::where('user_id', auth()->id())->latest()->get();
        }
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tickets.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', 
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tickets', 'public');
        }

        Ticket::create([
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'image_path' => $imagePath,
            'status' => 'pending', 
        ]);

        return redirect()->route('tickets.index');
    }

    // Detail tiket & Diskusi
    public function show(Ticket $ticket)
    {
        // Cek hak akses
        if (!auth()->user()->is_admin && $ticket->user_id != auth()->id()) {
            abort(403);
        }
        return view('tickets.show', compact('ticket'));
    }

    // Update Status (Khusus Admin) [cite: 31]
    public function updateStatus(Request $request, Ticket $ticket)
    {
        if (!auth()->user()->is_admin) abort(403);
        
        $ticket->update(['status' => $request->status]);
        return back();
    }

    // Kirim Komentar [cite: 26]
    public function storeComment(Request $request, Ticket $ticket)
    {
        Comment::create([
            'ticket_id' => $ticket->id,
            'user_id' => auth()->id(),
            'message' => $request->message
        ]);
        return back();
    }
}