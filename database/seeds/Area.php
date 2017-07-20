<?php

use Illuminate\Database\Seeder;

class Area extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('areas')->delete();
        \Tutores\Area::create(array('nombre' => 'fisica'));
        \Tutores\Area::create(array('nombre' => 'calculo'));
        \Tutores\Area::create(array('nombre' => 'quimica'));
        \Tutores\Area::create(array('nombre' => 'español'));
        \Tutores\Area::create(array('nombre' => 'informatica'));
        \Tutores\Area::create(array('nombre' => 'base de datos'));
        \Tutores\Area::create(array('nombre' => 'programacon I'));
        \Tutores\Area::create(array('nombre' => 'programacion II'));
        \Tutores\Area::create(array('nombre' => 'electronica'));
        \Tutores\Area::create(array('nombre' => 'otro'));

    }
}
