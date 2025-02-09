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