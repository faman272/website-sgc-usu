<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                "nama" => "Baju Laravel",
                "slug" => "baju-laravel",
                "berat" => 200,
                "harga" => 120000,
                "harga_diskon" => 110000,
                "deskripsi" => "Baju laravel dengan bahan terbaik dan nyaman dipakai. Tersedia dalam berbagai ukuran.",
                "gambar" => "baju.webp",
                "stok" => 8,
            ],
            [
                "nama" => "Mug Laravel 10",
                "slug" => "mug-laravel-10",
                "berat" => 300,
                "harga" => 40000,
                "harga_diskon" => 35000,
                "deskripsi" => "Mug Laravel dengan desain eksklusif dan terbatas. Cocok untuk menemani saat bekerja.",
                "gambar" => "mug.webp",
                "stok" => 15,
            ],
            [
                "nama" => "Mousepad Logo Laravel",
                "slug" => "mousepad-logo-laravel",
                "berat" => 150,
                "harga" => 80000,
                "harga_diskon" => 70000,
                "deskripsi" => "Mousepad dengan logo Laravel yang eksklusif dan nyaman digunakan. Cocok untuk menemani saat bekerja.",
                "gambar" => "mousepad.webp",
                "stok" => 20,
            ],
            [
                "nama" => "Topi Hitam Laravel",
                "slug" => "topi-hitam-laravel",
                "berat" => 100,
                "harga" => 45000,
                "harga_diskon" => 35000,
                "deskripsi" => "Topi hitam dengan logo Laravel yang eksklusif dan nyaman digunakan. Cocok untuk menemani saat bekerja.",
                "gambar" => "topi.webp",
                "stok" => 12,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }

}
