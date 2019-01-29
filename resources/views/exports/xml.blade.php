

<!-- Место импорта -->

<div>
    <table class="table">
    <thead>
    <tr>

        <th>ID</th>
        <th>Название</th>
        <th>Дата</th>
        <th>Кол-во</th>
        <th>Регион</th>
        <th>Частота</th>
        <th>Еденицы измерения</th>
        <th></th> <!-- Кнопочка -->
        </tr>
    </thead>

    <tbody>
    @foreach($export_dataset as $indicator)
        <tr>

            <td>{{ $indicator->id }}</td>
            <td>{{ $indicator->indicator_name }}</td>
            <td>{{ $indicator->date }}</td>
            <td>{{ $indicator->value }}</td>
            <td>{{ $indicator->geography_unit_name }}</td>
            <td>{{ $indicator->frequency_unit_name }}</td>
            <td>{{ $indicator->measurement_unit_name }}</td>
            <td> 
                <form action="{{ url('indicator_list/'.$indicator->id.'/export') }}">
                    <input type="submit" value="Экспорт в Excel" />
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</div>
<!-- Конец места импорта  -->


