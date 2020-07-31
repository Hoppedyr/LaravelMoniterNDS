<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AppController extends Controller
{
    protected $servers;

    public function __construct()
    {
        $jsonString = file_get_contents(base_path('resources/json/data.json'));
        $servers = json_decode($jsonString);
        $this->servers = $servers;
    }

    public function index()
    {
        return view('home', ['servers' => $this->servers]);
    }

    public function serverMainPage($serverMainPageId)
    {
        $server = $this->getSelectedServer($serverMainPageId);

        $pageData = (array)$server->data;
        $viewDataPage = $server;

        return view('pages.servermainpage', ['pageData' => $pageData, 'viewDataPage' => $viewDataPage]);
    }

    public function serverDataPage($serverDataPageId, $serverMainPageId)
    {
        $server = $this->getSelectedServer($serverDataPageId);

        $pageData = (array)$server->data;
        $serverId = $server->id;

        $serverData = $server->data->{$serverMainPageId};
        return view('pages.serverdatapage', [
            'pageData' => $pageData,
            'serverId' => $serverId,
            'serverData' => $serverData
        ]);
    }

    private function getSelectedServer($serverPageId)
    {
        $filteredServers = array_filter($this->servers, function ($server) use ($serverPageId) {
            return $server->id == $serverPageId;
        });
        if (!$filteredServers) {
            throw new NotFoundHttpException();
        }
        return reset($filteredServers);
    }
}
