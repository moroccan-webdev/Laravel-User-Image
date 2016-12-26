<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Message extends Model
{

        use Searchable;

      protected $fillable = ['email', 'subject', 'message'];

      /**
      * Get the index name for the model.
      *
      * @return string
     */
     public function searchableAs()
     {
         return 'messages_index';
     }
}
