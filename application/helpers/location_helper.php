<?php

class Location{

    public string $countryCode;
    public string $countryName;
    public string $city;
    public string $postal;
    public string $state;

    public function __construct()
    {
        $json = file_get_contents('https://geolocation-db.com/json');
        $data = json_decode($json);

        $this->countryCode = $data->country_code;
        $this->countryName = $data->country_name;
        $this->state = $data->state;
        $this->city = $data->city;
        $this->postal = $data->postal;
    }
}