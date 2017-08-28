<?php 

namespace SistemaFarmacia;

use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{
	protected $table='farmacias';
	protected $primayKey='id';
	public $timestamps=false;

	protected $fillable=[

	'nombre',
	'direccion',
	'telefono',
	'latitud',
	'longitud',
	'estaPago',
	'localidad',
	'turno'
	];
	protected $guarded=[

	];
}