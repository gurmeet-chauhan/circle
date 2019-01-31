<?php

use App\Chat;

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat.{id}', function ($user, $id) {
    return $user->id == Chat::find($id)->recipient_id || $user->id == Chat::find($id)->initiator_id;
});
