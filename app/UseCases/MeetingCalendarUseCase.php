<?php

namespace App\UseCases;

class MeetingCalendarUseCase
{
    public function __invoke()
    {
        $url = "https://mixtend.github.io/schedule.json";
        $options = [
            'http' => [
                'methoed' => 'GET',
                'header'=> 'Content-type: application/json; charset=UTF-8',
            ],
        ];
        $context = stream_context_create($options);
        $data = file_get_contents($url, false, $context);

        return $data;
    }
}
