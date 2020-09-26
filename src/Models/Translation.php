<?php

namespace Aegued\LaravelTranslations\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $connection;

    protected $table = 'translations';

    protected $fillable = ['table_name', 'column_name', 'foreign_key', 'locale', 'value'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->connection = config('translations.db_connection');
    }
}
