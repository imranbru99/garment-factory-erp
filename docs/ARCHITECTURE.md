# Architecture

Padma Apparel is one Laravel application.

```
public site (Blade)
    → Inquiry, Applicant, Supplier, Grievance
admin / floor / buyer / supplier / employee (Filament 3)
    → GarmentResource → policy → AccessManager
domain services
    → WorkflowService, OrderLifecycle, BomService, TnaService,
      StockService, IssueEngine, PayrollService, LcService
MySQL or SQLite
```

## Tenancy

A company owns units. A unit owns floors and lines. Transaction tables carry `unit_id` when the work belongs to a factory. `GarmentModel` limits admin and floor users to their units, buyer users to `buyer_id`, supplier users to `supplier_id`, and employee users to `employee_id`. Super admin is not limited.

## Identity

Users, roles and permissions are application tables. Roles store the panels they may open. Permissions use the filament-master key format. There is no Spatie permission package.

## Workflow

`config/workflows.php` is the allowed status graph per table. The edit screen renders one action per allowed next status. `WorkflowService` rejects anything else. Confirming a buyer order dispatches `OrderConfirmed`. `BuildOrderPlan` then writes the BOM, material requirements and TNA.

## Documents and AI

PDF bytes come from `laravel-unicode-pdf`. AI text, OCR and catalog calls go through `FactoryAi`. With `AI_FEATURES_ENABLED=false` those methods return null or the manual OCR path, and the office screens still work.

## Modules

`module_settings.module_key` toggles a Filament group. Hiding a module does not delete its rows and does not unregister the tables.
