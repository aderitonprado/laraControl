<div class="container">
    <x-slot name="header">
        <h1>Minhas Frotas</h1>

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
            <div class="search">
                <span>Descrição</span>
                <input type="search" name="description" class="form-control" placeholder="Pesquise o nome" aria-label="description" aria-describedby="description" wire:model="description">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="type">
                <span>Ativo/Inativo</span>
                <select name="status" id="" wire:model="status" class="form-control">
                    <option value="">Todos</option>
                    <option value="A">Ativos</option>
                    <option value="I">Inativos</option>
                </select>
            </div>
        </div>

        <div class="col-sm-2">
            <div class="search">
                <span>Criado a partir de</span>
                <input type="date" wire:model="start_date" class="form-control">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="search">
                <span>Criado até</span>
                <input type="date" wire:model="end_date" class="form-control">
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-striped table-sm">
        <caption>Lista de Terceiros</caption>
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Cod Terceiro</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Status</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($thirdparties as $third)

                <tr>
                    <th scope="row">{{ $third->id   != null ? $third->id : '' }}</th>
                    <td>{{ $third->description      != null ? $third->description : '' }}</td>
                    <td>{{ $third->third_party_code != null ? $third->third_party_code : '' }}</td>
                    <td>{{ $third->plate            != null ? $third->plate : '' }}</td>
                    <td>{{ $third->status           == 1    ? 'Ativo' : 'Inativo' }}</td>
                    <td>{{ $third->created_at       != null ? $third->created_at->format('d-m-Y') : '' }}</td>
                    <td class="d-flex flex-row" style="justify-content: space-between; max-width: 200px;" role="group" aria-label="Botões de Controle">
                        <a href="{{ route('thirdparties.show', $third->id) }}" class="btn btn-sm btn-light">Ver
                        </a>
                        <a href="{{ route('thirdparties.edit', $third->id) }}" class="btn btn-sm btn-primary">Editar
                        </a>
                        <a href="#" wire:click.prevent="remove({{ $third->id }})" class="btn btn-sm btn-danger">Remover</a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>

    <!-- PAGINAÇÃO AQUI ----->
    {{-- Pagination --}}
    <div class="d-flex justify-content-center">

        {!! $thirdparties->hasPages() ? $thirdparties->links() : ($thirdparties->count() <= 0 ? 'Vixe.. nada aqui!' : '') !!}
        
    </div>
</div>