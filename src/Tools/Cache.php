<?php
namespace Douyin\Tools;

class Cache{
    protected $type;
    protected $path;
    
    public function __construct($type = 'file', $path = '../douyin/cache')
    {
        $this->type = $type;
        $this->path = $path;
        $array_path = explode('/', $path);
        $temp = '';
        foreach($array_path as $dir){
            if($dir != '.' && $dir != '..'){
                $temp = $temp.'/'.$dir;
                if(!is_dir($temp)){
                    mkdir($temp);
                }
            }else{
                $temp = $temp.$dir;
            }
            $temp = $temp . '/';
        }
    }

    public function set($key, $value, $time = 3600){
        $fileName = md5($key).'.cache';
        $save_path = $this->path . '/' . $fileName;
        if(is_string($time)){
            $time = strtotime($time);
        }else{
            $time = time() + $time;
        }
        file_put_contents($save_path, json_encode(['value'=>$value, 'time'=>$time]));
    }

    public function get($key){
        $fileName = md5($key).'.cache';
        $save_path = $this->path . '/' . $fileName;
        if(!is_file($save_path)){
            return false;
        }
        $data = json_decode(file_get_contents($save_path), true);
        if(is_array($data)){
            if($data['time'] > time()){
                return $data['value'];
            }else{
                unlink($save_path);
                return false;
            }
        }
        return null;
    }

    public function remove($key){
        $fileName = md5($key).'.cache';
        $save_path = $this->path . '/' . $fileName;
        if(!is_file($save_path)){
            return false;
        }else{
            unlink($save_path);
            return true;
        }
    }
}