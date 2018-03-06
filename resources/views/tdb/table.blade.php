@extends('layouts.app') @section('content')
<h1>Attendance Table</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Alter</th>
            <th>Name</th>
            @foreach($data['events'] as $event)
            <th class="text-center">
                {{ 'EID: '.$event->id }}
                <br>
                <mark>{{$event->type }}</mark>
                <br>
                {{ 'Date: '.$event->prettyDate() }}
                <br>
                {{ 'Time: '.$event->datetime }}
                <br>
                {{ 'Ort: '.$event->location }}
            </th>
            @endforeach
        </tr>
    </thead>

    <tbody>
        @foreach($data['users'] as $user)
        <tr>
            <td>{{$user->age().' Jahre'}}</td>
            <td>{{ $user->fullName() }}</td>
            @foreach($user['all_events']->all() as $user_event)            
                <td class="text-center">
                    {{ $user_event['attendance']['status_id'] }}
                </td>
            @endforeach
        </tr>
        @endforeach
    </tbody>


</table>





@endsection