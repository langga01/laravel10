@extends('layout.nice')

@section('tittle', 'Tauval SPBE')

@section('contentleft')
    <div class="mb-2">
        <a href="{{ route('admin.spbe-indikator') }}" class="btn btn-primary"><i class="bi bi-collection"></i> Indikator
            SPBE</a>
    </div>
    <div class="card">
        <!-- Accordion without outline borders -->
        <div class="accordion accordion-flush" id="accordionFlushExample">


            @foreach ($domains as $domain)
                <div class="card-body">
                    <h5 class="card-title">Domain {{ $domain->name }}</h5>
                    <div class="accordion-item px-2 ">
                        @foreach ($domain->aspek as $aspek)
                            <h2 class="accordion-header border-top" id="flush-heading{{ $aspek->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $aspek->id }}" aria-expanded="false"
                                    aria-controls="flush-collapse{{ $aspek->id }}">
                                    {{ $aspek->name }}
                                </button>
                                {{-- <span>{{ $aspek->nilai->count }}</span> --}}
                            </h2>
                            <div id="flush-collapse{{ $aspek->id }}" class="accordion-collapse collapse"
                                aria-labelledby="flush-heading{{ $aspek->id }}" data-bs-parent="#accordionFlushExample">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Nilai Indeks Tahun 2023</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($aspek->indikator as $indikator)
                                            <tr>
                                                <th scope="row" class="text-center">Indikator {{ $indikator->id }} </th>
                                                <td>{{ $indikator->name }}</td>
                                                <td class="text-center">{{ $indikator->nilai }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
