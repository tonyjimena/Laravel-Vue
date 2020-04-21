<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'posts';

    protected $fillable = ['post_title', 'post_body', 'user'];

    protected $guarded = ['post_id'];

    /**
    * The primary key associated with the table.
    *
    * @var string
    */
    protected $primaryKey = 'post_id';

    /**
    * Indicates if the IDs are auto-incrementing.
    *
    * @var bool
    */
    public $incrementing = true;

    /**
    * The "type" of the auto-incrementing ID.
    *
    * @var string
    */
    protected $keyType = 'string';

    /**
    * Indicates if the model should be timestamped.
    *
    * @var bool
    */
    public $timestamps = true;



}
