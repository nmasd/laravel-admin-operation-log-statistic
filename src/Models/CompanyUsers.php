<?php

namespace Xianghuawe\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyUsers extends Model
{
    protected $table = 'company_users';

    public function __construct(array $attributes = [])
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        parent::__construct($attributes);
    }
}
