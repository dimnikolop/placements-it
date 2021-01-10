@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card custom-main-card">
        <div class="card-body">
            @if ($announcements->isNotEmpty())
                <div class="table-responsive">
                    <table id="announcementsTable" class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Προστέθηκε</th>
                                <th scope="col">Τίτλος</th>
                                <th scope="col">Επισύναψη</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                                <tr>
                                    <td>{{ $announcement->created_at->format('d/m/Y H:i') }}</td>
                                    <td><a href="{{ route('announcement.show', $announcement->id) }}" target="_blank">{{ $announcement->title }}</a></td>
                                    <td>
                                        @if (Storage::disk('public')->exists($announcement->attachment))
                                            <a href="{{ Storage::url($announcement->attachment) }}" target="_blank">Προβολή</a>
                                            <a href="{{ route('announcements.download.file', $announcement->id) }}">Download</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1 class="display-4 text-center">No announcements found.</h1>
            @endif
        </div>
    </div>
</div>
@endsection