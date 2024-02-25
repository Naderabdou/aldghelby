<?php

        namespace App\Repositories\Sql;
        use App\Models\Training;
        use App\Repositories\Contract\TrainingRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class TrainingRepository extends BaseRepository implements TrainingRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Training();

            }

        }
        