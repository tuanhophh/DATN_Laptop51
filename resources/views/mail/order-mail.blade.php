<p>hi {{ $details['name'] }} </p>
<p>Bạn đã đặt hàng thành công tại webiste Laptop51 !</p>
<table class="table table-stripped">
    <thead>
        <th class="col-1">name</th>
        <th class="col-2">email</th>
        <th class="col-1">computer</th>
        <th class="col-1">interval</th>
        <th class="col-1">repair type</th>
        <th class="col-5">desc</th>
        <th class="col-1">Status</th>

    </thead>
    <tbody>
        <tr>
            <td>{{ $details['name'] }}</td>
            <td>{{ $details['email'] }}</td>
            <td>{{ $details['computer'] }}</td>
            <td>{{ $details['interval'] }}</td>
            <td>{{ $details['repair_type'] }}</td>
            <td>{!! $details['desc'] !!}</td>
            <td>{{ $details['status'] }}</td>
        </tr>
    </tbody>
</table>
