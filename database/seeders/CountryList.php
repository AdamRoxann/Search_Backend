<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use File;
use App\Models\Country;

class CountryList extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();
  
        $json = File::get("database/data/countries.json");
        $countries = json_decode($json);
        $data = [];

        foreach ($countries as $value) {
            $data[] = [
                "code" => $value->code,
                "name" => $value->name,
                "status" => $value->status,
                "created_at" => $value->created_at,
                "updated_at" => $value->updated_at,
            ];
        }

        $chunks = array_chunk($data, 5000);
        foreach($chunks as $chunk){
            Country::insert($chunk);
        }
    }
}
