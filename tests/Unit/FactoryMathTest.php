<?php

use App\Services\Bom\BomService;
use App\Services\Costing\CostingService;
use App\Services\Payroll\PayrollService;
use App\Services\Planning\TnaService;
use App\Services\Quality\AqlService;
use App\Services\Sewing\EfficiencyService;
use App\Services\Sewing\LineBalanceService;
use Carbon\Carbon;

it('builds fob from cost components and a what-if fabric price', function () {
    $costing = new CostingService;
    $cm = $costing->cmMinor('8.5', '0.65', 18000);
    expect($cm)->toBeGreaterThan(0);

    $fob = $costing->fobMinor([
        'fabric_minor' => 90,
        'trims_minor' => 18,
        'cm_minor' => $cm,
        'wash_minor' => 0,
        'print_minor' => 0,
        'test_minor' => 3,
        'overhead_minor' => 8,
        'commercial_minor' => 6,
        'profit_minor' => 15,
    ]);

    $whatIf = $costing->whatIf([
        'fabric_minor' => 90,
        'trims_minor' => 18,
        'smv' => '8.5',
        'line_cost_minor' => 18000,
        'test_minor' => 3,
        'overhead_minor' => 8,
        'commercial_minor' => 6,
        'profit_minor' => 15,
    ], 1.1, 1, '0.65');

    expect($fob)->toBe(90 + 18 + $cm + 3 + 8 + 6 + 15)
        ->and($whatIf['fabric_minor'])->toBe(99)
        ->and($whatIf['fob_minor'])->toBeGreaterThan($fob);
});

it('grosses fabric requirement with wastage', function () {
    expect(app(BomService::class)->requiredQuantity('10000', '0.2200', '5'))->toBe('2310.0000');
});

it('picks the AQL 2.5 sample for a 10,000 piece lot', function () {
    $plan = app(AqlService::class)->plan(10000, '2.5');
    expect($plan['sample_size'])->toBe(200)
        ->and($plan['accept_point'])->toBe(10)
        ->and($plan['reject_point'])->toBe(11)
        ->and(app(AqlService::class)->decide(0, 10, 10))->toBe('pass')
        ->and(app(AqlService::class)->decide(1, 0, 10))->toBe('fail');
});

it('pays overtime from the configured multiplier', function () {
    $result = app(PayrollService::class)->calculate(3000000, '2');
    expect($result['ot_minor'])->toBe(50000)
        ->and($result['net_minor'])->toBe(3050000)
        ->and($result['flags'])->toBe([]);

    $over = app(PayrollService::class)->calculate(3000000, '60');
    expect($over['flags'])->toContain('ot_limit');
    expect(app(PayrollService::class)->isUnderage(Carbon::parse('2015-01-01'), Carbon::parse('2026-01-01')))->toBeTrue();
});

it('calculates line efficiency and the bottleneck', function () {
    expect(app(EfficiencyService::class)->efficiencyPercent(50, '8.5', 25, 60))->toBe('28.3333');
    $bottleneck = app(LineBalanceService::class)->bottleneck([
        ['name' => 'Join shoulder', 'smv' => 0.4, 'operators' => 2],
        ['name' => 'Sleeve', 'smv' => 0.8, 'operators' => 1],
    ]);
    expect($bottleneck['name'])->toBe('Sleeve');
});

it('skips Fridays when back-scheduling a TNA date', function () {
    $due = app(TnaService::class)->dueDate(Carbon::parse('2026-11-20'), 1, []);
    expect($due->toDateString())->toBe('2026-11-19');

    $beforeFriday = app(TnaService::class)->dueDate(Carbon::parse('2026-11-21'), 1, []);
    expect($beforeFriday->toDateString())->toBe('2026-11-19');
});
