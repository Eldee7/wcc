<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination; 

class ProductTable extends Component
{
    
    public  $product_name='';
    public  $quantity='';
    public  $price='';
    public  $condition='';
    public  $description='';

    public function add(){
        sleep(2);
        $this->validate([
            'product_name'=>'required|min:2',
            'quantity'=> 'required|integer|min:1',
            'price'=>'required|numeric|min:0',
            'condition'=>'required|in:New,Slightly Used,Old',
            'description'=>'nullable|string|max:500',
        ]);

        Product::create([
            'product_name' => $this->product_name,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'condition' => $this->condition,
            'description' => $this->description,
        ]);

        $this->reset(['product_name', 'quantity', 'price', 'condition', 'description']);
        session()->flash('message', 'Product added successfully');

    }

    public function render()
    {
        return view('livewire.product-table',
    [
        'products'=> product::paginate(10),
    ]);
    }
}
