<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
	<p>PHP Version ^7.1.3 </p>
	<p>Laravel Framework 8.1* </p>
</p>

## Note (For ubuntu users only)
- To give full permissions/access to project folder, Open terminal ( **Ctrl + Alt + t** )

      sudo chmod -R a+rwx  /opt/lampp/htdocs/Admin_Penal
      
- To give full permissions/access to specific folder, Example : 

      sudo chmod -R a+rwx  /opt/lampp/htdocs/Admin_Penal/storage/logs
  
## Project installation steps

- Step 1 : composer update
- Step 2 : composer dumpa
- Step 3 : php artisan key:generate
- Step 4 : php artisan storage:link
- Step 5 : ./clean-up.sh


      
## Default setting keys

- application_logo : For all panel and app logo
- favicon_logo : For admin panel and app favicon image
- application_title : For Admin Penal Site Name Change

## Define .env Gmail User Name And Password

- MAIL_MAILER=smtp
- MAIL_HOST=smtp.gmail.com
- MAIL_PORT=465
- MAIL_USERNAME=Your User Name
- MAIL_PASSWORD=Your Password
- MAIL_ENCRYPTION=ssl
- MAIL_FROM_ADDRESS=Your Email ID
- MAIL_FROM_NAME=Admin Penal

## Front React Js

- npm install
- npm run start


## Templete W3layout
https://demo.w3layouts.com/demos_new/template_demo/06-10-2021/grocery-mart-liberty-demo_Free/794674028/web/index.html
