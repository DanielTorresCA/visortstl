<?php

namespace App\Http\Controllers;

use App\Models\StlFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StlViewerController extends Controller
{
    public function show($id)
    {
        $stlfile = StlFile::findOrFail($id);

        // Asegúrate de guardar el path estilo 'stls/modelo1.stl' (en storage/app/public)
        // y de haber hecho php artisan storage:link
        $url = Storage::url($stlfile->path);

        return view('stl.viewer', compact('stlfile', 'url'));
    }
}