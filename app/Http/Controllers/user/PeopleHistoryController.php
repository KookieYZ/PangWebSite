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
        foreach ($currentPersonHistory as $cph) {
            $cph->onlyIncidentYear = DateCovertor::parse($cph->incident_date)->year;
            $cph->people_id = $currentPerson->name;
        }
        $numOfHistory  = count($currentPersonHistory);
        return view('user.history', compact('currentPerson', 'currentPersonHistory', 'numOfHistory'));
    }
}
