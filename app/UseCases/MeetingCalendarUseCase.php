<?php

namespace App\UseCases;

use Carbon\CarbonImmutable;

class MeetingCalendarUseCase
{
    public function __invoke()
    {
        $url = "https://mixtend.github.io/schedule.json";
        $options = [
            'http' => [
                'method' => 'GET',
                'header'=> 'Content-type: application/json; charset=UTF-8',
            ],
        ];
        $context = stream_context_create($options);
        $data = file_get_contents($url, false, $context);
        $data_array = json_decode($data, true);

        $working_start = new CarbonImmutable($data_array['working_hours']['start']);
        $working_end = new CarbonImmutable($data_array['working_hours']['end']);

        $working_hours_int = collect()->range((int)$working_start->format('H'), (int)$working_end->format("H"))->all();
        $working_hours = collect();

        $minutes = ['00', '10', '20', '30', '40', '50'];
        foreach ($working_hours_int as $hour) {
            foreach ($minutes as $m) {
                $working_hours = $working_hours->concat([(string)$hour . ":" . $m]);
            }
        }

        $meeting_days = array_keys($data_array['meetings']);

        return [
            'data' => [
                'working_hours' => $working_hours->all(),
                'meetings' => $data_array['meetings'],
                'meeting_days' => $meeting_days,
            ],
        ];
    }
}
