<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Time extends Model
{
    public $timestamps = false;

    /**
     * function to filter time logged records
     *
     * @param bool $count, if true then the function will return total number of records filtered otherwise will return records object
     * @return mixed
     */
    public static function filter($count = false){
        $field      = Input::get('field'); // field to order by
        $asc        = Input::get('asc'); // whether order type is asc or desc
        $search     = Input::get('search'); // search value for logged time description
        $start      = Input::get('start'); // offset of records to get
        $limit      = Input::get('limit'); // number of records per page
        $start = is_numeric($start) ? $start : 0;
        $limit = is_numeric($limit) ? $limit : 10;

        $items = Time::select(['id','date_finished','time_tracked_formatted','description']);
        if($search){
            $items->where('description','LIKE','%'.$search.'%');
        }
        if($count === false){
            $items->offset($start)->limit($limit);
        }
        if($field){
            $items = $items->orderBy($field, $asc === true || $asc === 'true' ? 'asc' : 'desc');
        }
        $items = $items->get();
        if($count === true){
            return $items->count();
        }else{
            return $items;
        }
    }
}
