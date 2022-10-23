<?php

namespace App\Http\Controllers;

use App\UseCases\MeetingCalendarUseCase;

class MeetingController extends Controller
{
    public function index(MeetingCalendarUseCase $useCase)
    {
        return view('meeting')->with('args', $useCase());
    }
}
