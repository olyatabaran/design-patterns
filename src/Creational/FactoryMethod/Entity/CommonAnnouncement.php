<?php

namespace App\Creational\FactoryMethod\Entity;

abstract class CommonAnnouncement
{
    public abstract function createAnnouncement(): Announcement;
}