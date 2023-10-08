<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    use HasFactory;

    protected $table = "chatroom_1";
    protected $primaryKey = "id";
    protected $fillable = ["chat, username"];

    /**
     * Get the Chatroom associated with the Chatroom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ChatImage()
    {
        return $this->hasOne(ChatImage::class, 'id', 'image_id');
    }
}
