<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Durasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->presence->date }}</td>
                <td>{{ $user->office->working_status }}</td>
                <td>{{ $user->presence->in }}</td>
                <td>{{ $user->presence->out }}</td>
                <td>{{ $user->presence->duration }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
