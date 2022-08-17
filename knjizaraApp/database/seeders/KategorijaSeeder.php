<?php

namespace Database\Seeders;

use App\Models\Kategorija;
use Illuminate\Database\Seeder;

class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k1 =  new Kategorija();
        $k1->nazivKategorije="Skolski pribor";
        $k1->save();

        $k2 =  new Kategorija();
        $k2->nazivKategorije="Kancelarijski pribor";
        $k2->save();

        $k3 =  new Kategorija();
        $k3->nazivKategorije="Za decu";
        $k3->save();


        $k4 =  new Kategorija();
        $k4->nazivKategorije="Umetnost";
        $k4->save();

        $k5 =  new Kategorija();
        $k5->nazivKategorije="Ostalo";
        $k5->save();


    }
}
