<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function getJson() 
    {
        $jsonString = file_get_contents(base_path('resources/json/data.json'));
        $servers = json_decode($jsonString);
        return $servers;
    }

    public function index()
    {
        $servers = self::getJson();
        return view('home', ['servers' => $servers]);
    }

    public function serverMainPage($serverMainPageid)
    {
        $servers = self::getJson();
        foreach($servers as $server){
            if($server->id == $serverMainPageid){
                $pageDatas = (array) $server->data;
                $viewDataPage = $server;
            }
        }
        return view('pages.servermainpage', ['pageDatas' => $pageDatas, 'viewDataPage' => $viewDataPage ]);
    }

    public function serverDataPage($serverDataPageid, $serverMainPageid)
    {
        $servers = self::getJson();
        foreach($servers as $server){
            if($server->id == $serverDataPageid){
                $pageDatas = (array) $server->data;
                $serverId = $server->id;  
                
                //must find a better way 
                $placeholder = (array) $server->data;
                $serverData = $placeholder[$serverMainPageid];
            }
        }
        return view('pages.serverdatapage',  ['pageDatas' => $pageDatas, 'serverId' => $serverId, 'serverData' => $serverData]);
    }
}
