<div>
    <x-slot name="header">
        <h1>Ver Equipamento</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="container">
            <form name="showEquipament">

                <div class="row mb-3">
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="description" disabled
                                class="form-control"
                                placeholder="Descrição" aria-label="description" aria-describedby="description"
                                wire:model="equipaments.description">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="group_id" disabled
                                class="form-control"
                                aria-label="group_id" aria-describedby="group_id" wire:model="equipaments.group_id">
                                <option value="">Selecione o Grupo</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{$grupo->id}}">{{$grupo->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <!--- LINHA 2 ---->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="description_aux" disabled
                                class="form-control"
                                placeholder="Descrição Auxiliar" aria-label="description_aux"
                                aria-describedby="description_aux" wire:model="equipaments.description_aux">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="serial" disabled
                                class="form-control"
                                placeholder="Número de Série" aria-label="serial" aria-describedby="serial"
                                wire:model="equipaments.serial">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="status" disabled
                                class="form-control"
                                aria-label="status" aria-describedby="status" wire:model="equipaments.status">
                                <option value="">Selecione o Status</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!--- LINHA 3 --------------->

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <textarea name="obs" class="form-control" placeholder="Digite sua observação"
                                aria-label="obs" aria-describedby="obs" wire:model="equipaments.obs" rows="3" disabled>
                            </textarea>
                        </div>
                    </div>

                </div>

                <a href="{{route('equipaments.index')}}" class="btn btn-pill btn-info">
                    Voltar
                </a>
            </form>

        </div>
    </div>
</div>
