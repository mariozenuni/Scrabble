<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Player;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $playerData =DB::table('statistics')

          ->select('id','created_at','score','rival_name','place','wins','losses','user_id')
          ->distinct()
          ->get();

          $playerStatistics=json_decode($playerData);
        return view('statistics.index', compact('playerStatistics'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('statistics.create');
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
                'user_id'=>'required',
                'score'=>'required',
                'wins'=>'required',
                'losses'=>'required',
                
                
            ]);
    
            Statistic::create($request->all());
    
            return redirect()->route('statistics.index')
                ->with('success', 'Statistics/updated created successfully.');
        }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
            $players=Statistic::findOrFail($user_id);
             $players->user_id;


 
        $members=DB::table('players')
            ->join('statistics','players.id','=','statistics.user_id')
            ->select('players.name','statistics.score','statistics.wins','statistics.created_at','statistics.losses')->where('players.id'," $players->user_id")
            ->distinct()
            ->get();
            
        $memberStatistics=json_decode($members);

        


        return view('statistics.show',compact('memberStatistics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
        return view('statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'date' => 'required',
            'score' => 'required',
            'wins' => 'required',
            'losses' => 'required'
        ]);
        $statistic->update($request->all());

        return redirect()->route('players.index')
            ->with('success', 'Statistics updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $statistic=Statistic::findOrFail($id);

         $statistic->delete();

        return redirect()->route('statistic.index')
            ->with('success', 'Statistics deleted successfully');
    }
 }


