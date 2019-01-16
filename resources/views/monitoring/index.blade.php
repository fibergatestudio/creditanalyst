@extends('layouts.mercurial')

@section('content')

<script src="{{ asset('js/app.js') }}" defer></script>
<div class="container" id="app">
    <div class="row">
        <div class="col col-lg-3" style="padding-left: 0px; padding-top: 15px;">
        <user-indicator-list />
        </div>
        <div class="col col-lg-9">
        </div>
    </div>
</div>

@endsection
