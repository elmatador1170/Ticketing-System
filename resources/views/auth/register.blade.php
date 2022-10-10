@extends("base")

@section("title", "Register")

@section("content")
    <div class="form-wrapper">
        <form method="post" action="/register">
            @csrf
            <div class="mb-3 d-flex flex-column p-5 bg-light">
                <div class="mb-3 d-flex flex-column">
                    <label class="block mb-1 uppercase font-bold text-xs text-gray-700"
                           for="name">
                        Name
                    </label>
                    <input class="border rounded p-3"
                           type="text"
                           name="name"
                           id="name"
                           required
                    >
                </div>

                <div class="mb-3 d-flex flex-column">
                    <label class="block mb-1 uppercase font-bold text-xs text-gray-700"
                           for="email">
                        Email
                    </label>
                    <input class="border rounded p-3"
                           type="email"
                           name="email"
                           id="email"
                           required>
                </div>

                <div class="mb-3 d-flex flex-column">
                    <label class="block mb-1 uppercase font-bold text-xs text-gray-700"
                           for="password">
                        Password
                    </label>
                    <input class="border rounded p-3"
                           type="password"
                           name="password"
                           id="password"
                           required>
                </div>
            </div>

            <button class="mb-5 btn-primary rounded p-3 w-100">
                Register Me
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
