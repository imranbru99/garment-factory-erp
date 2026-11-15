# Issue engine

An issue is the owned, timed record of a problem. The status path is:

`detected → assigned → acknowledged → root_cause → action_plan → in_progress → resolved → verified → closed`

`closed` can return to `detected`.

## Fields

Type, severity, owner, reporter, unit, order, line, description, SLA deadline, impact days, impact cost, root cause, recurrence count, and a polymorphic link (`linked_type`, `linked_id`).

## Playbooks

A playbook belongs to an issue type. Each step becomes an open `IssueTask` when the issue is raised. The demo playbook for trim shortage is: check the store, ask an alternate supplier, request buyer approval for a substitute, re-plan the line.

## SLA

Critical 4 hours, high 24, medium 72, low 168. `garment:scan-issues` calls `IssueEngine::escalate()`. A breached issue in `detected` or `assigned` is moved to `assigned`, commented, and emailed to `gm@padma.test`.

## Recurrence

The third open or closed issue with the same type and root cause creates one CAPA. The demo seed does this for root cause `Material`.

## Automatic detection

`IssueEngine::scan()` opens an issue, once, for:

- a TNA milestone still pending or delayed after its due date
- a master or amended LC expiring within 15 days
- a certificate expiring within 30 days
- hourly efficiency below `garment.efficiency_alert` today
- stock below an item reorder level

The floor PWA posts to `/api/v1/issues`, which uses the same `raise()` method.

## Suggestions

`FactoryAi::suggestIssuePlan()` asks laravel-ai-hub when AI is enabled. It returns null when AI is off, and the playbook tasks remain the manual path.
