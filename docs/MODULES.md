# Modules

Each module below has Eloquent models, a Filament resource (list, create, edit, filters from filament-master, Excel export, workflow actions where a status exists, PDF where listed in `config/garment.php`), a policy, and rows in the demo seed when the module is on the hero path.

| Module | What it holds | Automation |
|---|---|---|
| Administration | Company, units, floors, lines, roles, permissions, numbering, holidays, shifts, approvals, documents, settings, audit | Numbering service, immutable audit |
| Master data | Countries, buyers' colors and sizes, items, UoM, defects, incoterms | Reorder scan |
| Marketing | Inquiries, quotations, visits, negotiations | Website RFQ creates an inquiry |
| Style and costing | Styles, measurements, costing versions | `CostingService` FOB, CM and what-if |
| Sampling | Sample requests, comments, lab dips, strike-offs | Status graph on the edit screen |
| Orders | Buyer orders, lines, revisions, BOM, requirements, TNA, claims | Confirm builds BOM, requirements and TNA |
| Commercial | PI, LC, amendment, UD, bond, import docs, bill of entry, invoice, realization, incentive | `LcService` utilization and margin; expiry command |
| Procurement | Requisition, RFQ, PO, GRN, supplier invoice, return | Three-way match |
| Inventory | Stores, bins, rolls, movements, balances, FIFO layers, reservations, transfers, cycle counts | `StockService` receive and issue |
| Laboratory | 4-point rolls, lab tests | Status graph |
| Planning | Line plans and slots | Material readiness percent |
| Cutting | Cut plans, markers, lays, bundles | Bundle barcode on the hero order |
| Embroidery | Job work, sent and received qty | Status graph |
| Sewing | Line setup, OB, hourly production, bundle scans, stoppages | Efficiency, bottleneck, low-efficiency issues |
| Quality | Inspections, defects, CAPA, measurement audit, needle log | `AqlService` |
| Wash | Recipes and batches | Status graph |
| Finishing | Hourly output, cartons | Carton on the hero shipment |
| Shipping | Shipments, gate passes, visitors, vehicles | Shipment on the hero order |
| Maintenance | Machines, work orders, utilities, safety checks | Status graph |
| Human resources | Employees, jobs, applicants, leave, payroll, loans, grievances, training | `PayrollService`; careers form |
| Compliance | Certificates, audits, findings, incidents, ESG, chemicals | Expiry alerts and issue scan |
| Accounts | Ledger, journals, AP, AR, assets, budgets | Hero realization journal; `ProfitService` |
| Issues | Types, playbooks, issues, tasks, comments | `IssueEngine` |
| Communication | Announcements, comments, tasks | Notification log |
| Website | Pages, news, categories, FAQs, downloads, contact | Public site |

Buyer portal resources include TNA, claims, inspections and shipments. Supplier portal resources include POs, GRNs and invoices. Employee portal resources include payroll lines, leave, loans, grievances and announcements. Floor resources include rolls, bundles, inspections, cartons, gate passes, hourly production, stoppages and issues.
