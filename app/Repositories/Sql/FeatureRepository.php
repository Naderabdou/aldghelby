<?php

        namespace App\Repositories\Sql;
        use App\Models\Feature;
        use App\Repositories\Contract\FeatureRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class FeatureRepository extends BaseRepository implements FeatureRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Feature();

            }

        }
        