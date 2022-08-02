<?php

namespace App\FactoryMethod\Entity;

class PostAnnouncement extends CommonAnnouncement
{
    public function createAnnouncement(): Announcement
    {
        return new Post();
    }
}