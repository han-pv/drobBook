@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="h3 fw-bold text-primary mt-5">
            Categories:
            <span class="typed h3 text-dark" data-typed-items="
                                @foreach ($categories as $category) 
                                    {{ $category->name . ', ' }}
                                @endforeach
                                ">
            </span>
            <span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span>
            <script>
                const selectTyped = document.querySelector('.typed');
                if (selectTyped) {
                    let typed_strings = selectTyped.getAttribute('data-typed-items');
                    typed_strings = typed_strings.split(',');
                    new Typed('.typed', {
                        strings: typed_strings,
                        loop: true,
                        typeSpeed: 100,
                        backSpeed: 50,
                        backDelay: 2000
                    });
                }
            </script>

        </div>

        <div class="h3 fw-bold text-primary mt-5">
            Books
        </div>
        <div class="row mb-5">
            <div class="col-3">
                <form action="{{ route('books.index') }}" method="get" class="me-3">

                    <label class="form-label" for="q">Search: </label><br>
                    <input class="form-control" type="text" name="q" id="q" placeholder="search..."
                        value="{{ $f_q ? $f_q : ''}}">

                    <label for="category" class="form-label mt-3">Category: </label><br>
                    <select class="form-select" name="categoryId" id="category">
                        <option value="">-</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $f_category == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <label for="publisher" class="form-label mt-3">publisher: </label><br>
                    <select class="form-select" name="publisherId" id="publisher">
                        <option value="">-</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                        @endforeach
                    </select>
                    <label for="year" class="form-label mt-3">year: </label><br>
                    <select class="form-select" name="yearId" id="year">
                        <option value="">-</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->id }}">{{ $year->name }}</option>
                        @endforeach
                    </select>

                    <div class="d-flex mt-4">
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary ms-2 w-100">Reset</a>
                    </div>
                </form>
            </div>
            <div class="col-9">
                <div class="row row-cols-4 g-3">
                    @foreach ($books as $book)
                        <div class="col">
                            <div class="border rounded-3 h-100 p-4">
                                <div class="h5">
                                    <span class="fw-bold">Title: </span> {{ $book->title }}
                                </div>
                                <div class="text-primary">
                                    <span class="fw-bold">Category: </span> {{ $book->category->name}}
                                </div>
                                <div class="text-secondary small">
                                    <span class="fw-bold">Author: </span> {{ $book->author->name}}
                                </div>
                                <div class="text-secondary small">
                                    <span class="fw-bold">Created At: </span> {{ $book->created_at}}
                                </div>
                                <div class="text-secondary small">
                                    <span class="fw-bold">Price: </span> {{ $book->price}} TMT
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    {{ $books->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection