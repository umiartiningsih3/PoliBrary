<?php
namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    public static function send(
        $userId,
        $senderId,
        $title,
        $message,
        $type,
        $referenceId = null,
        $referenceType = null
    ){

        Notification::create([

            'user_id'=>$userId,

            'sender_id'=>$senderId,

            'title'=>$title,

            'message'=>$message,

            'type'=>$type,

            'reference_id'=>$referenceId,

            'reference_type'=>$referenceType

        ]);

    }
}