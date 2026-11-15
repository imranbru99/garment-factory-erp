# Package gaps

## imrandevbd/tarikh

- The composer extra points at `Tarikh\Laravel\TarikhServiceProvider`, which is not in the package. The app does not discover it.
- There is no Bangla calendar, Bangla digits, Bangla month names or Bangladesh fiscal year. `App\Support\BanglaDate` registers those as Tarikh macros: `fiscalCode`, `toBangla`, `toBengaliCalendar`, `banglaDigits`.

## imrandevbd/laravel-filament-master

- `MakeMasterResourceCommand` type-hints `Filament\Commands\Concerns\CanManipulateFiles`. Filament 3 moved that trait. A shim at `app/Shims/Filament/Commands` re-exports it.
- `FormMapper::guessTitleColumn` always returns `name`, so every business table has a `name` column.
- `BaseResource::getEloquentQuery` removes the soft-delete scope. `GarmentResource` restores the normal query so deleted rows stay hidden.
- The package constraint allows Filament 4, but the resource code is Filament 3.

## imrandevbd/laravel-ai-catalog

- The published Filament resource method signature is incompatible with Filament 3. The screen is disabled. Generation still goes through `AiCatalog`.

## imrandevbd/laravel-unicode-pdf

- The default Bengali font paths in the package config point at a Windows directory on the author's machine. PDF rendering uses the native engine and `loadHtml`. Bangla shaping in production needs fonts published under `storage/fonts` and the config paths overridden.
- `mpdf` is not installed. It needs `ext-gd`, which this machine does not have, and it does not support PHP 8.5.

## imrandevbd/drutogoti

- Migrations are stubs. The app copied them into `database/migrations` so the tables exist.
- Local `.env` enables the watcher. `.env.example` and PHPUnit leave it off.

## imrandevbd/laravel-universal-slug

- The slug history migration is a stub. The app copied it in.
- CMS models use `#[Slug(..., skipIfFilled: true)]` so a seeded slug is kept.

## imrandevbd/laravel-ai-ocr

- Package migrations are not auto-loaded. The app copied them.
- With AI off, extraction uses `manualOnly()`.

## imrandevbd/laravel-admin-panel

- It is a separate shell, not a Filament theme. It runs at `/console`.
