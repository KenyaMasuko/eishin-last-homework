<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyInfo;
use App\Models\Feature;
use App\Models\Industry;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::find(Auth::id())->company()->first();
        $industries = Industry::find($company['industry_id']);

        return view('company.info.index', compact('company', 'industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = CompanyInfo::find($id);
        $industries = Industry::all();
        return view('company.info.edit', compact('company', 'industries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ceo_name' => 'required',
            'logo' => 'required',
            'email' => 'required',
            'industry_id' => 'required',
        ]);

        $company = $request->all();
        unset($company['_token']);
        unset($company['_method']);
        CompanyInfo::where(['id' => $id])->update([
            ...$company,
            'logo' => $request->file('logo')->store('public/images')
        ]);

        return redirect(route('company.info.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
