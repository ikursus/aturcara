@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-warning">
                                <th colspan="2">Your notifications (unread)</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach (Auth::user()->unreadNotifications as $notification) 
                            <tr>
                                <td>
                                    {{ $notification->data['nama_peserta'] }} 
                                    telah didaftarkan untuk menyertai program 
                                    {{ $notification->data['nama_program'] }}
                                </td>
                                <td>
                                    <a href="{{ route('notifications.read', $notification->id) }}" class="btn btn-sm btn-primary">Mark as Read</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    <table class="table table-bordered">
                        <thead>
                            <tr class="table-success">
                                <th>Your notifications (read)</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach (Auth::user()->notifications->where('read_at', '!=', null) as $notification) 
                            <tr>
                                <td>
                                    {{ $notification->data['nama_peserta'] }} 
                                    telah didaftarkan untuk menyertai program 
                                    {{ $notification->data['nama_program'] }}
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td>
                                {!! Form::open(['route' => 'notifications.destroy']) !!}
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block">Delete all notifications</a>
                                {!! Form::close() !!}
                                </td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
