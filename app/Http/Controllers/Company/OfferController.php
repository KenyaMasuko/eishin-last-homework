<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = Auth::user()->company_id;
        $offers = CompanyInfo::find($company_id)->offers()->get();

        return view('company.offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::all();

        return view('company.offer.create', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedOffer = $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:255',
            'is_public' => 'required',
            'feature_ids' => 'required'
        ]);

        $Offer = new Offer();
        $Offer->title = $validatedOffer['title'];
        $Offer->description = $validatedOffer['description'];
        $Offer->is_public = $validatedOffer['is_public'];
        $Offer->company_info_id = Auth::user()->company_id;
        $Offer->save();

        $Offer->features()->sync($request['feature_ids']);

        return redirect(route('company.offer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $offers = Offer::find($offer->id);
        $features = Feature::all();

        return view('company.offer.edit', compact('offers', 'features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $validatedOffer = $request->validate([
            'title' => 'required|max:20',
            'description' => 'required|max:255',
            'is_public' => 'required',
            'feature_ids' => 'required'
        ]);

        $Offer = new Offer();
        $Offer::find($offer['id'])->features()->sync($validatedOffer['feature_ids']);

        Offer::where(['id' => $offer['id']])->update([
            'title' => $validatedOffer['title'],
            'description' => $validatedOffer['description'],
            'is_public' => $validatedOffer['is_public']
        ]);

        return redirect(route('company.offer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        Offer::find($offer->id)->delete();

        return redirect(route('company.offer.index'));
    }
}
