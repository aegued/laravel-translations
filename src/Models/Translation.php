<?php

namespace Aegued\LaravelTranslations\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $connection;

    protected $table = 'translations';

    public function fromDateTime($value)
    {
        return config('database.default') === 'sqlsrv'
            ? Carbon::createFromFormat("Y-d-m H:i:s.v", parent::fromDateTime($value))->format("Y-d-m H:i:s")
            : $value;
    }

    protected $fillable = ['table_name', 'column_name', 'foreign_key', 'locale', 'value'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->connection = config('translations.db_connection');
    }
}
