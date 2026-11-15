# Automations

| Manual factory habit | Implementation |
|---|---|
| Re-typing a buyer PO | `FactoryAi::extractDocument()` via laravel-ai-ocr. Manual when AI is off. A person confirms before the order is confirmed. |
| Fabric and trims math | `BomService::requiredQuantity()` and `ensureForOrder()` on `OrderConfirmed` |
| Hand-built TNA | `TnaService::buildForOrder()`, back-scheduled with `config/garment.php` weekends and the holiday table |
| Chasing suppliers | Supplier portal on the PO. `garment:expiry-alerts` and issue scan cover the dated risks |
| Buyer approval ageing | Sample, lab dip and strike-off status graphs. Overdue TNA becomes an issue |
| Stock check by phone | `StockService` plus reorder issues |
| Cutting consumption sheet | Lay and marker tables. Variance is the difference between BOM `required_qty` and issued stock |
| Hand-written bundle tickets | Bundle `barcode`. PDF action on the bundle edit screen |
| Hourly tally | `HourlyProduction` and `/api/v1/scans` |
| Morning meeting pack | `garment:morning-report` |
| Line balance by memory | `LineBalanceService::bottleneck()` |
| QC paper summary | `QcInspection` plus `AqlService` |
| AQL by guess | `AqlService::plan()` for 1.0, 1.5, 2.5 and 4.0 |
| Packing list and invoice | Carton and `CommercialInvoice` records. PDF action on the invoice |
| LC diary | `garment:expiry-alerts` at 60, 30, 15, 7 and 1 days, plus `lc_expiry` issues inside 15 days |
| Bond reconciliation | `BondLicense.utilized_minor` and `LcService` |
| Wage Excel | `PayrollService` from config rules. Three seeded months |
| Attendance clean-up | laravel-attendance-hub device resources. Shift calculator is the package API |
| Profit after shipment | `ProfitService::orderProfitMinor()` and the hero journal |
| Late breakdown | `MaintenanceOrder` status graph |
| Certificate lapse | Certificate scan and expiry command |
| Audit pack | Compliance register, public certificates on the website, CAPA records |
| Phone-call approval | Workflow actions on the edit screen, stored on the model and in the audit log |
