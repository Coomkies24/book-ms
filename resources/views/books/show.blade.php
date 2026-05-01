@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h3 class="mb-0">Book Details</h3>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <tr>
                            <th width="200">Book Code</th>
                            <td>{{ $book->book_code }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $book->title }}</td>
                        </tr>
                        <tr>
                            <th>Author</th>
                            <td>{{ $book->author }}</td>
                        </tr>
                        <tr>
                            <th>Genre</th>
                            <td>{{ $book->genre }}</td>
                        </tr>
                        <tr>
                            <th>Published Year</th>
                            <td>{{ $book->published_year }}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{ $book->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                        <tr>
                            <th>Updated At</th>
                            <td>{{ $book->updated_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            Back to List
                        </a>

                        <div>
                            @can('update', $book)
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning text-white">
                                    Edit
                                </a>
                            @endcan

                            @can('delete', $book)
                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this book?')">
                                        Delete
                                    </button>
                                </form>
                            @endcan
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection