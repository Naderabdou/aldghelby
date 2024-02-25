<?php

        namespace App\Repositories\Sql;
        use App\Models\OurValue;
        use App\Repositories\Contract\OurValueRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class OurValueRepository extends BaseRepository implements OurValueRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new OurValue();

            }

        }
        