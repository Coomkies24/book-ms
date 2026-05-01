@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                
                <div class="card-header text-center py-4">
                    <h2 class="mb-0">Welcome to the Vintage Library</h2>
                </div>

                <div class="card-body text-center p-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="mb-4">Greetings, {{ Auth::user()->name }}!</h4>
                    
                    <p class="mb-5" style="font-size: 1.2rem;">
                        We are delighted to have you in our archives. What would you like to explore today?
                    </p>

                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg px-4">
                            Browse the Collection
                        </a>

                        @can('create', App\Models\Book::class)
                            <a href="{{ route('books.create') }}" class="btn btn-warning btn-lg px-4 text-white">
                                Add a New Book
                            </a>
                        @endcan
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection