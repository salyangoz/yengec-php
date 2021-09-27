<?php

namespace Yengec\Entities;

use Illuminate\Contracts\Support\Arrayable;

class Address implements Arrayable
{
    public string $country;
    public string $city;
    public string $district;
    public string $address;

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }


    /**
     * @param  string  $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }


    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }


    /**
     * @param  string  $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }


    /**
     * @return string
     */
    public function getDistrict(): string
    {
        return $this->district;
    }


    /**
     * @param  string  $district
     */
    public function setDistrict(string $district): void
    {
        $this->district = $district;
    }


    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }


    /**
     * @param  string  $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }


    public function toArray()
    {
        return [
            'country' => $this->getCountry(),
            'city' => $this->getCity(),
            'district' => $this->getDistrict(),
            'address' => $this->getAddress()
        ];
    }
}
