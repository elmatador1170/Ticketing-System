@extends("base")

@section("title", "Login")

@section("content")
    <div class="form-wrapper">
        <form method="post" action="/login">
            @csrf
            <div class="mb-3 d-flex flex-column p-5 bg-light">
                <div class="mb-3 d-flex flex-column">
                    <label class="block mb-1 uppercase font-bold text-xs text-gray-700"
                           for="email">
                        Email
                    </label>
                    <input class="border rounded p-3"
                           type="email"
                           name="email"
                           id="email"
                           value="demo@demo.com"
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
                           value="demo"
                           required>
                </div>
            </div>

            <button class="mb-5 btn-primary rounded p-3 w-100">
                Log me in
            </button>

            @if ($errors->any())
                <ul id="errors">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </form>

        <a href="/register">
            If you don't have an account yet, you can register here for free!
        </a>
    </div>
@endsection
