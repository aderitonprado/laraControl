<div>
    <x-slot name="header">
        <h1>Criar Equipamento</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="container">
            <form name="createEquipament" wire:submit.prevent="createEquipament">

                <div class="row mb-3">
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="description"
                                class="form-control @error('equipament.description') border border-danger @enderror"
                                placeholder="Descrição" aria-label="description" aria-describedby="description"
                                wire:model="equipament.description">
                        </div>

                        @error('equipament.description')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="group_id"
                                class="form-control @error('equipament.group_id') border border-danger @enderror"
                                aria-label="group_id" aria-describedby="group_id" wire:model="equipament.group_id">
                                <option value="">Selecione o Grupo</option>
                                
                                @foreach ($grupos as $grupo)
                                    <option value="{{$grupo->id}}">{{$grupo->description}}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('equipament.group_id')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                </div>

                <!--- LINHA 2 ---->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="description_aux"
                                class="form-control @error('equipament.description_aux') border border-danger @enderror"
                                placeholder="Descrição Auxiliar" aria-label="description_aux"
                                aria-describedby="description_aux" wire:model="equipament.description_aux">
                        </div>

                        @error('equipament.description_aux')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="serial"
                                class="form-control @error('equipament.serial') border border-danger @enderror"
                                placeholder="Número de Série" aria-label="serial" aria-describedby="serial"
                                wire:model="equipament.serial">
                        </div>

                        @error('equipament.serial')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="status"
                                class="form-control @error('equipament.status') border border-danger @enderror"
                                aria-label="status" aria-describedby="status" wire:model="equipament.status">
                                <option value="">Selecione o Status</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>

                        @error('equipament.group_id')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                </div>

                <!--- LINHA 3 --------------->

                <div class="row mb-3">

                    <div class="col-sm-12">
                        <div class="input-group">
                            <textarea name="obs" class="form-control" placeholder="Digite sua observação"
                                aria-label="obs" aria-describedby="obs" wire:model="equipament.obs" rows="3">
                            </textarea>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-pill btn-success">
                    Criar Equipamento
                </button>
            </form>

        </div>
    </div>
</div>
