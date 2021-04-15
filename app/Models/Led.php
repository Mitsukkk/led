<?php

namespace App\Models;

use BaoPham\DynamoDb\DynamoDbModel;

class Led extends DynamoDbModel
{
    public $timestamps = false;
    protected $table = 'led';
    protected $fillable = ['id', 'name', 'lastUpdate'];
}
