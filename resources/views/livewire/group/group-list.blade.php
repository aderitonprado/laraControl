<div class="container">
    <x-slot name="header">
        <h1>Meus Grupos</h1>

        <div class="mt-3 mb-3 ml-auto noprint">
            <a href="{{ route('groups.create') }}" class="btn btn-sm btn-success">Criar Grupo</a>
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
            <div class="search">
                <span>Criado a Partir de:</span>
                <input type="date" wire:model="start_date" class="form-control">
            </div>
        </div>

        <div class="col-sm-3">
            <div class="search">
                <span>Criado Até:</span>
                <input type="date" wire:model="end_date" class="form-control">
            </div>
        </div>
    </div>


    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Grupo</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($groups as $group)

                <tr>
                    <td>{{ $group->id           != null ? $group->id : '' }}</td>
                    <td>{{ $group->description  != null ? $group->description : ''}}</td>
                    <td>{{ $group->created_at   != null ? $group->created_at->format('d-m-Y') : '' }}</td>
                    <td>
                        <a href="{{ route('groups.show', $group->id) }}" class="btn btn-sm btn-info">Ver
                        </a>
                        <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-sm btn-success">Editar
                        </a>
                        <a href="#" wire:click.prevent="remove({{ $group->id }})"
                            class="btn btn-sm btn-danger">Remover</a>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

    <!-- PAGINAÇÃO AQUI ----->
</div>