<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Resources\ListingResource;
use App\Http\Resources\ListingsResource;
use Log;

class ListingController extends Controller {

    /**
     * Validation rules
     * 
     * @var string 
     */
    private $rules;
    
    /**
     * Clear wrapping from resources
     */
    public function __construct() {
        ListingResource::withoutWrapping();
        $this->rules = [
            'title' => 'required|min:4|max:255',
            'area' => 'required|numeric',
            'price' => 'required|numeric',
            'address' => 'required|string',
            'name' => 'required|string',
            'email' => 'present|email',
            'phone' => 'present',
            'file' => 'nullable|file|image',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return ListingsResource
     */
    public function index(): ListingsResource {
        return new ListingsResource(Listing::orderBy('id', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ListingResource
     */
    public function store(Request $request): ListingResource {
        $request->validate($this->rules);
        $listing = Listing::create($request->all());
        if($request->file('file')) {
            $listing->photo = $request->file('file')->store('images', 'public');
            unset($listing->file);
        }         
        $listing->save();
        return new ListingResource($listing);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return ListingResource
     */
    public function show(Listing $listing): ListingResource {
        return new ListingResource($listing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return ListingResource
     */
    public function update(Request $request, Listing $listing): ListingResource {
        $request->validate($this->rules);
        $data = $request->all();
        if($request->file('file')) {
            $data['photo'] = $request->file('file')->store('images', 'public');
            unset($data['file']);
        }         
        $listing->update($data);
        return new ListingResource($listing);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return ListingResource
     */
    public function destroy(Listing $listing): ListingResource {
        $listing->delete();
        return new ListingResource($listing);
    }

}
