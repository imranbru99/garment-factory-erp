#!/usr/bin/env python3
"""Generate the garment domain: migration, models, Filament resources, policies."""

from __future__ import annotations

import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
ENTITIES: list[dict] = []

BN = {
    "Company": "কোম্পানি", "Unit": "ইউনিট", "Floor": "ফ্লোর", "Line": "লাইন",
    "Department": "বিভাগ", "Designation": "পদবি", "Role": "ভূমিকা", "Permission": "অনুমতি",
    "ModuleSetting": "মডিউল", "FiscalYear": "অর্থবছর", "NumberingSeries": "নাম্বারিং সিরিজ",
    "NumberingCounter": "নাম্বার কাউন্টার", "Currency": "মুদ্রা", "ExchangeRate": "বিনিময় হার",
    "Holiday": "ছুটি", "Shift": "শিফট", "ApprovalChain": "অনুমোদন চেইন", "ApprovalStep": "অনুমোদন ধাপ",
    "ApprovalRequest": "অনুমোদন অনুরোধ", "ApprovalAction": "অনুমোদন কার্য", "NotificationTemplate": "নোটিফিকেশন টেমপ্লেট",
    "NotificationLog": "নোটিফিকেশন লগ", "StoredDocument": "নথি", "AppSetting": "সেটিংস",
    "Country": "দেশ", "Port": "বন্দর", "Buyer": "ক্রেতা", "BuyerContact": "ক্রেতা যোগাযোগ",
    "BuyingHouse": "বায়িং হাউস", "Brand": "ব্র্যান্ড", "Season": "সিজন", "Supplier": "সরবরাহকারী",
    "SupplierContact": "সরবরাহকারী যোগাযোগ", "Subcontractor": "সাবকন্ট্রাক্টর", "Forwarder": "ফরওয়ার্ডার",
    "Bank": "ব্যাংক", "ItemGroup": "আইটেম গ্রুপ", "Item": "আইটেম", "HsCode": "এইচএস কোড",
    "Color": "রঙ", "Size": "সাইজ", "SizeGroup": "সাইজ গ্রুপ", "UnitOfMeasure": "পরিমাপের একক",
    "UomConversion": "একক রূপান্তর", "FabricConstruction": "ফ্যাব্রিক কনস্ট্রাকশন", "WashType": "ওয়াশ টাইপ",
    "EmbroideryType": "এমব্রয়ডারি টাইপ", "LibraryOperation": "অপারেশন", "MachineType": "মেশিন টাইপ",
    "Defect": "ত্রুটি", "Incoterm": "ইনকোটার্ম", "PaymentTerm": "পেমেন্ট টার্ম", "Inquiry": "ইনকোয়ারি",
    "Quotation": "কোটেশন", "QuotationLine": "কোটেশন লাইন", "BuyerVisit": "ক্রেতা সফর",
    "Negotiation": "দরকষাকষি", "BuyerRequirement": "ক্রেতার শর্ত", "Style": "স্টাইল",
    "MeasurementPoint": "মাপ পয়েন্ট", "Costing": "কস্টিং", "CostingLine": "কস্টিং লাইন",
    "SampleRequest": "স্যাম্পল অনুরোধ", "SampleComment": "স্যাম্পল মন্তব্য", "LabDip": "ল্যাব ডিপ",
    "StrikeOff": "স্ট্রাইক অফ", "BuyerOrder": "অর্ডার", "OrderLine": "অর্ডার লাইন",
    "OrderRevision": "অর্ডার রিভিশন", "Bom": "বিওএম", "BomLine": "বিওএম লাইন",
    "MaterialRequirement": "মালামাল চাহিদা", "TnaTemplate": "টিএনএ টেমপ্লেট", "TnaTemplateTask": "টিএনএ কাজ",
    "TnaMilestone": "টিএনএ মাইলস্টোন", "Claim": "দাবি", "ProformaInvoice": "প্রোফরমা ইনভয়েস",
    "LetterOfCredit": "এলসি", "LcAmendment": "এলসি সংশোধন", "UtilizationDeclaration": "ইউডি",
    "BondLicense": "বন্ড লাইসেন্স", "BondEntry": "বন্ড এন্ট্রি", "ImportDocument": "আমদানি নথি",
    "BillOfEntry": "বিল অফ এন্ট্রি", "CommercialInvoice": "কমার্শিয়াল ইনভয়েস", "ExportBill": "রপ্তানি বিল",
    "Realization": "প্রসিডস রিয়ালাইজেশন", "IncentiveClaim": "নগদ সহায়তা", "Requisition": "রিকুইজিশন",
    "RequisitionLine": "রিকুইজিশন লাইন", "Rfq": "আরএফকিউ", "RfqQuote": "আরএফকিউ কোট",
    "PurchaseOrder": "ক্রয় আদেশ", "PurchaseOrderLine": "ক্রয় লাইন", "GoodsReceipt": "জিআরএন",
    "GoodsReceiptLine": "জিআরএন লাইন", "SupplierInvoice": "সরবরাহকারী ইনভয়েস", "SupplierReturn": "ফেরত",
    "Store": "স্টোর", "Bin": "বিন", "FabricRoll": "ফ্যাব্রিক রোল", "StockMovement": "স্টক মুভমেন্ট",
    "StockBalance": "স্টক ব্যালেন্স", "StockLayer": "স্টক লেয়ার", "StockReservation": "রিজার্ভেশন",
    "StockTransfer": "স্টক ট্রান্সফার", "CycleCount": "সাইকেল কাউন্ট", "FabricInspection": "ফ্যাব্রিক ইন্সপেকশন",
    "InspectionDefect": "ইন্সপেকশন ত্রুটি", "LabTest": "ল্যাব টেস্ট", "LinePlan": "লাইন প্ল্যান",
    "PlanSlot": "প্ল্যান স্লট", "CutPlan": "কাট প্ল্যান", "Marker": "মার্কার", "Lay": "লে",
    "Bundle": "বান্ডেল", "EmbroideryJob": "এমব্রয়ডারি জব", "LineSetup": "লাইন সেটআপ",
    "OperationBulletin": "অপারেশন বুলেটিন", "ObLine": "ওবি লাইন", "HourlyProduction": "ঘণ্টাভিত্তিক উৎপাদন",
    "BundleScan": "বান্ডেল স্ক্যান", "LineStoppage": "লাইন বন্ধ", "QcInspection": "কিউসি ইন্সপেকশন",
    "QcDefect": "কিউসি ত্রুটি", "Capa": "ক্যাপা", "MeasurementAudit": "মাপ অডিট", "NeedleLog": "নিডল লগ",
    "WashRecipe": "ওয়াশ রেসিপি", "WashBatch": "ওয়াশ ব্যাচ", "FinishingOutput": "ফিনিশিং আউটপুট",
    "Carton": "কার্টন", "CartonItem": "কার্টন আইটেম", "Shipment": "শিপমেন্ট", "GatePass": "গেট পাস",
    "VisitorLog": "ভিজিটর লগ", "VehicleLog": "যানবাহন লগ", "FactoryMachine": "মেশিন",
    "MaintenanceOrder": "মেইনটেন্যান্স অর্ডার", "UtilityLog": "ইউটিলিটি লগ", "SafetyCheck": "সেফটি চেক",
    "Employee": "কর্মচারী", "JobPost": "চাকরির বিজ্ঞপ্তি", "Applicant": "আবেদনকারী",
    "LeaveRequest": "ছুটির আবেদন", "PayrollPeriod": "বেতন মাস", "PayrollLine": "বেতন লাইন",
    "Loan": "ঋণ", "Grievance": "অভিযোগ", "TrainingRecord": "প্রশিক্ষণ", "Announcement": "বিজ্ঞপ্তি",
    "Certificate": "সনদ", "ComplianceAudit": "কমপ্লায়েন্স অডিট", "AuditFinding": "অডিট ফাইন্ডিং",
    "Incident": "দুর্ঘটনা", "EsgRecord": "ইএসজি রেকর্ড", "ChemicalItem": "কেমিক্যাল",
    "LedgerAccount": "হিসাব", "JournalEntry": "জার্নাল", "JournalLine": "জার্নাল লাইন",
    "ApBill": "প্রদেয় বিল", "ArInvoice": "প্রাপ্য ইনভয়েস", "ArReceipt": "প্রাপ্তি",
    "FixedAsset": "স্থায়ী সম্পদ", "BudgetLine": "বাজেট লাইন", "IssueType": "ইস্যু ধরন",
    "Playbook": "প্লেবুক", "PlaybookStep": "প্লেবুক ধাপ", "Issue": "ইস্যু", "IssueTask": "ইস্যু কাজ",
    "IssueComment": "ইস্যু মন্তব্য", "RecordComment": "মন্তব্য", "TaskItem": "কাজ",
    "CmsPage": "পাতা", "NewsPost": "সংবাদ", "ProductCategory": "পণ্য ক্যাটাগরি", "CaseStudy": "কেস স্টাডি",
    "Faq": "প্রশ্নোত্তর", "DownloadItem": "ডাউনলোড", "ContactMessage": "যোগাযোগ বার্তা",     "TeamMember": "টিম সদস্য",
    "AuditLog": "অডিট লগ",
}

