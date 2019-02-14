<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Indicator extends Model
{
    //
    use FullTextSearch;

    protected $table = 'indicators';

    protected $searchable = [
        'name'
    ];


    public function language_name(){
    	$language = Auth::user()->preferred_language;
    	if($language == 'ru'){
    		return $this->name_ru;
    	}

    	else if($language == 'en'){
    		return $this->name_en;
    	}

    	else if($language == 'ua'){
    		return $this->name_ua;
    	}
    }

        public function language_procurer(){
    	$language = Auth::user()->preferred_language;

    	if($language == 'ru'){
    		return $this->procurer_ru;
    	}

    	else if($language == 'en'){
    		return $this->procurer_en;
    	}

    	else if($language == 'ua'){
    		return $this->procurer_ua;
    	}
    }
}
