/*
SQLyog Enterprise - MySQL GUI v8.05 
MySQL - 5.5.5-10.1.19-MariaDB : Database - db
*********************************************************************
*/ALTER TABLE harga DROP COLUMN destinasi_kantorID;
ALTER TABLE harga DROP COLUMN rp_delivery;
ALTER TABLE kantor ADD COLUMN awalan_connote VARCHAR(3) AFTER kode;
UPDATE kantor SET awalan_connote=(RAND()*1000);
ALTER TABLE kantor CHANGE awalan_connote awalan_connote VARCHAR(3) NOT NULL;
ALTER TABLE connote ADD COLUMN nomer VARCHAR(13) NOT NULL AFTER kantorID;
ALTER TABLE connote ADD COLUMN transaksiID VARCHAR(50) NULL AFTER STATUS;
ALTER TABLE connote CHANGE `status` connote_statusID VARCHAR(50) NULL;
CREATE TABLE  connote_status (
	connote_statusID VARCHAR(50) NOT NULL PRIMARY KEY COMMENT  '', 
	nama VARCHAR(50) NOT NULL COMMENT  ''
);
INSERT INTO  connote_status VALUES 
	('constt_000','Belum Terpakai'),
	('constt_001','Terpakai'),
	('constt_002','Void Connote')
;

RENAME TABLE transaksi_via TO pengiriman_transit;

CREATE TABLE  pengiriman (
pengirimanID VARCHAR(50) NOT NULL PRIMARY KEY COMMENT  '', 
connoteID VARCHAR(50) NOT NULL UNIQUE COMMENT  '', 
origin_kantorID VARCHAR(50) NOT NULL COMMENT  '', 
destination_kantorID VARCHAR(50) NOT NULL COMMENT  '', 
pengiriman_viaID VARCHAR(50) NOT NULL COMMENT  'darat, laut, udara', 
jenis_serviceID VARCHAR(50) NOT NULL COMMENT  '', 
jenis_barangID VARCHAR(50) NULL COMMENT  '', 
instruksi VARCHAR(50) NULL COMMENT  '', 
deskripsi VARCHAR(50) NULL COMMENT  '', 
is_cash INT(1) NOT NULL DEFAULT 0 COMMENT  '1:cash; 2:transfer', 
is_member INT(1) NOT NULL DEFAULT 0 COMMENT  '1:member; jika member relasi ke pengiriman_member', 
pengirim_no_identitas VARCHAR(50) NULL COMMENT  '', 
pengirim_nama VARCHAR(50) NULL COMMENT  '', 
pengirim_alamat VARCHAR(50) NULL COMMENT  '', 
pengirim_telepon VARCHAR(50) NULL COMMENT  '', 
penerima_nama VARCHAR(50) NULL COMMENT  '', 
penerima_telepon VARCHAR(50) NULL COMMENT  '', 
penerima_negaraID VARCHAR(50) NULL COMMENT  '', 
penerima_propinsiID VARCHAR(50) NULL COMMENT  '', 
penerima_kabupatenID VARCHAR(50) NULL COMMENT  '', 
penerima_kecamatanID VARCHAR(50) NULL COMMENT  '', 
penerima_kelurahanID VARCHAR(50) NULL COMMENT  '', 
penerima_alamat VARCHAR(50) NULL COMMENT  '');

CREATE TABLE  pengiriman_detail (
pengiriman_detailID VARCHAR(50) NOT NULL PRIMARY KEY COMMENT  '', 
pengirimanID VARCHAR(50) NOT NULL COMMENT  '', 
berat_aktual_kg FLOAT NULL DEFAULT 0 COMMENT  '', 
berat_volume_kg FLOAT NULL DEFAULT 0 COMMENT  '', 
koli INT(2) NULL DEFAULT 0 COMMENT  '', 
panjang_cm FLOAT NULL DEFAULT 0 COMMENT  '', 
lebar_cm FLOAT NULL DEFAULT 0 COMMENT  '', 
tinggi_cm FLOAT NULL DEFAULT 0 COMMENT  '', 
nilai_barang BIGINT(20) NULL DEFAULT 0 COMMENT  '', 
rp_asuransi BIGINT(20) NULL DEFAULT 0 COMMENT  '', 
rp_biaya_kirim BIGINT(20) NULL DEFAULT 0 COMMENT  '', 
rp_admin BIGINT(20) NULL DEFAULT 0 COMMENT  '', 
rp_packing BIGINT(20) NULL DEFAULT 0 COMMENT  '', 
rp_handling BIGINT(20) NULL DEFAULT 0 COMMENT  '', 
rp_diskon BIGINT(20) NULL DEFAULT 0 COMMENT  '');

