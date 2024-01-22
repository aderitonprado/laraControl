<div class="container">
    <x-slot name="header">
        <h1 class="title">Meus Abastecimentos</h1>

        <div class="mt-3 mb-3 ml-auto noprint">
            <a href="{{ route('supplies.create') }}" class="btn btn-sm btn-success">Novo</a>
            <a href="{{ route('supplies.reports') }}" class="btn btn-sm btn-info">Relatorios</a>
        </div>
    </x-slot>

    @include('includes.message')

    <div class="row mb-3 noprint">

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
                <span>Frota</span>
                <input type="search" name="fleet" class="form-control @error('fleet') border border-danger @enderror"
                    placeholder="Pesquise a frota" aria-label="fleet" aria-describedby="fleet" wire:model="fleet">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="search">
                <span>Placa</span>
                <input type="search" name="vehicles_plate"
                    class="form-control @error('vehicles_plate') border border-danger @enderror"
                    placeholder="Pesquise a Placa" aria-label="vehicles_plate" aria-describedby="vehicles_plate"
                    wire:model="vehicles_plate">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="search">
                <span>Buscar</span>
                <input type="date" wire:model="start_date" class="form-control">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="search">
                <span>Buscar</span>
                <input type="date" wire:model="end_date" class="form-control">
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <caption>Lista de abastecimentos</caption>
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data</th>
                    <th scope="col">Frota</th>
                    <th scope="col">Num. Frota</th>
                    <th scope="col">Placa</th>
                    <th scope="col">KM</th>
                    <th scope="col">QTD</th>
                    <th scope="col">R$</th>
                    <th scope="col">Valor Total</th>
                    <th scope="col" style="max-width: 200px;">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($supplies as $sup)
                    <tr>
                        <th scope="row">{{ $sup->id }}</th>
                        <td>{{ (new DateTime($sup->supply_date))->format('d/m/Y') }}</td>
                        <td>{{ $sup->description }}</td>
                        <td>{{ $sup->third_party_code }}</td>
                        <td>{{ $sup->vehicles_plate }}</td>
                        <td>{{ $sup->vehicles_last_km }}</td>
                        <td>{{ $sup->qtd }}</td>
                        <td>R$ {{ number_format($sup->pump_price, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($sup->pump_total_price, 2, ',', '.') }}</td>
                        <td class="d-flex flex-row" style="justify-content: space-between; max-width: 200px;"
                            role="group" aria-label="Botões de Controle">
                            <a href="{{ route('supplies.show', $sup->id) }}" class="btn btn-sm btn-outline-success">Ver
                            </a>
                            <a href="{{ route('supplies.edit', $sup->id) }}" class="btn btn-sm btn-primary">Editar
                            </a>
                            <a href="#" wire:click.prevent="remove({{ $sup->id }})"
                                class="btn btn-sm btn-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- PAGINAÇÃO AQUI ----->
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">

        {!! $supplies->hasPages() ? $supplies->links() : ($supplies->count() <= 0 ? 'Vixe.. nada aqui!' : '') !!}

    </div>

</div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
