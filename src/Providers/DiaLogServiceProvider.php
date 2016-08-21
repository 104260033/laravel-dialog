<?php  namespace DiaLog\Providers;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Illuminate\Support\ServiceProvider;

class DiaLogServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('dialog', function () {
			$logger = new Logger('my_logger');
			$logger->pushHandler(new StreamHandler(__DIR__. '/logs/test.log'), Logger::DEBUG);
			$logger->pushHandler(new FirePHPHandler());
		});
	}
}
