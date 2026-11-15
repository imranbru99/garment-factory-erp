# Decisions

## Filament 3.3, not Filament 4

`laravel-filament-master` and `laravel-attendance-hub` call Filament 3 form and table APIs. The spec allows v3 or v4. The app uses Filament 3.3.57.

## Adhikar is not installed

Packagist has no `imrandevbd/adhikar` package. The app does not invent an `ImranDev\Adhikar` namespace. Permission strings still come from `AdhikarPermissionHook::formatPermission`. `App\Access\AccessManager` checks those strings, a `*` grant, `audit.readonly`, and `module.{module}`.

## SQLite foreign keys are indexes, not constraints

Adding a foreign key with `Schema::table()->foreign()` rebuilds the SQLite file once per key. With about 180 tables that does not finish in a useful time on this disk. Columns stay indexed `unsignedBigInteger` values. MySQL can gain real foreign keys in a later migration. Stock, payroll and numbering stay consistent inside database transactions.

## Money and time

Amounts are integer minor units plus a `currency` code. Quantities are `decimal(18,4)`. The application timezone is UTC. Screens and Bangla dates use Asia/Dhaka. The factory weekend is Friday only, from `config/garment.php`, so a factory that also closes Saturday can change it without a code edit.

## Efficiency is a fraction in costing and a percent on the line

Costing stores efficiency as `0.65` for 65 percent, because CM is `line cost per minute * SMV / efficiency`. Hourly production stores efficiency as a percent for the floor board.

## Payroll rules live in config

OT multiplier, hours per day, the monthly OT ceiling, festival bonus percent and minimum age are read from `config/garment.php`. The calculator does not embed Bangladesh Labour Act numbers.

## AI catalog screen is off

`CatalogGenerationResource` does not match the Filament 3 `form(Form $form): Form` signature. The plugin UI is disabled in `AppServiceProvider`. `FactoryAi` still calls the catalog manager when AI is enabled.

## Admin panel package is the console

`laravel-admin-panel` defaults to `/admin`, which is the Filament office. Its prefix is `console`, so it stays available at `/console` without replacing the ERP.

## Document numbers

The series is `{prefix}-{unit code}-{fiscal code}-{padded sequence}`, for example `PO-U1-2627-000001`. The fiscal code is the Bangladesh July–June year from Tarikh via `BanglaDate`.

## Local database file

On this workstation the project disk is too slow for the schema build. `.env` points `DB_DATABASE` at `/home/dev/padma-apparel.sqlite`. `.env.example` still uses the project sqlite file.

## Demo seed turns auditing off

Creating 600 workers, three months of payroll and 30 days of hourly production through Eloquent events is dominated by the audit insert. The seeder turns `GarmentModel::$auditing` off for the load and turns it back on. Live office edits still write `audit_logs`, and those rows cannot be updated or deleted.

## 2FA is recorded, not enforced for the demo

Roles that should use a second factor have `requires_2fa`. The demo password is enough to sign in, so a reviewer is not blocked on the first day. Enforcement belongs with a verified authenticator app before a real go-live.
