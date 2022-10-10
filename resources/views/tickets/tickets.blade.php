@extends("base")

@section("title", "Tickets")

@section("header_data")

@endsection

@section("content")
    <table class="w-100 border">
        <tr class="border-bottom bg-primary text-light">
            <th class="p-3 border-right">Subject</th>
            <th class="p-3 border-right">Owner</th>
            <th class="p-3 border-right">Issued</th>
            <th class="p-3 border-right">Area</th>
            <th class="p-3 border-right">Status</th>
            <th class="p-3 border-right">Priority</th>
        </tr>
        @foreach($tickets as $ticket)
            <tr class="border-bottom">
                <th class="p-3 border-right">
                    <a href="/tickets/{{ $ticket->id }}">
                        {{ $ticket->subject }}
                    </a>
                </th>
                <th class="p-3 border-right">{{ $ticket->owner->name }}</th>
                <th class="p-3 border-right">{{ $ticket->created_at }}</th>
                <th class="p-3 border-right">{{ $ticket->area->name }}</th>
                <th class="p-3 border-right">{{ $ticket->status }}</th>
                <th class="p-3">{{ $ticket->priority }}</th>
            </tr>
        @endforeach
    </table>
@endsection
