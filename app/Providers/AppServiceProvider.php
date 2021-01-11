<?php

namespace App\Providers;

use App\Repositories\Interfaces\IItemRepository;
use App\Repositories\Interfaces\IOrderRepository;
use App\Repositories\Interfaces\IPersonRepository;
use App\Repositories\Interfaces\IPhoneRepository;
use App\Repositories\Interfaces\IShiptoRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\ItemRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PersonRepository;
use App\Repositories\PhoneRepository;
use App\Repositories\ShiptoRepository;
use App\Repositories\UserRepository;
use App\Services\Interfaces\IItemService;
use App\Services\Interfaces\IOrderService;
use App\Services\Interfaces\IPersonService;
use App\Services\Interfaces\IPhoneService;
use App\Services\Interfaces\IShiptoService;
use App\Services\Interfaces\IUserService;
use App\Services\Interfaces\IXmlService;
use App\Services\ItemService;
use App\Services\OrderService;
use App\Services\PersonService;
use App\Services\PhoneService;
use App\Services\ShiptoService;
use App\Services\UserService;
use App\Services\XmlService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Xml
        $this->app->bind(IXmlService::class, XmlService::class);
//        $this->app->bind(IXmlRepository::class, EmpresaRepository::class);


        // Person
        $this->app->bind(IPersonService::class, PersonService::class);
        $this->app->bind(IPersonRepository::class, PersonRepository::class);

        // Phone
        $this->app->bind(IPhoneService::class, PhoneService::class);
        $this->app->bind(IPhoneRepository::class, PhoneRepository::class);

        // Order
        $this->app->bind(IOrderService::class, OrderService::class);
        $this->app->bind(IOrderRepository::class, OrderRepository::class);

        // Shipto
        $this->app->bind(IShiptoService::class, ShiptoService::class);
        $this->app->bind(IShiptoRepository::class, ShiptoRepository::class);

        // Item
        $this->app->bind(IItemService::class, ItemService::class);
        $this->app->bind(IItemRepository::class, ItemRepository::class);

        // Item
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
