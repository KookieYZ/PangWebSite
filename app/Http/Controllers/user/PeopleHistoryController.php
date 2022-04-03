<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\People;
use App\Models\People_History;
use Illuminate\Support\Carbon as DateCovertor;

class PeopleHistoryController extends Controller
{
    public function getPeople($id)
    {
        $currentPerson = People::find($id);
        $currentPersonHistory = $currentPerson->people_history;
        foreach($currentPersonHistory as $cph){
            $cph->onlyIncidentYear = $this->getYearOnly($cph->incident_date);
        }
        $numOfHistory  = count($currentPersonHistory);
        return view('user.history', compact('currentPerson','currentPersonHistory','numOfHistory'));
    }

    public function getYearOnly($date){
        return DateCovertor::parse($date)->year;
    }

}
