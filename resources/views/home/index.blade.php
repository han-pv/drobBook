@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="h3 fw-bold text-primary mt-5">
            Categories
        </div>
        <div class="row row-cols-6 g-3 mt-2">
            @foreach ($categories as $category)
                <div class="col">
                    <div class="card p-2">
                        <div class="h4">{{ $category->name }}
                            <span class="btn btn-outline-primary small">{{ $category->books_count }}</span>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection