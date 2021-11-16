<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players=Player::latest()->paginate(6);

        return view('players.index', compact('players'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
        public function store(Request $request)
        {

            $request->validate([
                'name' => 'required',
                'email'=>'required',
                'address'=>'required',
                'score'=>'required'
            ]);
    
            Player::create($request->all());
    
            return redirect()->route('players.index')
                ->with('success', 'Player created successfully.');
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
   
        return view('players.show',compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        return view('players.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'score' => 'required'
        ]);
        $player->update($request->all());

        return redirect()->route('players.index')
            ->with('success', 'Players updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $player=Player::findOrFail($id);

         $player->delete();

        return redirect()->route('players.index')
            ->with('success', 'Player deleted successfully');
    }
 }


