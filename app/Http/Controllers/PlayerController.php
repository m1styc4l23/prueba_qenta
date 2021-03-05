<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;

use \Illuminate\Http\Request;

class PlayerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //evalular los diferentes filtros para las busquedas
        if ($request->has('first_name') && $request->input('first_name') != null) {
            $playersArray = filterClaveValor('first_name', $request->input('first_name'));
            if($request->has('last_name') && $request->input('last_name') != null){
                $playersArray = filterData($playersArray, 'last_name', $request->input('last_name'));
                if($request->has('position') && $request->input('position') != null){
                    $playersArray = filterData($playersArray, 'position', $request->input('position'));
                }
            }
        }else if($request->has('last_name') && $request->input('last_name') != null){
            $playersArray = filterClaveValor('last_name', $request->input('last_name'));
            if($request->has('position') && $request->input('position') != null){
                $playersArray = filterData($playersArray, 'position', $request->input('position'));
            }
        }else if($request->has('position') && $request->input('position') != null){
            $playersArray = filterClaveValor('position', $request->input('position'));
        }else{
            $playersArray = loadListAll();
        }

        return view('home', [
            'playersArray' => $playersArray
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('players.view', [
            'playersArray' => collect(loadListAll())->whereIn('id', [$id])
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('players.update', [
            'playersArray' => filterClaveValor('id', $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerRequest $request, $id)
    {
        $collection = ($request->except(['_token', '_method']));
        $player['id']                   =$collection['id_player'];
        $player['first_name']           =$collection['first_name'];
        $player['height_feet']          =$collection['height_feet'];
        $player['height_inches']        =$collection['height_inches'];
        $player['last_name']            =$collection['last_name'];
        $player['position']             =$collection['position'];
        $player['team']['id']           =$collection['id_team'];
        $player['team']['abbreviation'] =$collection['abbreviation'];
        $player['team']['city']         =$collection['city'];
        $player['team']['conference']   =$collection['conference'];
        $player['team']['division']     =$collection['division'];
        $player['team']['full_name']    =$collection['full_name'];
        $player['team']['name']         =$collection['name'];
        $player['weight_pounds']        =$collection['weight_pounds'];
        
        $dataAll = filterClaveValorDataNotIn('id', $id)->push($player)->sortBy('id');
        saveDataJson($dataAll);
        return view('home', [
            'playersArray' => $dataAll
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
