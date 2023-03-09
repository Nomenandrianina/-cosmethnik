<?php

namespace App\Repositories;

use App\Models\Commentaires;
use App\Repositories\BaseRepository;

/**
 * Class CommentairesRepository
 * @package App\Repositories
 * @version March 9, 2023, 1:10 pm +07
*/

class CommentairesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description',
        'model_type',
        'model_id'
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
        return Commentaires::class;
    }
}
