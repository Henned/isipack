<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Distance extends Component
{
    public $street;
    public $housenumber;
    public $city;
    public $postcode;

    public function getDistance()
    {
        $geocodeResponse = Http::withHeaders([
            'Authorization' => 'prj_test_pk_eb55e8e72a757c47309e9733d2caf79566f021ac ',
        ])->get('https://api.radar.io/v1/geocode/forward?query='.$this->street.'+'.$this->housenumber.'+'.$this->postcode.'+'.$this->city.'&country=DE');
        $geocode = json_decode($geocodeResponse);
        $lat = $geocode->addresses[0]->latitude;
        $long = $geocode->addresses[0]->longitude;


        $distanceResponse = Http::withHeaders([
            'Authorization' => 'prj_test_pk_eb55e8e72a757c47309e9733d2caf79566f021ac ',
        ])->get('https://api.radar.io/v1/route/distance?origin=51.501793,6.750429&destination='.$lat.','.$long.'&modes=car&units=metric');

        $distance = json_decode($distanceResponse);
        return redirect()->route('checkout', [
            'distance' => $distance->routes->car->distance->value, 
            'street' => $this->street, 
            'postcode' => $this->postcode, 
            'housenumber' => $this->housenumber, 
            'city' => $this->city
        ]);
    }

    public function render()
    {
        return view('livewire.distance')->layout('layouts.guest');
    }
}
