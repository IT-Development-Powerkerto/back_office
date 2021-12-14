@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>
    <div class="container">
        <div class="row">
            @foreach ($categories as $c)
            <div class="col-md-4">
                <a href="/blog?category={{ $c->slug }}">
                <div class="card bg-dark text-white mb-3">
                    <img class="card-img" src="https://source.unsplash.com/500x500?{{ $c->name }}" alt="{{ $c->name }}">
                    <div class="card-img-overlay d-flex align-items-center p-0">
                      <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $c->name }}</h5>
                    </div>
                  </div>
                </a>
            </div>   
            @endforeach
        </div>
    </div>

@endsection