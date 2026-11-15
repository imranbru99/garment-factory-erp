<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('garment:morning-report')->dailyAt('07:00')->timezone('Asia/Dhaka');
Schedule::command('garment:scan-issues')->hourly();
Schedule::command('garment:expiry-alerts')->dailyAt('08:00')->timezone('Asia/Dhaka');
