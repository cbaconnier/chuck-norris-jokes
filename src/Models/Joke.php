<?php

namespace Cbaconnier\ChuckNorrisJokes\Models;

use Illuminate\Database\Eloquent\Model;

class Joke extends Model
{
    protected $guarded = [];

    protected $table = 'jokes';
}
