<div>
    <x-slot name="header">
        <h1>Editar Terceiro</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="container">
            <form name="updateThirdParty" wire:submit.prevent="updateThirdParty">

                <div class="row mb-3">
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="description"
                                class="form-control @error('thirdparties.description') border border-danger @enderror"
                                placeholder="Descrição" aria-label="description" aria-describedby="description"
                                wire:model="thirdparties.description">
                        </div>

                        @error('description')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-2">
                        <div class="input-group">
                            <select name="status"
                                class="form-control @error('thirdparties.status') border border-danger @enderror"
                                aria-label="status" aria-describedby="status" wire:model="thirdparties.status">
                                <option value="">Selecione o Status</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>

                        @error('thirdparties.status')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                    

                </div>

                <!--- LINHA 2 ---->

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <input type="text" name="description_aux"
                                class="form-control @error('thirdparties.description_aux') border border-danger @enderror"
                                placeholder="Descrição Auxiliar" aria-label="description_aux"
                                aria-describedby="description_aux" wire:model="thirdparties.description_aux">
                        </div>

                        @error('thirdparties.description_aux')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="third_party_code"
                                class="form-control @error('thirdparties.third_party_code') border border-danger @enderror"
                                placeholder="Código do Terceiro" aria-label="third_party_code" aria-describedby="third_party_code"
                                wire:model="thirdparties.third_party_code">
                        </div>

                        @error('thirdparties.third_party_code')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                </div>

                <!--- LINHA 3 --------------->

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <textarea name="obs" class="form-control" placeholder="Digite sua observação"
                                aria-label="obs" aria-describedby="obs" wire:model="thirdparties.obs" rows="3">
                            </textarea>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{route('thirdparties.index')}}" class="btn btn-light">Voltar</a>
            </form>

        </div>
    </div>
</div>
