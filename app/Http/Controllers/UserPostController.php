<?php

namespace App\Http\Controllers; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
  
class UserPostController extends Controller
{
/**
 * Display a listing of the resource.
 */
public function index()
{ 
    // Retrieve the posts of the authenticated user
   // Retrieve the posts of the authenticated user
   $posts = Auth::user()->posts()->with('user')->paginate(10);  
    
   return view('dashboard', ['posts' => $posts]); 
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
public function show(string $id)
{
    //
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
}
