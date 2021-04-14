<?php

namespace App\Models;

use BaoPham\DynamoDb\DynamoDbModel;

class Led extends DynamoDbModel
{
    protected $table = 'led';
    protected $fillable = ['id', 'name', 'lastUpdate'];
    public $timestamps = false;
}
