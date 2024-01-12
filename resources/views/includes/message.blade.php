@if (session()->has('message'))

    <div>
        <div class="bg-success text-white p-2 rounded mb-3">
            <h5 class="text-center">{{ session('message') }}</h5>
        </div>
    </div>

@endif