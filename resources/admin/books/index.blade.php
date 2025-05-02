

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Books</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
        <table class="table mt-4">
            <tr>
                <th>Title</th><th>Author</th><th>Available</th><th>Action</th>
            </tr>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->is_available ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
