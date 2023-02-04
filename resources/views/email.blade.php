@foreach ($data as $p)
    <table>
        <tbody>
            <tr>
                <td>
                    <h2>
                        {!! $p["title"] !!}
                    </h2>

                    <div>
                        @foreach ($p["content"] as $bp)
                            <p>{!! $bp !!}</p>
                        @endforeach
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
@endforeach                                                                 