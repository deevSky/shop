<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public static function _save($request, $id = null)
    {
        if (!$item = self::find($id)) {
            $item = new self();
        }

        if (isset($request['user_id']) && $request['user_id']) {
            $item->user_id = $request['user_id'];
        }

        if (isset($request['product_id']) && $request['product_id']) {
            $item->product_id = $request['product_id'];
        }

        if ($item->save()) {
            return $item;
        }

        return false;
    }
}
