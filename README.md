# Laravel 5.x KillSwitch

As freelancers, it's a sad fact that some clients just don't want to pay once your project goes live, you need 
leverage, KillSwitch is that leverage.

### Setup

#### Install the package via composer

`composer require bagwaa/killswitch dev-master`

#### Add the service provider class to `config\app.php`

`KillSwitch\Providers\KillSwitchServiceProvider::class`

#### Publish the config file with some sensible defaults.

This will create a file in `config\killswitch.php`

`php artisan vendor:publish`

### Configuration

`config/killswitch.php`
 
#### url
 
The url that will be queried on each request, if the contents of this URL contain the word 'true' then the kill switch 
is activated and the Laravel application will be put into maintenence mode.
 
#### timeout (seconds)
 
Making a HTTP request to an external server may be something that concerns you, here we can set a sensible timeout
value, if no response is returned within the timeout limit then the request will timeout silently and the application
will continue to function correctly.
 
### What does the end result look like?
 
Whilst it's tempting to present a message stating that a site has been taken offline do to lack of payment, the default
maintenance mode view will be displayed.
  
![KillSwitch Demo](http://i.imgur.com/OUAG8KA.png)


