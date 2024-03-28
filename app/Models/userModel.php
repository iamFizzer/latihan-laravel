<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class userModel extends Model
{
    public function alldata()
    {
        return DB::table('user')->get();
    }
    public function  addData($data)
    {
        return DB::table("user")->insert($data);
    }
    public function  find($id)
    {
        return DB::table("user")->where('id',$id)->first();
    }
    public function editData($data, $id)
    {
        return  DB::table('user')
                ->where('id', $id)
                ->update($data);
    }
}
