<div>
    <x-slot name="header">
        <h1>Mostrar Abastecimento</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="container">
            <form name="createSupply" wire:submit.prevent="">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="date" name="supply_date" disabled class="form-control"
                                placeholder="Data do Abastecimento" aria-label="supply_date"
                                aria-describedby="supply_date" wire:model="supply_date">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="search" name="third_party_code" disabled list="thirdparties"
                                class="form-control" placeholder="Pesquise o Terceiro" aria-label="third_party_code"
                                aria-describedby="third_party_code" wire:model="third_party_name">
                            <datalist id="thirdparties">

                                <option value="{{ $third_party_name }}">{{ $third_party_name }}

                            </datalist>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="client_type" disabled class="form-control" aria-label="client_type"
                                aria-describedby="client_type" wire:model="client_type">
                                <option value="">Selecione o Tipo da Frota</option>
                                <option value="1">Proprio</option>
                                <option value="2">Terceiro</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- LINHA 2 -->

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" name="vehicles_fleet" disabled class="form-control"
                                placeholder="Frota" aria-label="vehicles_fleet" aria-describedby="vehicles_fleet"
                                wire:model="vehicles_fleet">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" name="supply_driver" disabled class="form-control"
                                placeholder="Nome do Motorista" aria-label="supply_driver"
                                aria-describedby="supply_driver" wire:model="supply_driver">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" name="vehicles_last_km" disabled class="form-control"
                                placeholder="KM do Veiculo" aria-label="vehicles_last_km"
                                aria-describedby="vehicles_last_km" wire:model="vehicles_last_km">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" name="vehicles_plate" disabled class="form-control"
                                placeholder="Placa do Veiculo" aria-label="vehicles_plate"
                                aria-describedby="vehicles_plate" wire:model="vehicles_plate">
                        </div>
                    </div>
                </div>

                <!--- LINHA 43 --------------->

                <div class="row mb-3">

                    <div class="col-sm-12">
                        <div class="input-group">
                            <textarea name="obs" class="form-control" disabled placeholder="Digite sua observação" aria-label="obs"
                                aria-describedby="obs" wire:model="obs" rows="3">
                            </textarea>
                        </div>
                    </div>

                </div>

                <!--- LINHA 4 --------------->
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="end_time">Hora Inicial abast</label>
                            <input type="time" name="start_time" disabled class="form-control"
                                placeholder="Hora Inicial" aria-label="start_time" aria-describedby="start_time"
                                wire:model="start_time">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="end_time">Hora Final abast</label>
                            <input type="time" name="end_time" disabled class="form-control"
                                placeholder="Hora Final" aria-label="end_time" aria-describedby="end_time"
                                wire:model="end_time">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="qtd">Quantidade</label>
                            <input id="qtd" type="text" name="qtd" disabled class="form-control"
                                placeholder="Quantidade" aria-label="qtd" aria-describedby="qtd" wire:model="qtd">
                        </div>

                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="pump_price">Preço da Bomba</label>
                            <input type="text" name="pump_price" disabled class="form-control"
                                placeholder="R$ 0,00" aria-label="pump_price" aria-describedby="pump_price"
                                wire:model="pump_price">
                        </div>
                    </div>
                </div>

                <!---- LINHA 5 ---------->
                <div class="row mb-4">


                </div>

                <a href="{{ route('supplies.edit', $supply_id) }}" class="btn btn-sm btn-primary">Editar</a>
                <a href="{{ route('supplies.index') }}" class="btn btn-light">Voltar</a>
            </form>

        </div>

    </div>


</div>
</div>
</div>
