<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    use HasFactory;

    // 拥有此内容的中间表
    public function chatinfo()
    {
        return $this->belongsTo(ChatInfo::class, 'text_id', 'id');
    }
}
