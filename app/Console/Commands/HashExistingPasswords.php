<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class HashExistingPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hash-existing-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '既存の平文パスワードをBcryptでハッシュ化します';

    /**
     * コマンドの実行ロジック
     *
     * @return int
     */

    public function handle()
    {
        $employees = Employee::all();
        $this->info('既存のパスワードをハッシュ化しています...');

        foreach ($employees as $employee) {
            // すでにハッシュ化されている場合をスキップ
            if (Hash::needsRehash($employee->password)) {
                // パスワードをBcryptでハッシュ化して更新
                $employee->password = Hash::make($employee->password);
                $employee->save();

                $this->info("ID {$employee->id} のパスワードを更新しました");
            } else {
                $this->info("ID {$employee->id} のパスワードは既にハッシュ化されています");
            }
        }

        $this->info('すべてのパスワードをハッシュ化しました。');
        return Command::SUCCESS;
    }
}
