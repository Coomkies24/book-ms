@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-header">
                    <h3 class="mb-0">Edit Book</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Book Code</label>
                            <input type="text" class="form-control" name="book_code"
                                   value="{{ old('book_code', $book->book_code) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title"
                                   value="{{ old('title', $book->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <input type="text" class="form-control" name="author"
                                   value="{{ old('author', $book->author) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Genre</label>
                            <input type="text" class="form-control" name="genre"
                                   value="{{ old('genre', $book->genre) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Published Year</label>
                            <input
                                type="number"
                                class="form-control"
                                name="published_year"
                                min="1850"
                                max="{{ date('Y') }}"
                                value="{{ old('published_year', $book->published_year) }}"
                                placeholder="e.g. 2020"
                                required>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Book</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection