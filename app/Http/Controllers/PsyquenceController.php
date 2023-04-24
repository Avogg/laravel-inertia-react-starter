<?php

namespace App\Http\Controllers;

use App\Models\Psyquence;
use App\Models\PsyquenceImage;
use App\Models\Session;
use App\Models\Template;
use App\Models\TemplateImage;
use Illuminate\Http\Request;

class PsyquenceController extends Controller
{
    public function indexTemplates()
    {
        return view('psyquence.templates.index');
    }

    public function createTemplates()
    {
        return view('psyquence.templates.create');
    }

    public function showTemplates($id)
    {
        $psyquence = Template::findOrFail($id);
        return view('psyquence.templates.show', compact('psyquence'));
    }

    public function index()
    {
        return view('psyquence.index');
    }

    public function create()
    {
        return view('psyquence.create');
    }

    public function show($psyquenceGame)
    {
        $psyquenceGame = Session::findOrFail($psyquenceGame);
        return view('psyquence.show', compact('psyquenceGame'));
    }
}
