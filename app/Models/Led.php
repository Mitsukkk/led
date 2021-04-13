<?php

namespace App\Models;

use BaoPham\DynamoDb\DynamoDbModel;

/**
 * @method static where(string $string, int $int)
 */
class Led extends DynamoDbModel
{
    protected $table = 'led';
    protected $fillable = ['id', 'name', 'lastUpdate'];
}
