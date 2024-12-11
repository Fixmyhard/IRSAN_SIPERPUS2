<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class BorrowingController extends Controller
{
    public function index()
{
    $borrowings = Borrowing::with('user', 'book')->paginate(5); 
    return view('borrowings.index', compact('borrowings'));
}


    public function create()
    {
        // Ambil semua buku yang tersedia untuk dipinjam
        $books = Book::whereDoesntHave('borrowings', function ($query) {
            $query->whereNull('returned_at');
        })->get();

        // Tampilkan ke view borrowings.create
        return view('borrowings.create', compact('books'));
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'due_date' => 'required|date',
        ]);

        
        Borrowing::create([
            'user_id' => Auth::id(), 
            'book_id' => $request->book_id,
            'borrowed_at' => now(),
            'due_date' => $request->due_date,
        ]);

        
        return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dipinjam!');
    }

  

    public function returnBook($id)
{
    // Temukan peminjaman berdasarkan ID
    $borrowing = Borrowing::findOrFail($id);

    // Hapus data peminjaman
    $borrowing->delete();

    return redirect()->route('borrowings.index')->with('success', 'Buku berhasil dikembalikan!');
}

}
