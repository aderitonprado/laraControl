<div>
    <x-slot name="header">
        <h1>Editar Abastecimento</h1>
    </x-slot>

    <div class="mt-4">

        <div class="container">
            <form name="showSupply">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="supply_pump"
                                class="form-control"
                                placeholder="Bomba" aria-label="supply_pump"
                                aria-describedby="supply_pump" wire:model="supply_pump" disabled>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="warehouse" disabled
                                class="form-control"
                                aria-label="warehouse" aria-describedby="warehouse" wire:model="warehouse">
                                <option value="">Selecione o Almox</option>
                                <option value="1">Almox 1</option>
                                <option value="2">Almox 2</option>
                                <option value="3">Almox 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="date" name="supply_date" disabled
                                class="form-control"
                                placeholder="Data do Abastecimento" aria-label="supply_date"
                                aria-describedby="supply_date" wire:model="supply_date">
                        </div>
                    </div>
                </div>

                <!-- LINHA 2 -->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="people_code" disabled
                                class="form-control"
                                placeholder="Matricula da Pessoa" aria-label="people_code"
                                aria-describedby="people_code" wire:model="people_code">
                        </div>

                        @error('people_code')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="client_type" disabled
                                class="form-control"
                                aria-label="client_type" aria-describedby="client_type" wire:model="client_type">
                                <option value="">Selecione o Tipo da Frota</option>
                                <option value="1">Proprio</option>
                                <option value="2">Terceiro</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_code" disabled class="form-control" placeholder="Código Veiculo"
                                aria-label="vehicles_code" aria-describedby="vehicles_code"
                                wire:model="vehicles_code">
                        </div>
                    </div>
                </div>

                <!--- LINHA 3 ---->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_fleet" disabled
                                class="form-control"
                                placeholder="Frota" aria-label="vehicles_fleet" aria-describedby="vehicles_fleet"
                                wire:model="vehicles_fleet">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_last_km" disabled
                                class="form-control"
                                placeholder="KM do Veiculo" aria-label="vehicles_last_km"
                                aria-describedby="vehicles_last_km" wire:model="vehicles_last_km">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_plate" disabled
                                class="form-control"
                                placeholder="Placa do Veiculo" aria-label="vehicles_plate"
                                aria-describedby="vehicles_plate" wire:model="vehicles_plate">
                        </div>
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
                                disabled
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
                            <input type="time" name="start_time" disabled
                                class="form-control"
                                placeholder="Hora Inicial" aria-label="start_time" aria-describedby="start_time"
                                wire:model="start_time">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="end_time">Hora Final abast</label>
                            <input type="time" name="end_time" disabled
                                class="form-control"
                                placeholder="Hora Final" aria-label="end_time" aria-describedby="end_time"
                                wire:model="end_time">

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="hour_meter">Horímetro</label>
                            <input type="number" name="hour_meter" disabled
                                class="form-control"
                                placeholder="Horimetro" aria-label="hour_meter" aria-describedby="hour_meter"
                                wire:model="hour_meter">
                        </div>
                    </div>
                </div>

                <!---- LINHA 6 ---------->
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="number" name="pump_start" disabled
                                class="form-control"
                                placeholder="Ínicio da bomba" aria-label="pump_start" aria-describedby="pump_start"
                                wire:model="pump_start">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="number" name="pump_end" disabled
                                class="form-control"
                                placeholder="Fim da bomba" aria-label="pump_end" aria-describedby="pump_end"
                                wire:model="pump_end" onchange="calculaQtd()">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input id="qtd" type="text" name="qtd" class="form-control" placeholder="Quantidade"
                                aria-label="qtd" aria-describedby="qtd" wire:model="qtd" disabled>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-pill btn-success">Atualizar</button>
                <a href="{{ route('supplies.edit', $supply_id) }}" class="btn btn-lg btn-warning">Editar</a>
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
