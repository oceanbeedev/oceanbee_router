# OceanBee PHP Router

Simple Router for PHP Developers


# Setup

inclue oceanbee_router.php to your project

## how to use ?

very simple !



|                |GET Method                          |Post Method              | Not Found          |
|----------------|-------------------------------|-----------------------------|-------|
|Static Methods |`ObRouter::get()`            |`ObRouter::post`             | `ObRouter::found()`

## Example
```php
    <?php 
	    inclue "oceanbee_router.php" ;
		
		ObRouter::get('user/:id/edit',function($params){
			echo $params->id ;
		});
		
		ObRouter::post('/update/user',function(){
			//to do
		});
		
		if(ObRouter::found() == false){
			echo '404 not found' ;
		}


	
