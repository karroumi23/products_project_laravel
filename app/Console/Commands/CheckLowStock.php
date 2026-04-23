<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Mail\LowStockAlert;
use Illuminate\Support\Facades\Mail;

class CheckLowStock extends Command
{
    protected $signature   = 'stock:check-low';
    protected $description = 'Vérifie les produits avec stock ≤ 5 et envoie une alerte email';

    public function handle()
    {
        $products = Product::where('stock', '<=', 5)->get();

        if ($products->isEmpty()) {
            $this->info('✅ Tous les stocks sont suffisants.');
            return;
        }

        Mail::to(config('mail.stock_manager'))
            ->send(new LowStockAlert($products));

        $this->info("📧 Alerte envoyée pour {$products->count()} produit(s) en stock faible.");
    }
}