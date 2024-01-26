<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferStoreRequest;
use App\Models\Category;
use App\Models\Location;
use App\Models\Offer;
use App\Services\OfferServices;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offer::all();
        return view('offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Offer::class);
        $locations = Location::select('id', 'title')->orderBy('title')->get();
        $categories = Category::select('id', 'title')->orderBy('title')->get();
        return view('offers.create', compact('locations', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfferStoreRequest $request, OfferServices $offerServices)
    {
        $this->authorize('create', Offer::class);
        // return $request->all();
        $offerServices->store(
            $request->validated(),
            $request->hasFile('image') ? $request->file('image') : null
        );
        // $data = array_merge(
        //     ['author_id' => auth()->user()->id],
        //     $request->all()
        // );
        // $offer = Offer::create($data);
        // $offer->categories()->sync($request->get('categories'));
        // $offer->locations()->sync($request->get('locations'));
        return redirect()->back()->with(['success' => 'Offer created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        return view('offers.show', compact('offer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        $this->authorize('update', $offer);
        $locations = Location::orderBy('title')->get();
        $categories = Category::orderBy('title')->get();
        return view('offers.edit', compact('offer', 'locations', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfferStoreRequest $request, Offer $offer, OfferServices $offerServices)
    {
        $this->authorize('update', $offer);
        $offerServices->update(
            $offer,
            $request->validated(),
            $request->hasFile('image') ? $request->file('image') : null
        );
        return redirect()->back()->with(['success' => 'Offer updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
