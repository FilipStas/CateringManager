<?php

namespace App\Enums;
enum QuantityUnit: string
{
    case Piece = 'piece';
    case Kilogram = 'kilogram';
    case Liter = 'liter';

    public function label(): string
    {
        return match ($this) {
            self::Piece => 'ks',
            self::Kilogram => 'kg',
            self::Liter => 'l',
        };
    }
}

