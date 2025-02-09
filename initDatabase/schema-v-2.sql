CREATE TABLE IF NOT EXISTS contact (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    email INT NOT NULL,
    name TEXT NOT NULL,
    phone TEXT NOT NULL,
    text TEXT,
    followUp BOOLEAN DEFAULT FALSE,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) WITHOUT ROWID;

CREATE TABLE IF NOT EXISTS projects (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    lab_id TEXT NOT NULL,
    user_id TEXT NOT NULL,
    projects_banner TEXT NOT NULL,
    projects_name TEXT NOT NULL,
    projects_description TEXT,
    seo_projects TEXT NOT NULL,
    is_active BOOLEAN NOT NULL DEFAULT 1,
    is_deleted BOOLEAN NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_by TEXT,
    updated_by TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (lab_id) REFERENCES labs(id)
)WITHOUT ROWID;

CREATE TABLE IF NOT EXISTS reservationsEquipment (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    equipment_id TEXT NOT NULL,
    user_id TEXT NOT NULL,
    reservation_desc VARCHAR DEFAULT [],
    reservation_listUser VARCHAR DEFAULT [],
    reservation_start TEXT,
    reservation_end TEXT,
    reservation_approver TEXT,
    reservation_cancel TEXT,
    reservation_note TEXT,
    reservation_amount TEXT,
    reservation_status TEXT,
    reservation_descBefore TEXT,
    reservation_descAfter TEXT,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_by TEXT,
    updated_by TEXT,

    FOREIGN KEY (equipment_id) REFERENCES equipments(id)
    FOREIGN KEY (user_id) REFERENCES users(id)
)WITHOUT ROWID;