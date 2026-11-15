# Blockers

## Adhikar is not published

`https://packagist.org/packages/imrandevbd/adhikar` returns 404. `filament-master` looks for `ImranDev\Adhikar\Adhikar` or `ImranDev\Adhikar\Models\Permission` and, when those classes are missing, its permission hook allows the action.

The app does not create classes in that namespace. `App\Access\AccessManager` is the replacement:

- super admin (role slug `super-admin`) is allowed
- permission slug `*` is allowed
- an exact slug from `AdhikarPermissionHook::formatPermission` is allowed
- `audit.readonly` allows permissions that start with `view`
- `module.{module}` allows every action in that module

`GarmentResource` calls `AccessManager` and does not call the hook's default-allow `check()`.

When Adhikar is published, replace `AccessManager` with the package and keep the same permission strings (`view_any.buyer_order` and the rest of the templates in `config/filament-master.php`).
