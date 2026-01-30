<?php

namespace Xianghuawe\Admin\Console;

use Illuminate\Console\Command;

class SetStatisticCompanyCommand extends Command
{
    protected $signature = 'admin-operation-logs:set-statistic-company';

    protected $description = '补充公司id-日志记录表';

    /**
     * @return int
     * @throws \Exception
     */
    public function handle()
    {

        config('admin.database.operation_statistic_model')::whereNull('company_id')
        ->chunkById(100, function($data) {
            foreach ($data as $value) {
                $company_id = config('admin.database.company_users_model')::where('admin_user_id', $value->user_id)->value('company_id');
                $value->company_id = $company_id;
                $value->save();
            }
        });

        return self::SUCCESS;
    }

}
