<?php

        namespace App\Repositories\Sql;
        use App\Models\MailList;
        use App\Repositories\Contract\MailListRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class MailListRepository extends BaseRepository implements MailListRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new MailList();

            }

        }
        