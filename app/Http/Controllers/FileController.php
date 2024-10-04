<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if ($post->files()->exists()) {
            $file = File::where('post_id', $post->id)->whereNull('parent_id')->get();
            return view('files.show', compact('file'));
        }
        // $file = $post;

        return view('files.show', compact('file'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showSubTitle(File $file)
    {
        if (!$file->files()->exists()) {
            return view('files.show', compact('file'));
        } else {
            // asset('/storage/files/public_files/1.pdf')
            // return response()->file(storage_path('app/public/pdfs/' . $subTitle->pdf_path));
            return response()->file(storage_path('app/public/files/public_files/1.pdf'));
        }
    }
}
