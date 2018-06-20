<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Material extends Controller
{
    public function all()
    {
        return new \App\Http\Resources\Material(\App\Models\Material::all());
    }
}
