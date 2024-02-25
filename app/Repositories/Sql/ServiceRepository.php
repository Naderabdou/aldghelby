<?php

        namespace App\Repositories\Sql;
        use App\Models\Service;
        use App\Repositories\Contract\ServiceRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Service();

            }

        }
        