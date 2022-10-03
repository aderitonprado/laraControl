<div>
    <x-slot name="header">
        <h1>Requisição de Equipamentos</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4 mb-5">

        <div class="container">
            <form name="createEquipament" wire:submit.prevent="createEquipament">

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" name="description"
                                class="form-control @error('equipament.description') border border-danger @enderror"
                                placeholder="Descrição" aria-label="description" aria-describedby="description"
                                wire:model="equipament.description">
                        </div>
                    </div>

                    <div class="col-sm-5"></div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="date" class="form-control" disabled value="{{ Date('d-m-Y') }}" />
                        </div>

                        @error('equipament.group_id')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                </div>

                <!--- LINHA 2 --------------->

                <div class="row mb-3">

                    <div class="col-sm-12">
                        <div class="input-group">
                            <textarea name="obs" class="form-control" placeholder="Digite sua observação"
                                aria-label="obs" aria-describedby="obs" wire:model="equipament.obs" rows="3">
                            </textarea>
                        </div>
                    </div>

                </div>

                <!--  LINHA 3 -------------->
                <div class="row mb-3">
                    <div class="text-center">
                        <h4><a href="#">Adicionar Produto</a></h4>
                    </div>
                </div>

                <!-- LINHA 4 ---------------->
                <div class="row mb-3">
                    <div class="">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Produto Requisitado</td>
                                    <td>Ação</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>RADIO MOTOROLA EP 450 - SN: 123456789</td>
                                    <td><a class="text-danger" href="#">Remover</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>BASE PARA RADIO MOTOROLA EP 450 - SN: 123456789</td>
                                    <td><a class="text-danger" href="#">Remover</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>FONTE 12V PARA RADIO MOTOROLA EP 450 - SN: 123456789</td>
                                    <td><a class="text-danger" href="#">Remover</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--  LINHA 5 -------------->
                <div class="row mb-3">
                    <div class="text-center">
                        <h4><a href="#">Adicionar Funcionário</a></h4>
                    </div>
                </div>

                <!--  LINHA 6 -------------->

                <div class="row mb-3">
                    <div class="">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Funcionário Requisitante</td>
                                    <td>Matricula</td>
                                    <td>CPF</td>
                                    <td>Ação</td>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>RAFAEL DOS SANTOS NEVES</td>
                                    <td>12345</td>
                                    <td>12345678900</td>
                                    <td><a class="text-danger" href="#">Remover</a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>RAFAEL DOS SANTOS NEVES</td>
                                    <td>12345</td>
                                    <td>12345678900</td>
                                    <td><a class="text-danger" href="#">Remover</a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>RAFAEL DOS SANTOS NEVES</td>
                                    <td>12345</td>
                                    <td>12345678900</td>
                                    <td><a class="text-danger" href="#">Remover</a></td>
                                </tr>     
                            </tbody>
                        </table>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
                <a href="{{route('requisitions.index')}}" class="btn btn-light">Voltar</a>
            </form>

        </div>
    </div>
</div>
