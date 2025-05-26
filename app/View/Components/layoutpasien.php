<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class layoutpasien extends Component {
    /**
     * Create a new component instance.
     */

    public $nama;
    public function __construct($nama) {
        $this->nama = $nama;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.layoutpasien');
    }
}
