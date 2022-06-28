<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSeasonRequest;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function addseason(AddSeasonRequest $req)
    {
        Season::create([$req->validated()]);
    }

    public function getallseason()
    {
        $response=Season::all();

        return response([ 'success'=>true, 'studet'=>$response  ]);
    }

    public function showseason()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}
