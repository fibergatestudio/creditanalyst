<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    //
    use FullTextSearch;
    
    protected $searchable = [
        'name'
    ];
}
