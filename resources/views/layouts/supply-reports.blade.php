<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white">
                    <div class="container">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="container">
                    <h1>Relatório de Abastecimentos</h1>
                
                    <div class="m-3 ml-auto">
                        <a href="#" wire:click="exportPDF()"
                            class="btn btn-info">
                            {{ __('Export PDF') }}
                    </a>
                    </div>
                
                    <div class="">
                            <table style="width: 100%; text-align: left; margin-bottom:40px;">
                                <thead>
                                    <tr style="background-color: #eee; text-align: left;">
                                        <th>Data</th>
                                        <th>Bomba</th>
                                        <th>Frota</th>
                                        <th>Quantidade</th>
                                    </tr>
                                </thead>
                
                                <tbody>
                                    @foreach ($supplies as $item)
                                        <tr>
                                            <td>{{ $item->supply_date->format('d-m-Y') }}</td>
                                            <td>{{ $item->supply_pump }}</td>
                                            <td>{{ $item->vehicles_fleet }}</td>
                                            <td>{{ $item->qtd }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
                
            </main>
        </div>

        <footer class="footer">
            @include('footer')
        </footer>

        @stack('modals')

        @livewireScripts

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
