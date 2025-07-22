<table>
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($items as $item)
                @foreach ($item as $key => $value)
                    <td>{{ $value }}</td>
                @endforeach
        </tr>
    </tbody>
</table>
