<?php

namespace App\Common;

class Invitation
{

  Protected $from;
  Protected $to;
  Protected $message;

  public function __construct($from,$to,$message)
  {
    $this->from = $from;
    $this->to = $to;
    $this->message = $message;
  }

  public function build()
  {
    return $this->from . $this->to . $this->message;
  }
}
