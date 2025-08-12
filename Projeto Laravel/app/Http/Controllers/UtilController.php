<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function homepage() {
    $myName = $this->getUser();
    $cesaeInfo = $this->getCesaeInfo();

    $loginUser = [
        'name' => $myName,
        'email' => 'marcelo@hotmail.com',
        'phone' => '99999999'
    ];

    return view('utils.homepage', compact('myName', 'loginUser', 'cesaeInfo'));}

    public function hellopage() {
        $myName = $this->getUser();
    return view('utils.hello', compact('myName'));
    }

    private function getUser(){ 
        $myName = 'Marcelo';
        return $myName;
    }

     private function getCesaeInfo(){
        $cesaeInfo = [
            'name' => 'Cesae',
            'address' => 'Rua Círiaco Cardoso 186, 4150-212 Porto',
            'email' => 'cesae@cesae.pt'
        ];
        return $cesaeInfo;
    }
}
