<div>
    <x-slot name="header">
        <h1>Visualizar Grupo</h1>
    </x-slot>

    <div class="mt-4">

        <div class="container">
            <form name="showGroup">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="description"
                                class="form-control"
                                placeholder="Grupo" aria-label="description"
                                aria-describedby="description" wire:model="description" disabled>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="user_id"
                                class="form-control"
                                placeholder="Usuário" aria-label="user_id"
                                aria-describedby="user_id" wire:model="user_id" disabled>
                        </div>
                    </div>

                </div>

                <a href="{{ route('groups.index') }}" class="btn btn-sm btn-info">Voltar</a>
            </form>

        </div>

    </div>


</div>