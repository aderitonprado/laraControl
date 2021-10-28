<div class="container">
    <h1>Relatório de Abastecimentos</h1>

    <div class="m-3 ml-auto">
        <a href="#" wire:click="exportPDF()" class="btn btn-info">
            {{ __('Export PDF') }}
        </a>
    </div>

    <div class="row mb-3">
        <div class="col-sm-3">
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

        <div class="col-sm-3">
            <div class="type">
                <span>Tipo</span>
                <select name="type" id="" wire:model="type" class="form-control">
                    <option value="">Selecione</option>
                    <option value="1">Bomba 1</option>
                    <option value="2">Bomba 2</option>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="search">
                <span>Buscar</span>
                <input type="date" wire:model="start_date" class="form-control">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="search">
                <span>Buscar</span>
                <input type="date" wire:model="end_date" class="form-control">
            </div>
        </div>
    </div>


    <div class="row">
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
