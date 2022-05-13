<?php



function buildPrefix(string $module_name,string $type){
     return (config(ucfirst($module_name).'prefix.'.$type,config('module.prefix.'.$type)).'/'.config(ucfirst($module_name).'.module-name'));

     //config('customers.prefix.frontend','module.prefix.frontend').'/'.config('customers.module-name')

}

function buildView(string $module_name,string $type,string $blade_name){
    return (ucfirst($module_name).'::'.$type.'.'.$blade_name);

    //'customers::backend.index'
}

function buildLang(string $module_name,string $file_name,string $key_name){
    return (ucfirst($module_name).'::'.$file_name.'.'.$key_name);

    //'customers::site.index'
}

function buildControllerNamespace(string $module_name){
    return ucfirst($module_name).DS().'Http'.DS().'Controllers';
}
