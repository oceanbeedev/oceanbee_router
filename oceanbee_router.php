<?php 

  
    /**
     * oceanbee router
     * @author hadi hosseini
     * @link http://ocean-bee.com
     */
    class App {

        public static $found = false ;

        /**
         * check any route match with uri or no
         * 
         * @return boolean
         */
        public static function found() {
            return self::$found ;
        }

        /**
         * all routes inject to this function
         * @param string $url url route match
         * @param callable $action if route match run this
         * @param string $method request method
         * 
         * @return $action 
         */
        public static function route($url=null,$action=null,$method=null){

            //check action is callable
            if(!is_callable($action)){
                return false ;
            }

            //check request method match with route request method
            if($method != null){
    
                if($method != $_SERVER['REQUEST_METHOD']){
                    return false ;
                }
    
            }
    
            $uri = $_SERVER['REQUEST_URI'];
    
            //get uri segemnts by slash sign => '/'
            $uri_segments = explode('/',$uri);
    
    
          
    
            // get route url segments 
            $url_segments = explode('/',$url);
    
            // check route segments equal with url segments 
            if(count($url_segments) == count($uri_segments)){
                
                //this for check route is match or no
                $match = 0 ;

                //this for export paramter from request uri
                $params = [] ;
                

                //check route match with request uri
                for($i=0;$i<count($url_segments);$i++){
                    
                    //check if route has paramter register the paramter
                    if(strpos($url_segments[$i],':') !== false){
                        $match++;
                        $param_name = str_replace(':','',$url_segments[$i]);
                        $params[$param_name] = $uri_segments[$i] ;
                    }else 
                        if($url_segments[$i] == $uri_segments[$i]){
                            $match++;
                        }
    
                }
    
                //check if route match return action function(callabel)
                if($match == count($url_segments)){
                    self::$found = true ;
                    $action ((object)$params);
                }
    
            }else{
                return false ;
            }
    
    
    
        }
    
        /**
         * get route for get request
         * 
         * @param string $url
         * @param callable $action
         * 
         * @return callable \route()
         */
        public static function get($url,$action) {
            return self::route($url,$action,'GET');
        }

        /**
         * get route for post request
         * 
         * @param string $url
         * @param callable $action
         * 
         * @return callable \route()
         */
        public static function post($url,$action){
            return self::route($url,$action,'POST');
        }


    }

