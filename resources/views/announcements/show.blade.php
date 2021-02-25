@extends('layouts.app')

@section('title', $announcement->title)

@section('content')
<div class="container">
    <div class="card custom-main-card">
        <div class="card-header">
            <h5>{{ $announcement->title }}</h5>
        </div>
        <div class="card-body">
            <p class="card-text mb-3">{!! $announcement->content !!}</p>

            @if (Storage::disk('public')->exists($announcement->attachment))
                <div class="pt-3">
                    <span class="font-weight-bold">Επισύναψη:</span> 
                    <a href="{{ Storage::url($announcement->attachment) }}" target="_blank">{{ Str::of($announcement->attachment)->after('_') }}</a>
                </div>
            @endif
        </div>
        <div class="card-footer text-muted text-right">
            {{ $announcement->created_at->diffForHumans() }}
        </div>
    </div>
</div>
@endsection