<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class LandingController extends Controller
{
    public function index()
    {
        // 6 barang terbaru (galeri "Baru di Fourth")
        $items = Item::with('category')->latest()->take(6)->get();

        // Seluruh menu, dikelompokkan per kategori (hanya kategori yang punya barang)
        $categories = Category::with(['items' => fn ($query) => $query->orderBy('name')])
            ->whereHas('items')
            ->orderBy('name')
            ->get();

        // Harga termurah untuk teks "Mulai dari ..."
        $minPrice = Item::min('price');

        return view('welcome', compact('items', 'categories', 'minPrice'));
    }

    public function dashboard()
    {
        $items = Item::count();
        $customers = User::count();
        $categories = Category::count();
        $discounts = Discount::count();

        return view('home', compact('items', 'customers', 'categories', 'discounts'));
    }
}
