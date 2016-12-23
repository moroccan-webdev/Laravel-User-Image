<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Client extends Model
{
      use Searchable;

    protected $fillable = ['name', 'title', 'email'];

    /**
    * Get the index name for the model.
    *
    * @return string
   */
   public function searchableAs()
   {
       return 'clients_index';
   }
}
