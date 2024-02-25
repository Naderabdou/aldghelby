<?php

        namespace App\Repositories\Sql;
        use App\Models\Partner;
        use App\Repositories\Contract\PartnerRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class PartnerRepository extends BaseRepository implements PartnerRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Partner();

            }

        }
        