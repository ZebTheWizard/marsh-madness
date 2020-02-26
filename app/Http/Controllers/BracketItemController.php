<?php

namespace App\Http\Controllers;

use App\BracketItem;
use Illuminate\Http\Request;

class BracketItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BracketItem  $bracketItem
     * @return \Illuminate\Http\Response
     */
    public function show(BracketItem $bracketItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BracketItem  $bracketItem
     * @return \Illuminate\Http\Response
     */
    public function edit(BracketItem $bracketItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BracketItem  $bracketItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BracketItem $bracketItem)
    {
        $bitem = BracketItem::with('team')->find($request->id);
        $bitem->team_id = $request->team_id;
        if ($request->team_id) {
            $bitem->type = 'team';
        } 
        else if (!$request->team_id && $request->type == 'team') {
            $bitem->type = 'tbd';
        }else {
            $bitem->type = $request->type;
        }
        
        $bitem->score = $request->score;
        $bitem->save();
        return response()->json($bitem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BracketItem  $bracketItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(BracketItem $bracketItem)
    {
        //
    }
}
