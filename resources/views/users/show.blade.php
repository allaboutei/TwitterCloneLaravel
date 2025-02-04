@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">

            <h4> Share yours ideas </h4>
            @include('shared.success-message')

            <hr>

            <div class="mt-3">

                @include('shared.user-card')

            </div>


        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
