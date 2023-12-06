<?php
function format_rupiah($price)
{
	$rupiah = number_format($price, 0, ',', '.');
	return 'Rp.' . $rupiah;
}
function getRent_id()
{
	$ci = get_instance();

	// Mendapatkan nilai maksimum dari kolom id pada tabel rents
	$query = $ci->db->query('SELECT MAX(id) AS max_id FROM rents');
	$result = $query->row();

	// Mendapatkan nilai maksimum
	$maxId = $result->max_id;

	// Mengekstrak angka dari format R###
	$lastNumber = intval(substr($maxId, 1));

	// Increment angka terakhir
	$newNumber = $lastNumber + 1;

	// Format ulang angka dengan R### format
	$newId = 'R' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

	// Jika tabel rents kosong, atur ke R001
	if ($maxId === null) {
		$newId = 'R001';
	}

	return $newId;
}

function getCar_id()
{
	$ci = get_instance();

	// Mendapatkan nilai maksimum dari kolom id pada tabel rents
	$query = $ci->db->query('SELECT MAX(id) AS max_id FROM cars');
	$result = $query->row();

	// Mendapatkan nilai maksimum
	$maxId = $result->max_id;

	// Mengekstrak angka dari format R###
	$lastNumber = intval(substr($maxId, 1));

	// Increment angka terakhir
	$newNumber = $lastNumber + 1;

	// Format ulang angka dengan R### format
	$newId = 'C' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

	// Jika tabel rents kosong, atur ke R001
	if ($maxId === null) {
		$newId = 'C001';
	}

	return $newId;
}
?>