# Progress

## Phase 0 — Setup

Done. Laravel 12, Filament 3.3, Sanctum, Horizon, Pest, Pint, Larastan. Packages installed from Packagist except Adhikar, which is documented in `docs/BLOCKERS.md`. Panels: `/admin`, `/floor`, `/buyer`, `/supplier`, `/me`, and the package console at `/console`. Module toggles, numbering, audit, Bangla date macros, permission stand-in, and demo users are in place.

## Phase 1 — Master data, marketing, style, sampling

Done as schema, Filament resources, costing service, and seeded buyers, styles, a quotation and a sample.

## Phase 2 — Order, BOM, TNA, procurement, inventory, lab

Done for the hero order. Confirming an order writes the BOM, the gross requirement and the TNA. Stock receive and FIFO issue are implemented. Fabric roll and GRN are seeded.

## Phase 3 — Planning through finishing

Schema and Filament resources exist. Efficiency, line balance, AQL, hourly history and a bundle are implemented. The floor PWA posts scans and issues. A drag-and-drop Gantt is not built; line plans are ordinary records.

## Phase 4 — Commercial and shipping

LC utilization, expiry alerts, a master LC, a back-to-back LC, a UD, a shipment and a realized invoice are implemented.

## Phase 5 — HR, compliance, maintenance

Payroll math, three months of payroll rows, employees, a published job, certificates and an ESG row are implemented. Attendance devices use laravel-attendance-hub's own resources. Biometric devices are not simulated in the seed.

## Phase 6 — Accounts

Chart accounts and a posted realization journal are seeded. `ProfitService` subtracts cost from revenue. A full trial balance, Mushak forms and cash-flow forecast screen are not separate reports yet. The factory report page shows the operating counts.

## Phase 7 — Issue engine

Done. Raise, playbook tasks, SLA escalation, recurrence CAPA, and the scanner for TNA, LC, certificates, efficiency and reorder. Wired from the order and floor flows described above.

## Phase 8 — AI, portals, API

AI calls are centralized and off by default. Buyer, supplier and employee panels list their records. Sanctum scan, order, issue and signed webhook routes are tested.

## Phase 9 — Public site

Home, about, products, facility, machinery, quality, compliance, sustainability, clients, RFQ, careers, news, downloads, contact, FAQ, privacy, terms, code of conduct, grievance, supplier registration, sitemap, robots, 404, 500 and maintenance are routed. RFQ creates an inquiry.

## Phase 10 — Demo, tests, docs

Pest covers costing, BOM, AQL, payroll, efficiency, TNA dates, order confirmation, FIFO stock, issues, numbering, LC limits, three-way match, the scan API, the public RFQ and the Filament buyer list. `garment:soak` can insert bundle and scan rows for a capacity check; the demo seed does not insert 500,000 bundles.

## Still thinner than a factory go-live

- Database foreign keys on SQLite
- Bespoke PDF layouts per document, and Bangla font files
- Drag-and-drop planning board
- Full general ledger statements and Mushak
- Enforced 2FA
- Device punch import in the demo
- Adhikar, once it is published
