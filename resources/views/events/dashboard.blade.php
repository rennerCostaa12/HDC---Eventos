@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div>
        <h1>Meus Eventos</h1>
    </div>

    <div>
        @if (count($events) > 0)
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Participantes</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <th>{{ $event->id }}</th>
                            <th> <a href="/events/{{ $event->id }}">{{ $event->title }}</a></th>
                            <td>
                                {{ count($event->users) }}
                            </td>
                            <td>
                                <a href="/events/edit/{{ $event->id }}">Editar</a>
                                <form action="/events/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não tem eventos, <a href="/events/create">criar evento</a></p>
        @endif
    </div>

    <div>
        <h1>Eventos que estou participando</h1>
    </div>
    <div>
        @if (count($eventsasparticipant) > 0)
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Participantes</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventsasparticipant as $event)
                        <tr>
                            <th>{{ $event->id }}</th>
                            <th> <a href="/events/{{ $event->id }}">{{ $event->title }}</a></th>
                            <td>
                                {{ count($event->users) }}
                            </td>
                            <td>
                                <form action="/events/leave/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Sair do evento</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Você ainda não está participando de nenhum evento, <a href="/">Veja todos os eventos</a></p>
        @endif
    </div>


@endsection
