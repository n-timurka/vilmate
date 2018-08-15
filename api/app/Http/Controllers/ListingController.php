<?php

namespace App\Http\Controllers;

use App\Services\ListingService;
use App\Http\Requests\ListingRequest;

class ListingController extends Controller {

    /**
     * Service object
     * 
     * @var ListingService 
     */
    private $service;
    
    /**
     * Clear wrapping from resources
     */
    public function __construct(ListingService $service) {
        $this->service = $service;       
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return $this->service->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ListingRequest  $request
     */
    public function store(ListingRequest $request) {
        return $this->service->store($request);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  ListingRequest  $request
     * @param  int
     */
    public function update(ListingRequest $request, int $listing) {
        return $this->service->update($request, $listing); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $listing
     */
    public function destroy(int $listing) {
        return $this->service->delete($listing);        
    }

}