CREATE TABLE  pengiriman_via (
pengiriman_viaID VARCHAR(50) NOT NULL PRIMARY KEY COMMENT  '', 
nama VARCHAR(50) NOT NULL COMMENT  'darat laut udara');

ALTER TABLE `pengiriman` ADD COLUMN updated_at INT(11) NULL;
ALTER TABLE `pengiriman_detail` ADD COLUMN updated_at INT(11) NULL;
ALTER TABLE `pengiriman_via` ADD COLUMN updated_at INT(11) NULL;
ALTER TABLE `pengiriman` ADD COLUMN updated_by VARCHAR(50) NULL;
ALTER TABLE `pengiriman_detail` ADD COLUMN updated_by VARCHAR(50) NULL;
ALTER TABLE `pengiriman_via` ADD COLUMN updated_by VARCHAR(50) NULL;

CREATE TABLE  pengiriman_member (
pengiriman_memberID VARCHAR(50) NOT NULL PRIMARY KEY COMMENT  '', 
pengirim_pelangganID VARCHAR(50) NOT NULL COMMENT  'darat laut udara', 
penerima_pelangganID VARCHAR(50) NOT NULL COMMENT  'darat laut udara');

ALTER TABLE pengiriman_via ADD COLUMN rp_rumus_pembagi INT(11) NULL DEFAULT 1 AFTER nama;
INSERT pengiriman_via (pengiriman_viaID,nama,rp_rumus_pembagi) VALUES ('pv_001','Darat','4000');
INSERT pengiriman_via (pengiriman_viaID,nama,rp_rumus_pembagi) VALUES ('pv_002','Udara','6000');
INSERT pengiriman_via (pengiriman_viaID,nama,rp_rumus_pembagi) VALUES ('pv_003','Laut','1000000');

ALTER TABLE connote CHANGE COLUMN transaksiID pengirimanID VARCHAR(50) NULL;

DROP TABLE transaksi;
DROP TABLE transaksi_detail;
DROP TABLE transaksi_member_penerima;
DROP TABLE transaksi_member_pengirim;
DROP TABLE transaksi_pickup;

ALTER TABLE pengiriman ADD COLUMN origin_agenID VARCHAR(50) NULL  COMMENT 'flag utk agen' AFTER origin_kantorID;
ALTER TABLE pengiriman ADD COLUMN origin_agensubID VARCHAR(50) NULL  COMMENT 'flag utk sub agen' AFTER origin_kantorID;
ALTER TABLE pengiriman ADD COLUMN origin_cabangID VARCHAR(50) NULL COMMENT 'flag utk cabang' AFTER origin_kantorID;

ALTER TABLE pengiriman ADD COLUMN transit_kantorID VARCHAR(50) NULL AFTER destination_kantorID;
ALTER TABLE deposit CHANGE verified_flag verified_flag INT(1) NULL DEFAULT 0 COMMENT '1:Terverifikasi';

ALTER TABLE deposit CHANGE tanggal tanggal_transfer DATETIME NOT NULL COMMENT '';
ALTER TABLE deposit CHANGE bank nama_bank_asal VARCHAR(50) NOT NULL COMMENT '';
ALTER TABLE deposit ADD COLUMN norek_bank_asal VARCHAR(50) NULL AFTER nama_bank_asal;
ALTER TABLE deposit ADD COLUMN nama_bank_tujuan VARCHAR(50) NOT NULL AFTER norek_bank_asal;
ALTER TABLE deposit ADD COLUMN norek_bank_tujuan VARCHAR(50) NOT NULL AFTER nama_bank_tujuan;

ALTER TABLE kabupaten ADD COLUMN wilayah_kantorID VARCHAR(50) NULL AFTER nama;

CREATE TABLE  biaya_pusat (
biaya_pusatID VARCHAR(50) NOT NULL PRIMARY KEY COMMENT  '', 
rp_perawatan_sistem INT(11) NOT NULL DEFAULT 0 COMMENT  '', 
persen_ppn INT(11) NOT NULL DEFAULT 0 COMMENT  '', 
persen_royalti INT(11) NOT NULL DEFAULT 0 COMMENT  '', 
persen_standart_diskon INT(11) NOT NULL DEFAULT 0 COMMENT  '', 
rp_standart_delivery INT(11) NOT NULL DEFAULT 0 COMMENT  '', 
updated_at INT(11) NULL COMMENT  '', 
updated_by VARCHAR(50) NULL COMMENT  '');

TRUNCATE agen;
TRUNCATE agen_sub;
TRUNCATE cabang;
TRUNCATE connote;
TRUNCATE pengiriman;
TRUNCATE kantor;
TRUNCATE harga;
DELETE FROM jenis_service WHERE jenis_serviceID='js_a3a623a2cf7d7';
DROP TABLE daerah;
