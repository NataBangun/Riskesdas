<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="700%" border="1">
  <tr style=" background-color:#d9d9d9; color:#000000;">
    <td align="center"><strong>No.</strong></td>
    <td align="center"><strong>No Stiker</strong></td>
    <td align="center"><strong>Id Propinsi</strong></td>
    <td align="center"><strong>Id Kabupaten</strong></td>
    <td align="center"><strong>Id Kecamatan</strong></td>
    <td align="center"><strong>Id Kelurahan</strong></td>
    <td align="center"><strong>DK</strong></td>
    <td align="center"><strong>Kode Sampel</strong></td>
    <td align="center"><strong>No Bangun Sunsus</strong></td>
    <td align="center"><strong>No Urut Sampel</strong></td>
    <td align="center"><strong>Nama Lab</strong></td>
    <td width="6%" align="center"><strong>Alamat Lab</strong></td>
    <td align="center"><strong>Nama Enumerator</strong></td>
    <td align="center"><strong>No telp</strong></td>
    <td align="center"><strong>Nama ART</strong></td>
    <td align="center"><strong>No Urut ART</strong></td>
    <td align="center"><strong>Umur ART</strong></td>
    <td align="center"><strong>Jenis Kelamin</strong></td>
    <td align="center"><strong>Tanya</strong></td>
    <td align="center"><strong>Alamat ART</strong></td>
    <td align="center"><strong>Wkt Ambil Darah</strong></td>
    <td align="center"><strong>Kadar HB (Nilai)</strong></td>
    <td align="center"><strong>Kadar HB (Wktu)</strong></td>
    <td align="center"><strong>Kadar HB (Tgl)</strong></td>
    <td align="center"><strong>Riwayat Diabet</strong></td>
    <td align="center"><strong>Konsumsi Insulin</strong></td>
    <td align="center"><strong>Puasa</strong></td>
    <td align="center"><strong>Waktu Akhir Makan</strong></td>
    <td align="center"><strong>Waktu Pembebanan Glukosa</strong></td>
    <td align="center"><strong>Setelah Pembebanan Glukosa</strong></td>
    <td align="center"><strong>Kadar Glukosa1 (Nilai)</strong></td>
    <td align="center"><strong>Kadar Glukosa1 (Wktu)</strong></td>
    <td align="center"><strong>Kadar Glukosa1 (Tgl)</strong></td>
    <td align="center"><strong>Kadar Glukosa2 (Nilai)</strong></td>
    <td align="center"><strong>Kadar Glukosa2 (Wktu)</strong></td>
    <td align="center"><strong>Kadar Glukosa2 (Tgl)</strong></td>
    <td align="center"><strong>Kadar Glukosa3 (Nilai)</strong></td>
    <td align="center"><strong>Kadar Glukosa3 (Wktu)</strong></td>
    <td align="center"><strong>Kadar Glukosa3 (Tgl)</strong></td>
    <td align="center"><strong>Tgl Enumerator</strong></td>
    <td align="center"><strong>Ketua Enumerator</strong></td>
    <td align="center"><strong>Tgl Pendampingan</strong></td>
    <td align="center"><strong>Nama Pendamping</strong></td>
    <td align="center"><strong>Kode Lab</strong></td>
    <td align="center"><strong>Kode Penelitian</strong></td>
    <td align="center"><strong>Riwayat Sakit Berat</strong></td>
    <td align="center"><strong>Tgl Ambil Darah</strong></td>
    <td align="center"><strong>Waktu Penetasan Buffer</strong></td>
    <td align="center"><strong>Waktu Pembacaan RDT</strong></td>
    <td align="center"><strong>Hasil RDT</strong></td>
    <td align="center"><strong>Riwayat Panas</strong></td>
    <td align="center"><strong>Duplo</strong></td>
    <td align="center"><strong>Tgl Nakes</strong></td>
    <td align="center"><strong>Nama Nakes</strong></td>
    <td align="center"><strong>Total Kolestrol</strong></td>
    <td align="center"><strong>HDL Kolestrol</strong></td>
    <td align="center"><strong>LDL Kolestrol</strong></td>
    <td align="center"><strong>Trigliserida</strong></td>
    <td align="center"><strong>Kreatinin</strong></td>
    <td align="center"><strong>Pemeriksa</strong></td>
    <td align="center"><strong>PN Loka</strong></td>
    <td align="center"><strong>PN PBTDK</strong></td>
    <td align="center"><strong>Spesies Loka</strong></td>
	
    <td align="center"><strong>PF</strong></td>
    <td align="center"><strong>Par PF</strong></td>
    <td align="center"><strong>Lemkos PF</strong></td>
    <td align="center"><strong>Densitas PF</strong></td>
    <td align="center"><strong>PV</strong></td>
    <td align="center"><strong>Par PV</strong></td>
    <td align="center"><strong>Lemkos PV</strong></td>
    <td align="center"><strong>Densitas PV</strong></td>
    <td align="center"><strong>PO</strong></td>
    <td align="center"><strong>Par PO</strong></td>
    <td align="center"><strong>Lemkos PO</strong></td>
    <td align="center"><strong>Densitas PO</strong></td>
    <td align="center"><strong>PM</strong></td>
    <td align="center"><strong>Par PM</strong></td>
    <td align="center"><strong>Lemkos PM</strong></td>
    <td align="center"><strong>Densitas PM</strong></td>
  </tr>
	<?php
		if (empty($view_export)) {
			echo '<tr><td colspan="79" style="color:red;"><center><b> Data Masih Kosong. </b><center></td></tr>';
		}
	?>
	<?php
		$no=1;
		foreach($view_export as $value):
	?>
  <tr>
    <td><?php echo $no ?></td>
    <td><?php echo $value['no_stiker']; ?></td>
    <td><?php echo $value['propinsi_id']; ?></td>
    <td><?php echo $value['kabupaten_id']; ?></td>
    <td><?php echo $value['kecamatan_id']; ?></td>
    <td><?php echo $value['kelurahan_id']; ?></td>
    <td><?php echo $value['DK']; ?></td>
    <td><?php echo $value['kode_sampel']; ?></td>
    <td><?php echo $value['no_bangun_sensus']; ?></td>
    <td><?php echo $value['no_urut_sampel']; ?></td>
    <td><?php echo $value['nama_lab']; ?></td>
    <td><?php echo $value['alamat_lab']; ?></td>
    <td><?php echo $value['nama_enumerator']; ?></td>
    <td><?php echo $value['no_telp']; ?></td>
    <td><?php echo $value['nama_ART']; ?></td>
    <td><?php echo $value['no_urutART']; ?></td>
    <td><?php echo $value['umurART']; ?></td>
    <td><?php echo $value['JK']; ?></td>
    <td><?php echo $value['tanya1']; ?></td>
    <td><?php echo $value['alamatART']; ?></td>
    <td><?php echo $value['time_ambil_darah']; ?></td>
    <td><?php echo $value['kadarHB_nilai']; ?></td>
    <td><?php echo $value['kadarHB_waktu']; ?></td>
    <td><?php echo $value['kadarHB_tgl']; ?></td>
    <td><?php echo $value['riwayat_diabet']; ?></td>
    <td><?php echo $value['minum_insulin']; ?></td>
    <td><?php echo $value['puasa']; ?></td>
    <td><?php echo $value['time_akhir_makan']; ?></td>
    <td><?php echo $value['time_pembebanan_glukosa']; ?></td>
    <td><?php echo $value['time_2jam_glukosa']; ?></td>
    <td><?php echo $value['kadar_glukosa1_nilai']; ?></td>
    <td><?php echo $value['kadar_glukosa1_waktu']; ?></td>
    <td><?php echo $value['kadar_glukosa1_tgl']; ?></td>
    <td><?php echo $value['kadar_glukosa2_nilai']; ?></td>
    <td><?php echo $value['kadar_glukosa2_waktu']; ?></td>
    <td><?php echo $value['kadar_glukosa2_tgl']; ?></td>
    <td><?php echo $value['kadar_glukosa3_nilai']; ?></td>
    <td><?php echo $value['kadar_glukosa3_waktu']; ?></td>
    <td><?php echo $value['kadar_glukosa3_tgl']; ?></td>
    <td><?php echo $value['tgl_enumerator']; ?></td>
    <td><?php echo $value['nama_ketua_enumerator']; ?></td>
    <td><?php echo $value['tgl_pendamping']; ?></td>
    <td><?php echo $value['nama_pendamping']; ?></td>
    <td><?php echo $value['kode_lab']; ?></td>
    <td><?php echo $value['kode_penelitian']; ?></td>
	<!--Bates BM02 -->
    <td><?php echo $value['riwayat_sakit_berat']; ?></td>
    <td><?php echo $value['tgl_ambildarah']; ?></td>
    <td><?php echo $value['time_penetasan_buffer']; ?></td>
    <td><?php echo $value['time_pembacaan_rdt']; ?></td>
    <td><?php echo $value['hasil_rdt']; ?></td>
    <td><?php echo $value['art_riwayat_panas']; ?></td>
    <td><?php echo $value['duplo']; ?></td>
    <td><?php echo $value['tgl_nakes']; ?></td>
    <td><?php echo $value['nama_nakes']; ?></td>
	<!-- Bates KK -->
    <td><?php echo $value['TtlKolestrol']; ?></td>
    <td><?php echo $value['HDLKolestrol']; ?></td>
    <td><?php echo $value['LDLKolestrol']; ?></td>
    <td><?php echo $value['Trigliserida']; ?></td>
    <td><?php echo $value['Kreatinin']; ?></td>
    <td><?php echo $value['pemeriksa']; ?></td>
	<!-- Bates Malaria -->
    <td><?php echo $value['pn_loka']; ?></td>
    <td><?php echo $value['pn_pbtdk']; ?></td>
    <td><?php echo $value['spesies_loka']; ?></td>
	
    <td><?php echo $value['PF']; ?></td>
    <td><?php echo $value['par_PF']; ?></td>
    <td><?php echo $value['lemkos_PF']; ?></td>
    <td><?php echo $value['densitas_PF']; ?></td>
    <td><?php echo $value['PV']; ?></td>
    <td><?php echo $value['par_PV']; ?></td>
    <td><?php echo $value['lemkos_PV']; ?></td>
    <td><?php echo $value['densitas_PV']; ?></td>
    <td><?php echo $value['PO']; ?></td>
    <td><?php echo $value['par_PO']; ?></td>
    <td><?php echo $value['lemkos_PO']; ?></td>
    <td><?php echo $value['densitas_PO']; ?></td>
    <td><?php echo $value['PM']; ?></td>
    <td><?php echo $value['par_PM']; ?></td>
    <td><?php echo $value['lemkos_PM']; ?></td>
    <td><?php echo $value['densitas_PM']; ?></td>
  </tr>
	<?php
		$no++;
		endforeach;
	?>
</table>

</body>
</html>
