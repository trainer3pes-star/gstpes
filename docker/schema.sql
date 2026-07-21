-- =====================================================================
-- GST Education Portal — reverse-engineered schema
-- Target: MariaDB / MySQL, database `gstportal`, table prefix `gst_`
--
-- IMPORTANT: There is no original SQL dump for this application. Every
-- table and column below was extracted by reading application/models/
-- (Home_model.php, Admin_model.php) end-to-end plus grepping raw
-- $this->db-> calls in application/controllers/Home.php and Admin.php.
-- See the comment block at the end of this file for caveats.
--
-- Safe to run multiple times: all DDL uses CREATE TABLE IF NOT EXISTS,
-- and the only seed data (gst_pos) is guarded so it is inserted once.
-- =====================================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- gst_user — student/end-user accounts
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    contact VARCHAR(255) NULL,
    course VARCHAR(255) NULL,
    password VARCHAR(255) NULL,
    confirm_password VARCHAR(255) NULL,
    created_date DATETIME NULL,
    is_active VARCHAR(255) NULL,
    status VARCHAR(255) NULL,
    varification_code VARCHAR(255) NULL,
    last_login DATETIME NULL,
    current_login DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- gst_user_ipdetails — per-session login/logout/IP audit trail for users
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_user_ipdetails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    session_id VARCHAR(255) NULL,
    current_login DATETIME NULL,
    last_logout DATETIME NULL,
    ip_address VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- gst_admin — admin panel accounts
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    contact VARCHAR(255) NULL,
    password VARCHAR(255) NULL,
    created_date DATETIME NULL,
    type VARCHAR(255) NULL,
    last_login DATETIME NULL,
    current_login DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- gst_admin_ipdetails — per-session login/logout/IP audit trail for admins
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_admin_ipdetails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NULL,
    session_id VARCHAR(255) NULL,
    current_login DATETIME NULL,
    last_logout DATETIME NULL,
    ip_address VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- gst_taxpayer — a user's registered taxpayer name/GSTIN profile
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_taxpayer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NULL,
    gstno VARCHAR(255) NULL,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- gst_pos — "Place of Supply" static lookup table (Indian states/UTs).
