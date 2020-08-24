<?php


namespace App\Classes;

class Cart
{
    protected $cart = [];

    public function getCart()
    {
        return $this->cart = session('cart');
    }

    public function addToCart($product, $quantity, $offer_id)
    {
        $price = '';
        $product_id = '';
        $title = '';

        if ($offer_id) {
            foreach ($product->offers as $offer) {
                if ($offer_id == $offer->id) {
                    $price = $offer->price;
                    $title = $product->title;
                    foreach($offer->propertyOptions as $option) {
                        $title .= ', ' . $option->property->title . ' : ' . $option->title . ', ';
                    }
                }
            }
            $product_id = $product->id . '_' . $offer_id;
            $title = mb_substr($title, 0, -2);
        } else {
            $price = $product->price;
            $product_id = $product->id;
            $title = $product->title;
        }

        if (session('cart.products.' . $product_id)) {
            session(['cart.products.' . $product_id . '.quantity' => session('cart.products.' . $product_id . '.quantity') + $quantity]);
        } else {
            session(['cart.products.' . $product_id . '.product_id' => $product_id]);
            session(['cart.products.' . $product_id . '.title' => $title]);
            session(['cart.products.' . $product_id . '.price' => $price]);
            session(['cart.products.' . $product_id . '.slug' => $product->slug]);
            session(['cart.products.' . $product_id . '.category' => $product->category->slug]);
            session(['cart.products.' . $product_id . '.quantity' => $quantity]);
            session(['cart.products.' . $product_id . '.image' => $product->getImage()]);
        }
        if (session('cart.quantity')) {
            session(['cart.quantity' => session('cart.quantity') + $quantity]);
        } else {
            session(['cart.quantity' => $quantity]);
        }
        if (session('cart.total')) {
            session(['cart.total' => session('cart.total') + $price * $quantity]);
        } else {
            session(['cart.total' => $price * $quantity]);
        }
        $this->cart = session('cart');
        return $this->cart;
    }

    public function removeProduct($product, $offer_id)
    {
        $price = '';
        $product_id = '';

        if ($offer_id) {
            foreach ($product->offers as $offer) {
                if ($offer_id == $offer->id) {
                    $price = $offer->price;
                }
            }
            $product_id = $product->id . '_' . $offer_id;
        } else {
            $price = $product->price;
            $product_id = $product->id;
        }

        if (session('cart.products.' . $product_id . '.quantity') > 1) {
            session(['cart.products.' . $product_id . '.quantity' => session('cart.products.' . $product_id . '.quantity') - 1]);
        } else {
            session()->forget('cart.products.' . $product_id);
        }
        session(['cart.quantity' => session('cart.quantity') - 1]);
        session(['cart.total' => session('cart.total') - $price]);
        if (!session('cart.quantity')) {
            session()->forget('cart');
        }

        $this->cart = session('cart');
        return $this->cart;
    }
}