GROUPS_BN = {
    "Administration": "প্রশাসন", "Master Data": "মাস্টার ডাটা", "Marketing": "মার্কেটিং",
    "Style & Costing": "স্টাইল ও কস্টিং", "Sampling": "স্যাম্পলিং", "Orders": "অর্ডার",
    "Commercial": "কমার্শিয়াল", "Procurement": "ক্রয়", "Inventory": "ইনভেন্টরি",
    "Laboratory": "ল্যাবরেটরি", "Planning": "প্ল্যানিং", "Cutting": "কাটিং",
    "Embroidery": "এমব্রয়ডারি", "Sewing": "সেলাই", "Quality": "কোয়ালিটি", "Wash": "ওয়াশ",
    "Finishing": "ফিনিশিং", "Shipping": "শিপিং", "Maintenance": "মেইনটেন্যান্স",
    "Human Resources": "মানব সম্পদ", "Compliance": "কমপ্লায়েন্স", "Accounts": "হিসাব",
    "Issues": "ইস্যু", "Communication": "যোগাযোগ", "Website": "ওয়েবসাইট",
}


def add(cls, table, module, group, unit="optional", cols=None, flow=None, status_default="draft",
        unique=None, morph=None, slug_from=None, panels=None):
    ENTITIES.append({
        "class": cls, "table": table, "module": module, "group": group, "unit": unit,
        "cols": cols or [], "flow": flow, "status_default": status_default,
        "unique": unique, "morph": morph, "slug_from": slug_from,
        "panels": panels or ["Admin"],
    })


