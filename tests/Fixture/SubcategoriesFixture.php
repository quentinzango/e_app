<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SubcategoriesFixture
 */
class SubcategoriesFixture extends TestFixture
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
                'categorie_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-12-14 12:14:19',
                'modified' => '2024-12-14 12:14:19',
                'deleted' => '2024-12-14 12:14:19',
            ],
        ];
        parent::init();
    }
}
