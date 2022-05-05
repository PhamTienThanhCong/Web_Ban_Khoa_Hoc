<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function breadcrumb(){
        $crumbs = explode("?",$_SERVER["REQUEST_URI"]);
        $crumbs = explode("/",$crumbs[0]);
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" ."/". $crumbs[1];
        // $url = $request->getHttpHost() ."". $crumbs[1];
        $urlCrumbs = [array(
            "url" => $url,
            "name" => "home",
        )];
        for ($i = 2; $i < count($crumbs) ; $i++){
            array_push($urlCrumbs, 
            array(
                "url" => $urlCrumbs[$i-2]["url"] ."/". $crumbs[$i],
                "name" => $crumbs[$i],
            ));
        }
        return $urlCrumbs;
    }
}
