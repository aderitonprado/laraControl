<div class="mb-4">
    <x-slot name="header">
        <h1>Criar Grupo</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="container">
            <form name="createGroup" wire:submit.prevent="createGroup">
                <div class="row mb-5">
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="description"
                                class="form-control @error('description') border border-danger @enderror"
                                placeholder="Descrição do grupo" aria-label="description"
                                aria-describedby="description" wire:model="description">
                        </div>

                        @error('description')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <button 
                    type="submit" 
                    class="btn btn-pill btn-success"
                    >
                    Criar Grupo
                </button>
            </form>

        </div>

    </div>


</div>