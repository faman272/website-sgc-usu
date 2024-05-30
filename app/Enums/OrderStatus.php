<?php

namespace App\Enums;

use App\Models\Order;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasColor, HasIcon, HasLabel
{
    

    case MenungguKonfirmasi = 'menunggu Konfirmasi';

    case MenungguPembayaran = 'menunggu Pembayaran';

    case Diproses = 'diproses';

    case Dikirim = 'dikirim';

    case Diterima = 'diterima';

    case Dibatalkan = 'dibatalkan';



    public function getLabel(): string
    {
        return match ($this) {
            self::Diproses => 'diproses',
            self::Dikirim => 'dikirim',
            self::Diterima => 'diterima',
            self::Dibatalkan => 'dibatalkan',
            self::MenungguKonfirmasi => 'menunggu konfirmasi',
            self::MenungguPembayaran => 'menunggu pembayaran',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Diproses => 'warning',
            self::Dikirim, self::Diterima => 'success',
            self::Dibatalkan => 'danger',
            self::MenungguKonfirmasi, self::MenungguPembayaran => 'info',
        };
    }



    public function getIcon(): ?string
    {
        return match ($this) {
            self::Diproses => 'heroicon-m-arrow-path',
            self::Dikirim => 'heroicon-m-truck',
            self::Diterima => 'heroicon-m-check-badge',
            self::Dibatalkan => 'heroicon-m-x-circle',
            self::MenungguKonfirmasi => 'heroicon-m-clock',
            self::MenungguPembayaran => 'heroicon-m-banknotes',
        };
    }
}
