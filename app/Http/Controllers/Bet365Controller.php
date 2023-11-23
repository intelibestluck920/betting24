<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Bet365Controller extends Controller
{
    public function inplay(Request $request)
    {
        $url = 'https://api.b365api.com/v1/bet365/inplay?token=151528-6aCG7MkXkxLxos';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data === false) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($ch);
        $result = json_decode($data);
        return response()->json($result);
    }

    public function inplayFilter(Request $request, $sportsId)
    {
        $url = 'https://api.b365api.com/v1/bet365/inplay_filter?token=151528-6aCG7MkXkxLxos&sport_id=' . $sportsId;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data === false) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($ch);
        $result = json_decode($data);
        foreach($result->results as $key => $value) {
            $value->newindex = $this->getPrematchesOdds($value->id);
        }
        return response()->json($result);
    }

    private function inplayOdds($eventId)
    {
        $url = 'https://api.b365api.com/v1/bet365/event?token=151528-6aCG7MkXkxLxos&FI='.$eventId;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data === false) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($ch);
        $result = json_decode($data);
        return response()->json($result);   
    }
    private function inplayEvents(Request $request, $eventId)
    {
        $url = 'https://api.b365api.com/v1/bet365/event?token=151528-6aCG7MkXkxLxos&FI='.$eventId;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data === false) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($ch);
        $result = json_decode($data);
        return response()->json($result);   
    }

    public function upcoming(Request $request, $sportsId)
    {
        // dd($sportsId);
        $url = 'https://api.b365api.com/v1/bet365/upcoming?token=151528-6aCG7MkXkxLxos&sport_id='.$sportsId;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data === false) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($ch);
        $result = json_decode($data);
        foreach($result->results as $key => $value) {
            $value->newindex = $this->getPrematchesOdds($value->id);
            $value->CC = $this->getCC($value->id);
        }
        return response()->json($result);
    }

    public function getCC($eventId)
    {

        $url = 'https://api.b365api.com/v1/bet365/result?token=151528-6aCG7MkXkxLxos&event_id='.$eventId;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data === false) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($ch);

        // $result = json_decode($data);
        // $league = $data->results[0]->league;

        // foreach($league as $key => $value) {
        //     $value->country = $this->getPrematchesOdds($value->id);
        // }


        return json_decode($data);

    }
    private function getPrematchesOdds($eventId) {
        $url = 'https://api.b365api.com/v1/bet365/prematch?token=151528-6aCG7MkXkxLxos&FI='.$eventId;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data === false) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($ch);
        return json_decode($data);
    }

    public function prematchOdds(Request $request, $fi)
    {
        $url = 'https://api.b365api.com/v1/bet365/prematch?token=151528-6aCG7MkXkxLxos&FI='.$fi;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data === false) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($ch);
        $result = json_decode($data);
        return response()->json($result);
    }

    public function results(Request $request)
    {
        $url = 'https://api.b365api.com/v1/bet365/inplay?token=151528-6aCG7MkXkxLxos';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        if ($data === false) {
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }
        curl_close($ch);
        $result = json_decode($data);
        $result = [
            'data' => $result->results,
            'status' => $result->success
        ];
        return response()->json($result);
    }
}
