<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    //
    use FullTextSearch;

    /* protected $table = 'new_indicators'; */
    protected $table = 'indicators';
    
    protected $searchable = [
        'name'
    ];
}
