<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $repositoryBindings = [
        // Base
        'App\Repositories\Interfaces\BaseRepositoryInterface' => 'App\Repositories\BaseRepository',
        // User
        'App\Repositories\Interfaces\User\UserRepositoryInterface' => 'App\Repositories\User\UserRepository',
        // UserCatalogue
        'App\Repositories\Interfaces\User\UserCatalogueRepositoryInterface' => 'App\Repositories\User\UserCatalogueRepository',
        // Province
        'App\Repositories\Interfaces\Location\ProvinceRepositoryInterface' => 'App\Repositories\Location\ProvinceRepository',
        // District
        'App\Repositories\Interfaces\Location\DistrictRepositoryInterface' => 'App\Repositories\Location\DistrictRepository',
        // ProductCatalogue
        'App\Repositories\Interfaces\Product\ProductCatalogueRepositoryInterface' => 'App\Repositories\Product\ProductCatalogueRepository',
        // Product
        'App\Repositories\Interfaces\Product\ProductRepositoryInterface' => 'App\Repositories\Product\ProductRepository',
        // // Post
        // 'App\Repositories\Interfaces\PostRepositoryInterface' => 'App\Repositories\PostRepository',
        // // PostCatalogue
        // 'App\Repositories\Interfaces\PostCatalogueRepositoryInterface' => 'App\Repositories\PostCatalogueRepository',
        // // Language
        // 'App\Repositories\Interfaces\LanguageRepositoryInterface' => 'App\Repositories\LanguageRepository',
        // // Language
        // 'App\Repositories\Interfaces\GenerateRepositoryInterface' => 'App\Repositories\GenerateRepository',
        // // Permission
        // 'App\Repositories\Interfaces\PermissionRepositoryInterface' => 'App\Repositories\PermissionRepository',

        // // Router
        // 'App\Repositories\Interfaces\RouterRepositoryInterface' => 'App\Repositories\RouterRepository',

        // // AttributeCatalogue
        // 'App\Repositories\Interfaces\AttributeCatalogueRepositoryInterface' => 'App\Repositories\AttributeCatalogueRepository',
        // // Attribute
        // 'App\Repositories\Interfaces\AttributeRepositoryInterface' => 'App\Repositories\AttributeRepository',
        // // ProductVariant
        // 'App\Repositories\Interfaces\ProductVariantRepositoryInterface' => 'App\Repositories\ProductVariantRepository',
        // // ProductVariantLanguage
        // 'App\Repositories\Interfaces\ProductVariantLanguageRepositoryInterface' => 'App\Repositories\ProductVariantLanguageRepository',
        // // ProductVariantAttribute
        // 'App\Repositories\Interfaces\ProductVariantAttributeRepositoryInterface' => 'App\Repositories\ProductVariantAttributeRepository',
        // // System
        // 'App\Repositories\Interfaces\SystemRepositoryInterface' => 'App\Repositories\SystemRepository',
        // // Menu
        // 'App\Repositories\Interfaces\MenuRepositoryInterface' => 'App\Repositories\MenuRepository',
        // // Menu Catalogue
        // 'App\Repositories\Interfaces\MenuCatalogueRepositoryInterface' => 'App\Repositories\MenuCatalogueRepository',
        // // Slide
        // 'App\Repositories\Interfaces\SlideRepositoryInterface' => 'App\Repositories\SlideRepository',
        // // Widget
        // 'App\Repositories\Interfaces\WidgetRepositoryInterface' => 'App\Repositories\WidgetRepository',
        // // Promotion
        // 'App\Repositories\Interfaces\PromotionRepositoryInterface' => 'App\Repositories\PromotionRepository',
        // // Source
        // 'App\Repositories\Interfaces\SourceRepositoryInterface' => 'App\Repositories\SourceRepository',
        // // Customer
        // 'App\Repositories\Interfaces\CustomerRepositoryInterface' => 'App\Repositories\CustomerRepository',
        // // CustomerCatalogue
        // 'App\Repositories\Interfaces\CustomerCatalogueRepositoryInterface' => 'App\Repositories\CustomerCatalogueRepository',
        // // Order
        // 'App\Repositories\Interfaces\OrderRepositoryInterface' => 'App\Repositories\OrderRepository',
        // // Comment
        // 'App\Repositories\Interfaces\CommentRepositoryInterface' => 'App\Repositories\CommentRepository',
    ];

    public function register(): void
    {
        foreach ($this->repositoryBindings as $key => $value) {
            $this->app->bind($key, $value);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
