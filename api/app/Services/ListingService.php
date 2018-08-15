<?php

namespace App\Services;

use App\Repositories\ListingRepository;
use App\Http\Requests\ListingRequest;
use App\Http\Resources\ListingResource;
use App\Http\Resources\ListingsResource;

class ListingService {
    
    /**
     * Repository object
     * 
     * @var ListingRepository 
     */
    private $repository;
    
    /**
     * Init repository
     * 
     * @param ListingRepository $repository
     */
    public function __construct(ListingRepository $repository){
        $this->repository = $repository;
        ListingResource::withoutWrapping();
    }
    
    /**
     * Get all Listings
     * 
     * @return ListingsResource
     */
    public function all() {
        return new ListingsResource($this->repository->all());        
    }
    
    /**
     * Add new listing
     * 
     * @param ListingRequest $request
     * @return ListingResource
     */
    public function store(ListingRequest $request): ListingResource { 
        $data = $request->except('file');
        if($request->file('file')) {
            $data['photo'] = $request->file('file')->store('images', 'public');
        }         
        
        return new ListingResource($this->repository->store($data));        
    }
    
    /**
     * Update Listing
     * 
     * @param ListingRequest $request
     * @param int $listing
     * @return ListingResource
     */
    public function update(ListingRequest $request, int $listing) {
        $data = $request->except('file');
        if($request->file('file')) {
            $data['photo'] = $request->file('file')->store('images', 'public');
        }         
        return new ListingResource($this->repository->update($data, $listing));
    }
    
    /**
     * Delete Listing
     * 
     * @param int $listing
     * @return ListingResource
     */
    public function delete(int $listing): ListingResource {        
        return new ListingResource($this->repository->delete($listing));
    }
    
}
