ALTER TABLE uhod_det_zdorov ADD comment INT NULL;
ALTER TABLE uhod_novorogden ADD comment INT NULL;

ALTER TABLE uhod_det_zdorov ADD `full_text_for_bot` TEXT NULL DEFAULT NULL AFTER `full_text`, ADD `ref_link` VARCHAR(255) NULL DEFAULT NULL AFTER `full_text_for_bot`;

ALTER TABLE uhod_novorogden ADD `full_text_for_bot` TEXT NULL DEFAULT NULL AFTER `full_text`, ADD `ref_link` VARCHAR(255) NULL DEFAULT NULL AFTER `full_text_for_bot`;

