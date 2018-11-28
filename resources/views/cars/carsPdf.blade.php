<div class="container">
    <h1>Car list</h1>
    <table border="1" cellpadding="10" width="100%" style="margin-bottom: 100px;">
        <tr>
            <th width="20%">ID</th>
            <th width="40%">Model</th>
            <th width="40%">Brand</th>
        </tr>
        @foreach($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
            </tr>
        @endforeach
    </table>
</div>