def build_catalog() -> None:
    add("Company", "companies", "foundation", "Administration", "none",
        ["code:string!", "address:text?", "phone:string?", "email:string?", "website:string?"])
    add("Unit", "units", "foundation", "Administration", "none",
        ["company_id:fk:companies", "code:string!", "address:text?", "kind:string"])
    add("Floor", "floors", "foundation", "Administration", "required", ["code:string?"])
    add("Line", "lines", "foundation", "Administration", "required",
        ["floor_id:fk?:floors", "code:string?", "operators:int", "helpers:int", "smv_capacity:decimal!"])
    add("Department", "departments", "foundation", "Administration", "optional", ["code:string?", "parent_id:fk?:departments"])
    add("Designation", "designations", "foundation", "Administration", "none", ["grade:string?", "category:string?"])
    add("Role", "roles", "foundation", "Administration", "none",
        ["slug:string!", "panels:json?", "modules:json?", "requires_2fa:bool"])
    add("Permission", "permissions", "foundation", "Administration", "none",
        ["slug:string!", "module:string?", "description:text?"])
    add("ModuleSetting", "module_settings", "foundation", "Administration", "none",
        ["module_key:string!", "enabled:bool", "description:text?"])
    add("FiscalYear", "fiscal_years", "foundation", "Administration", "none",
        ["code:string!", "starts_on:date", "ends_on:date", "is_open:bool"])
    add("NumberingSeries", "numbering_series", "foundation", "Administration", "optional",
        ["document_type:string", "prefix:string", "padding:int"])
    add("NumberingCounter", "numbering_counters", "foundation", "Administration", "optional",
        ["numbering_series_id:fk:numbering_series", "fiscal_year:string", "last_number:int"],
        unique=["numbering_series_id", "fiscal_year", "unit_id"])
    add("Currency", "currencies", "foundation", "Administration", "none", ["code:string!", "symbol:string?", "is_base:bool"])
    add("ExchangeRate", "exchange_rates", "foundation", "Administration", "none",
        ["currency_id:fk:currencies", "rate:decimal!", "effective_on:date"])
    add("Holiday", "holidays", "foundation", "Administration", "optional", ["holiday_on:date", "kind:string?"])
    add("Shift", "shifts", "foundation", "Administration", "optional",
        ["starts_at:string?", "ends_at:string?", "break_minutes:int", "grace_minutes:int"])
    add("ApprovalChain", "approval_chains", "foundation", "Administration", "optional",
        ["document_type:string", "min_amount_minor:bigint", "currency:currency"])
    add("ApprovalStep", "approval_steps", "foundation", "Administration", "none",
        ["approval_chain_id:fk:approval_chains", "role_id:fk?:roles", "sort_order:int", "level:int"])
    add("ApprovalRequest", "approval_requests", "foundation", "Administration", "optional",
        ["approval_chain_id:fk?:approval_chains", "status:status", "amount_minor:bigint?", "currency:currency",
         "requested_by:fk?:users", "subject_type:string?", "subject_id:int?"])
    add("ApprovalAction", "approval_actions", "foundation", "Administration", "none",
        ["approval_request_id:fk:approval_requests", "actor_id:fk?:users", "decision:string", "comment:text?"])
    add("NotificationTemplate", "notification_templates", "foundation", "Administration", "none",
        ["code:string!", "channel:string", "locale:string", "subject:string?", "body:text?"])
    add("NotificationLog", "notification_logs", "foundation", "Administration", "optional",
        ["channel:string", "locale:string?", "recipient:string?", "status:status", "body:text?", "sent_at:datetime?"],
        status_default="queued")
    add("StoredDocument", "stored_documents", "foundation", "Administration", "optional",
        ["disk:string?", "path:string?", "mime:string?", "size_bytes:int", "version:int", "expires_on:date?",
         "subject_type:string?", "subject_id:int?", "uploaded_by:fk?:users"])
    add("AppSetting", "app_settings", "foundation", "Administration", "none",
        ["setting_key:string!", "value:json?", "group:string?"])
    add("AuditLog", "audit_logs", "foundation", "Administration", "optional",
        ["user_id:fk?:users", "event:string?", "changes:json?", "ip:string?"], morph="auditable")

    add("Country", "countries", "master", "Master Data", "none", ["iso2:string!", "iso3:string?"])
    add("Port", "ports", "master", "Master Data", "none", ["country_id:fk?:countries", "code:string?", "kind:string?"])
    add("Buyer", "buyers", "marketing", "Marketing", "optional",
        ["code:string!", "country_id:fk?:countries", "buying_house_id:fk?:buying_houses", "email:string?",
         "phone:string?", "address:text?", "payment_behavior:string?", "rating:decimal"])
    add("BuyerContact", "buyer_contacts", "marketing", "Marketing", "none",
        ["buyer_id:fk:buyers", "email:string?", "phone:string?", "designation:string?"])
    add("BuyingHouse", "buying_houses", "marketing", "Marketing", "optional", ["country_id:fk?:countries", "email:string?", "phone:string?"])
    add("Brand", "brands", "master", "Master Data", "none", ["buyer_id:fk?:buyers", "code:string?"])
    add("Season", "seasons", "master", "Master Data", "none", ["code:string!", "year:int?"])
    add("Supplier", "suppliers", "procurement", "Procurement", "optional",
        ["code:string!", "category:string?", "country_id:fk?:countries", "email:string?", "phone:string?",
         "address:text?", "rating:decimal", "lead_days:int"])
    add("SupplierContact", "supplier_contacts", "procurement", "Procurement", "none",
        ["supplier_id:fk:suppliers", "email:string?", "phone:string?"])
    add("Subcontractor", "subcontractors", "procurement", "Procurement", "optional",
        ["category:string?", "phone:string?", "address:text?", "capacity_per_day:int"])
    add("Forwarder", "forwarders", "shipping", "Shipping", "none", ["phone:string?", "email:string?", "mode:string?"])
    add("Bank", "banks", "commercial", "Commercial", "none", ["swift:string?", "branch:string?", "currency:currency"])
    add("ItemGroup", "item_groups", "master", "Master Data", "none", ["code:string?", "category:string?"])
    add("Item", "items", "inventory", "Inventory", "optional",
        ["item_group_id:fk?:item_groups", "code:string!", "uom_id:fk?:units_of_measure", "hs_code_id:fk?:hs_codes",
         "category:string?", "reorder_level:decimal!", "standard_cost_minor:bigint", "currency:currency", "is_buyer_supplied:bool"])
    add("HsCode", "hs_codes", "master", "Master Data", "none", ["code:string!", "description:text?"])
    add("Color", "colors", "master", "Master Data", "none", ["code:string?", "pantone:string?", "buyer_code:string?"])
    add("Size", "sizes", "master", "Master Data", "none", ["code:string!", "sort_order:int"])
    add("SizeGroup", "size_groups", "master", "Master Data", "none", ["sizes:json?"])
    add("UnitOfMeasure", "units_of_measure", "master", "Master Data", "none", ["code:string!", "dimension:string?"])
    add("UomConversion", "uom_conversions", "master", "Master Data", "none",
        ["from_uom_id:fk:units_of_measure", "to_uom_id:fk:units_of_measure", "factor:decimal!"])
    add("FabricConstruction", "fabric_constructions", "master", "Master Data", "none",
        ["composition:string?", "gsm:decimal", "width_inch:decimal", "shrinkage_percent:decimal", "weave:string?"])
    add("WashType", "wash_types", "wash", "Wash", "none", ["code:string?"])
    add("EmbroideryType", "embroidery_types", "embroidery", "Embroidery", "none", ["code:string?"])
    add("LibraryOperation", "library_operations", "sewing", "Sewing", "none",
        ["code:string?", "smv:decimal!", "machine_type_id:fk?:machine_types"])
    add("MachineType", "machine_types", "maintenance", "Maintenance", "none", ["code:string?"])
    add("Defect", "defects", "quality", "Quality", "none", ["code:string!", "severity:string?", "zone:string?"])
    add("Incoterm", "incoterms", "commercial", "Commercial", "none", ["code:string!"])
    add("PaymentTerm", "payment_terms", "commercial", "Commercial", "none", ["days:int", "description:text?"])

    add("Inquiry", "inquiries", "marketing", "Marketing", "optional",
        ["buyer_id:fk?:buyers", "status:status", "source:string?", "product_type:string?", "qty:decimal!",
         "target_price_minor:bigint?", "currency:currency", "email:string?", "phone:string?", "company_name:string?",
         "assigned_to:fk?:users", "notes:text?"],
        flow={"new": ["quoted", "lost"], "quoted": ["won", "lost"], "won": [], "lost": []}, status_default="new")
    add("Quotation", "quotations", "marketing", "Marketing", "optional",
        ["inquiry_id:fk?:inquiries", "buyer_id:fk?:buyers", "style_id:fk?:styles", "status:status", "currency:currency",
         "fob_minor:bigint", "valid_until:date?", "notes:text?"],
        flow={"draft": ["sent", "cancelled"], "sent": ["accepted", "rejected"], "accepted": [], "rejected": [], "cancelled": []})
    add("QuotationLine", "quotation_lines", "marketing", "Marketing", "none",
        ["quotation_id:fk:quotations", "description:string?", "qty:decimal!", "price_minor:bigint"])
    add("BuyerVisit", "buyer_visits", "marketing", "Marketing", "optional",
        ["buyer_id:fk?:buyers", "visited_on:date?", "notes:text?", "next_follow_up:date?"])
    add("Negotiation", "negotiations", "marketing", "Marketing", "none",
        ["quotation_id:fk?:quotations", "buyer_id:fk?:buyers", "target_minor:bigint?", "offered_minor:bigint?", "notes:text?"])
    add("BuyerRequirement", "buyer_requirements", "marketing", "Marketing", "none",
        ["buyer_id:fk:buyers", "topic:string?", "body:text?"])

    add("Style", "styles", "style", "Style & Costing", "optional",
        ["buyer_id:fk?:buyers", "brand_id:fk?:brands", "season_id:fk?:seasons", "code:string!", "category:string?",
         "smv:decimal!", "description:text?", "image_path:string?", "status:status"],
        flow={"development": ["approved", "dropped"], "approved": ["closed"], "dropped": [], "closed": []},
        status_default="development")
    add("MeasurementPoint", "measurement_points", "style", "Style & Costing", "none",
        ["style_id:fk:styles", "size_id:fk?:sizes", "pom:string?", "spec_value:decimal", "tolerance:decimal"])
    add("Costing", "costings", "style", "Style & Costing", "optional",
        ["style_id:fk?:styles", "version:int", "status:status", "currency:currency", "exchange_rate:decimal!",
         "fabric_minor:bigint", "trims_minor:bigint", "cm_minor:bigint", "wash_minor:bigint", "print_minor:bigint",
         "test_minor:bigint", "overhead_minor:bigint", "commercial_minor:bigint", "profit_minor:bigint", "fob_minor:bigint",
         "smv:decimal!", "efficiency:decimal!", "line_cost_minor:bigint", "consumption:decimal!", "wastage_percent:decimal!",
         "approved_at:datetime?"],
        flow={"draft": ["submitted", "cancelled"], "submitted": ["approved", "rejected"], "approved": [], "rejected": ["draft"], "cancelled": []})
    add("CostingLine", "costing_lines", "style", "Style & Costing", "none",
        ["costing_id:fk:costings", "item_id:fk?:items", "category:string?", "description:string?", "qty:decimal!",
         "unit_cost_minor:bigint", "wastage_percent:decimal!", "amount_minor:bigint"])

    add("SampleRequest", "sample_requests", "sampling", "Sampling", "optional",
        ["style_id:fk?:styles", "buyer_id:fk?:buyers", "order_id:fk?:buyer_orders", "sample_type:string", "status:status",
         "due_on:date?", "round:int", "courier_awb:string?", "cost_minor:bigint", "notes:text?"],
        flow={"requested": ["in_progress", "cancelled"], "in_progress": ["submitted"], "submitted": ["approved", "rejected"],
              "rejected": ["in_progress"], "approved": [], "cancelled": []}, status_default="requested")
    add("SampleComment", "sample_comments", "sampling", "Sampling", "none",
        ["sample_request_id:fk:sample_requests", "body:text?", "decision:string?", "author_id:fk?:users"])
    add("LabDip", "lab_dips", "sampling", "Sampling", "optional",
        ["style_id:fk?:styles", "color_id:fk?:colors", "supplier_id:fk?:suppliers", "status:status", "due_on:date?"],
        flow={"submitted": ["approved", "rejected"], "approved": [], "rejected": ["submitted"]})
    add("StrikeOff", "strike_offs", "sampling", "Sampling", "optional",
        ["style_id:fk?:styles", "embroidery_type_id:fk?:embroidery_types", "status:status"],
        flow={"submitted": ["approved", "rejected"], "approved": [], "rejected": []})

    add("BuyerOrder", "buyer_orders", "orders", "Orders", "required",
        ["buyer_id:fk?:buyers", "style_id:fk?:styles", "costing_id:fk?:costings", "season_id:fk?:seasons",
         "currency:currency", "exchange_rate:decimal!", "status:status", "po_number:string?", "ship_on:date?",
         "ex_factory_on:date?", "qty:decimal!", "fob_minor:bigint", "confirmed_at:datetime?", "merchandiser_id:fk?:users",
         "incoterm_id:fk?:incoterms", "payment_term_id:fk?:payment_terms", "notes:text?"],
        flow={"draft": ["confirmed", "cancelled"], "confirmed": ["material_wait", "cancelled"],
              "material_wait": ["cutting", "cancelled"], "cutting": ["sewing"], "sewing": ["wash", "finishing"],
              "wash": ["finishing"], "finishing": ["shipped"], "shipped": ["closed", "claimed"], "claimed": ["closed"],
              "closed": [], "cancelled": []})
    add("OrderLine", "order_lines", "orders", "Orders", "none",
        ["buyer_order_id:fk:buyer_orders", "color_id:fk?:colors", "size_id:fk?:sizes", "qty:decimal!", "shipped_qty:decimal!"])
    add("OrderRevision", "order_revisions", "orders", "Orders", "none",
        ["buyer_order_id:fk:buyer_orders", "revision_no:int", "summary:text?", "impact:text?"])
    add("Bom", "boms", "orders", "Orders", "optional",
        ["buyer_order_id:fk?:buyer_orders", "style_id:fk?:styles", "version:int", "status:status"],
        flow={"draft": ["approved"], "approved": ["locked"], "locked": []})
    add("BomLine", "bom_lines", "orders", "Orders", "none",
        ["bom_id:fk:boms", "item_id:fk?:items", "color_id:fk?:colors", "size_id:fk?:sizes", "consumption:decimal!",
         "wastage_percent:decimal!", "required_qty:decimal!", "uom_id:fk?:units_of_measure"])
    add("MaterialRequirement", "material_requirements", "orders", "Orders", "optional",
        ["buyer_order_id:fk?:buyer_orders", "item_id:fk?:items", "required_qty:decimal!", "reserved_qty:decimal!",
         "received_qty:decimal!", "issued_qty:decimal!", "status:status"],
        flow={"open": ["partial", "covered"], "partial": ["covered"], "covered": []})
    add("TnaTemplate", "tna_templates", "orders", "Orders", "optional", ["buyer_id:fk?:buyers", "season_id:fk?:seasons"])
    add("TnaTemplateTask", "tna_template_tasks", "orders", "Orders", "none",
        ["tna_template_id:fk:tna_templates", "offset_days:int", "owner_role:string?", "department_id:fk?:departments", "sort_order:int"])
    add("TnaMilestone", "tna_milestones", "orders", "Orders", "optional",
        ["buyer_order_id:fk?:buyer_orders", "tna_template_task_id:fk?:tna_template_tasks", "due_on:date?",
         "completed_on:date?", "status:status", "owner_id:fk?:users", "sort_order:int"],
        flow={"pending": ["done", "delayed"], "delayed": ["done"], "done": []}, status_default="pending",
        panels=["Admin", "Buyer"])
    add("Claim", "claims", "orders", "Orders", "optional",
        ["buyer_order_id:fk?:buyer_orders", "buyer_id:fk?:buyers", "status:status", "amount_minor:bigint", "currency:currency", "reason:text?"],
        flow={"open": ["accepted", "rejected", "settled"], "accepted": ["settled"], "rejected": [], "settled": []},
        status_default="open", panels=["Admin", "Buyer"])

    add("ProformaInvoice", "proforma_invoices", "commercial", "Commercial", "optional",
        ["buyer_id:fk?:buyers", "buyer_order_id:fk?:buyer_orders", "currency:currency", "amount_minor:bigint", "status:status"],
        flow={"draft": ["issued"], "issued": ["accepted"], "accepted": []})
    add("LetterOfCredit", "letters_of_credit", "commercial", "Commercial", "optional",
        ["buyer_id:fk?:buyers", "buyer_order_id:fk?:buyer_orders", "bank_id:fk?:banks", "supplier_id:fk?:suppliers",
         "lc_type:string", "lc_number:string?", "currency:currency", "amount_minor:bigint", "utilized_minor:bigint",
         "opened_on:date?", "expiry_on:date?", "shipment_on:date?", "status:status"],
        flow={"draft": ["opened", "cancelled"], "opened": ["amended", "expired", "closed"], "amended": ["closed", "expired"],
              "expired": [], "closed": [], "cancelled": []}, status_default="draft")
    add("LcAmendment", "lc_amendments", "commercial", "Commercial", "none",
        ["letter_of_credit_id:fk:letters_of_credit", "amendment_no:int", "summary:text?", "amended_on:date?"])
    add("UtilizationDeclaration", "utilization_declarations", "commercial", "Commercial", "optional",
        ["letter_of_credit_id:fk?:letters_of_credit", "buyer_order_id:fk?:buyer_orders", "ud_number:string?",
         "amount_minor:bigint", "status:status", "expires_on:date?"],
        flow={"open": ["utilized", "expired"], "utilized": [], "expired": []}, status_default="open")
    add("BondLicense", "bond_licenses", "commercial", "Commercial", "optional",
        ["license_no:string?", "entitlement_minor:bigint", "utilized_minor:bigint", "expires_on:date?", "status:status"],
        flow={"active": ["expired"], "expired": []}, status_default="active")
    add("BondEntry", "bond_entries", "commercial", "Commercial", "none",
        ["bond_license_id:fk:bond_licenses", "import_document_id:fk?:import_documents", "direction:string", "amount_minor:bigint"])
    add("ImportDocument", "import_documents", "commercial", "Commercial", "optional",
        ["supplier_id:fk?:suppliers", "letter_of_credit_id:fk?:letters_of_credit", "document_no:string?", "kind:string?",
         "amount_minor:bigint", "currency:currency", "status:status"],
        flow={"pending": ["received", "discrepant"], "received": [], "discrepant": ["received"]})
    add("BillOfEntry", "bills_of_entry", "commercial", "Commercial", "optional",
        ["import_document_id:fk?:import_documents", "be_number:string?", "duty_minor:bigint", "cnf_minor:bigint", "status:status"],
        flow={"draft": ["assessed", "paid"], "assessed": ["paid"], "paid": []})
    add("CommercialInvoice", "commercial_invoices", "commercial", "Commercial", "optional",
        ["shipment_id:fk?:shipments", "buyer_order_id:fk?:buyer_orders", "buyer_id:fk?:buyers", "invoice_no:string?",
         "currency:currency", "amount_minor:bigint", "status:status"],
        flow={"draft": ["submitted", "cancelled"], "submitted": ["realized", "discrepant"], "discrepant": ["realized"],
              "realized": [], "cancelled": []})
    add("ExportBill", "export_bills", "commercial", "Commercial", "optional",
        ["commercial_invoice_id:fk?:commercial_invoices", "exp_no:string?", "status:status", "amount_minor:bigint"],
        flow={"pending": ["negotiated"], "negotiated": []}, status_default="pending")
    add("Realization", "realizations", "commercial", "Commercial", "none",
        ["commercial_invoice_id:fk?:commercial_invoices", "bank_id:fk?:banks", "amount_minor:bigint",
         "realized_on:date?", "exchange_rate:decimal!", "gain_loss_minor:bigint"])
    add("IncentiveClaim", "incentive_claims", "commercial", "Commercial", "optional",
        ["commercial_invoice_id:fk?:commercial_invoices", "kind:string?", "amount_minor:bigint", "status:status"],
        flow={"draft": ["submitted", "received"], "submitted": ["received", "rejected"], "received": [], "rejected": []})

    add("Requisition", "requisitions", "procurement", "Procurement", "optional",
        ["buyer_order_id:fk?:buyer_orders", "status:status", "needed_on:date?", "source:string?", "requested_by:fk?:users"],
        flow={"draft": ["submitted", "cancelled"], "submitted": ["approved", "rejected"], "approved": ["ordered"],
              "ordered": ["closed"], "rejected": [], "cancelled": [], "closed": []})
    add("RequisitionLine", "requisition_lines", "procurement", "Procurement", "none",
        ["requisition_id:fk:requisitions", "item_id:fk?:items", "qty:decimal!", "needed_on:date?"])
    add("Rfq", "rfqs", "procurement", "Procurement", "optional",
        ["requisition_id:fk?:requisitions", "status:status", "due_on:date?"],
        flow={"open": ["compared", "cancelled"], "compared": ["awarded"], "awarded": [], "cancelled": []}, status_default="open")
    add("RfqQuote", "rfq_quotes", "procurement", "Procurement", "none",
        ["rfq_id:fk:rfqs", "supplier_id:fk?:suppliers", "price_minor:bigint", "lead_days:int", "currency:currency", "is_selected:bool"])
    add("PurchaseOrder", "purchase_orders", "procurement", "Procurement", "optional",
        ["supplier_id:fk?:suppliers", "buyer_order_id:fk?:buyer_orders", "letter_of_credit_id:fk?:letters_of_credit",
         "requisition_id:fk?:requisitions", "status:status", "currency:currency", "total_minor:bigint", "expected_on:date?",
         "approved_at:datetime?", "is_blanket:bool"],
        flow={"draft": ["approved", "cancelled"], "approved": ["confirmed", "cancelled"], "confirmed": ["partial", "received"],
              "partial": ["received"], "received": ["closed"], "closed": [], "cancelled": []},
        panels=["Admin", "Supplier"])
    add("PurchaseOrderLine", "purchase_order_lines", "procurement", "Procurement", "none",
        ["purchase_order_id:fk:purchase_orders", "item_id:fk?:items", "qty:decimal!", "price_minor:bigint", "received_qty:decimal!"])
    add("GoodsReceipt", "goods_receipts", "procurement", "Procurement", "optional",
        ["purchase_order_id:fk?:purchase_orders", "store_id:fk?:stores", "status:status", "received_on:date?"],
        flow={"draft": ["inspected", "posted"], "inspected": ["posted"], "posted": []},
        panels=["Admin", "Floor", "Supplier"])
    add("GoodsReceiptLine", "goods_receipt_lines", "procurement", "Procurement", "none",
        ["goods_receipt_id:fk:goods_receipts", "item_id:fk?:items", "qty:decimal!", "accepted_qty:decimal!",
         "rejected_qty:decimal!", "unit_cost_minor:bigint"])
    add("SupplierInvoice", "supplier_invoices", "procurement", "Procurement", "optional",
        ["supplier_id:fk?:suppliers", "purchase_order_id:fk?:purchase_orders", "goods_receipt_id:fk?:goods_receipts",
         "invoice_no:string?", "currency:currency", "amount_minor:bigint", "status:status", "match_status:string?"],
        flow={"received": ["matched", "mismatch"], "matched": ["paid"], "mismatch": ["matched"], "paid": []},
        status_default="received", panels=["Admin", "Supplier"])
    add("SupplierReturn", "supplier_returns", "procurement", "Procurement", "optional",
        ["supplier_id:fk?:suppliers", "goods_receipt_id:fk?:goods_receipts", "qty:decimal!", "reason:text?", "status:status"],
        flow={"draft": ["sent"], "sent": ["closed"], "closed": []})

    add("Store", "stores", "inventory", "Inventory", "required", ["code:string!", "kind:string?"])
    add("Bin", "bins", "inventory", "Inventory", "none", ["store_id:fk:stores", "code:string!"])
    add("FabricRoll", "fabric_rolls", "inventory", "Inventory", "optional",
        ["store_id:fk?:stores", "item_id:fk?:items", "buyer_order_id:fk?:buyer_orders", "bin_id:fk?:bins",
         "roll_no:string?", "shade:string?", "lot_no:string?", "gsm:decimal", "width_inch:decimal",
         "shrinkage_percent:decimal", "length_meter:decimal!", "weight_kg:decimal!", "status:status", "barcode:string?"],
        flow={"received": ["inspected", "allocated", "issued", "rejected"], "inspected": ["allocated", "rejected"],
              "allocated": ["issued"], "issued": [], "rejected": []}, status_default="received",
        panels=["Admin", "Floor"])
    add("StockMovement", "stock_movements", "inventory", "Inventory", "optional",
        ["store_id:fk?:stores", "item_id:fk?:items", "fabric_roll_id:fk?:fabric_rolls", "buyer_order_id:fk?:buyer_orders",
         "direction:string", "qty:decimal!", "unit_cost_minor:bigint", "balance_after:decimal!", "moved_at:datetime?",
         "reference_type:string?", "reference_id:int?"])
    add("StockBalance", "stock_balances", "inventory", "Inventory", "none",
        ["store_id:fk:stores", "item_id:fk:items", "qty:decimal!", "value_minor:bigint"],
        unique=["store_id", "item_id"])
    add("StockLayer", "stock_layers", "inventory", "Inventory", "none",
        ["store_id:fk:stores", "item_id:fk:items", "qty_remaining:decimal!", "unit_cost_minor:bigint", "received_at:datetime?"])
    add("StockReservation", "stock_reservations", "inventory", "Inventory", "optional",
        ["store_id:fk?:stores", "item_id:fk?:items", "buyer_order_id:fk?:buyer_orders", "qty:decimal!", "status:status"],
        flow={"held": ["issued", "released"], "issued": [], "released": []}, status_default="held")
    add("StockTransfer", "stock_transfers", "inventory", "Inventory", "optional",
        ["from_store_id:fk?:stores", "to_store_id:fk?:stores", "item_id:fk?:items", "qty:decimal!", "status:status"],
        flow={"draft": ["posted"], "posted": []})
    add("CycleCount", "cycle_counts", "inventory", "Inventory", "optional",
        ["store_id:fk?:stores", "item_id:fk?:items", "system_qty:decimal!", "counted_qty:decimal!", "status:status"],
        flow={"open": ["posted"], "posted": []}, status_default="open")

    add("FabricInspection", "fabric_inspections", "lab", "Laboratory", "optional",
        ["fabric_roll_id:fk?:fabric_rolls", "points:decimal!", "grade:string?", "length_meter:decimal!", "result:string?", "status:status"],
        flow={"open": ["passed", "failed"], "passed": [], "failed": []}, status_default="open")
    add("InspectionDefect", "inspection_defects", "lab", "Laboratory", "none",
        ["fabric_inspection_id:fk:fabric_inspections", "defect_id:fk?:defects", "points:decimal!", "position_m:decimal"])
    add("LabTest", "lab_tests", "lab", "Laboratory", "optional",
        ["buyer_order_id:fk?:buyer_orders", "item_id:fk?:items", "test_name:string?", "spec_value:string?",
         "actual_value:string?", "result:string?", "status:status"],
        flow={"requested": ["passed", "failed"], "passed": [], "failed": []}, status_default="requested")

    add("LinePlan", "line_plans", "planning", "Planning", "required",
        ["line_id:fk?:lines", "buyer_order_id:fk?:buyer_orders", "style_id:fk?:styles", "plan_on:date?",
         "qty:decimal!", "minutes:int", "status:status", "readiness_percent:decimal!"],
        flow={"proposed": ["loaded", "blocked"], "loaded": ["done"], "blocked": ["loaded"], "done": []},
        status_default="proposed")
    add("PlanSlot", "plan_slots", "planning", "Planning", "none",
        ["line_plan_id:fk:line_plans", "starts_at:datetime?", "ends_at:datetime?", "qty:decimal!"])

    add("CutPlan", "cut_plans", "cutting", "Cutting", "optional",
        ["buyer_order_id:fk?:buyer_orders", "status:status", "planned_qty:decimal!", "cut_qty:decimal!"],
        flow={"draft": ["approved", "cancelled"], "approved": ["cut"], "cut": ["closed"], "closed": [], "cancelled": []})
    add("Marker", "markers", "cutting", "Cutting", "none",
        ["cut_plan_id:fk:cut_plans", "efficiency_percent:decimal!", "length_meter:decimal!", "ply:int", "status:status"],
        flow={"draft": ["approved"], "approved": []})
    add("Lay", "lays", "cutting", "Cutting", "none",
        ["cut_plan_id:fk:cut_plans", "marker_id:fk?:markers", "fabric_roll_id:fk?:fabric_rolls", "ply:int",
         "used_meter:decimal!", "endbit_meter:decimal!", "remnant_meter:decimal!"])
    add("Bundle", "bundles", "cutting", "Cutting", "optional",
        ["cut_plan_id:fk?:cut_plans", "buyer_order_id:fk?:buyer_orders", "color_id:fk?:colors", "size_id:fk?:sizes",
         "line_id:fk?:lines", "bundle_no:string?", "shade:string?", "qty:decimal!", "status:status", "barcode:string?"],
        flow={"created": ["cut", "issued", "sewn", "washed", "finished"], "cut": ["issued"], "issued": ["sewn"],
              "sewn": ["washed", "finished"], "washed": ["finished"], "finished": []}, status_default="created",
        panels=["Admin", "Floor"])

    add("EmbroideryJob", "embroidery_jobs", "embroidery", "Embroidery", "optional",
        ["buyer_order_id:fk?:buyer_orders", "subcontractor_id:fk?:subcontractors", "bundle_id:fk?:bundles",
         "sent_qty:decimal!", "received_qty:decimal!", "wastage_qty:decimal!", "status:status", "rate_minor:bigint"],
        flow={"sent": ["received", "rework"], "rework": ["received"], "received": []}, status_default="sent")

    add("LineSetup", "line_setups", "sewing", "Sewing", "required",
        ["line_id:fk?:lines", "style_id:fk?:styles", "supervisor_id:fk?:users", "operators:int", "helpers:int", "status:status"],
        flow={"planned": ["running", "closed"], "running": ["closed"], "closed": []}, status_default="planned")
    add("OperationBulletin", "operation_bulletins", "sewing", "Sewing", "optional",
        ["style_id:fk?:styles", "total_smv:decimal!", "status:status"],
        flow={"draft": ["approved"], "approved": []})
    add("ObLine", "ob_lines", "sewing", "Sewing", "none",
        ["operation_bulletin_id:fk:operation_bulletins", "library_operation_id:fk?:library_operations",
         "smv:decimal!", "sort_order:int", "machine_type_id:fk?:machine_types"])
    add("HourlyProduction", "hourly_productions", "sewing", "Sewing", "required",
        ["line_id:fk?:lines", "buyer_order_id:fk?:buyer_orders", "style_id:fk?:styles", "produced_on:date?",
         "hour:int", "target_qty:int", "actual_qty:int", "operators:int", "smv:decimal!", "efficiency:decimal!", "dhu:decimal!"],
        panels=["Admin", "Floor"])
    add("BundleScan", "bundle_scans", "sewing", "Sewing", "optional",
        ["bundle_id:fk?:bundles", "line_id:fk?:lines", "library_operation_id:fk?:library_operations",
         "direction:string?", "qty:decimal!", "scanned_at:datetime?", "scanned_by:fk?:users"])
    add("LineStoppage", "line_stoppages", "sewing", "Sewing", "required",
        ["line_id:fk?:lines", "reason:string?", "minutes:int", "started_at:datetime?", "ended_at:datetime?"],
        panels=["Admin", "Floor"])

    add("QcInspection", "qc_inspections", "quality", "Quality", "optional",
        ["buyer_order_id:fk?:buyer_orders", "line_id:fk?:lines", "stage:string?", "lot_qty:int", "sample_size:int",
         "aql:decimal!", "accept_point:int", "reject_point:int", "major:int", "minor:int", "critical:int",
         "result:string?", "inspected_at:datetime?", "inspector_id:fk?:users"],
        panels=["Admin", "Floor", "Buyer"])
    add("QcDefect", "qc_defects", "quality", "Quality", "none",
        ["qc_inspection_id:fk:qc_inspections", "defect_id:fk?:defects", "qty:int", "photo_path:string?", "classification:string?"])
    add("Capa", "capas", "quality", "Quality", "optional",
        ["source_type:string?", "source_id:int?", "status:status", "due_on:date?", "owner_id:fk?:users", "root_cause:string?", "action:text?"],
        flow={"open": ["in_progress", "verified", "closed"], "in_progress": ["verified"], "verified": ["closed"], "closed": []},
        status_default="open")
    add("MeasurementAudit", "measurement_audits", "quality", "Quality", "optional",
        ["buyer_order_id:fk?:buyer_orders", "style_id:fk?:styles", "size_id:fk?:sizes", "within_tolerance:bool", "notes:text?"])
    add("NeedleLog", "needle_logs", "quality", "Quality", "required",
        ["line_id:fk?:lines", "issued_qty:int", "returned_qty:int", "broken_qty:int", "logged_on:date?"])

    add("WashRecipe", "wash_recipes", "wash", "Wash", "optional",
        ["style_id:fk?:styles", "wash_type_id:fk?:wash_types", "chemicals:json?", "status:status"],
        flow={"draft": ["approved"], "approved": []})
    add("WashBatch", "wash_batches", "wash", "Wash", "optional",
        ["wash_recipe_id:fk?:wash_recipes", "buyer_order_id:fk?:buyer_orders", "load_kg:decimal!", "pieces:int",
         "minutes:int", "shade_result:string?", "status:status", "water_liter:decimal!", "energy_kwh:decimal!"],
        flow={"loaded": ["approved", "rework"], "rework": ["approved"], "approved": []}, status_default="loaded")

    add("FinishingOutput", "finishing_outputs", "finishing", "Finishing", "required",
        ["line_id:fk?:lines", "buyer_order_id:fk?:buyer_orders", "produced_on:date?", "hour:int", "qty:int"])
    add("Carton", "cartons", "finishing", "Finishing", "optional",
        ["buyer_order_id:fk?:buyer_orders", "shipment_id:fk?:shipments", "carton_no:string?", "pack_type:string?",
         "length_cm:decimal", "width_cm:decimal", "height_cm:decimal", "gross_kg:decimal!", "net_kg:decimal!",
         "cbm:decimal!", "barcode:string?", "status:status"],
        flow={"open": ["packed", "loaded"], "packed": ["loaded"], "loaded": []}, status_default="open",
        panels=["Admin", "Floor"])
    add("CartonItem", "carton_items", "finishing", "Finishing", "none",
        ["carton_id:fk:cartons", "color_id:fk?:colors", "size_id:fk?:sizes", "qty:int"])

    add("Shipment", "shipments", "shipping", "Shipping", "optional",
        ["buyer_order_id:fk?:buyer_orders", "forwarder_id:fk?:forwarders", "status:status", "ship_on:date?",
         "mode:string?", "container_no:string?", "cbm:decimal!", "cartons:int", "short_qty:decimal!"],
        flow={"planned": ["booked", "cancelled"], "booked": ["stuffed", "shipped"], "stuffed": ["shipped"],
              "shipped": ["delivered"], "delivered": [], "cancelled": []}, status_default="planned",
        panels=["Admin", "Buyer"])
    add("GatePass", "gate_passes", "shipping", "Shipping", "optional",
        ["direction:string?", "party:string?", "vehicle_no:string?", "status:status", "returnable:bool", "purpose:string?"],
        flow={"draft": ["approved", "exited"], "approved": ["exited"], "exited": ["returned", "closed"], "returned": ["closed"], "closed": []},
        panels=["Admin", "Floor"])
    add("VisitorLog", "visitor_logs", "shipping", "Shipping", "optional",
        ["visitor_name:string?", "company:string?", "purpose:string?", "in_at:datetime?", "out_at:datetime?"])
    add("VehicleLog", "vehicle_logs", "shipping", "Shipping", "optional",
        ["vehicle_no:string?", "driver:string?", "purpose:string?", "in_at:datetime?", "out_at:datetime?"])

    add("FactoryMachine", "factory_machines", "maintenance", "Maintenance", "required",
        ["machine_type_id:fk?:machine_types", "line_id:fk?:lines", "brand:string?", "model_no:string?", "serial_no:string?",
         "installed_on:date?", "warranty_until:date?", "status:status", "purchase_minor:bigint"],
        flow={"running": ["down", "idle"], "down": ["running"], "idle": ["running"]}, status_default="running")
    add("MaintenanceOrder", "maintenance_orders", "maintenance", "Maintenance", "required",
        ["factory_machine_id:fk?:factory_machines", "kind:string?", "status:status", "mechanic_id:fk?:users",
         "started_at:datetime?", "ended_at:datetime?", "downtime_minutes:int", "notes:text?"],
        flow={"open": ["assigned", "done"], "assigned": ["in_progress", "done"], "in_progress": ["done"], "done": []},
        status_default="open")
    add("UtilityLog", "utility_logs", "maintenance", "Maintenance", "required",
        ["meter:string?", "reading:decimal!", "consumption:decimal!", "logged_on:date?", "cost_minor:bigint"])
    add("SafetyCheck", "safety_checks", "maintenance", "Maintenance", "required",
        ["area:string?", "result:string?", "checked_on:date?", "notes:text?"])

    add("Employee", "employees", "hr", "Human Resources", "required",
        ["department_id:fk?:departments", "designation_id:fk?:designations", "shift_id:fk?:shifts", "user_id:fk?:users",
         "employee_code:string!", "nid:string?", "gender:string?", "date_of_birth:date?", "joined_on:date?",
         "grade:string?", "basic_minor:bigint", "status:status", "phone:string?", "photo_path:string?"],
        flow={"probation": ["confirmed", "left"], "confirmed": ["left"], "left": []}, status_default="probation")
    add("JobPost", "job_posts", "hr", "Human Resources", "optional",
        ["department_id:fk?:departments", "designation_id:fk?:designations", "title:string?", "body:text?",
         "slug:string?", "vacancies:int", "status:status", "closes_on:date?"],
        flow={"draft": ["published", "closed"], "published": ["closed"], "closed": []}, slug_from="title")
    add("Applicant", "applicants", "hr", "Human Resources", "optional",
        ["job_post_id:fk?:job_posts", "email:string?", "phone:string?", "cv_path:string?", "status:status", "notes:text?"],
        flow={"applied": ["shortlisted", "rejected"], "shortlisted": ["interview", "rejected"], "interview": ["offered", "rejected"],
              "offered": ["hired", "rejected"], "hired": [], "rejected": []}, status_default="applied")
    add("LeaveRequest", "leave_requests", "hr", "Human Resources", "optional",
        ["employee_id:fk?:employees", "kind:string?", "starts_on:date?", "ends_on:date?", "days:decimal!", "status:status", "reason:text?"],
        flow={"pending": ["approved", "rejected"], "approved": [], "rejected": []}, status_default="pending",
        panels=["Admin", "Employee"])
    add("PayrollPeriod", "payroll_periods", "hr", "Human Resources", "optional",
        ["year:int", "month:int", "status:status", "starts_on:date?", "ends_on:date?"],
        flow={"open": ["calculated", "approved", "paid"], "calculated": ["approved"], "approved": ["paid"], "paid": []},
        status_default="open")
    add("PayrollLine", "payroll_lines", "hr", "Human Resources", "none",
        ["payroll_period_id:fk:payroll_periods", "employee_id:fk?:employees", "basic_minor:bigint", "ot_hours:decimal!",
         "ot_minor:bigint", "bonus_minor:bigint", "incentive_minor:bigint", "advance_minor:bigint", "deduction_minor:bigint",
         "net_minor:bigint", "absent_days:decimal!", "flags:json?"],
        panels=["Admin", "Employee"])
    add("Loan", "loans", "hr", "Human Resources", "none",
        ["employee_id:fk?:employees", "principal_minor:bigint", "balance_minor:bigint", "status:status"],
        flow={"requested": ["approved", "rejected"], "approved": ["closed"], "rejected": [], "closed": []},
        status_default="requested", panels=["Admin", "Employee"])
    add("Grievance", "grievances", "hr", "Human Resources", "optional",
        ["employee_id:fk?:employees", "channel:string?", "body:text?", "status:status", "confidential:bool"],
        flow={"open": ["investigating", "closed"], "investigating": ["closed"], "closed": []}, status_default="open",
        panels=["Admin", "Employee"])
    add("TrainingRecord", "training_records", "hr", "Human Resources", "none",
        ["employee_id:fk?:employees", "course:string?", "trained_on:date?", "result:string?"])
    add("Announcement", "announcements", "communication", "Communication", "optional",
        ["title:string?", "body:text?", "body_bn:text?", "published_at:datetime?", "audience:string?"],
        panels=["Admin", "Employee"])

    add("Certificate", "certificates", "compliance", "Compliance", "optional",
        ["standard:string?", "certificate_no:string?", "issued_on:date?", "expires_on:date?", "is_public:bool", "status:status", "file_path:string?"],
        flow={"valid": ["expiring", "expired"], "expiring": ["renewed", "expired"], "expired": ["renewed"], "renewed": ["valid"]},
        status_default="valid")
    add("ComplianceAudit", "compliance_audits", "compliance", "Compliance", "optional",
        ["standard:string?", "audited_on:date?", "auditor:string?", "score:decimal", "status:status"],
        flow={"planned": ["done"], "done": []}, status_default="planned")
    add("AuditFinding", "audit_findings", "compliance", "Compliance", "none",
        ["compliance_audit_id:fk?:compliance_audits", "severity:string?", "due_on:date?", "status:status", "evidence_path:string?"],
        flow={"open": ["closed"], "closed": []}, status_default="open")
    add("Incident", "incidents", "compliance", "Compliance", "required",
        ["happened_on:date?", "severity:string?", "description:text?", "status:status"],
        flow={"open": ["closed"], "closed": []}, status_default="open")
    add("EsgRecord", "esg_records", "compliance", "Compliance", "required",
        ["period:string?", "energy_kwh:decimal!", "water_m3:decimal!", "waste_kg:decimal!", "carbon_kg:decimal!"])
    add("ChemicalItem", "chemical_items", "compliance", "Compliance", "optional",
        ["item_id:fk?:items", "msds_path:string?", "zdhc_level:string?", "expires_on:date?"])

    add("LedgerAccount", "ledger_accounts", "accounts", "Accounts", "none",
        ["code:string!", "account_type:string?", "parent_id:fk?:ledger_accounts"])
    add("JournalEntry", "journal_entries", "accounts", "Accounts", "optional",
        ["entry_on:date?", "reference:string?", "status:status", "currency:currency"],
        flow={"draft": ["posted"], "posted": []})
    add("JournalLine", "journal_lines", "accounts", "Accounts", "optional",
        ["journal_entry_id:fk:journal_entries", "ledger_account_id:fk?:ledger_accounts", "buyer_order_id:fk?:buyer_orders",
         "debit_minor:bigint", "credit_minor:bigint", "memo:string?"])
    add("ApBill", "ap_bills", "accounts", "Accounts", "optional",
        ["supplier_id:fk?:suppliers", "supplier_invoice_id:fk?:supplier_invoices", "amount_minor:bigint", "tds_minor:bigint",
         "status:status", "due_on:date?"],
        flow={"open": ["partial", "paid"], "partial": ["paid"], "paid": []}, status_default="open")
    add("ArInvoice", "ar_invoices", "accounts", "Accounts", "optional",
        ["buyer_id:fk?:buyers", "commercial_invoice_id:fk?:commercial_invoices", "amount_minor:bigint", "balance_minor:bigint",
         "currency:currency", "status:status", "due_on:date?"],
        flow={"open": ["partial", "paid"], "partial": ["paid"], "paid": []}, status_default="open")
    add("ArReceipt", "ar_receipts", "accounts", "Accounts", "none",
        ["ar_invoice_id:fk?:ar_invoices", "amount_minor:bigint", "received_on:date?", "reference:string?"])
    add("FixedAsset", "fixed_assets", "accounts", "Accounts", "required",
        ["ledger_account_id:fk?:ledger_accounts", "acquired_on:date?", "cost_minor:bigint", "life_months:int", "salvage_minor:bigint"])
    add("BudgetLine", "budget_lines", "accounts", "Accounts", "optional",
        ["fiscal_year_id:fk?:fiscal_years", "ledger_account_id:fk?:ledger_accounts", "amount_minor:bigint"])

    add("IssueType", "issue_types", "issues", "Issues", "none",
        ["code:string!", "severity_default:string?", "sla_hours:int", "module:string?"])
    add("Playbook", "playbooks", "issues", "Issues", "none", ["issue_type_id:fk?:issue_types"])
    add("PlaybookStep", "playbook_steps", "issues", "Issues", "none",
        ["playbook_id:fk:playbooks", "sort_order:int", "instructions:text?"])
    add("Issue", "issues", "issues", "Issues", "optional",
        ["issue_type_id:fk?:issue_types", "severity:string?", "status:status", "owner_id:fk?:users", "reporter_id:fk?:users",
         "buyer_order_id:fk?:buyer_orders", "line_id:fk?:lines", "description:text?", "sla_due_at:datetime?",
         "impact_days:decimal!", "impact_cost_minor:bigint", "root_cause:string?", "recurrence_count:int",
         "linked_type:string?", "linked_id:int?", "acknowledged_at:datetime?", "resolved_at:datetime?",
         "verified_at:datetime?", "closed_at:datetime?"],
        flow={"detected": ["assigned", "closed"], "assigned": ["acknowledged"], "acknowledged": ["root_cause"],
              "root_cause": ["action_plan"], "action_plan": ["in_progress"], "in_progress": ["resolved"],
              "resolved": ["verified"], "verified": ["closed"], "closed": ["detected"]},
        status_default="detected", panels=["Admin", "Floor"])
    add("IssueTask", "issue_tasks", "issues", "Issues", "none",
        ["issue_id:fk:issues", "playbook_step_id:fk?:playbook_steps", "status:status", "due_on:date?", "assignee_id:fk?:users"],
        flow={"open": ["done"], "done": []}, status_default="open")
    add("IssueComment", "issue_comments", "issues", "Issues", "none",
        ["issue_id:fk:issues", "user_id:fk?:users", "body:text?"])

    add("RecordComment", "record_comments", "communication", "Communication", "none",
        ["user_id:fk?:users", "body:text?"], morph="commentable")
    add("TaskItem", "task_items", "communication", "Communication", "optional",
        ["assignee_id:fk?:users", "due_on:date?", "status:status", "subject_type:string?", "subject_id:int?"],
        flow={"open": ["done"], "done": []}, status_default="open")

    add("CmsPage", "cms_pages", "website", "Website", "none",
        ["title:string?", "slug:string?", "locale:string?", "body:text?", "seo_title:string?", "seo_description:text?",
         "is_published:bool"], slug_from="title")
    add("NewsPost", "news_posts", "website", "Website", "none",
        ["title:string?", "slug:string?", "locale:string?", "body:text?", "published_at:datetime?", "seo_title:string?",
         "seo_description:text?"], slug_from="title")
    add("ProductCategory", "product_categories", "website", "Website", "none",
        ["slug:string?", "locale:string?", "summary:text?", "moq:int", "lead_days:int", "is_published:bool"], slug_from="name")
    add("CaseStudy", "case_studies", "website", "Website", "none",
        ["title:string?", "slug:string?", "locale:string?", "body:text?", "buyer_name:string?"], slug_from="title")
    add("Faq", "faqs", "website", "Website", "none", ["locale:string?", "question:text?", "answer:text?", "sort_order:int"])
    add("DownloadItem", "download_items", "website", "Website", "none",
        ["title:string?", "slug:string?", "locale:string?", "file_path:string?"], slug_from="title")
    add("ContactMessage", "contact_messages", "website", "Website", "none",
        ["email:string?", "phone:string?", "subject:string?", "body:text?", "status:status"],
        flow={"new": ["read", "closed"], "read": ["closed"], "closed": []}, status_default="new")
    add("TeamMember", "team_members", "website", "Website", "none",
        ["role_title:string?", "bio:text?", "sort_order:int", "photo_path:string?"])


