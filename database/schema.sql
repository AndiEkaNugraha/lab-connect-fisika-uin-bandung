DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS categoriesUsers;
DROP TABLE IF EXISTS remember_tokens;
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

DROP TABLE IF EXISTS categoriesUsers;
CREATE TABLE categoriesUsers (
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