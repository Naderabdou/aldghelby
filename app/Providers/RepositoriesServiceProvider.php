<?php

namespace App\Providers;

        use App\Repositories\Sql\ClientRepository;
        use App\Repositories\Contract\ClientRepositoryInterface;

        use App\Repositories\Sql\OurValueRepository;
        use App\Repositories\Contract\OurValueRepositoryInterface;

        use App\Repositories\Sql\SubscribeRepository;
        use App\Repositories\Contract\SubscribeRepositoryInterface;

        use App\Repositories\Sql\ServiceOrderRepository;
        use App\Repositories\Contract\ServiceOrderRepositoryInterface;

        use App\Repositories\Sql\PartnerRepository;
        use App\Repositories\Contract\PartnerRepositoryInterface;

        use App\Repositories\Sql\TrainingRepository;
        use App\Repositories\Contract\TrainingRepositoryInterface;

        use App\Repositories\Sql\FeatureRepository;
        use App\Repositories\Contract\FeatureRepositoryInterface;

        use App\Repositories\Sql\SliderRepository;
        use App\Repositories\Contract\SliderRepositoryInterface;

        use App\Repositories\Sql\BlogRepository;
        use App\Repositories\Contract\BlogRepositoryInterface;

        use App\Repositories\Sql\ServiceCategoryRepository;
        use App\Repositories\Contract\ServiceCategoryRepositoryInterface;

        use App\Repositories\Sql\ServiceRepository;
        use App\Repositories\Contract\ServiceRepositoryInterface;

        use App\Repositories\Sql\ProjectRepository;
        use App\Repositories\Contract\ProjectRepositoryInterface;

        use App\Repositories\Sql\CategoryRepository;
        use App\Repositories\Contract\CategoryRepositoryInterface;

        use App\Repositories\Sql\MailListRepository;
        use App\Repositories\Contract\MailListRepositoryInterface;

        use App\Repositories\Sql\SettingRepository;
        use App\Repositories\Contract\SettingRepositoryInterface;

        use App\Repositories\Sql\VideoRepository;
        use App\Repositories\Contract\VideoRepositoryInterface;

        use App\Repositories\Sql\ArticleRepository;
        use App\Repositories\Contract\ArticleRepositoryInterface;

        use App\Repositories\Sql\BookRepository;
        use App\Repositories\Contract\BookRepositoryInterface;

        use App\Repositories\Sql\UserRepository;
        use App\Repositories\Contract\UserRepositoryInterface;

        use App\Repositories\Sql\ContactRepository;
        use App\Repositories\Contract\ContactRepositoryInterface;
// interface


use App\Repositories\Contract\BaseRepositoryInterface;
// repository

use App\Repositories\Sql\BaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{

    public function register(){

        $this->app->bind(ClientRepositoryInterface::class, ClientRepository::class);

        $this->app->bind(OurValueRepositoryInterface::class, OurValueRepository::class);

        $this->app->bind(SubscribeRepositoryInterface::class, SubscribeRepository::class);

        $this->app->bind(ServiceOrderRepositoryInterface::class, ServiceOrderRepository::class);

        $this->app->bind(PartnerRepositoryInterface::class, PartnerRepository::class);

        $this->app->bind(TrainingRepositoryInterface::class, TrainingRepository::class);

        $this->app->bind(FeatureRepositoryInterface::class, FeatureRepository::class);

        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);

        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);

        $this->app->bind(ServiceCategoryRepositoryInterface::class, ServiceCategoryRepository::class);

        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);

        $this->app->bind(ProjectRepositoryInterface::class, ProjectRepository::class);

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

        $this->app->bind(MailListRepositoryInterface::class, MailListRepository::class);

        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);

        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);

        $this->app->bind(VideoRepositoryInterface::class, VideoRepository::class);

        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);

        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);

        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);

    }

    public function boot()
    {
        //
    }

}
