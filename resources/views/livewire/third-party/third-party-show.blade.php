<div>
    <x-slot name="header">
        <h1>Ver Frota</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="container">
            <form name="showThirdParty">

                <div class="row mb-3">
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="text" name="description" disabled class="form-control" placeholder="Descrição"
                                aria-label="description" aria-describedby="description"
                                wire:model="thirdparties.description">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="status" disabled class="form-control" aria-label="status"
                                aria-describedby="status" wire:model="thirdparties.status">
                                <option value="">Selecione o Status</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!--- LINHA 2 ---->
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="third_party_code" disabled class="form-control"
                                placeholder="Codigo do terceiro" aria-label="third_party_code"
                                aria-describedby="third_party_code" wire:model="thirdparties.third_party_code">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="plate" disabled class="form-control" placeholder="Placa"
                                aria-label="plate" aria-describedby="plate" wire:model="thirdparties.plate">
                        </div>
                    </div>
                </div>

                <!--- LINHA 3 --------------->

                <div class="row mb-3">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <textarea name="obs" class="form-control" placeholder="Digite sua observação" aria-label="obs"
                                aria-describedby="obs" wire:model="thirdparties.obs" rows="3" disabled>
                            </textarea>
                        </div>
                    </div>

                </div>

                <a href="{{ route('thirdparties.index') }}" class="btn btn-pill btn-info">
                    Voltar
                </a>
            </form>

        </div>
    </div>
</div>
