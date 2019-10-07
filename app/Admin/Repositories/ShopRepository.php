<?php

namespace App\Admin\Repositories;

use App\Admin\Models\Shop;
use App\Repositories\BaseRepository;

/**
 * Class ShopRepository
 * @package App\Admin\Repositories
 * @version September 26, 2019, 1:45 pm UTC
*/

class ShopRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'supplier_id',
        'name',
        'about',
        'logo_image',
        'cover_image',
        'phone',
        'country_id',
        'city_province_id',
        'district_id',
        'address',
        'lat',
        'lng',
        'membership_id',
        'is_active',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Shop::class;
    }
}
