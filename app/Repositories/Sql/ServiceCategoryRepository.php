<?php

        namespace App\Repositories\Sql;
        use App\Models\ServiceCategory;
        use App\Repositories\Contract\ServiceCategoryRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class ServiceCategoryRepository extends BaseRepository implements ServiceCategoryRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new ServiceCategory();

            }

        }
        