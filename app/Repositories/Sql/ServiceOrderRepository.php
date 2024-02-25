<?php

        namespace App\Repositories\Sql;
        use App\Models\ServiceOrder;
        use App\Repositories\Contract\ServiceOrderRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class ServiceOrderRepository extends BaseRepository implements ServiceOrderRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new ServiceOrder();

            }

        }
        