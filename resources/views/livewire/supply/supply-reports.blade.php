<div class="container">
    <x-slot name="header">
        <h1>Relatório de Abastecimentos</h1>

        <div class="mt-3 mb-3 ml-auto noprint d-print-none">
            <a href="#" onclick="window.print();" class="btn btn-info">Imprimir</a>
        </div>
    </x-slot>

    <div class="row mb-3 noprint d-print-none">
        <div class="col-sm-2">
            <div class="type">
                <span>Carregar</span>
                <select name="type" id="" wire:model="take" class="form-control">
                    <option value="">Todos</option>
                    <option value="2">2 Por páginas</option>
                    <option value="10">10 Por páginas</option>
                    <option value="30">30 Por Páginas</option>
                </select>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="type">
                <span>Tipo</span>
                <select name="type" id="" wire:model="type" class="form-control">
                    <option value="">Selecione</option>
                    <option value="1">Proprio</option>
                    <option value="2">Terceiro</option>
                </select>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="search">
                <span>Terceiro</span>
                <input type="search" name="third_party_code" list="thirdparties"
                    class="form-control @error('third_party_code') border border-danger @enderror"
                    placeholder="Pesquise o Terceiro" aria-label="third_party_code" aria-describedby="third_party_code"
                    wire:model="third_party_code">
                <datalist id="thirdparties">
                    @foreach ($thirdparties as $tp)
                        <option value="{{ $tp->third_party_code }}">{{ $tp->description }}
                    @endforeach
                </datalist>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="search">
                <span>Frota</span>
                <input type="search" name="fleet" class="form-control @error('fleet') border border-danger @enderror"
                    placeholder="Pesquise a frota" aria-label="fleet" aria-describedby="fleet" wire:model="fleet">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="search">
                <span>Data de Inicio</span>
                <input type="date" wire:model="start_date" class="form-control">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="search">
                <span>Data Fim</span>
                <input type="date" wire:model.debounce.500ms="end_date" class="form-control">
            </div>
        </div>
    </div>

    <hr>

    <table style="width: 100%; text-align: left; margin-bottom:40px;">

        @foreach ($totais as $tt)
            <caption class="bg-light p-1"><strong>{{$tt}}</strong></caption>
        @endforeach

        <thead>
            <tr style="background-color: #eee; text-align: left;">
                <th>Data</th>
                <th>Hora</th>
                <th>Terceiro</th>
                <th>Frota</th>
                <th>KM</th>
                <th>Quant</th>
                <th>R$ Unit</th>
                <th>R$ Total</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($supplies as $item)
                <tr>
                    <td>{{ (new DateTime($item->supply_date))->format('d-m-Y') }}</td>
                    <td>{{ (new DateTime($item->start_time))->format('H:m') }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->vehicles_fleet }}</td>
                    <td>{{ $item->vehicles_last_km }}</td>
                    <td>{{ $item->qtd }}</td>
                    <td>{{ number_format($item->pump_price, 2, ',', '.') }}</td>
                    <td>{{ number_format($item->pump_total_price, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

</div>
