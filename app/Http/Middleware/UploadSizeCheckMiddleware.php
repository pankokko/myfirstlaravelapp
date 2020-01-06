<?php

namespace App\Http\Middleware;
use Closure;

class UploadSizeCheckMiddleware
      
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {         
        if(isset($_SERVER['CONTENT_LENGTH'])){
            // eval(\Psy\sh());
            $post_max_size = $this->return_bytes(ini_get('post_max_size'));
            $uploaded_size = intval($_SERVER['CONTENT_LENGTH']);                          
            
            if($post_max_size < $uploaded_size ){
              return back()->with('message' ,"ファイルサイズが大きすぎます(最大18MB)");
            }
        }                
        return $next($request);
    }
    
    public function return_bytes($val) {
        
        $val = trim($val);        
        $unit = $val[strlen($val)-1];
        $_val = substr($val, 0, strlen($val)-1);        
        
        if($unit == 'G') 
        return intval($_val) * 1024 * 1024 * 1024;
        
        if($unit == 'M') 
        return intval($_val) * 1024 * 1024;
        
        if($unit == 'K') 
        return intval($_val) * 1024;
    }
}
