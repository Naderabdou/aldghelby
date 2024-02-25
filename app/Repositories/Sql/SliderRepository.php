<?php

        namespace App\Repositories\Sql;
        use App\Models\Slider;
        use App\Repositories\Contract\SliderRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class SliderRepository extends BaseRepository implements SliderRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Slider();

            }

        }
        