INDEXED = {"status", "ship_on", "due_on", "expires_on", "produced_on", "barcode", "employee_code", "po_number", "lc_number", "invoice_no", "holiday_on", "module_key", "setting_key", "slug"}


def parse_col(spec: str) -> dict:
    if spec.startswith("fk?:"):
        return {"base": "fk:" + spec[4:], "null": True, "unique": False}
    null = spec.endswith("?")
    unique = spec.endswith("!")
    base = spec[:-1] if (null or unique) else spec
    return {"base": base, "null": null, "unique": unique}


def studly(table: str) -> str:
    return "".join(part.capitalize() for part in table.split("_"))


def singular(name: str) -> str:
    if name.endswith("ies"):
        return name[:-3] + "y"
    if name.endswith("ses"):
        return name[:-2]
    if name.endswith("s") and not name.endswith("ss"):
        return name[:-1]
    return name


def relation_method(column: str) -> str:
    raw = column[:-3] if column.endswith("_id") else column
    parts = raw.split("_")
    return parts[0] + "".join(p.capitalize() for p in parts[1:])


def class_for_table(table: str, table_class: dict[str, str]) -> str:
    if table == "users":
        return "User"
    if table in table_class:
        return table_class[table]
    return studly(singular(table))


def column_line(name: str, spec: str, status_default: str) -> tuple[str, dict | None]:
    meta = parse_col(spec)
    base = meta["base"]
    fk = None
    if base.startswith("fk:"):
        table = base[3:]
        line = f"            $table->unsignedBigInteger('{name}')"
        if meta["null"]:
            line += "->nullable()"
        line += "->index();"
        fk = {"column": name, "table": table, "null": meta["null"]}
        return line, fk
    if base == "status":
        default = status_default.replace("'", "")
        return f"            $table->string('status')->default('{default}')->index();", None
    if base == "currency":
        return f"            $table->char('{name}', 3)->default('USD');", None
    mapping = {
        "string": "string",
        "text": "text",
        "int": "integer",
        "bigint": "bigInteger",
        "decimal": "decimal",
        "bool": "boolean",
        "date": "date",
        "datetime": "dateTime",
        "json": "json",
    }
    if base not in mapping:
        raise SystemExit(f"Unknown column type {spec}")
    method = mapping[base]
    line = f"            $table->{method}('{name}'"
    if base == "decimal":
        line += ", 18, 4"
    line += ")"
    if base in {"int", "bigint"} or (base == "decimal" and meta["unique"]):
        line += "->default(0)"
    if base == "bool":
        line += "->default(false)"
    if meta["null"] or base in {"text", "date", "datetime", "json", "decimal"} and not meta["unique"]:
        if base == "decimal" and meta["unique"]:
            pass
        elif meta["null"] or base in {"text", "date", "datetime", "json"} or (base == "decimal" and not meta["unique"]):
            if not (base in {"int", "bigint", "bool"} and not meta["null"]):
                line += "->nullable()"
    if meta["unique"] and base == "string":
        line += "->unique()"
    if name in INDEXED and "->index()" not in line and "->unique()" not in line:
        line += "->index()"
    line += ";"
    return line, None


