<?php

namespace App\Http\Controllers;

use App\Models\Araudio;
use Illuminate\Http\Request;

class Material extends Controller
{
    public function all()
    {
        return new \App\Http\Resources\Material(\App\Models\Material::all());
    }

    public function audio()
    {
        return new \App\Http\Resources\Material(Araudio::all());
    }
}
