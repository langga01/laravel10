<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Domain;
use App\Models\Indikator;

class SpbeController extends Controller
{
    public function spbe()
    {
        $domains = Domain::get();

        return view('spbe/spbe', ['domains' => $domains]);
    }

    public function indikator()
    {
        $indikators = Indikator::get();
        // dd($indikators);

        return view('spbe/indinkator', ['indikators' => $indikators]);
    }
}
