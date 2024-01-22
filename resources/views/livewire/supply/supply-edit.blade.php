<div class="container">
    <x-slot name="header">
        <h1>Editar Abastecimento</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="">
            <form name="updateSupply" wire:submit.prevent="updateSupply">
                <div class="row mb-3">
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

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="search" name="third_party_code" list="thirdparties"
                                class="form-control @error('third_party_code') border border-danger @enderror"
                                placeholder="Número da Frota" aria-label="third_party_code"
                                aria-describedby="third_party_code" wire:model="third_party_code">
                            <datalist id="thirdparties">
                                @foreach ($thirdparties as $tp)
                                    <option value="{{ $tp->third_party_code }}">{{ $tp->description }}
                                @endforeach
                            </datalist>
                        </div>

                        @error('third_party_code')
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

                </div>

                <!-- LINHA 2 -->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="supply_driver"
                                class="form-control @error('supply_driver') border border-danger @enderror"
                                placeholder="Nome do Motorista" aria-label="supply_driver"
                                aria-describedby="vehicles_driver" wire:model="supply_driver">
                        </div>

                        @error('supply_driver')
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
                            <textarea name="obs" class="form-control" placeholder="Digite sua observação" aria-label="obs"
                                aria-describedby="obs" wire:model="obs" rows="3">
                            </textarea>
                        </div>
                    </div>

                </div>

                <!--- LINHA 5 --------------->
                <div class="row mb-3">
                    <div class="col-sm-3">
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

                    <div class="col-sm-3">
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

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="qtd">Quantidade</label>
                            <input id="qtd" type="text" name="qtd" class="form-control"
                                placeholder="Quantidade" aria-label="qtd" aria-describedby="qtd" wire:model="qtd">
                        </div>

                        @error('qtd')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="pump_price">Preço da Bomba</label>
                            <input type="text" name="pump_price" disabled
                                class="form-control @error('pump_price') border border-danger @enderror"
                                placeholder="R$ 0,00" aria-label="pump_price" aria-describedby="pump_price"
                                wire:model="pump_price">
                        </div>

                        @error('pump_price')
                            <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                </div>

                <!---- LINHA 7 ---------->
                <div class="row mb-4">

                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('supplies.index') }}" class="btn btn-light">Voltar</a>
            </form>

        </div>

    </div>


</div>
</div>
</div>

{{-- <script>
    function calculaQtd() {

        let form = document.querySelector('form[name=updateSupply]');
        let formData = new FormData(form);

        let pump_start = formData.get('pump_start');
        let pump_end = formData.get('pump_end');

        if (pump_end < pump_start) {
            pump_end = 0;
            pump_start = 0;
        }

        let qtd = pump_end - pump_start;

        document.getElementById("qtd").value = qtd;

    }
</script> --}}
