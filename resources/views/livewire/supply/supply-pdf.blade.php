<div class="container">
    <h1 style="text-align: center">Relatório de Abastecimentos teste</h1>

    <div class="">
            <table style="width: 100%; text-align: left; margin-bottom:40px;">
                <thead>
                    <tr style="background-color: #eee; text-align: left;">
                        <th>Data</th>
                        <th>Bomba</th>
                        <th>Frota</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($supplies as $item)
                    <tr style="text-align: center">
                        <td>{{ $item->supply_date->format('d-m-Y') }}</td>
                        <td>{{ $item->supply_pump }}</td>
                        <td>{{ $item->vehicles_fleet }}</td>
                        <td>{{ $item->qtd }}</td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>
    </div>
</div>
