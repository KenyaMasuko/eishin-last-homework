<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Mail\AppliedMail;
use App\Mail\ThanksMail;
use App\Models\Chat;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Offer::with('users')
            ->where(['company_info_id' => Auth::user()->company_id])
            ->first()
            ->users()
            ->get();

        return view('company.candidate.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $offer = Offer::find($request->query('offer_id'));

        return view('company.candidate.create', compact('offer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request['offer_value'] !== $request['offer_id']) {
            dd('それ正しくないみたいっすよ');
            return redirect(route('user.offer.index'));
        }

        $Offer = new Offer();
        $Offer::find($request['offer_id'])->users()->sync(Auth::id());

        $offer = $Offer::find($request['offer_id']);
        $user = Auth::user();
        $company = $offer->companyInfo()->first();

        Mail::to($user->email)->send(new ThanksMail($offer, $company, $user));
        Mail::to($company->email)->send(new AppliedMail($offer, $company, $user));

        return redirect(route('company.candidate.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $offer = User::find(1)->offers()->where(['company_info_id' => Auth::user()->company_id])->first();

        $length = Chat::all()->count();

        // 表示する件数を代入
        $display = 5;
        $chats = Chat::where(['offer_id' => $offer->id])
            ->where(['user_id' => $id])
            ->offset($length - $display)
            ->limit($display)
            ->get();

        return view('company.candidate.show', compact('chats', 'offer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
