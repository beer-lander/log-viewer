Laravel 5 log viewer
======================

TL;DR
-----
The best (IMO) Log Viewer for Laravel 5 (compatible with 4.2 too). 

Install
-------
Install via composer
```
composer require inewspjb/log-viewer
```

Add Service Provider to `config/app.php` in `providers` section
```php
BinhBEER\LogViewer\LogViewerServiceProvider::class,
```

Add a route in `app/Http/routes.php` (or choose another route): 
```php 
Route::get('logs', '\BinhBEER\LogViewer\LogViewerController@index');
``` 

Go to `http://myapp/logs` or some other route
