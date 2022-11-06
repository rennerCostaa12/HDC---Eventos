@extends('layouts.main')

@section('title', "{{ $event->title }}")

@section('content')
    <div>
        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">

        <h1>{{ $event->title }}</h1>
        <p>{{ $event->description }}</p>
        <p>{{ count($event->users) }} participantes</p>
        <p>{{ $eventOwner['name'] }}</p>
        <span>Cidade: {{ $event->city }}</span>
        @if (!$hasUserJoined)
            <form action="/events/join/{{ $event->id }}" action="POST">
                @csrf
                <a href="/events/join/{{ $event->id }}">
                    Confirmar presença
                </a>
            </form>
        @else
            <p>Você já está participando deste evento!</p>
        @endif

        <div>
            <ul>
                @foreach ($event->items as $items)
                    <li>{{ $items }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
