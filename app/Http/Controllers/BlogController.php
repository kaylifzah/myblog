<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allEntries = blog::all();
        // blog is the name of the model (every row in the table)
        // $allEntries stores all blog entries into an object
        return view('bloghome', ['completeBlog' => $allEntries]);
        // brings view back to home and stores the entries
        // into an associative array called completedBlog
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entry = new blog();

        $entry->EntryTitle = request('entryTitle');
        $entry->Description = request('description');

        if ($request->hasfile('image')) {
            $file = request('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/entry/', $filename);
            $entry->Image = $filename;
        } else {
            $entry->Image = '';
        }

        $store = $entry->save();
        if ($store) {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        return view('newEntry');
    }

    public function showrandom(blog $blog)
    {
        return view('random');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $update = blog::find($request->id);
    	$update->EntryTitle= request('entryTitle');
    	$update->Description = request('description');

    	if($request->hasfile('image')){
    		$file = request('image');
    		$extension = $file->getClientOriginalExtension();
    		$filename = time(). '.' . $extension;
    		$file->move('uploads/entry/', $filename);
    		$update->Image = $filename;
     	}

     	$updated = $update->save();
     	if($updated){
            return view('entry', ['desc' => $update]);
     	}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */

    public function delete($id){
        $delete = blog::find($id);
    	$destinationPath = 'uploads/entry/';
        File::delete($destinationPath. $delete->Image);
    	$deleted = $delete->delete();

    	if($deleted){
    		return redirect('/');
        }
    }

    public function display($id) //this function is when user clicks on an entry to read more
    {
        $matchEntry = blog::where('id', $id)->first();
        return view('entry', ['desc' => $matchEntry]);
    }

    public function showform($id) //this function is when user clicks on an entry to edit
    {
        $matchEntry = blog::find($id);
        //$matchEntry = blog::where('id', $id)->first();
        return view('edit', ['desc' => $matchEntry]);
    }



}