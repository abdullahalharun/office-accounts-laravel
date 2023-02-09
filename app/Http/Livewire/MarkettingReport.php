<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Earning;
use Livewire\Component;

class MarkettingReport extends Component
{
    public $earnings;
    public $earningByCategory;
    public $categories;
    public $query;
    public $year;
    public $month;
    public $datefrom;
    public $dateto;
    public $displayMonth;

    // protected $listeners = ['updateReport' => '$refresh'];

    public function mount()
    {
        $this->month = date('m', strtotime(now()));
        $this->year =  date('Y', strtotime(now()));
    }

    public function render()
    {
        $this->datefrom = date($this->year . '-' . $this->month . '-01');
        $this->dateto = date($this->year . '-' . $this->month . '-31');
        $this->categories = Category::all();
        $this->earnings = Earning::groupBy('category_id')
            ->selectRaw('category_id, account_id, amount, count(amount) as total_count, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->get();
        $this->earningByCategory = Earning::groupBy('category_id')
            ->selectRaw('category_id, account_id, amount, count(amount) as total_count, sum(amount) as total_amount, charge, sum(charge) as total_charge')
            ->whereBetween('date', [$this->datefrom, $this->dateto])
            ->get();

        return view('livewire.marketting-report');
    }
}
