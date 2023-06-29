<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function contact(){
        $people = ['Edwin', 'Omar', 'Desi', 'Cris', 'Paps', 'Ova', 'Waxxer'];
        return view('contact', ['people' => $people]);
    }

    public function showPost($id){
        return view('post', ['id' => $id]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        return "Hello from the controller " . $id;
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return "I am the method that creates stuff";
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
    public function show(string $id)
    {
        //
        return "This is the show method " . $id ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return "You're going to edit the post with the id number of " . $id;
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

}
