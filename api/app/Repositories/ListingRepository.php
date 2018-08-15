<?php

namespace App\Repositories;

use App\Models\Listing;
use \Illuminate\Database\Eloquent\Collection;

class ListingRepository {
    
    /**
     * Model
     * 
     * @var Listing 
     */
    protected $model;
    
    /**
     * Init model
     * 
     * @param Listing $listing
     */
    public function __construct(Listing $listing)
    {
        $this->model = $listing;
    }
    
    /**
     * Get all listings from DB
     * 
     * @return Collection
     */
    public function all(): Collection {
        return $this->model->orderBy('id', 'desc')->get();
    }
    
    /**
     * Add new listing to DB
     * 
     * @param array $data
     * @return Listing
     */
    public function store(array $data): Listing {
        $listing = new Listing;
        $listing->fill($data);
        $listing->save();
        return $listing;
    }
    
    /**
     * Update listing in DB
     * 
     * @param array $data
     * @param int $id
     * @return Listing
     */
    public function update(array $data, int $id): Listing {
        $listing = Listing::find($id);
        $listing->fill($data);
        $listing->save();
        return $listing;
    }
    
    /**
     * Delete from DB
     * 
     * @param int $id
     * @return Listing
     */
    public function delete(int $id): Listing {
        $listing = Listing::find($id);
        $listing->delete();
        return $listing;
    }
}