-- No insert/update calls anywhere in the app; only ever selected/joined.
-- Seeded once below with the official 2-digit GST state codes.
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_pos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    state_id VARCHAR(10) NULL,
    state_name VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- B2B invoices (Business to Business)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_invoice_master (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gstin_no VARCHAR(255) NULL,
    recipient_name VARCHAR(255) NULL,
    invoice_no VARCHAR(255) NULL,
    date DATE NULL,
    invoice_value DECIMAL(15,2) DEFAULT 0,
    pos_id INT NULL,
    is_deemed VARCHAR(255) NULL,
    is_supply VARCHAR(255) NULL,
    is_diff_perc VARCHAR(255) NULL,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_invoice_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NULL,
    rate DECIMAL(6,2) DEFAULT 0,
    taxable_value DECIMAL(15,2) DEFAULT 0,
    tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- B2C Large / B2C invoices
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_b2cinvoice_master (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_no VARCHAR(255) NULL,
    date DATE NULL,
    invoice_value DECIMAL(15,2) DEFAULT 0,
    pos_id INT NULL,
    is_supplies VARCHAR(255) NULL,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_b2cinvoice_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NULL,
    rate DECIMAL(6,2) DEFAULT 0,
    taxable_value DECIMAL(15,2) DEFAULT 0,
    tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- B2CS (Business to Consumer, Small / state-wise summary)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_b2cs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pos_id INT NULL,
    taxable_value DECIMAL(15,2) DEFAULT 0,
    is_diff_perc VARCHAR(255) NULL,
    rate DECIMAL(6,2) DEFAULT 0,
    tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Export invoices
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_exportinvoice (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_no VARCHAR(255) NULL,
    date DATE NULL,
    invoice_value DECIMAL(15,2) DEFAULT 0,
    port_code VARCHAR(255) NULL,
    shipping_bill_no VARCHAR(255) NULL,
    shipping_bill_date DATE NULL,
    gst_payment VARCHAR(255) NULL,
    user_id INT NULL,
    -- selected in get_exports_invoice_list() but never populated by any
    -- insert/update in the code (dead/legacy columns) — kept so the
    -- SELECT does not fail with "unknown column".
    supply_type VARCHAR(255) NULL,
    source VARCHAR(255) NULL,
    IRN VARCHAR(255) NULL,
    IRN_date DATE NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_exportsinvoice_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NULL,
    rate DECIMAL(6,2) DEFAULT 0,
    taxable_value DECIMAL(15,2) DEFAULT 0,
    tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Registered-person credit/debit notes
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_registerednote (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gstin_no VARCHAR(255) NULL,
    recipient_name VARCHAR(255) NULL,
    note_no VARCHAR(255) NULL,
    note_date DATE NULL,
    note_type VARCHAR(255) NULL,
    note_value DECIMAL(15,2) DEFAULT 0,
    pos_id INT NULL,
    is_deemed VARCHAR(255) NULL,
    is_supply VARCHAR(255) NULL,
    is_diff_perc VARCHAR(255) NULL,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_registerednote_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NULL,
    rate DECIMAL(6,2) DEFAULT 0,
    taxable_value DECIMAL(15,2) DEFAULT 0,
    tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Unregistered-person credit/debit notes
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_unregisterednote (
    id INT AUTO_INCREMENT PRIMARY KEY,
    is_diff_perc VARCHAR(255) NULL,
    type VARCHAR(255) NULL,
    note_no VARCHAR(255) NULL,
    note_date DATE NULL,
    note_type VARCHAR(255) NULL,
    note_value DECIMAL(15,2) DEFAULT 0,
    pos_id INT NULL,
    user_id INT NULL,
    -- selected in get_unregistered_note_list() but never populated by any
    -- insert/update (dead/legacy columns) — kept so SELECT does not fail.
    supply_type VARCHAR(255) NULL,
    source VARCHAR(255) NULL,
    INR VARCHAR(255) NULL,
    INR_date DATE NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_unregisterednote_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NULL,
    rate DECIMAL(6,2) DEFAULT 0,
    taxable_value DECIMAL(15,2) DEFAULT 0,
    tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Advance tax liability
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_advtaxliability (
    id INT AUTO_INCREMENT PRIMARY KEY,
    is_diff_perc VARCHAR(255) NULL,
    pos_id INT NULL,
    user_id INT NULL,
    -- selected in get_advtax_liability_list() but never populated by any
    -- insert/update (dead/legacy column) — kept so SELECT does not fail.
    supply_type VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_advtaxliability_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NULL,
    rate DECIMAL(6,2) DEFAULT 0,
    taxable_value DECIMAL(15,2) DEFAULT 0,
    tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Tax paid (adjustment of advance tax)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_taxpaid (
    id INT AUTO_INCREMENT PRIMARY KEY,
    is_diff_perc VARCHAR(255) NULL,
    pos_id INT NULL,
    user_id INT NULL,
    -- selected in get_tax_paid_list() but never populated by any
    -- insert/update (dead/legacy column) — kept so SELECT does not fail.
    supply_type VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_taxpaid_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    invoice_id INT NULL,
    rate DECIMAL(6,2) DEFAULT 0,
    taxable_value DECIMAL(15,2) DEFAULT 0,
    tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Nil-rated / exempted / non-GST supplies (batch insert, replace-by-user)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_onlinenil (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT NULL,
    nil_rated_supplies DECIMAL(15,2) DEFAULT 0,
    exempted DECIMAL(15,2) DEFAULT 0,
    non_gst_supplies DECIMAL(15,2) DEFAULT 0,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Online e-commerce operator supplies
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_onlineecom (
    id INT AUTO_INCREMENT PRIMARY KEY,
    gstin_no VARCHAR(255) NULL,
    net_value DECIMAL(15,2) DEFAULT 0,
    integrated_tax DECIMAL(15,2) DEFAULT 0,
    central_tax DECIMAL(15,2) DEFAULT 0,
    state_tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- HSN-wise summary of outward supplies
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_hsn (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hsn_number VARCHAR(255) NULL,
    description TEXT NULL,
    uqc VARCHAR(255) NULL,
    total_quantity DECIMAL(15,2) DEFAULT 0,
    taxable_value DECIMAL(15,2) DEFAULT 0,
    rate DECIMAL(6,2) DEFAULT 0,
    integrated_tax DECIMAL(15,2) DEFAULT 0,
    central_tax DECIMAL(15,2) DEFAULT 0,
    state_tax DECIMAL(15,2) DEFAULT 0,
    cess DECIMAL(15,2) DEFAULT 0,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Documents issued during the period (invoices/notes serial-number log)
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_online_supplies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    is_deemed VARCHAR(255) NULL,
    supplier_gstin_no VARCHAR(255) NULL,
    recipient_gstin_no VARCHAR(255) NULL,
    document_no VARCHAR(255) NULL,
    document_date DATE NULL,
    total_value DECIMAL(15,2) DEFAULT 0,
    pos_id INT NULL,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_document (
    id INT AUTO_INCREMENT PRIMARY KEY,
    is_table VARCHAR(255) NULL,
    from_serial_number VARCHAR(255) NULL,
    to_serial_number VARCHAR(255) NULL,
    total_number INT NULL,
    cancelled_number INT NULL,
    net_number INT NULL,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Opening balance of cash/credit ledgers
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_opening_balance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cash_ledger_igst DECIMAL(15,2) DEFAULT 0,
    cash_ledger_cgst DECIMAL(15,2) DEFAULT 0,
    cash_ledger_sgst DECIMAL(15,2) DEFAULT 0,
    cash_ledger_cess DECIMAL(15,2) DEFAULT 0,
    credit_ledger_integrated_tax DECIMAL(15,2) DEFAULT 0,
    credit_ledger_central_tax DECIMAL(15,2) DEFAULT 0,
    credit_ledger_state_tax DECIMAL(15,2) DEFAULT 0,
    credit_ledger_cess DECIMAL(15,2) DEFAULT 0,
    GSTR2B_IGST DECIMAL(15,2) DEFAULT 0,
    GSTR2B_CGST DECIMAL(15,2) DEFAULT 0,
    GSTR2B_SGST DECIMAL(15,2) DEFAULT 0,
    GSTR2B_Cess DECIMAL(15,2) DEFAULT 0,
    b_date DATE NULL,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- Challan (payment) reason + challan details + history
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_challan_reason (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reason_for_challan TEXT NULL,
    final_year VARCHAR(255) NULL,
    period VARCHAR(255) NULL,
    challan_type VARCHAR(255) NULL,
    user_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_challan_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cgst_tax DECIMAL(15,2) DEFAULT 0,
    cgst_interest DECIMAL(15,2) DEFAULT 0,
    cgst_penalty DECIMAL(15,2) DEFAULT 0,
    cgst_fees DECIMAL(15,2) DEFAULT 0,
    cgst_other DECIMAL(15,2) DEFAULT 0,
    igst_tax DECIMAL(15,2) DEFAULT 0,
    igst_interest DECIMAL(15,2) DEFAULT 0,
    igst_penalty DECIMAL(15,2) DEFAULT 0,
    igst_fees DECIMAL(15,2) DEFAULT 0,
    igst_other DECIMAL(15,2) DEFAULT 0,
    cess_tax DECIMAL(15,2) DEFAULT 0,
    cess_interest DECIMAL(15,2) DEFAULT 0,
    cess_penalty DECIMAL(15,2) DEFAULT 0,
    cess_fees DECIMAL(15,2) DEFAULT 0,
    cess_other DECIMAL(15,2) DEFAULT 0,
    sgst_tax DECIMAL(15,2) DEFAULT 0,
    sgst_interest DECIMAL(15,2) DEFAULT 0,
    sgst_penalty DECIMAL(15,2) DEFAULT 0,
    sgst_fees DECIMAL(15,2) DEFAULT 0,
    sgst_other DECIMAL(15,2) DEFAULT 0,
    mode_of_payment VARCHAR(255) NULL,
    cgst_total DECIMAL(15,2) DEFAULT 0,
    igst_total DECIMAL(15,2) DEFAULT 0,
    cess_total DECIMAL(15,2) DEFAULT 0,
    sgst_total DECIMAL(15,2) DEFAULT 0,
    status VARCHAR(255) NULL,
    total_challan_amount DECIMAL(15,2) DEFAULT 0,
    challan_amount_total_in_words TEXT NULL,
    created_on DATETIME NULL,
    expiry_date DATE NULL,
    cpin VARCHAR(255) NULL,
    user_id INT NULL,
    reference_number VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ---------------------------------------------------------------------
-- New GST registration application flow
-- ---------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS gst_new_registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    i_am_a VARCHAR(255) NULL,
    id_state VARCHAR(255) NULL,
    district VARCHAR(255) NULL,
    legal_name VARCHAR(255) NULL,
    pan VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    mobile_number VARCHAR(255) NULL,
    created_date DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_temporary_reference_number (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trn_number VARCHAR(255) NULL,
    captchatrn VARCHAR(255) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_business_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    trade_name VARCHAR(255) NULL,
    consitution_of_business VARCHAR(255) NULL,
    district VARCHAR(255) NULL,
    casual VARCHAR(255) NULL,
    composition VARCHAR(255) NULL,
    reason_to_obtain_registration VARCHAR(255) NULL,
    date_of_commencement_of_business_custom DATE NULL,
    date_on_which_liability_to_register_arises_temp DATE NULL,
    created_date DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Raw $this->db->insert() calls in Home.php::save_business_details() (no model wrapper)
CREATE TABLE IF NOT EXISTS gst_business_details_existing_registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    business_details_id INT NULL,
    existing_registration_type VARCHAR(255) NULL,
    existing_registration_number VARCHAR(255) NULL,
    existing_registration_date_custom DATE NULL,
    created_date DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_trade_name (
    id INT AUTO_INCREMENT PRIMARY KEY,
    b_id INT NULL,
    trade_name VARCHAR(255) NULL,
    created_date DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_promoter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NULL,
    middle_name VARCHAR(255) NULL,
    last_name VARCHAR(255) NULL,
    father_middle_name VARCHAR(255) NULL,
    father_first_name VARCHAR(255) NULL,
    father_last_name VARCHAR(255) NULL,
    date_of_birth_custom DATE NULL,
    mobile_number VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    gender VARCHAR(255) NULL,
    telephone_std VARCHAR(255) NULL,
    telephone_number VARCHAR(255) NULL,
    designation VARCHAR(255) NULL,
    director_number VARCHAR(255) NULL,
    pd_cit_ind VARCHAR(255) NULL,
    pan VARCHAR(255) NULL,
    passport VARCHAR(255) NULL,
    aadhar_card VARCHAR(255) NULL,
    country VARCHAR(255) NULL,
    pin VARCHAR(255) NULL,
    state VARCHAR(255) NULL,
    district VARCHAR(255) NULL,
    city VARCHAR(255) NULL,
    locality VARCHAR(255) NULL,
    road VARCHAR(255) NULL,
    name_of_building VARCHAR(255) NULL,
    building_number VARCHAR(255) NULL,
    floor_number VARCHAR(255) NULL,
    nearby_landmark VARCHAR(255) NULL,
    pd_upload VARCHAR(255) NULL,
    selfie VARCHAR(255) NULL,
    pri_auth VARCHAR(255) NULL,
    created_date DATETIME NULL,
    user_id INT NULL,
    registration_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_authorized_signatory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    primary_authorised_signatory VARCHAR(255) NULL,
    first_name VARCHAR(255) NULL,
    middle_name VARCHAR(255) NULL,
    last_name VARCHAR(255) NULL,
    father_middle_name VARCHAR(255) NULL,
    father_first_name VARCHAR(255) NULL,
    father_last_name VARCHAR(255) NULL,
    date_of_birth_custom DATE NULL,
    mobile_number VARCHAR(255) NULL,
    email VARCHAR(255) NULL,
    gender VARCHAR(255) NULL,
    telephone_std VARCHAR(255) NULL,
    telephone_number VARCHAR(255) NULL,
    designation VARCHAR(255) NULL,
    director_number VARCHAR(255) NULL,
    pd_cit_ind VARCHAR(255) NULL,
    pan VARCHAR(255) NULL,
    passport VARCHAR(255) NULL,
    country VARCHAR(255) NULL,
    pin VARCHAR(255) NULL,
    state VARCHAR(255) NULL,
    district VARCHAR(255) NULL,
    city VARCHAR(255) NULL,
    locality VARCHAR(255) NULL,
    road VARCHAR(255) NULL,
    name_of_building VARCHAR(255) NULL,
    building_number VARCHAR(255) NULL,
    floor_number VARCHAR(255) NULL,
    nearby_landmark VARCHAR(255) NULL,
    as_upload_photo VARCHAR(255) NULL,
    as_upload_sign VARCHAR(255) NULL,
    selfie VARCHAR(255) NULL,
    as_up_type VARCHAR(255) NULL,
    created_date DATETIME NULL,
    user_id INT NULL,
    registration_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- save_authorized_representative() passes $data straight through to
-- $this->db->insert(); the controller currently only ever sets these two
-- keys (as_cit_ind, created_date) — see caveats at the end of the file.
CREATE TABLE IF NOT EXISTS gst_authorized_representative (
    id INT AUTO_INCREMENT PRIMARY KEY,
    as_cit_ind VARCHAR(255) NULL,
    created_date DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_principle_place_of_business (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pin VARCHAR(255) NULL,
    district VARCHAR(255) NULL,
    city VARCHAR(255) NULL,
    locality VARCHAR(255) NULL,
    road VARCHAR(255) NULL,
    name_of_building VARCHAR(255) NULL,
    building_number VARCHAR(255) NULL,
    floor_number VARCHAR(255) NULL,
    nearby_landmark VARCHAR(255) NULL,
    latitude DECIMAL(10,6) DEFAULT 0,
    longitude DECIMAL(10,6) DEFAULT 0,
    sector_or_unit VARCHAR(255) NULL,
    commissionerate VARCHAR(255) NULL,
    division VARCHAR(255) NULL,
    ranges VARCHAR(255) NULL,
    office_email VARCHAR(255) NULL,
    office_telephone_std VARCHAR(255) NULL,
    office_telephone VARCHAR(255) NULL,
    office_mobile_number VARCHAR(255) NULL,
    office_fax_std VARCHAR(255) NULL,
    office_fax VARCHAR(255) NULL,
    nature_of_premises VARCHAR(255) NULL,
    proof_of_principal_of_business VARCHAR(255) NULL,
    bp_upload VARCHAR(255) NULL,
    nature_of_business_choices TEXT NULL,
    bp_add VARCHAR(255) NULL,
    created_date DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- save_additional_place_of_business() passes $data straight through; the
-- controller currently only ever sets number_of_additional_places and
-- created_date. The *actual* per-address data for additional places is
-- saved into gst_principle_place_of_business by
-- save_additional_places_of_business() (note the extra "s") — see caveats.
CREATE TABLE IF NOT EXISTS gst_additional_place_of_business (
    id INT AUTO_INCREMENT PRIMARY KEY,
    number_of_additional_places INT NULL,
    created_date DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gst_bank_account (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_number VARCHAR(255) NULL,
    type_of_account VARCHAR(255) NULL,
    ifsc_code VARCHAR(255) NULL,
    proof_of_details_of_bank_account VARCHAR(255) NULL,
    pd_upload VARCHAR(255) NULL,
    created_date DATETIME NULL,
    user_id INT NULL,
    registration_id INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

SET FOREIGN_KEY_CHECKS = 1;

-- =====================================================================
-- Seed data: gst_pos (Place of Supply — Indian states & UTs)
-- Official 2-digit GST state codes. Guarded so re-running this file
-- does not duplicate rows.
-- =====================================================================
INSERT INTO gst_pos (state_id, state_name)
SELECT * FROM (SELECT '01' AS state_id, 'Jammu and Kashmir' AS state_name
    UNION ALL SELECT '02', 'Himachal Pradesh'
    UNION ALL SELECT '03', 'Punjab'
    UNION ALL SELECT '04', 'Chandigarh'
    UNION ALL SELECT '05', 'Uttarakhand'
    UNION ALL SELECT '06', 'Haryana'
    UNION ALL SELECT '07', 'Delhi'
    UNION ALL SELECT '08', 'Rajasthan'
    UNION ALL SELECT '09', 'Uttar Pradesh'
    UNION ALL SELECT '10', 'Bihar'
    UNION ALL SELECT '11', 'Sikkim'
    UNION ALL SELECT '12', 'Arunachal Pradesh'
    UNION ALL SELECT '13', 'Nagaland'
    UNION ALL SELECT '14', 'Manipur'
    UNION ALL SELECT '15', 'Mizoram'
    UNION ALL SELECT '16', 'Tripura'
    UNION ALL SELECT '17', 'Meghalaya'
    UNION ALL SELECT '18', 'Assam'
    UNION ALL SELECT '19', 'West Bengal'
    UNION ALL SELECT '20', 'Jharkhand'
    UNION ALL SELECT '21', 'Odisha'
    UNION ALL SELECT '22', 'Chhattisgarh'
    UNION ALL SELECT '23', 'Madhya Pradesh'
    UNION ALL SELECT '24', 'Gujarat'
    UNION ALL SELECT '25', 'Daman and Diu'
    UNION ALL SELECT '26', 'Dadra and Nagar Haveli'
    UNION ALL SELECT '27', 'Maharashtra'
    UNION ALL SELECT '28', 'Andhra Pradesh (Old)'
    UNION ALL SELECT '29', 'Karnataka'
    UNION ALL SELECT '30', 'Goa'
    UNION ALL SELECT '31', 'Lakshadweep'
    UNION ALL SELECT '32', 'Kerala'
    UNION ALL SELECT '33', 'Tamil Nadu'
    UNION ALL SELECT '34', 'Puducherry'
    UNION ALL SELECT '35', 'Andaman and Nicobar Islands'
    UNION ALL SELECT '36', 'Telangana'
    UNION ALL SELECT '37', 'Andhra Pradesh'
    UNION ALL SELECT '38', 'Ladakh'
    UNION ALL SELECT '97', 'Other Territory'
) AS seed
WHERE NOT EXISTS (SELECT 1 FROM gst_pos LIMIT 1);

-- =====================================================================
-- OPTIONAL SAFETY NET (not part of the gst_ table set):
--
-- Home_model::get_taxpayer_info() runs a JOIN against a table literally
-- named `user` (no gst_ prefix) — this looks like a leftover/typo bug
-- that should really read `gst_user`, and it is on the hot path: it
-- fires on EVERY page load via Home controller's constructor whenever
-- the logged-in user has a matching gst_taxpayer row. Without a `user`
-- table/view present the app will throw "Table 'gstportal.user'
-- doesn't exist" on that very common path. Creating a thin compatibility
-- view here so the app does not hard-crash; the real fix is to correct
-- the model to join gst_user instead.
-- =====================================================================
CREATE OR REPLACE VIEW user AS
SELECT id, name, email, contact, current_login FROM gst_user;

-- =====================================================================
-- CAVEATS — read before relying on this schema in production
-- =====================================================================
-- This schema was reverse-engineered entirely from PHP code (CodeIgniter
-- query-builder calls), not from an original database dump. Column
-- names are exact matches to what appears in insert/update/select/where/
-- join/order_by calls, but data TYPES and LENGTHS are best-effort
-- guesses (VARCHAR(255) default; DECIMAL(15,2) for tax/value/amount/
-- cess/liability-like columns; DATE/DATETIME for date-like columns;
-- INT for *_id columns) — good enough for the app to function, not
-- guaranteed to match whatever the original developers actually used.
--
-- If anything breaks with a "Column not found" / "Unknown column" error
-- in production use, that specific column was missed by this
-- reverse-engineering pass and needs to be added via ALTER TABLE.
--
-- Specific ambiguities/guesses worth knowing about:
--   * gst_exportinvoice.supply_type/source/IRN/IRN_date and
--     gst_unregisterednote.supply_type/source/INR/INR_date and
--     gst_advtaxliability.supply_type and gst_taxpaid.supply_type are
--     SELECTed in list views but are never written by any insert/update
--     in the code — they are effectively dead columns in the current
--     app. Included only so the SELECT * style queries don't fail.
--   * gst_authorized_representative and gst_additional_place_of_business
--     are populated via `$this->db->insert($data)` pass-through with
--     whatever keys the caller happens to set. As of this reading, the
--     controller only ever sets 2 keys for each (as_cit_ind/created_date,
--     and number_of_additional_places/created_date respectively) — if a
--     future code path posts additional fields into `$data` before
--     calling these model methods, new columns will need to be added.
--   * gst_new_registration.id_state is a free-text/dropdown value (not
--     a foreign key — it does not end in `_id`), so it was left as
--     VARCHAR rather than INT.
--   * `rate` columns (percentage) and `total_quantity`, `latitude`,
--     `longitude`, and the document serial-number counters
--     (from_serial_number, to_serial_number, total_number,
--     cancelled_number, net_number) don't literally match the
--     tax/value/amount/cess/liability keyword rule but are clearly
--     numeric in use (summed, compared, or used in arithmetic), so they
--     were given numeric types (DECIMAL/INT) rather than VARCHAR(255)
--     for the app to function correctly.
--   * A `user` compatibility VIEW (not gst_-prefixed) was added at the
--     bottom of this file as a safety net for a real bug in
--     Home_model::get_taxpayer_info(), which joins a bare `user` table
--     instead of `gst_user`. This runs on nearly every authenticated
--     page load. Fixing the model to reference gst_user directly is the
--     more correct long-term fix; the view is a stopgap.
-- =====================================================================
