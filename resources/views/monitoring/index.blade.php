@extends('layouts.mercurial')

@section('content')

<script src="{{ asset('js/app.js') }}" defer></script>
<div class="container" id="app">
    <div class="row">
        <div class="col col-lg-12" style="padding-left: 0px; padding-top: 15px;">
        <user-indicator-list />
        </div>
    </div>
</div>

@endsection
