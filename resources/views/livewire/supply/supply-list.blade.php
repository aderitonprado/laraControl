<div class="container">
    <x-slot name="header">
        <h1>Meus Abastecimentos</h1>

        <div class="mt-3 mb-3 ml-auto noprint">
            <a href="{{ route('supplies.create') }}" class="btn btn-sm btn-success">Criar Registro</a>
            <a href="{{ route('supplies.reports') }}" class="btn btn-sm btn-info">Relatorios</a>
        </div>
    </x-slot>

    <div class="row mb-3 noprint">

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


    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Data</th>
                <th>Bomba</th>
                <th>QTD</th>
                <th>Frota</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($supplies as $sup)

                <tr>
                    <td>{{ $sup->id }}</td>
                    <td>{{ $sup->supply_date->format('d-m-Y') }}</td>
                    <td>{{ $sup->supply_pump }}</td>
                    <td>{{ $sup->qtd }}</td>
                    <td>{{ $sup->vehicles_fleet }}</td>
                    <td>
                        <a href="{{ route('supplies.show', $sup->id) }}" class="btn btn-sm btn-info">Ver
                        </a>
                        <a href="{{ route('supplies.edit', $sup->id) }}" class="btn btn-sm btn-success">Editar
                        </a>
                        <a href="#" wire:click.prevent="remove({{ $sup->id }})"
                            class="btn btn-sm btn-danger">Remover</a>

                        <!-- Button trigger modal
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Launch demo modal
                                </button>

                                -->
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

    <!-- PAGINAÇÃO AQUI ----->
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
