-- DROP TABLE IF EXISTS users;
-- DROP TABLE IF EXISTS categoriesUsers;
-- DROP TABLE IF EXISTS remember_tokens;
-- DROP TABLE IF EXISTS labs;
-- DROP TABLE IF EXISTS equipments;
DROP TABLE IF EXISTS reservationsLab;
DROP TABLE IF EXISTS reservationsEquipment;

CREATE TABLE IF NOT EXISTS users (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    cat_id INT NOT NULL,
    name TEXT NOT NULL,
    nim TEXT NOT NULL,
    phone TEXT NOT NULL,
    mobile TEXT,
    email TEXT NOT NULL,
    avatar TEXT,
    major TEXT,
    bio TEXT,
    address TEXT,
    instagram TEXT,
    facebook TEXT,
    twitter TEXT,
    linkedin TEXT,
    hash_password TEXT NOT NULL,
    seo_user TEXT NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT 1,
    is_deleted BOOLEAN NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (cat_id) REFERENCES categoriesUsers(id)
) WITHOUT ROWID;

CREATE TABLE IF NOT EXISTS categoriesUsers (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS remember_tokens (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    user_id TEXT NOT NULL,
    token TEXT NOT NULL,
    expires_at TIMESTAMP NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)   WITHOUT ROWID;

CREATE TABLE IF NOT EXISTS labs (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    lab_banner TEXT NOT NULL,
    lab_name TEXT NOT NULL,
    lab_description TEXT,
    seo_lab TEXT NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT 1,
    is_deleted BOOLEAN NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_by TEXT,
    updated_by TEXT
) WITHOUT ROWID;

CREATE TABLE IF NOT EXISTS equipments (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    lab_id TEXT NOT NULL,
    equipments_banner TEXT NOT NULL,
    equipments_name TEXT NOT NULL,
    equipments_description TEXT,
    equipments_stock INT NOT NULL DEFAULT 0,
    equipments_damaged INT NOT NULL DEFAULT 0,
    equipments_borrowed INT NOT NULL DEFAULT 0,
    seo_equipment TEXT NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT 1,
    is_deleted BOOLEAN NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_by TEXT,
    updated_by TEXT,

    FOREIGN KEY (lab_id) REFERENCES labs(id)
)WITHOUT ROWID;

CREATE TABLE IF NOT EXISTS reservationsLab (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    lab_id TEXT NOT NULL,
    user_id TEXT NOT NULL,
    reservation_desc VARCHAR DEFAULT [],
    reservation_listUser VARCHAR DEFAULT [],
    reservation_start TEXT,
    reservation_end TEXT,
    reservation_approver TEXT,
    reservation_cancel TEXT,
    reservation_note TEXT,
    reservation_status TEXT,
    reservation_descBefore TEXT,
    reservation_descAfter TEXT,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_by TEXT,
    updated_by TEXT,

    FOREIGN KEY (lab_id) REFERENCES labs(id)
    FOREIGN KEY (user_id) REFERENCES users(id)
)WITHOUT ROWID;