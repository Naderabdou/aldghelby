<?php

        namespace App\Repositories\Sql;
        use App\Models\Subscribe;
        use App\Repositories\Contract\SubscribeRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class SubscribeRepository extends BaseRepository implements SubscribeRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Subscribe();

            }

        }
        