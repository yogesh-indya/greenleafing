<?php

namespace App\Http\Controllers;

use App\Common\Invitation;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Common\OpenInvite;
use App\Http\Requests\OpenInviteRequest;


class InviteController extends Controller
{

    public function inviteOpen(OpenInviteRequest $openInvitation)
    {
      $unknownUser = new OpenInvite(new Invitation($openInvitation->from,$openInvitation->to,$openInvitation->message));
      return $unknownUser->invite();
    }
}
