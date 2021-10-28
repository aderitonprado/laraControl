@if (session()->has('message'))

    <div class="container">
        <div class="bg-info text-white p-2">
            <h5>{{ session('message') }}</h5>
        </div>
    </div>

@endif
