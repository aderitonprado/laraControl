<div>
    <x-slot name="header">
        <h1>Cadastrar Frota</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="container">
            <form name="createThirdParty" wire:submit.prevent="createThirdParty">

                <div class="row mb-3">
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="description"
                                class="form-control @error('thirdparty.description') border border-danger @enderror"
                                placeholder="Descrição" aria-label="description" aria-describedby="description"
                                wire:model="thirdparty.description">
                        </div>

                        @error('thirdparty.description')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="status"
                                class="form-control @error('thirdparty.status') border border-danger @enderror"
                                aria-label="status" aria-describedby="status" wire:model="thirdparty.status">
                                <option value="">Selecione o Status</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>

                        @error('thirdparty.status')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                </div>

                <!--- LINHA 2 ---->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="third_party_code"
                                class="form-control @error('thirdparty.third_party_code') border border-danger @enderror"
                                placeholder="Código do Terceiro" aria-label="third_party_code"
                                aria-describedby="third_party_code" wire:model="thirdparty.third_party_code">
                        </div>

                        @error('thirdparty.third_party_code')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="plate"
                                class="form-control @error('thirdparty.plate') border border-danger @enderror"
                                placeholder="Placa" aria-label="plate"
                                aria-describedby="plate" wire:model="thirdparty.plate">
                        </div>

                        @error('thirdparty.plate')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <!--- LINHA 3 --------------->

                <div class="row mb-3">

                    <div class="col-sm-12">
                        <div class="input-group">
                            <textarea name="obs" class="form-control" placeholder="Digite sua observação" aria-label="obs"
                                aria-describedby="obs" wire:model="thirdparty.obs" rows="3">
                            </textarea>
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('thirdparties.index') }}" class="btn btn-light">Voltar</a>
            </form>

        </div>
    </div>
</div>
