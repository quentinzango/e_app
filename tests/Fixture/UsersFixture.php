<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'role_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2024-12-14 11:06:49',
                'modified' => '2024-12-14 11:06:49',
                'deleted' => '2024-12-14 11:06:49',
                'token' => 'Lorem ipsum dolor sit amet',
                'token_expiration' => '2024-12-14 11:06:49',
            ],
        ];
        parent::init();
    }
}
