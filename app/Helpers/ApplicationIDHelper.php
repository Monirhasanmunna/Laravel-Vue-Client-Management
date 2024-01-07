<?php

namespace App\Helpers;

use App\Models\Application;

class ApplicationIDHelper {
    public static function ApplicationId()
    {
        $currentYear = date('Y');
        $currentMonth = date('m');
        $lastTwoDigitsOfYear = substr($currentYear, -2);
        $applicationId = Application::orderByDesc('id')->first() ? Application::orderByDesc('id')->first()->id +1 :  1;
        $uniqueId = 'Ap-' . $lastTwoDigitsOfYear . substr($currentMonth, 0, 2) . $applicationId;

        return (string)$uniqueId;
    }
}