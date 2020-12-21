@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>{{ $announcement->title }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text">{!! nl2br(e($announcement->content)) !!}</p>
        </div>
        <div class="card-footer text-muted text-right">
            {{ $announcement->created_at->diffForHumans() }}
        </div>
    </div>
</div>
@endsection