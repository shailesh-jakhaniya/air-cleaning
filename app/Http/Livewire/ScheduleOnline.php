<?php

namespace App\Http\Livewire;

use App\Models\AirDucts;
use App\Models\DryerVents;
use App\Models\ScheduleOnline as ModelsScheduleOnline;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ScheduleOnline extends Component
{
    public $title = 'Schedule Online';
    public $formData;
    public $dryerVents;
    public $numberOfFurance = [
        '1' => '1',
        '2' => '2',
        '3' => '3+'
    ];
    public $yes_no = [
        'yes' => 'Yes',
        'no' => 'No'
    ];

    public $locationOfFurance = [
        'basement' => 'Basement',
        'crawl_space' => 'Crawl Space',
        'attic' => 'Attic',
        'slab' => 'Slab',
        'unknown' => 'Unknown'
    ];

    public $dryerVentlPrice = 0;
    public $airDuctPrice = 0;
    public $finalPrice = 0;

    public function mount()
    {
        $this->dryerVents = DryerVents::get()->pluck('dryer_vent_exit_point','dryer_vent_exit_point')->toArray();
        // $this->numberOfFurance = AirDucts::get()->pluck('num_of_furnace','num_of_furnace')->toArray();
    }

    public function updatedFormDataSqFootage($value)
    {
        $airDuct = AirDucts::select('final_price')->whereRaw("$value BETWEEN square_footage_min AND square_footage_max")->first();
        $this->airDuctPrice = !empty($airDuct) ? $airDuct->final_price : 0;
        $this->finalPrice = $this->airDuctPrice + $this->dryerVentlPrice;
    }

    public function updatedFormDataNumberOfFurance($value)
    {
        $airDuct = AirDucts::select('final_price')->whereRaw("$value BETWEEN square_footage_min AND square_footage_max")->where('num_of_furnace', $value)->first();
        $this->airDuctPrice = !empty($airDuct) ? $airDuct->final_price : 0;
        $this->finalPrice = $this->airDuctPrice + $this->dryerVentlPrice;
    }

    public function updatedFormDataDryerVentExitPoint($value)
    {
        $dryerVent = DryerVents::select('price')->where('dryer_vent_exit_point', $value)->first();
        $this->dryerVentlPrice = !empty($dryerVent) ? $dryerVent->price : 0;
        $this->finalPrice = $this->airDuctPrice + $this->dryerVentlPrice;
    }

    public function store()
    {
        $created = ModelsScheduleOnline::create($this->formData);

        if ($created) {
            Session::flash('success', 'true');
            Session::flash('message', 'Your request scheduled successfully.!');
            $this->formData = [];
            return redirect(route('schedule-online'));
        } else {
            Session::flash('error', 'true');
            Session::flash('message', 'Something went wrong in schedule.!');
            return redirect(route('schedule-online'));
        }
    }

    public function render()
    {
        return view('livewire.schedule-online')->layout('layouts.guest');
    }
}
