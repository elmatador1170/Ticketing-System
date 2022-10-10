@extends("base")

@section("title", "Create Ticket")

@section("header_data")

@endsection

@section("content")
    <div class="header-wrapper mb-5">
        <h3>New Ticket</h3>
    </div>
    <div class="form-wrapper">
        <form method="post" action="/tickets">
            @csrf
            <div class="mb-3 d-flex flex-column">
                <div class="mb-3 d-flex flex-column">
                    <label class="block mb-1 uppercase font-bold text-xs text-gray-700"
                           for="subject">
                        Subject
                    </label>
                    <input class="border rounded p-3"
                           type="text"
                           name="subject"
                           id="subject"
                           required
                    >
                </div>

                <div class="mb-3 d-flex flex-column">
                    <label class="block mb-1 uppercase font-bold text-xs text-gray-700"
                           for="description">
                        Description
                    </label>
                    <textarea class="border rounded p-3"
                           name="description"
                           id="description"
                           required></textarea>
                </div>

                <div class="mb-3 d-flex flex-column">
                    <label class="block mb-1 uppercase font-bold text-xs text-gray-700"
                           for="area_id">
                        Area
                    </label>
                    <select class="border rounded p-3"
                            name="area_id"
                            id="area_id"
                            required
                    >
                        @foreach($areas as $area)
                            <option class="option" value="{{ $area->id }}">
                                {{ $area->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3 d-flex flex-column">
                    <label class="block mb-1 uppercase font-bold text-xs text-gray-700"
                           for="priority">
                        Priority
                    </label>
                    <select class="border rounded p-3"
                            name="priority"
                            id="priority"
                            required
                    >
                        @foreach($priorities as $priority)
                            <option class="option" value="{{ $priority }}">
                                {{ $priority }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button class="mb-5 btn-primary rounded p-3">
                Create Ticket
            </button>

            @if ($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>
    </div>
@endsection
