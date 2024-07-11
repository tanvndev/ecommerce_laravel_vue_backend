<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Glide\ServerFactory;
use League\Glide\Responses\LaravelResponseFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    // Khai bao cac service
    protected $serviceBindings = [
        // Base
        'App\Services\Interfaces\BaseServiceInterface' => 'App\Services\BaseService',
        // User
        'App\Services\Interfaces\User\UserServiceInterface' => 'App\Services\User\UserService',
        // UserCatalogue
        'App\Services\Interfaces\User\UserCatalogueServiceInterface' => 'App\Services\User\UserCatalogueService',
        // Upload
        'App\Services\Interfaces\Upload\UploadServiceInterface' => 'App\Services\Upload\UploadService',
        // ProductCatalogue
        'App\Services\Interfaces\Product\ProductCatalogueServiceInterface' => 'App\Services\Product\ProductCatalogueService',
        // Product
        'App\Services\Interfaces\Product\ProductServiceInterface' => 'App\Services\Product\ProductService',
        // // Post
        // 'App\Services\Interfaces\PostServiceInterface' => 'App\Services\PostService',
        // // PostCatalogue
        // 'App\Services\Interfaces\PostCatalogueServiceInterface' => 'App\Services\PostCatalogueService',
        // // Language
        // 'App\Services\Interfaces\LanguageServiceInterface' => 'App\Services\LanguageService',
        // // Language
        // 'App\Services\Interfaces\GenerateServiceInterface' => 'App\Services\GenerateService',
        // // Permission
        // 'App\Services\Interfaces\PermissionServiceInterface' => 'App\Services\PermissionService',

        // // AttributeCatalogue
        // 'App\Services\Interfaces\AttributeCatalogueServiceInterface' => 'App\Services\AttributeCatalogueService',
        // // Attribute
        // 'App\Services\Interfaces\AttributeServiceInterface' => 'App\Services\AttributeService',
        // // System
        // 'App\Services\Interfaces\SystemServiceInterface' => 'App\Services\SystemService',
        // // Menu
        // 'App\Services\Interfaces\MenuServiceInterface' => 'App\Services\MenuService',
        // // Menu
        // 'App\Services\Interfaces\MenuCatalogueServiceInterface' => 'App\Services\MenuCatalogueService',
        // // Slide
        // 'App\Services\Interfaces\SlideServiceInterface' => 'App\Services\SlideService',
        // // Widget
        // 'App\Services\Interfaces\WidgetServiceInterface' => 'App\Services\WidgetService',
        // // Promotion
        // 'App\Services\Interfaces\PromotionServiceInterface' => 'App\Services\PromotionService',
        // // Source
        // 'App\Services\Interfaces\SourceServiceInterface' => 'App\Services\SourceService',
        // // Customer
        // 'App\Services\Interfaces\CustomerServiceInterface' => 'App\Services\CustomerService',
        // // CustomerCatalogue
        // 'App\Services\Interfaces\CustomerCatalogueServiceInterface' => 'App\Services\CustomerCatalogueService',
        // // Cart
        // 'App\Services\Interfaces\CartServiceInterface' => 'App\Services\CartService',
        // // Order
        // 'App\Services\Interfaces\OrderServiceInterface' => 'App\Services\OrderService',
        // // Comment
        // 'App\Services\Interfaces\CommentServiceInterface' => 'App\Services\CommentService',
    ];
    public function register(): void
    {
        foreach ($this->serviceBindings as $key => $value) {
            $this->app->bind($key, $value);
        }

        $this->app->register(AppRepositoryProvider::class);

        // Register Glide server
        $this->app->singleton('League\Glide\Server', function ($app) {
            $fileSystem = $app->make(Filesystem::class);
            return ServerFactory::create([
                'response' => new LaravelResponseFactory(app('request')),
                'source' => $fileSystem->getDriver(),
                'cache' =>  $fileSystem->getDriver(),
                'source_path_prefix' => env('IMAGE_SOURCE_PATH'),
                'cache_path_prefix' => '.cache',
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
