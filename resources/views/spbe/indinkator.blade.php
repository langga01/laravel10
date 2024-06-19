@extends('layout.nice')

@section('tittle', 'Indikator')


@section('contentleft')
    <table class="table datatable">
        <thead>
            <th>No</th>
            <th>Domain</th>
            <th>Aspek</th>
            <th>Nama</th>
            <th>Nilai</th>
        </thead>
        <tbody>
            @foreach ($indikators as $indikator)
                <tr>
                    <td class="text-center">{{ $indikator->id }}</td>
                    <td class="font-weight-light"><span class="badge bg-primary">{{ $indikator->aspek->domain->name }}</span>
                    </td>
                    <td class="font-weight-light"><span class="badge bg-light text-dark">{{ $indikator->aspek->name }}</span>
                    </td>
                    <td>{{ $indikator->name }}</td>
                    <td class="text-center">{{ $indikator->nilai }}</td>
                </tr>
            @endforeach
        <tbody>
    </table>
@endsection

<script src="{{ asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
