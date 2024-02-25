<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /* public function makeModel($modelName, $tableName = null, $namespace = null)
    {
        $model = ucfirst($modelName);
        $mainSpace = "namespace App\Models;";
        $tableName = $tableName ? 'protected $table = ' . "'$tableName';" : '';
        $content = "<?php

        $mainSpace
        use Illuminate\Database\Eloquent\Factories\HasFactory;
        use Illuminate\Database\Eloquent\Model;

        class {$model} extends Model
        {
            use HasFactory;

            $tableName
        }
        ";
        $folder = "App/Models/";

        if (!is_dir($folder)) {
            File::makeDirectory($folder, $mode = 0777, true, true);
        }

        $written = Storage::disk('app')->put('Models/' . $modelName . '.php', $content);

        if ($written) {
            $this->info('Created new model ' . $modelName . '.php in App\Models\\');
        } else {
            $this->info('Something went wrong');
        }
    } */


    public function makeRepo($modelName)
    {
        $model = ucfirst($modelName);
        $mainSpace = "namespace App\Repositories\Sql;";
        $modelSpace = "use App\Models\\$model;";
        $content = "<?php

        $mainSpace
        $modelSpace
        use App\Repositories\Contract\\{$modelName}RepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class {$model}Repository extends BaseRepository implements {$modelName}RepositoryInterface
        {

            public function __construct()
            {

                return \$this->model = new $model();

            }

        }
        ";
        $folder = "App/Repositories/Sql";

        if (!is_dir($folder)) {
            File::makeDirectory($folder, $mode = 0777, true, true);
        }

        $written = Storage::disk('app')->put('Repositories/Sql/' . $modelName . 'Repository.php', $content);

        if ($written) {
            $this->info('Created new Repo ' . $modelName . 'Repository.php in App\Repositories');
        } else {
            $this->info('Something went wrong');
        }
    }  // end of make repository

    public function makeInterface($modelName)
    {
        $model = ucfirst($modelName);
        $mainSpace = "namespace App\Repositories\Contract;";
        $modelSpace = "use App\Models\\$model;";
        $content = "<?php

        $mainSpace

        interface {$model}RepositoryInterface
        {

        }
        ";
        $folder = "App/Repositories/";

        if (!is_dir($folder)) {
            File::makeDirectory($folder, $mode = 0777, true, true);
        }

        $written = Storage::disk('app')->put('Repositories/Contract/' . $modelName . 'RepositoryInterface.php', $content);

        if ($written) {
            $this->info('Created new Repo ' . $modelName . 'RepositoryInterface.php in App\Repositories');

            $desc = "
        use App\Repositories\Sql\\{$modelName}Repository;
        use App\Repositories\Contract\\{$modelName}RepositoryInterface;";


            $desc2 =

                "        \$this->app->bind({$modelName}RepositoryInterface::class, {$modelName}Repository::class);";
            $replace = 'namespace App\Providers;' . "\n" . $desc;
            $replace2 = 'public function register(){' . "\n\n" . $desc2;

            $fileprovider = file_get_contents('App/Providers/RepositoriesServiceProvider.php');

            // header('Content-Type: text/plain');

            $pattern = preg_quote('use App\Repositories\Sql\\' . $modelName . 'Repository', '/');

            $pattern = "/^.*$pattern.*\$/m";


            if (preg_match_all($pattern, $fileprovider, $matches)) { } else {

                file_put_contents('App/Providers/RepositoriesServiceProvider.php', str_replace('namespace App\Providers;', $replace,  file_get_contents('App/Providers/RepositoriesServiceProvider.php')));
                file_put_contents('App/Providers/RepositoriesServiceProvider.php', str_replace('public function register(){', $replace2,  file_get_contents('App/Providers/RepositoriesServiceProvider.php')));
            } // end of preg match  all

        } else {
            $this->info('Something went wrong');
        }
    } // end of make interface

    public function makeResource($modelName)
    {

        $model = ucfirst($modelName);

        $content = "<?php

        namespace App\Http\Resources\Api;

        use Illuminate\Http\Resources\Json\JsonResource;

        class {$model}Resource extends JsonResource
        {

            public function toArray(\$request)
            {
                return [
                    // 'name' => \$this->name,
                ];
            }
        }
        ";

        $folder = "App/Http/Resources/Api";

        if (!is_dir($folder)) {

            File::makeDirectory($folder, $mode = 0777, true, true);
        }

        $written = Storage::disk('app')->put('Http/Resources/Api/' . $model . 'Resource.php', $content);

        if ($written) {

            $this->info('Created new Resource ' . $model . 'Resource.php in App\Http\Resources');
        } else {

            $this->info('Something went wrong');
        }
    } // end of make resource

    public function handle()
    {

        $modelName = $this->ask('Enter model name');
        $resourceName = $this->ask('Enter Resource name');

        $validator = Validator::make([

            'model_name' => $modelName,

        ], [

            'model_name' => ['required'],

        ]);

        if ($validator->fails()) {

            $this->info('Model are not created.');

            // foreach ($validator->errors()->all() as $error) {
            //     $this->info($error);
            // }
            // return 1;
        }

        $this->makeRepo($modelName);
        $this->makeInterface($modelName);

        if ($resourceName) {

            $this->makeResource($resourceName);
        }
    } // end of handle

} // end of class