def migration_php(table_class: dict[str, str]) -> str:
    chunks = []
    fks = []
    for entity in ENTITIES:
        lines = ["            $table->id();", "            $table->char('public_id', 26)->unique();", "            $table->string('name');", "            $table->string('name_bn')->nullable();"]
        if entity["unit"] == "required":
            lines.append("            $table->unsignedBigInteger('unit_id')->index();")
            fks.append((entity["table"], {"column": "unit_id", "table": "units", "null": False}))
        elif entity["unit"] == "optional":
            lines.append("            $table->unsignedBigInteger('unit_id')->nullable()->index();")
            fks.append((entity["table"], {"column": "unit_id", "table": "units", "null": True}))
        for spec in entity["cols"]:
            name, raw = spec.split(":", 1)
            php, fk = column_line(name, raw, entity["status_default"])
            lines.append(php)
            if fk:
                fks.append((entity["table"], fk))
        if entity["morph"]:
            lines.append(f"            $table->nullableMorphs('{entity['morph']}');")
        if entity["slug_from"] and not any(c.startswith("slug:") for c in entity["cols"]):
            lines.append("            $table->string('slug')->nullable()->index();")
        if entity["unique"]:
            cols = ", ".join(f"'{c}'" if c != "unit_id" or entity["unit"] != "none" else "'unit_id'" for c in entity["unique"])
            # unit_id may be absent
            if entity["unit"] == "none" and "unit_id" in entity["unique"]:
                pass
            lines.append(f"            $table->unique([{cols}]);")
        lines.append("            $table->timestamps();")
        lines.append("            $table->softDeletes();")
        body = "\n".join(lines)
        chunks.append(f"        Schema::create('{entity['table']}', function (Blueprint $table) {{\n{body}\n        }});")

    fk_lines = []
    for table, fk in fks:
        on_delete = "nullOnDelete" if fk["null"] else "restrictOnDelete"
        fk_lines.append(
            f"        Schema::table('{table}', function (Blueprint $table) {{\n"
            f"            $table->foreign('{fk['column']}')->references('id')->on('{fk['table']}')->{on_delete}();\n"
            f"        }});"
        )
    user_cols = """
        Schema::table('users', function (Blueprint $table) {
            $table->string('name_bn')->nullable();
            $table->string('phone')->nullable();
            $table->string('locale', 5)->default('en');
            $table->boolean('is_active')->default(true);
            $table->string('portal')->default('admin')->index();
            $table->text('two_factor_secret')->nullable();
            $table->timestamp('two_factor_confirmed_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->unsignedBigInteger('current_unit_id')->nullable()->index();
            $table->unsignedBigInteger('buyer_id')->nullable()->index();
            $table->unsignedBigInteger('supplier_id')->nullable()->index();
            $table->unsignedBigInteger('employee_id')->nullable()->index();
        });
"""
    user_fks = """
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('current_unit_id')->references('id')->on('units')->nullOnDelete();
            $table->foreign('buyer_id')->references('id')->on('buyers')->nullOnDelete();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->nullOnDelete();
            $table->foreign('employee_id')->references('id')->on('employees')->nullOnDelete();
        });
"""
    pivots = """
        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->primary(['role_id', 'user_id']);
        });
        Schema::create('permission_role', function (Blueprint $table) {
            $table->foreignId('permission_id')->constrained()->cascadeOnDelete();
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
            $table->primary(['permission_id', 'role_id']);
        });
        Schema::create('unit_user', function (Blueprint $table) {
            $table->foreignId('unit_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->primary(['unit_id', 'user_id']);
        });
"""
    drop_tables = "\n".join(f"        Schema::dropIfExists('{e['table']}');" for e in reversed(ENTITIES))
    return f"""<?php

declare(strict_types=1);

use Illuminate\\Database\\Migrations\\Migration;
use Illuminate\\Database\\Schema\\Blueprint;
use Illuminate\\Support\\Facades\\Schema;

return new class extends Migration
{{
    public function up(): void
    {{
{chr(10).join(chunks)}
{pivots}
{user_cols}
    }}

    public function down(): void
    {{
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('unit_user');
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('role_user');
{drop_tables}
        Schema::table('users', function (Blueprint $table) {{
            $table->dropColumn(['name_bn', 'phone', 'locale', 'is_active', 'portal', 'two_factor_secret', 'two_factor_confirmed_at', 'last_login_at', 'current_unit_id', 'buyer_id', 'supplier_id', 'employee_id']);
        }});
        Schema::enableForeignKeyConstraints();
    }}
}};
"""


