<?php

namespace App\Enums;

enum ReportType: string
{
    case Orb = 'orb';
    case Triangle = 'triangle';
    case Disc = 'disc';
    case Other = 'other';

    public function label(): string
    {
        return match($this) {
            self::Orb => 'Orb',
            self::Triangle => 'Triangle',
            self::Disc => 'Disc',
            self::Other => 'Other',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn($type) => [$type->value => $type->label()])
        ->toArray();
    }
}
