@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="card">
        <div class="card-body">
          @foreach(auth()->user()->unreadNotifications as $notification)
            ID:{{$notification->data['id']}} - Type:{{$notification->data['type']}}
            <a href="/markAsRead" style="color:green"> Mark All As Read</a>
          @endforeach
        </div>
      </div>
    </div>
</div>

@endsection