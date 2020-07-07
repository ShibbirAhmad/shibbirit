<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageReply extends Model
{
    protected $fillable = ['client_email','admin_email','subject','message'] ;
}