def casts_for(entity: dict) -> list[str]:
    casts = []
    for spec in entity["cols"]:
        name, raw = spec.split(":", 1)
        meta = parse_col(raw)
        base = meta["base"]
        if base in {"bool"}:
            casts.append(f"            '{name}' => 'boolean',")
        elif base in {"date"}:
            casts.append(f"            '{name}' => 'date',")
        elif base in {"datetime"}:
            casts.append(f"            '{name}' => 'datetime',")
        elif base in {"json"}:
            casts.append(f"            '{name}' => 'array',")
        elif base in {"decimal"}:
            casts.append(f"            '{name}' => 'decimal:4',")
        elif base in {"int", "bigint"}:
            casts.append(f"            '{name}' => 'integer',")
    if entity["unit"] != "none":
        casts.append("            'unit_id' => 'integer',")
    return casts


def model_php(entity: dict, table_class: dict[str, str]) -> str:
    relations = []
    seen = set()
    if entity["unit"] != "none":
        relations.append(("unit", "Unit", "unit_id"))
    for spec in entity["cols"]:
        name, raw = spec.split(":", 1)
        meta = parse_col(raw)
        if not meta["base"].startswith("fk:"):
            continue
        table = meta["base"][3:]
        method = relation_method(name)
        if method in seen:
            continue
        seen.add(method)
        cls = class_for_table(table, table_class)
        relations.append((method, cls, name))
    rel_php = []
    for method, cls, column in relations:
        rel_php.append(
            f"""
    /** @return BelongsTo<{cls}, $this> */
    public function {method}(): BelongsTo
    {{
        return $this->belongsTo({cls}::class, '{column}');
    }}"""
        )
    slug = ""
    imports = "use Illuminate\\Database\\Eloquent\\Relations\\BelongsTo;\n"
    if entity["slug_from"]:
        imports += "use ImranDev\\UniversalSlug\\Attributes\\Slug;\n"
        slug = f"#[Slug(from: '{entity['slug_from']}', to: 'slug', language: 'bn')]\n"
    cast_body = "\n".join(casts_for(entity))
    casts = f"""
    protected function casts(): array
    {{
        return [
{cast_body}
        ];
    }}
""" if cast_body else ""
    return f"""<?php

declare(strict_types=1);

namespace App\\Models;

{imports}class_exists('x');

{slug}class {entity['class']} extends GarmentModel
{{
    protected $table = '{entity['table']}';
{casts}{''.join(rel_php)}
}}
"""


