HOW TO USE THIS APPLICATION
===========================================================================================

Step 1: Upload the folder to your server

Step 2:

	i) While composer installed in your system, Open your CLI to download the composer dependancies:- 
	   <b>composer install</b>
	ii) Open the .env file and Configure your database & Mail support

If you are importing database <code>(lincoln.sql)</code>, you may skip step 3

Step 3: 

	i) Open the AppServiceProvider.php (Located at App\Providers) and comment this line at the boot function;
           <b>self::globalVals(1);</b>
	  
	ii) Open your CLI, navigate to your root folder and type:- <b>php artisan migrate</b>
	
	iii) Uncomment the line at 3(i) above <b>(self::globalVals(1))</b> after a successive migration.
	
	iv) You may want to seed the Roles, Menus, Users, Settings and Submenus test data by running:- 
	    <b>php artisan db:seed</b> at your CLI. 
	
	Alternatively, you may want to do it all together in step 3(ii) above by running:- 
	<b> php artisan migrate:refresh --seed </b>

Step 4: Clear all cache and views:- 
<code>php artisan config:cache</code>,then, <code>php artisan view:clear</code>

Step 5: You can now loggin as follows;

	i) Instructor - {username=code doctor, password=lincoln}
	ii) Super Admin - {username=amos, password=lincoln}
	iii) Student - {username=amos, password=lincoln}
	
	NB: All menus are managed by the Super Admin, if you have any issue log in as Super Admin to rectify.
