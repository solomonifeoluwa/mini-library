<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowing;

class BookController extends Controller
{
    public function borrow(Request $request)
    {
        $book = Book::findOrFail($request->book_id);

        if (! $book->is_available) {
            return response()->json(['message' => 'Book not available'], 400);
        }

        $book->update(['is_available' => false]);

        Borrowing::create([
            'user_id'     => auth()->id(),
            'book_id'     => $book->id,
            'borrowed_at' => now(),
        ]);

        return response()->json(['message' => 'Book borrowed successfully']);
    }

    public function return(Request $request)
    {
        $borrowing = Borrowing::where('user_id', auth()->id())
                              ->where('book_id', $request->book_id)
                              ->whereNull('returned_at')
                              ->firstOrFail();

        $borrowing->update(['returned_at' => now()]);

        $borrowing->book->update(['is_available' => true]);

        return response()->json(['message' => 'Book returned successfully']);
    }

    public function myBorrows()
    {
        return auth()->user()->borrowings()->with('book')->get();
    }
}
