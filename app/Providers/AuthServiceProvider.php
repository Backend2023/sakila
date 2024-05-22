<?php
use App\Models\Customer;
use App\Policies\CustomerPolicy;
//use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Customer::class => CustomerPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
