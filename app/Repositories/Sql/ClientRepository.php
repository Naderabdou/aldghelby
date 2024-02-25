<?php

        namespace App\Repositories\Sql;
        use App\Models\Client;
        use App\Repositories\Contract\ClientRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class ClientRepository extends BaseRepository implements ClientRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Client();

            }

        }
        