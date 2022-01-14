<div class="container">
    <x-slot name="header">
        <h1>Meus Equipamentos</h1>

        <div class="mt-3 mb-3 ml-auto noprint">
            <a href="{{ route('equipaments.create') }}" class="btn btn-sm btn-success">Criar Registro</a>
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
                <th>Grupo</th>
                <th>Serial</th>
                <th>Status</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($equipaments as $equip)

                <tr>
                    <td>{{ $equip->id           != null ? $equip->id : '' }}</td>
                    <td>{{ $equip->description  != null ? $equip->description : '' }}</td>
                    <td>{{ $equip->group_id     != null ? $equip->group_id : '' }}</td>
                    <td>{{ $equip->serial       != null ? $equip->serial : '' }}</td>
                    <td>{{ $equip->status       == 1    ? 'Ativo' : 'Inativo' }}</td>
                    <td>{{ $equip->created_at   != null ? $equip->created_at->format('d-m-Y') : '' }}</td>
                    <td>
                        <a href="{{ route('equipaments.show', $equip->id) }}" class="btn btn-sm btn-info">Ver
                        </a>
                        <a href="{{ route('equipaments.edit', $equip->id) }}" class="btn btn-sm btn-success">Editar
                        </a>
                        <a href="#" wire:click.prevent="remove({{ $equip->id }})"
                            class="btn btn-sm btn-danger">Remover</a>
                    </td>
                </tr>

            @endforeach

        </tbody>
    </table>

    <!-- PAGINAÇÃO AQUI ----->
</div>
