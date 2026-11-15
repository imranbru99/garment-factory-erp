<?php

declare(strict_types=1);

return [
    'display_timezone' => 'Asia/Dhaka',
    'weekend_days' => [5],
    'pdf_tables' => [
        'buyer_orders',
        'boms',
        'purchase_orders',
        'quotations',
        'commercial_invoices',
        'shipments',
        'gate_passes',
        'payroll_lines',
        'bundles',
        'cartons',
    ],
    'payroll' => [
        'ot_multiplier' => 2,
        'hours_per_day' => 8,
        'days_per_month' => 30,
        'festival_bonus_percent' => 100,
        'attendance_bonus_minor' => 50000,
        'max_ot_hours_per_month' => 48,
        'minimum_age' => 18,
        'rest_day' => 5,
    ],
    'ai_enabled' => (bool) env('AI_FEATURES_ENABLED', false),
    'webhook_secret' => env('WEBHOOK_SECRET', 'padma-demo-secret'),
    'efficiency_alert' => 50,
    'demo_employees' => (int) env('DEMO_EMPLOYEES', 600),
    'demo_history_days' => (int) env('DEMO_HISTORY_DAYS', 30),
];
