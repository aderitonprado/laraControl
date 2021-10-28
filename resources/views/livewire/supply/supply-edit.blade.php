<div>
    <x-slot name="header">
        <h1>Editar Abastecimento</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="container">
            <form name="updateSupply" wire:submit.prevent="updateSupply">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="supply_pump"
                                class="form-control @error('supply_pump') border border-danger @enderror"
                                aria-label="supply_pump" aria-describedby="supply_pump" wire:model="supply_pump">
                                <option value="">Selecione a Bomba</option>
                                <option value="1">1 - Alcool Hidratado</option>
                                <option value="2">Bomba 2</option>
                                <option value="3">Bomba 3</option>
                            </select>
                        </div>

                        @error('supply_pump')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="warehouse"
                                class="form-control @error('warehouse') border border-danger @enderror"
                                aria-label="warehouse" aria-describedby="warehouse" wire:model="warehouse">
                                <option value="">Selecione o Almox</option>
                                <option value="1">Almox 1</option>
                                <option value="2">Almox 2</option>
                                <option value="3">Almox 3</option>
                            </select>
                        </div>
                        @error('warehouse')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="date" name="supply_date"
                                class="form-control @error('supply_date') border border-danger @enderror"
                                placeholder="Data do Abastecimento" aria-label="supply_date"
                                aria-describedby="supply_date" wire:model="supply_date">
                        </div>

                        @error('supply_date')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <!-- LINHA 2 -->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="people_code"
                                class="form-control @error('people_code') border border-danger @enderror"
                                placeholder="Matricula da Pessoa" aria-label="people_code"
                                aria-describedby="people_code" wire:model="people_code">
                        </div>

                        @error('people_code')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="client_type"
                                class="form-control @error('client_type') border border-danger @enderror"
                                aria-label="client_type" aria-describedby="client_type" wire:model="client_type">
                                <option value="">Selecione o Tipo da Frota</option>
                                <option value="1">Proprio</option>
                                <option value="2">Terceiro</option>
                            </select>
                        </div>

                        @error('client_type')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_code" class="form-control" placeholder="Código Veiculo"
                                aria-label="vehicles_code" aria-describedby="vehicles_code"
                                wire:model="vehicles_code">
                        </div>

                        @error('vehicles_code')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <!--- LINHA 3 ---->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_fleet"
                                class="form-control @error('vehicles_fleet') border border-danger @enderror"
                                placeholder="Frota" aria-label="vehicles_fleet" aria-describedby="vehicles_fleet"
                                wire:model="vehicles_fleet">
                        </div>

                        @error('vehicles_fleet')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_last_km"
                                class="form-control @error('vehicles_last_km') border border-danger @enderror"
                                placeholder="KM do Veiculo" aria-label="vehicles_last_km"
                                aria-describedby="vehicles_last_km" wire:model="vehicles_last_km">
                        </div>

                        @error('vehicles_last_km')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_plate"
                                class="form-control @error('vehicles_plate') border border-danger @enderror"
                                placeholder="Placa do Veiculo" aria-label="vehicles_plate"
                                aria-describedby="vehicles_plate" wire:model="vehicles_plate">
                        </div>

                        @error('vehicles_plate')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                </div>

                <!--- LINHA 4 --------------->

                <div class="row mb-3">

                    <div class="col-sm-12">
                        <div class="input-group">
                            <textarea 
                                name="obs"
                                class="form-control"
                                placeholder="Digite sua observação" 
                                aria-label="obs"
                                aria-describedby="obs" 
                                wire:model="obs"
                                rows="3"
                                >
                            </textarea>
                        </div>
                    </div>

                </div>

                <!--- LINHA 5 --------------->
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="end_time">Hora Inicial abast</label>
                            <input type="time" name="start_time"
                                class="form-control @error('start_time') border border-danger @enderror"
                                placeholder="Hora Inicial" aria-label="start_time" aria-describedby="start_time"
                                wire:model="start_time">
                        </div>

                        @error('start_time')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="end_time">Hora Final abast</label>
                            <input type="time" name="end_time"
                                class="form-control @error('end_time') border border-danger @enderror"
                                placeholder="Hora Final" aria-label="end_time" aria-describedby="end_time"
                                wire:model="end_time">

                        </div>

                        @error('end_time')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="hour_meter">Horímetro</label>
                            <input type="number" name="hour_meter"
                                class="form-control @error('hour_meter') border border-danger @enderror"
                                placeholder="Horimetro" aria-label="hour_meter" aria-describedby="hour_meter"
                                wire:model="hour_meter">
                        </div>

                        @error('hour_meter')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <!---- LINHA 6 ---------->
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="number" name="pump_start"
                                class="form-control @error('pump_start') border border-danger @enderror"
                                placeholder="Ínicio da bomba" aria-label="pump_start" aria-describedby="pump_start"
                                wire:model="pump_start">
                        </div>

                        @error('pump_start')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="number" name="pump_end"
                                class="form-control @error('pump_end') border border-danger @enderror"
                                placeholder="Fim da bomba" aria-label="pump_end" aria-describedby="pump_end"
                                wire:model="pump_end" onchange="calculaQtd()">
                        </div>

                        @error('pump_end')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input id="qtd" type="text" name="qtd" class="form-control" placeholder="Quantidade"
                                aria-label="qtd" aria-describedby="qtd" wire:model="qtd" disabled>
                        </div>

                    </div>
                </div>

                <button 
                    type="submit" 
                    class="btn btn-lg btn-pill btn-success"
                    >
                    Atualizar
                </button>
            </form>

        </div>

    </div>


</div>
</div>
</div>

<script>

    function calculaQtd() {

        let form = document.querySelector('form[name=updateSupply]');
        let formData = new FormData(form);

        let pump_start = formData.get('pump_start');
        let pump_end = formData.get('pump_end');

        if (pump_end < pump_start) {
            pump_end = 0; pump_start = 0;
        }

        let qtd = pump_end - pump_start;

        document.getElementById("qtd").value = qtd;

    }

</script>
