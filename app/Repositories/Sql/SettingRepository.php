<?php

        namespace App\Repositories\Sql;
        use App\Models\Setting;
        use App\Repositories\Contract\SettingRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class SettingRepository extends BaseRepository implements SettingRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Setting();

            }

            public function updateSetting($attr)
            {

                foreach ($attr as $key => $value) {
                    $this->model->where('key' , $key)->update(['value' => $value]);
                }

                return response()->json();

            }

        }