def fix_model_imports(php: str) -> str:
    return php.replace("class_exists('x');\n\n", "")


def resource_php(entity: dict, panel: str) -> str:
    ns = f"App\\Filament\\{panel}\\Resources"
    pages = f"""
    public static function getPages(): array
    {{
        return [
            'index' => Pages\\List{entity['class']}::route('/'),
            'create' => Pages\\Create{entity['class']}::route('/create'),
            'edit' => Pages\\Edit{entity['class']}::route('/{{record}}/edit'),
        ];
    }}
"""
    return f"""<?php

declare(strict_types=1);

namespace {ns};

use App\\Filament\\Support\\GarmentResource;
use App\\Models\\{entity['class']};
use {ns}\\{entity['class']}Resource\\Pages;

class {entity['class']}Resource extends GarmentResource
{{
    protected static ?string $model = {entity['class']}::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = '{entity['group']}';

    protected static ?string $moduleKey = '{entity['module']}';
{pages}}}
"""


def page_php(entity: dict, panel: str, kind: str) -> str:
    ns = f"App\\Filament\\{panel}\\Resources\\{entity['class']}Resource\\Pages"
    resource = f"App\\Filament\\{panel}\\Resources\\{entity['class']}Resource"
    if kind == "List":
        base = "ListsGarmentRecords"
        extra = ""
    elif kind == "Create":
        base = "CreatesGarmentRecord"
        extra = ""
    else:
        base = "EditsGarmentRecord"
        extra = ""
    return f"""<?php

declare(strict_types=1);

namespace {ns};

use {resource};
use App\\Filament\\Support\\{base};

class {kind}{entity['class']} extends {base}
{{
    protected static string $resource = {entity['class']}Resource::class;
{extra}}}
"""


