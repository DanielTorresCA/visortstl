<?php

namespace App\Http\Controllers;

use App\Models\Stlfile;
use Illuminate\Support\Facades\Storage;

class StlViewerController extends Controller
{
    public function show($id)
    {
        $stlfile = Stlfile::findOrFail($id);

        // Build a public URL based on the stored relative path (uploads/stls/file.stl)
        $url = Storage::disk('public')->url($stlfile->filePath);

        return view('stl.viewer', compact('stlfile', 'url'));
    }
}
