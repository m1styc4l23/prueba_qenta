<?php

//instancia api
use Illuminate\Support\Facades\Http;

//instancia storage
use Illuminate\Support\Facades\Storage;


function routeStorageLocal(){
    return 'data/infoApi.json';
}

function dataStorageLocal(){
    return Storage::get(routeStorageLocal());
}

function routeApi(){
    return 'https://www.balldontlie.io/api/v1/players';
}

function loadDataApi()
{

    if(HTTP::get(routeApi())->ok()){
        $playersArray = collect(HTTP::get(routeApi())->json()['data'])->sortBy('id');
        saveDataJson ($playersArray);
    }else{
        $playersArray = null;
    }
    return $playersArray;
}

function loadDataJson(){
    return json_decode(dataStorageLocal(), true);
}

function loadListAll(){
    if(Storage::disk('local')->exists(routeStorageLocal())){
        return loadDataJson();
    }else{
        return loadDataApi();
    }
}

function filterClaveValor($clave, $valor)
{
    return collect(loadListAll())->whereIn($clave, [$valor]);
}

function filterData($data, $clave, $valor)
{
    return collect($data)->whereIn($clave, [$valor]);
}

function filterClaveValorDataNotIn($clave, $valor)
{
    return collect(loadListAll())->whereNotIn($clave, $valor);
}

function saveDataJson($data){
    Storage::makeDirectory('data');
    Storage::disk('local')->put(routeStorageLocal(), $data);
}