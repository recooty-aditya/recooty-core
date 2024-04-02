<?php

namespace Recooty\Core\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;

class Membership extends JetstreamMembership
{
    public $incrementing = true;
}
