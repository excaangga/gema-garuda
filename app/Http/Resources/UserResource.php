<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $provinceName = $this->getProvinceName($this->id_province);
        $regencyName = $this->getRegencyName($this->id_regency, $this->id_province);
        $districtName = $this->getDistrictName($this->id_district, $this->id_regency);
        $villageName = $this->getVillageName($this->id_village, $this->id_district);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'nickname' => $this->nickname,
            'category_name' => $this->category->category_name,
            'province_name' => $provinceName,
            'regency_name' => $regencyName,
            'district_name' => $districtName,
            'village_name' => $villageName,
            'photo_url' => $this->photo_url,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }

    private function getProvinceName(string $idProvince){
        $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json");
        $data = $response->json();
        $provinceList = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
        }, $data);
    
        foreach ($provinceList as $province) {
            if ($idProvince === $province['id']) {
                return $province['name'];
            }
        }
    
        return null;     
    }

    private function getRegencyName(string $idRegency, string $idProvince){
        $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/{$idProvince}.json");
        $data = $response->json();
        $regencyList = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
        }, $data);
    
        foreach ($regencyList as $regency) {
            if ($idRegency === $regency['id']) {
                return $regency['name'];
            }
        }
    
        return null;
    }

    private function getDistrictName(string $idDistrict, string $idRegency){
        $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/districts/{$idRegency}.json");
        $data = $response->json();
        $districtList = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
        }, $data);
    
        foreach ($districtList as $district) {
            if ($idDistrict === $district['id']) {
                return $district['name'];
            }
        }
    
        return null;
    }

    private function getVillageName(string $idVillage, string $idDistrict){
        $response = Http::get("https://www.emsifa.com/api-wilayah-indonesia/api/villages/{$idDistrict}.json");
        $data = $response->json();
        $villageList = array_map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
            ];
        }, $data);
    
        foreach ($villageList as $village) {
            if ($idVillage === $village['id']) {
                return $village['name'];
            }
        }
    
        return null;
    }
}