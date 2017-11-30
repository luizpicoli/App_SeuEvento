<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model {

    protected $fillable = array('nome', 'local', 'atracao', 'data', 'detalhes', 'preco');

}
