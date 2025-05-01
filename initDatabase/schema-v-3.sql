
DROP TABLE IF EXISTS measurementExperiment;

CREATE TABLE IF NOT EXISTS masterMeasurementExperiment (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    lab_id TEXT NOT NULL,
    masterMeasurement_banner INT NOT NULL,
    masterMeasurement_label TEXT NOT NULL,
    masterMeasurement_description TEXT,
    is_active BOOLEAN NOT NULL DEFAULT 1,
    is_deleted BOOLEAN NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_by TEXT,
    updated_by TEXT,
    FOREIGN KEY (lab_id) REFERENCES labs(id)
) WITHOUT ROWID;

CREATE TABLE IF NOT EXISTS measurementExperiment (
    id TEXT PRIMARY KEY DEFAULT (
        substr(hex(randomblob(4)), 1, 8) || '-' ||
        substr(hex(randomblob(2)), 1, 4) || '-' ||
        '4' || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr('89ab', abs(random()) % 4 + 1, 1) || substr(hex(randomblob(2)), 2, 3) || '-' ||
        substr(hex(randomblob(6)), 1, 12)
    ),
    masterMeasurement_id TEXT NOT NULL,
    measurementExperiment_condition TEXT NOT NULL,
    measurementExperiment_cycling INT NOT NULL DEFAULT 1,
    is_deleted BOOLEAN NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_by TEXT,
    updated_by TEXT,
    FOREIGN KEY (masterMeasurement_id) REFERENCES masterMeasurementExperiment(id)
)