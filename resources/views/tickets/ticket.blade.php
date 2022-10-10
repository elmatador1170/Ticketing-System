@extends("base")

@section("title", "Tickets")

@section("header_data")

@endsection

@section("content")

    <div class="header-wrapper d-flex justify-content-between align-items-center">
        <h3>{{ $ticket->subject }}</h3>
        <a href="#">
            <p>{{ $ticket->area->name }}</p>
        </a>
    </div>
    <hr class="mt-1">
    <div class="short-info">
        <div class="d-flex flex-row mb-2">
            <span>
                Owner:
            </span>
            <a class="ml-2" href="#">
                {{ $ticket->owner->name }}
            </a>
        </div>
        <div class="d-flex flex-row mb-2">
            <span>
                Area:
            </span>
            <a class="ml-2" href="#">
                {{ $ticket->area->name }}
            </a>
        </div>
        <div class="d-flex flex-row mb-2">
            <span>
                Issued:
            </span>
            <span class="ml-2">
                {{ $ticket->created_at }}
            </span>
        </div>
        <div class="d-flex flex-row mb-2">
            <span>
                Updated At:
            </span>
            <span class="ml-2">
                {{ $ticket->updated_at }}
            </span>
        </div>
        <div class="d-flex flex-row mb-2 align-items-center">
            <span>
                Status:
            </span>
            <select class="ml-2 btn btn-sm btn-secondary dropdown-toggle small">
                @foreach($statuses as $status)
                    <option class="dropdown-item">{{ $status }}</option>
                @endforeach
            </select>
            <form class="ml-2" method="post" action="/tickets/update/{{ $ticket->id }}">
                @csrf
                <input type="radio" id="status" name="status" value="Finished" hidden>
                <button class="border text-sm" type="submit">Mark as solved</button>
            </form>
        </div>
        <div class="d-flex flex-row mb-2 align-items-center">
            <span>
                Priority:
            </span>
            <select class="ml-2 btn btn-sm btn-secondary dropdown-toggle small">
                @foreach($priorities as $priority)
                    <option class="dropdown-item">{{ $priority }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="header-wrapper mt-5 d-flex justify-content-between align-items-center">
        <h5>Replies</h5>
        <a href="#">
            <button class="btn-primary rounded">
                New Reply
            </button>
        </a>
        @foreach($ticket->replies as $reply)
            <span>{{ $reply }}</span>
        @endforeach
    </div>


@endsection
