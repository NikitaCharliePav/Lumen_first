<?php

namespace Database\Seeders;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class FavoritesSeeder extends Seeder
{

    protected array $usersId;
    protected array $productsId;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(empty(Favorite::first())){

            $this->usersId = User::all()->pluck('id')->toArray();
            $this->productsId = Product::all()->pluck('id')->toArray();

            for ($i = 0; $i < 10; $i++) {
                $this->createFavorite();
            }
        }
    }

    public function createFavorite()
    {
        $favorite = new Favorite();
        $favorite->user_id = Arr::random($this->usersId);
        $favorite->product_id = Arr::random($this->productsId);
        $favorite->save();
    }
}
