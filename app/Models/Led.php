<?php

namespace App\Models;

use BaoPham\DynamoDb\DynamoDbModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Led extends DynamoDbModel
{
    public $timestamps = false;
    protected $table = 'led';
    protected $fillable = ['id', 'name', 'lastUpdate'];

    /**
     * @return BelongsToMany
     */
    public function color(): BelongsToMany
    {
        return $this->belongsTo(Color::class);
    }
}
