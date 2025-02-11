

@extends('layout.layout')
@section('title', 'Terms')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">

            <h1>Terms</h1>
            <div>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis sint non nobis quae. Tempora aperiam nesciunt corrupti eius dolores animi excepturi unde, tempore voluptas dignissimos.
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')

        </div>
    </div>
@endsection
