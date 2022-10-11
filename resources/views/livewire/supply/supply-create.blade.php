<div>
    <x-slot name="header">
        <h1>Criar Abastecimento</h1>
    </x-slot>

    @include('includes.message')

    <div class="mt-4">

        <div class="container">
            <form name="createSupply" wire:submit.prevent="createSupply">
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="supply_pump" class="form-control @error('supply.supply_pump') border border-danger @enderror" aria-label="supply_pump" aria-describedby="supply_pump" wire:model="supply.supply_pump">
                                <option value="1">1 - Alcool Hidratado</option>
                            </select>
                        </div>

                        @error('supply.supply_pump')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="date" name="supply_date" class="form-control @error('supply.supply_date') border border-danger @enderror" placeholder="Data do Abastecimento" aria-label="supply_date" aria-describedby="supply_date" wire:model="supply.supply_date">
                        </div>

                        @error('supply.supply_date')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="search" name="third_party_code" list="thirdparties" class="form-control @error('supply.third_party_code') border border-danger @enderror" placeholder="Pesquise o Terceiro" aria-label="third_party_code" aria-describedby="third_party_code" wire:model="supply.third_party_code">
                            <datalist id="thirdparties">
                                @foreach($thirdparties as $tp)
                                    <option value="{{$tp->third_party_code}}">{{$tp->description}}
                                @endforeach
                            </datalist>
                        </div>

                        @error('supply.people_code')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <!-- LINHA 2 -->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <select name="client_type" class="form-control @error('supply.client_type') border border-danger @enderror" aria-label="client_type" aria-describedby="client_type" wire:model="supply.client_type">
                                <option value="">Selecione o Tipo da Frota</option>
                                <option value="1">Proprio</option>
                                <option value="2">Terceiro</option>
                            </select>
                        </div>

                        @error('supply.client_type')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_fleet" class="form-control @error('supply.vehicles_fleet') border border-danger @enderror" placeholder="Frota" aria-label="vehicles_fleet" aria-describedby="vehicles_fleet" wire:model="supply.vehicles_fleet">
                        </div>

                        @error('supply.vehicles_fleet')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="supply_driver" class="form-control" placeholder="Nome do Motorista" aria-label="supply_driver" aria-describedby="supply_driver" wire:model="supply.supply_driver">
                        </div>

                        @error('supply.supply_driver')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <!--- LINHA 3 ---->

                <div class="row mb-3">
                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_last_km" class="form-control @error('supply.vehicles_last_km') border border-danger @enderror" placeholder="KM do Veiculo" aria-label="vehicles_last_km" aria-describedby="vehicles_last_km" wire:model="supply.vehicles_last_km">
                        </div>

                        @error('supply.vehicles_last_km')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-4">
                        <div class="input-group">
                            <input type="text" name="vehicles_plate" class="form-control @error('supply.vehicles_plate') border border-danger @enderror" placeholder="Placa do Veiculo" aria-label="vehicles_plate" aria-describedby="vehicles_plate" wire:model="supply.vehicles_plate">
                        </div>

                        @error('supply.vehicles_plate')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                </div>

                <!--- LINHA 4 --------------->

                <div class="row mb-3">

                    <div class="col-sm-12">
                        <div class="input-group">
                            <textarea name="obs" class="form-control" placeholder="Digite sua observação" aria-label="obs" aria-describedby="obs" wire:model="supply.obs" rows="3">
                            </textarea>
                        </div>
                    </div>

                </div>

                <!--- LINHA 5 --------------->
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="end_time">Hora Inicial abast</label>
                            <input type="time" name="start_time" class="form-control @error('supply.start_time') border border-danger @enderror" placeholder="Hora Inicial" aria-label="start_time" aria-describedby="start_time" wire:model="supply.start_time">
                        </div>

                        @error('supply.start_time')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="end_time">Hora Final abast</label>
                            <input type="time" name="end_time" class="form-control @error('supply.end_time') border border-danger @enderror" placeholder="Hora Final" aria-label="end_time" aria-describedby="end_time" wire:model="supply.end_time">
                        </div>

                        @error('supply.end_time')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                        <label for="pump_start">Inicio da Bomba</label>
                            <input type="number" name="pump_start" class="form-control @error('supply.pump_start') border border-danger @enderror" placeholder="Ínicio da bomba" aria-label="pump_start" aria-describedby="pump_start" wire:model="supply.pump_start">
                        </div>

                        @error('supply.pump_start')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                        <label for="pump_start">Fim da Bomba</label>
                            <input type="number" name="pump_end" class="form-control @error('supply.pump_end') border border-danger @enderror" placeholder="Fim da bomba" aria-label="pump_end" aria-describedby="pump_end" wire:model="supply.pump_end" onchange="calculaQtd()">
                        </div>

                        @error('supply.pump_end')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>

                </div>

                <!---- LINHA 6 ---------->
                <div class="row mb-4">
                    <div class="col-sm-2">
                        <div class="form-group">
                        <label for="qtd">Quantidade</label>
                            <input id="qtd" type="text" name="qtd" class="form-control" placeholder="Quantidade" aria-label="qtd" aria-describedby="qtd" disabled>
                        </div>

                    </div>

                    <div class="col-sm-2">
                        <div class="form-group">
                        <label for="pump_price">Preço da Bomba</label>
                            <input type="text" name="pump_price" disabled class="form-control @error('supply.pump_price') border border-danger @enderror" placeholder="R$ 0,00" aria-label="pump_price" aria-describedby="pump_price" wire:model="supply.pump_price">
                        </div>

                        @error('supply.pump_price')
                        <p class="text-danger"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>

                <!---- LINHA 7 ---------->
                <div class="row mb-4">
                    
                
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{route('supplies.index')}}" class="btn btn-light">Voltar</a>
            </form>

        </div>

    </div>


</div>
</div>
</div>

<script>
    function calculaQtd() {

        let form = document.querySelector('form[name=createSupply]');
        let formData = new FormData(form);

        pump_start = formData.get('pump_start');
        pump_end = formData.get('pump_end');

        if (pump_end < pump_start) {
            pump_end = 0;
            pump_start = 0;
        }

        qtd = pump_end - pump_start;

        document.getElementById("qtd").value = qtd;

    }
</script>