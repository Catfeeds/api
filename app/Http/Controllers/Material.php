<?php

namespace App\Http\Controllers;

use App\Models\IosMaterial;
use Illuminate\Http\Request;

class Material extends Controller
{
    public function android()
    {
        return new \App\Http\Resources\Material(\App\Models\Material::all());
    }

    public function ios()
    {
        return new \App\Http\Resources\Material(IosMaterial::all());
    }
}
