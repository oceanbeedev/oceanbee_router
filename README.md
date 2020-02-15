# OceanBee PHP Router

Simple Router for PHP Developers


# Setup

inclue oceanbee_router.php to your project

## how to use ?

very simple !



|                |GET Method                          |Post Method              | Not Found          |
|----------------|-------------------------------|-----------------------------|-------|
|Static Methods |`App::get()`            |`App::post`             | `App::found()`

## Example

    <?php 
	    inclue "oceanbee_router.php" ;
		
		App::get('user/:id/edit',function($params){
			echo $params->id ;
		});
		
		App::post('/update/user',function(){
			//to do
		});
		
		if(App::found() == false){
			echo '404 not found' ;
		}


	
