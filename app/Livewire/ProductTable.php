<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination; 

class ProductTable extends Component
{
    public function render()
    {
        return view('livewire.product-table');
    }
}
