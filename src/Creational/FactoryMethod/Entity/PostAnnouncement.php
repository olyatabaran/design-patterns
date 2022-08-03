<?php

namespace App\Creational\FactoryMethod\Entity;

class PostAnnouncement extends CommonAnnouncement
{
    public function createAnnouncement(): Announcement
    {
        return new Post();
    }
}