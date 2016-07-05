<?php

namespace App\Common;

use App\Contracts\InvitationContract;

class VerifiedUserInvite implements InvitationContract
{
  Protected $invitation;

  public function __construct(Invitation $_invitation)
  {
    $this->invitation = $_invitation;
  }

  public function invite()
  {
    return $this->invitation->build();
  }
}
