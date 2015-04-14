#Epl Kit Manager (Team Athabasca)
#####This is a website built using the laravel framework that can be used for managing assets(ie.Kits)     
#####Users can book, transfer and update kits in the system while admin users can create new kits for use. 

###Contributors:    
Adam Sykes    
Chris Dubeau    
Joshua Dotinga     
Mitchell Koens    


###Requirements:    
PHP >= 5.4 , Mycrypt PHP Extension    

###Install and Run     
Step 1: Clone repo     
`$ git clone https://github.com/macewanCMPT395/athabasca.git`     
Step 2: Install all required packages    
`$ composer install`       
Step 3: Ensure permissions of /app/storage folder are correct    
`$ sudo chmod -R 777 app/storage/`  
Step 4: Migrate database    
`$ php artisan migrate`    
Step 5: Seed Database with example data    
`$ php artisan db:seed`    
Step 6: Run webserver      
`$ php artisan serve` or for access outside of a virtual machine `$ php artisan serve --host 0.0.0.0`          
Step 7: Access Website at `http://localhost:8000/` or outside of virtual machine at that machines IP address under port:8000    
Login information can be found under `app/database/seeds/userTableSeeder.php`    
Or you may use Username:admin Password:20 for quick access.     
<br>   
<br>   


***
##Built on the Laravel Framework, Information can be found below.
#### Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
