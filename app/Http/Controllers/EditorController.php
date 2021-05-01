<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function editor()
    {
        $description = 'Editor';
        $title = 'Editor';
        return view('editor.editor', compact('description', 'title'));
    }

    public function jqueryEditor()
    {
        $description = 'JQuery';
        $title = 'JQuery';
        return view('editor.jquery-editor', compact('description', 'title'));
    }
}
