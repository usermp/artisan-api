## artisan-api


artisan-api is a Laravel package that allows you to execute Artisan commands via an API route. This package simplifies the process of managing your Laravel application's Artisan commands by providing a straightforward and easy-to-use API interface.

### Installation
To install the artisan-api package, you can use Composer. Run the following command in your terminal:

```bash
composer require usermp/artisan-api
```

After installing the package, you need to register the ArtisanServiceProvider in your Laravel application. To do this, add the service provider to the providers array in your ```config/app.php``` file:

```php
'providers' => [
    // Other service providers...

    Usermp\ArtisanApi\ArtisanServiceProvider::class,
],
```

Next, publish the configuration file to customize the package's settings. Run the following command:

```bash
php artisan vendor:publish --provider="Usermp\ArtisanApi\ArtisanServiceProvider" --tag="artisan-api-config"
```
This will create a configuration file at ```config/artisanapi.php```.

### Configuration
The configuration file allows you to customize the behavior of the artisan-api package. Below is the default configuration:

```php 
return [
    'with_key' => env('ARTISAN_WITH_KEY', false),
    'api_key'  => env('ARTISAN_API_KEY', 'YOUR KEY'),
    'allowed_commands' => [
        'list',
        'help',
        'make:controller',
        'make:model',
        'make:migration',
        'migrate',
        //add other command
    ],
];
```
- `with_key`: Determines if an API key is required to execute commands. Default is `false`.
- `api_key`: The API key used for authentication when `with_key` is set to `true`
- `allowed_commands`: An array of allowed Artisan commands that can be executed via the API.


### Usage

Running Artisan Commands via API
You can run any Artisan command using the ``` api/artisan ``` route. The request should be a POST request and include the command and its arguments in the request body.

Example Request
```http
POST /api/artisan
Content-Type: application/json
{
  "command": "migrate:fresh --seed",
}
```