@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
    <h1>Busque um evento</h1>

    <form action="/" method="GET">
        <input type="text" id="search" name="search" placeholder="Procure por um evento" autocomplete="off">
    </form>

    <div id="events-container">
        @if($search)
            <h1>Você está buscando por: {{$search}}</h1>
        @else
            <h1>Próximos Eventos</h1>
            <p>Veja os eventos dos próximos dias</p>
        @endif

        <div id="cards-container">
            @foreach ($events as $event)
       
                <div>
                    <img src="/img/events/{{$event->image}}" alt="{{ $event->title }}">
                    <div>
                        <p>{{date('d/m/Y', strtotime($event->date))}}</p>
                        <h5>{{$event->title}}</h5>
                        <p>{{ count($event->users)}} participantes</p>
                        <a href="/events/{{$event->id}}">Saber mais</a>
                    </div>
                </div>
            @endforeach

            @if(count($events) === 0 && $search)
                <p>Não foi possível encontrar nenhum evento com o nome: {{$search}}</p>
                <a href="/">Voltar</a>
            @elseif(count($events) === 0)
                <p>Não há eventos disponíveis</p>
            @endif
        </div>
    </div>
@endsection