<?php

namespace App\FactoryMethod\Entity;

abstract class CommonAnnouncement
{
    public abstract function createAnnouncement(): Announcement;
}