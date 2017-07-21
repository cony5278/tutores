<?php

namespace Tutores;

use Illuminate\Database\Eloquent\Model;
class Area extends Model
{
	protected $table="areas";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre',
    ];

    public function areaAll(){
        return $this->all();
    }     
     
}