def policy_php(entity: dict) -> str:
    return f"""<?php

declare(strict_types=1);

namespace App\\Policies;

use App\\Models\\{entity['class']};

class {entity['class']}Policy extends GarmentPolicy
{{
    protected function modelClass(): string
    {{
        return {entity['class']}::class;
    }}

    protected function module(): string
    {{
        return '{entity['module']}';
    }}
}}
"""


def factory_php(entity: dict) -> str:
    fields = [
        "            'public_id' => (string) Str::ulid(),",
        "            'name' => fake()->words(3, true),",
    ]
    for spec in entity["cols"]:
        name, raw = spec.split(":", 1)
        meta = parse_col(raw)
        if meta["unique"] and meta["base"] == "string":
            fields.append(f"            '{name}' => fake()->unique()->bothify('??-####'),")
        elif meta["base"] == "string" and not meta["null"]:
            fields.append(f"            '{name}' => fake()->word(),")
    body = "\n".join(fields)
    return f"""<?php

declare(strict_types=1);

namespace Database\\Factories;

use App\\Models\\{entity['class']};
use Illuminate\\Database\\Eloquent\\Factories\\Factory;
use Illuminate\\Support\\Str;

/** @extends Factory<{entity['class']}> */
class {entity['class']}Factory extends Factory
{{
    protected $model = {entity['class']}::class;

    public function definition(): array
    {{
        return [
{body}
        ];
    }}
}}
"""


def workflows_php() -> str:
    body = []
    for entity in ENTITIES:
        if not entity["flow"]:
            continue
        lines = [f"        '{entity['table']}' => ["]
        for status, targets in entity["flow"].items():
            joined = ", ".join(f"'{t}'" for t in targets)
            lines.append(f"            '{status}' => [{joined}],")
        lines.append("        ],")
        body.append("\n".join(lines))
    return "<?php\n\ndeclare(strict_types=1);\n\nreturn [\n" + "\n".join(body) + "\n];\n"


def lang_php(locale: str) -> str:
    models = []
    for entity in ENTITIES:
        label = entity["class"] if locale == "en" else BN.get(entity["class"], entity["class"])
        plural = label if locale == "bn" else entity["class"] + "s"
        models.append(f"        '{entity['class']}' => '{label}',")
        models.append(f"        '{entity['class']}_plural' => '{plural}',")
    groups = []
    seen = []
    for entity in ENTITIES:
        if entity["group"] in seen:
            continue
        seen.append(entity["group"])
        label = entity["group"] if locale == "en" else GROUPS_BN.get(entity["group"], entity["group"])
        groups.append(f"        '{entity['group']}' => '{label}',")
    fields = {
        "name": ("Name", "নাম"), "name_bn": ("Bangla name", "বাংলা নাম"), "code": ("Code", "কোড"),
        "status": ("Status", "স্ট্যাটাস"), "notes": ("Notes", "নোট"), "qty": ("Quantity", "পরিমাণ"),
        "unit_id": ("Unit", "ইউনিট"), "currency": ("Currency", "মুদ্রা"), "phone": ("Phone", "ফোন"),
        "email": ("Email", "ইমেইল"), "address": ("Address", "ঠিকানা"), "description": ("Description", "বিবরণ"),
        "due_on": ("Due date", "নির্ধারিত তারিখ"), "ship_on": ("Ship date", "শিপ তারিখ"),
        "severity": ("Severity", "গুরুত্ব"), "barcode": ("Barcode", "বারকোড"),
    }
    field_lines = [f"        '{key}' => '{pair[0 if locale == 'en' else 1]}'," for key, pair in fields.items()]
    return "<?php\n\ndeclare(strict_types=1);\n\nreturn [\n    'models' => [\n" + "\n".join(models) + "\n    ],\n    'groups' => [\n" + "\n".join(groups) + "\n    ],\n    'fields' => [\n" + "\n".join(field_lines) + "\n    ],\n];\n"


def main() -> None:
    build_catalog()
    table_class = {e["table"]: e["class"] for e in ENTITIES}
    table_class["users"] = "User"
    mig = ROOT / "database/migrations/2026_11_16_100000_create_garment_domain.php"
    mig.write_text(migration_php(table_class), encoding="utf-8")
    (ROOT / "config/workflows.php").write_text(workflows_php(), encoding="utf-8")
    (ROOT / "lang/en").mkdir(parents=True, exist_ok=True)
    (ROOT / "lang/bn").mkdir(parents=True, exist_ok=True)
    (ROOT / "app/Policies").mkdir(parents=True, exist_ok=True)
    (ROOT / "database/factories").mkdir(parents=True, exist_ok=True)
    (ROOT / "lang/en/garment.php").write_text(lang_php("en"), encoding="utf-8")
    (ROOT / "lang/bn/garment.php").write_text(lang_php("bn"), encoding="utf-8")
    for entity in ENTITIES:
        model_path = ROOT / "app/Models" / f"{entity['class']}.php"
        model_path.write_text(fix_model_imports(model_php(entity, table_class)), encoding="utf-8")
        (ROOT / "app/Policies" / f"{entity['class']}Policy.php").write_text(policy_php(entity), encoding="utf-8")
        (ROOT / "database/factories" / f"{entity['class']}Factory.php").write_text(factory_php(entity), encoding="utf-8")
        for panel in entity["panels"]:
            base = ROOT / "app/Filament" / panel / "Resources" / f"{entity['class']}Resource.php"
            base.parent.mkdir(parents=True, exist_ok=True)
            # rewrite resource per panel
            php = resource_php(entity, panel)
            base.write_text(php, encoding="utf-8")
            page_dir = base.parent / f"{entity['class']}Resource" / "Pages"
            page_dir.mkdir(parents=True, exist_ok=True)
            for kind in ("List", "Create", "Edit"):
                (page_dir / f"{kind}{entity['class']}.php").write_text(page_php(entity, panel, kind), encoding="utf-8")
    print(f"entities={len(ENTITIES)}")


if __name__ == "__main__":
    main()
