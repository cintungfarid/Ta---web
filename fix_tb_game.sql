-- Fix untuk tabel tb_game
-- Jalankan script ini melalui phpMyAdmin atau MySQL client

-- 1. Hapus data dengan id_game = 0 jika ada
DELETE FROM tb_game WHERE id_game = 0;

-- 2. Ubah struktur kolom id_game menjadi AUTO_INCREMENT
ALTER TABLE tb_game MODIFY id_game INT(11) NOT NULL AUTO_INCREMENT;

-- 3. Reset AUTO_INCREMENT jika perlu
ALTER TABLE tb_game AUTO_INCREMENT = 1;
