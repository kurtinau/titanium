<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Storage;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);

		$this->app->singleton('League\Glide\Server', function ($app)
        {

            $filesystem = $app->make('Illuminate\Contracts\Filesystem\Filesystem');
            return \League\Glide\ServerFactory::create([
                'source'                => Storage::disk('s3')->getDriver(),
                'cache'                 => Storage::disk('local')->getDriver(),
                //'source_path_prefix'    => '',
                'cache_path_prefix'     => 'uploads/images/.cache',
                'base_url'              => 'img',
                'useSecureURLs'         => false,
                ]);
        });

	}

}
