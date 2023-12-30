<?php

namespace App\Http\Controllers;

use App\Models\Url;

use App\Models\Click;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         return view('urls.index', [
            'urls' => Url::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'original_url' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['title'] = Str::ucfirst($request->title);
        $data['original_url'] = $request->original_url;
        $data['shortener_url'] = Str::random(5);
        Url::create($data);
        return redirect(route('urls.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        return view('urls.edit', [
            'url' => $url,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
     	$validated = $request->validate([
            'title' => 'required|string|max:255',
            'original_url' => 'required|string|max:255',
        ]);
        $validated['shortener_url'] = Str::random(5);
        $url->update($validated);
        return redirect(route('urls.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        $url->delete();
        Click::where('url_id',$url->id)->delete();
        return redirect(route('urls.index'));
    }

    public function shortenLink(Request $request,$shortener_url)
    {
        $find = Url::where('shortener_url', $shortener_url)->first();
	if($find){
		$click = new Click();
		$click->url_id =   $find->id;
		$click->created_at = now();
		$click->ip =   $request->ip();
		$click->save();
	}
        return redirect($find->original_url);
    }

}
