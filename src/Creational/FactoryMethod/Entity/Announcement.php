<?php

namespace App\Creational\FactoryMethod\Entity;

interface Announcement
{
    public function ready(): bool;
    public function announce(User $user): void;
}