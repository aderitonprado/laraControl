<div class="container">
    <x-slot name="header">
        <h1>Meus Terceiros</h1>

        <div class="mt-3 mb-3 ml-auto noprint">
            <a href="{{ route('thirdparties.create') }}" class="btn btn-sm btn-success">Novo</a>
        </div>

        @include('includes.message')
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
                <span>Ativo/Inativo</span>
                <select name="status" id="" wire:model="status" class="form-control">
                    <option value="">Todos</option>
                    <option value="A">Ativos</option>
                    <option value="I">Inativos</option>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="search">
                <span>Criado a partir de</span>
                <input type="date" wire:model="start_date" class="form-control">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="search">
                <span>Criado até</span>
                <input type="date" wire:model="end_date" class="form-control">
            </div>
        </div>
    </div>


    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Cod Terceiro</th>
                <th>Obs</th>
                <th>Status</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($thirdparties as $third)

                <tr>
                    <td>{{ $third->id           != null ? $third->id : '' }}</td>
                    <td>{{ $third->description  != null ? $third->description : '' }}</td>
                    <td>{{ $third->third_party_code       != null ? $third->third_party_code : '' }}</td>
                    <td>{{ $third->obs          != null ? $third->obs : '' }}</td>
                    <td>{{ $third->status       == 1    ? 'Ativo' : 'Inativo' }}</td>
                    <td>{{ $third->created_at   != null ? $third->created_at->format('d-m-Y') : '' }}</td>
                    <td>
                        <a href="{{ route('thirdparties.show', $third->id) }}" class="btn btn-sm btn-light">Ver
                        </a>
                        <a href="{{ route('thirdparties.edit', $third->id) }}" class="btn btn-sm btn-primary">Editar
                        </a>
                        <a href="#" wire:click.prevent="remove({{ $third->id }})"
                            class="btn btn-sm btn-danger">Remover</a>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

    <!-- PAGINAÇÃO AQUI ----->
</div>
