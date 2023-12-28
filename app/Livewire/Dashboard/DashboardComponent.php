<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class DashboardComponent extends Component
{
    public $data;
    public function render()
    {
        // dd(Auth::check());
        $time_greeting = 'Hello, Buddy!';
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $time_greeting =  "Good morning";
        } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $time_greeting =  "Good afternoon";
        } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "22") {
            $time_greeting = "Good evening";
        } else
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "22") {
            $time_greeting =  "Good night";
        }

        $this->data = [
            'time_greetings' => $time_greeting
        ];

        return view('livewire.dashboard.dashboard-component')->layout('layouts.template2');
    }
}
