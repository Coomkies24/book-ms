@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <div class="row mb-4">
        <div class="col">
            <h1 style="color: #4a3b32;">Books List</h1>
        </div>

        <div class="col text-end">
            @can('create', App\Models\Book::class)
                <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
            @endcan
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card shadow-sm border-0" style="background-color: #fdfbf7;">
        <div class="card-body">
            <table class="table table-hover" style="background-color: transparent;">
                <thead style="border-bottom: 2px solid #8b7355;">
                    <tr>
                        <th>Book Code</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Published Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td>{{ $book->book_code }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->published_year }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info text-white">View</a>

                            @can('update', $book)
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                            @endcan

                            @can('delete', $book)
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No books found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center mt-3">
                {{ $books->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

</div>
@endsection