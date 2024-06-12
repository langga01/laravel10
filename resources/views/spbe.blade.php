@extends('layout.nice')

@section('tittle', 'Indikator')

@section('contentleft')
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
                                <ul class="list-group pb-2">
                                    @foreach ($aspek->indikator as $indikator)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Indikator {{ $indikator->id }}. {{ $indikator->name }}
                                            <span class="badge bg-primary rounded-pill">{{ $indikator->nilai }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            {{-- <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                        <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this
                        being filled with some actual content.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the
                        <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting
                        happening here in terms of content, but just filling up the space to make it look, at least at first
                        glance, a bit more representative of how this would look in a real-world application.</div>
                </div>
            </div> --}}
        </div><!-- End Accordion without outline borders -->
    </div>
@endsection
