<?php
namespace App\Enums;

enum FoodType: string
{
    case Soup = 'soup';
    case MainDish = 'main_dish';
    case Dessert = 'dessert';
    case BuffetTable = 'buffet';
    case Sauce = 'sauce';

    public function label(): string
    {
        return match ($this) {
            self::Soup => 'Polievka',
            self::MainDish => 'Hlavné jedlo',
            self::Dessert => 'Dezert',
            self::BuffetTable => 'Bufet',
            self::Sauce => 'Omáčka',
        };
    }
}
