@extends("base")

@section("title", "Tickets")

@section("header_data")

@endsection

@section("content")

    <div class="header-wrapper d-flex justify-content-between align-items-center">
        <h3>{{ $ticket->subject }}</h3>
        @if($ticket->owner == auth()->user())
            <form method="post" action="/tickets/delete/{{ $ticket->id }}">
                @csrf
                <button class="btn-error rounded">
                    Delete
                </button>
            </form>
        @endif
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
            @unless ($ticket->status == "Solved")
                <form class="ml-2" method="post" action="/tickets/solve/{{ $ticket->id }}">
                    @csrf
                    <input type="radio" id="status" name="status" value="Solved" hidden>
                    <button class="border text-sm" type="submit">Mark as solved</button>
                </form>
            @else
                <span class="ml-2">
                    Solved
                </span>
            @endunless
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

    <div class="description">
        <div class="header-wrapper mt-5 d-flex flex-column">
            <h5>Description</h5>
            <p>
                {{ $ticket->description }}
            </p>
        </div>
    </div>

    <div class="replies-wrapper">
        <div class="header-wrapper mt-5 d-flex justify-content-between align-items-center">
            <h5>Replies</h5>
            <a href="#">
                <button class="btn-primary rounded" id="new-reply">
                    New Reply
                </button>
            </a>
        </div>
        @unless($replies->isEmpty())
            <div class="mt-3 mb-3">
                @foreach($replies as $reply)
                    <div class="bg-light p-3 mb-2">
                        <small class="border-bottom mb-3">{{ $reply->owner->name }}</small>
                        <p class="mb-0 mt-2">{{ $reply->content }}</p>
                    </div>

                @endforeach
            </div>
        @endunless
        <div class="mt-3 new-reply-wrapper d-none" id="new-reply-box">
            <form method="POST" action="/tickets/{{ $ticket->id }}/replies/store">
                @csrf
                <div class="d-flex flex-column">
                    <label for="content">Create new reply</label>
                    <textarea class="input border" id="reply" name="content">Was passt dir nicht?</textarea>
                </div>
                <button class="btn-primary rounded mt-2">
                    Create
                </button>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function() {
           $("#new-reply").click(function() {
               console.log("HAHAH");
               $("#new-reply-box").removeClass("d-none");
           })
        });
    </script>

@endsection
