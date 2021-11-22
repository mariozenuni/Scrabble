<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Statistic;
use Illuminate\Support\Facades\DB;
class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players=Player::paginate(20);

        return view('players.index', compact('players'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
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
                'address'=>'required'
                
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
    public function show($user_id)
    {
            $player=Player::findOrFail($user_id);

            $score=DB::table('players')
            ->join('statistics','players.id','=','statistics.user_id')
            ->select('score','wins','losses')->where('players.id',"$player->id")
            ->sum('score');

            $wins=DB::table('players')
            ->join('statistics','players.id','=','statistics.user_id')
            ->select('score','wins','losses')->where('players.id',"$player->id")
            ->sum('wins');

            $losses=DB::table('players')
            ->join('statistics','players.id','=','statistics.user_id')
            ->select('score','wins','losses')->where('players.id',"$player->id")
            ->sum('losses');
            
            $avg=DB::table('players')
            ->join('statistics','players.id','=','statistics.user_id')
            ->select('score')->where('players.id',"$player->id")
            ->avg('score');

            $av=round($avg);

            $maxScore=DB::table('players')
            ->join('statistics','players.id','=','statistics.user_id')
            ->select('score','rival_name','place','statistics.created_at')
            ->orderBy('score','DESC')->where('players.id',"$player->id")
            ->limit(1)    
            ->get();
            

            $minScore=DB::table('players')
            ->join('statistics','players.id','=','statistics.user_id')
            ->select('score','rival_name','place','statistics.created_at')->where('players.id',"$player->id")
            ->orderBy('score')->where('players.id',"$player->id")
            ->limit(1)    
            ->get();

            $maxAVG=DB::table('players')
            ->join('statistics','players.id','=','statistics.user_id')
            ->select('score','rival_name','place','statistics.created_at')->where('players.id',"$player->id")
            ->orderBy('score','DESC')->where('players.id',"$player->id")
            ->limit(10)    
            ->get();


        return view('players.show',compact('player'), [
        'score'=>$score,
        'wins'=>$wins,
        'losses'=>$losses,
        'av'=>$av,
        'maxScore'=>json_decode($maxScore),
        'minScore'=>json_decode($minScore)
        ]);
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


