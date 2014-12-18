<?php
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=laporan'.date('Ymd').$_POST['Propinsi'].'.xls');
ini_set('max_execution_time','0');
mysql_connect('localhost','root','');
mysql_select_db('web_lims');
echo '<table>
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

        ';
        $query_all=mysql_query("SELECT t1.no_stiker,
											t1.kode_lab,
											t1.kode_penelitian,
											t1.propinsi_id,
											t1.kabupaten_id,
											t1.kecamatan_id,
											t1.kelurahan_id,
											t1.DK,
											t1.kode_sampel,
											t1.no_bangun_sensus,
											t1.no_urut_sampel,
											t1.nama_lab,
											t1.alamat_lab,
											t1.nama_enumerator,
											t1.no_telp,
											t1.nama_ART,
											t1.no_urutART,
											t1.umurART,
											t1.JK,
											t1.tanya1,
											t1.alamatART,
											t1.time_ambil_darah,
											t1.kadarHB_nilai,
											t1.kadarHB_waktu,
											t1.kadarHB_tgl,
											t1.riwayat_diabet,
											t1.minum_insulin,
											t1.puasa,
											t1.time_akhir_makan,
											t1.time_pembebanan_glukosa,
											t1.time_2jam_glukosa,
											t1.kadar_glukosa1_nilai,
											t1.kadar_glukosa1_waktu,
											t1.kadar_glukosa1_tgl,
											t1.kadar_glukosa2_nilai,
											t1.kadar_glukosa2_waktu,
											t1.kadar_glukosa2_tgl,
											t1.kadar_glukosa3_nilai,
											t1.kadar_glukosa3_waktu,
											t1.kadar_glukosa3_tgl,
											t1.tgl_enumerator,
											t1.tgl_pendamping,
											t1.nama_ketua_enumerator,
											t1.nama_pendamping,
											t1.kode_lab,
											t1.kode_penelitian

                                            FROM bm04 t1
                                            WHERE t1.propinsi_id =$_POST[Propinsi]
                                            AND t1.kode_lab=$_POST[lab]
                                            AND t1.no_stiker not like '%-%'
                                            AND t1.no_stiker is not null
                                            AND t1.kode_penelitian='$_POST[penelitian]' ORDER BY t1.no_stiker ASC"
        ) or die(mysql_error());

        $no=1;
		while($value = mysql_fetch_array($query_all)){
            echo "
                <tr>
    <td>$no </td>
    <td>$value[no_stiker] </td>
    <td>$value[propinsi_id] </td>
    <td>$value[kabupaten_id] </td>
    <td>$value[kecamatan_id] </td>
    <td>$value[kelurahan_id] </td>
    <td>$value[DK] </td>
    <td>$value[kode_sampel] </td>
    <td>$value[no_bangun_sensus] </td>
    <td>$value[no_urut_sampel] </td>
    <td>$value[nama_lab] </td>
    <td>$value[alamat_lab] </td>
    <td>$value[nama_enumerator] </td>
    <td>$value[no_telp] </td>
    <td>$value[nama_ART] </td>
    <td>$value[no_urutART] </td>
    <td>$value[umurART] </td>
    <td>$value[JK] </td>
    <td>$value[tanya1] </td>
    <td>$value[alamatART] </td>
    <td>$value[time_ambil_darah] </td>
    <td>$value[kadarHB_nilai] </td>
    <td>$value[kadarHB_waktu] </td>
    <td>$value[kadarHB_tgl] </td>
    <td>$value[riwayat_diabet] </td>
    <td>$value[minum_insulin] </td>
    <td>$value[puasa] </td>
    <td>$value[time_akhir_makan] </td>
    <td>$value[time_pembebanan_glukosa] </td>
    <td>$value[time_2jam_glukosa] </td>
    <td>$value[kadar_glukosa1_nilai] </td>
    <td>$value[kadar_glukosa1_waktu] </td>
    <td>$value[kadar_glukosa1_tgl] </td>
    <td>$value[kadar_glukosa2_nilai] </td>
    <td>$value[kadar_glukosa2_waktu] </td>
    <td>$value[kadar_glukosa2_tgl] </td>
    <td>$value[kadar_glukosa3_nilai] </td>
    <td>$value[kadar_glukosa3_waktu] </td>
    <td>$value[kadar_glukosa3_tgl] </td>
    <td>$value[tgl_enumerator] </td>
    <td>$value[nama_ketua_enumerator] </td>
    <td>$value[tgl_pendamping] </td>
    <td>$value[nama_pendamping] </td>
    <td>$value[kode_lab] </td>
    <td>$value[kode_penelitian] </td>
            ";

            //==BM02==
            $query_bm02=mysql_query("SELECT
                                            t2.riwayat_sakit_berat,
											t2.tgl_ambildarah,
											t2.time_penetasan_buffer,
											t2.time_pembacaan_rdt,
											t2.hasil_rdt,
											t2.art_riwayat_panas,
											t2.duplo,
											t2.tgl_nakes,
											t2.nama_nakes
                                            FROM bm02 t2
                                            WHERE t2.nostiker='$value[no_stiker]'"
            )or die(mysql_error());
            //$value2 = mysql_fetch_array($query_bm02);
            while($value2= mysql_fetch_array($query_bm02)){
                echo"
    <td>$value2[riwayat_sakit_berat]</td>
    <td>$value2[tgl_ambildarah]</td>
    <td>$value2[time_penetasan_buffer]</td>
    <td>$value2[time_pembacaan_rdt]</td>
    <td>$value2[hasil_rdt]</td>
    <td>$value2[art_riwayat_panas]</td>
    <td>$value2[duplo]</td>
    <td>$value2[tgl_nakes]</td>
    <td>$value2[nama_nakes]</td>
                ";
            }

            //==Kimia Klinis==
             $query_kk=mysql_query("SELECT
                                            t3.TtlKolestrol,
											t3.HDLKolestrol,
											t3.LDLKolestrol,
											t3.Trigliserida,
											t3.Kreatinin,
											t3.pemeriksa
                                            FROM formhasil t3
                                            WHERE t3.no_stiker='$value[no_stiker]'"
            )or die(mysql_error());

            while($value3 = mysql_fetch_array($query_kk)){
                echo"
    <td>$value3[TtlKolestrol]</td>
    <td>$value3[HDLKolestrol]</td>
    <td>$value3[LDLKolestrol]</td>
    <td>$value3[Trigliserida]</td>
    <td>$value3[Kreatinin]</td>
    <td>$value3[pemeriksa]</td>
                ";
            }

            //==Malaria==
             $query_mal=mysql_query("SELECT
                                            t4.pn_loka,
											t4.spesies_loka,
											t4.pn_pbtdk,
											t4.PF,
											t4.par_PF,
											t4.lemkos_PF,
											t4.densitas_PF,
											t4.PV,
											t4.par_PV,
											t4.lemkos_PV,
											t4.densitas_PV,
											t4.PO,
											t4.par_PO,
											t4.lemkos_PO,
											t4.densitas_PO,
											t4.PM,
											t4.par_PM,
											t4.lemkos_PM,
											t4.densitas_PM
                                            FROM formmalarianew t4
                                            WHERE t4.no_stiker='$value[no_stiker]'"
            )or die(mysql_error());
            ;
            while($value4 = mysql_fetch_array($query_mal)){
                echo "
    <td>$value4[pn_loka]</td>
    <td>$value4[pn_pbtdk]</td>
    <td>$value4[spesies_loka]</td>
    <td>$value4[PF]</td>
    <td>$value4[par_PF]</td>
    <td>$value4[lemkos_PF]</td>
    <td>$value4[densitas_PF]</td>
    <td>$value4[PV]</td>
    <td>$value4[par_PV]</td>
    <td>$value4[lemkos_PV]</td>
    <td>$value4[densitas_PV]</td>
    <td>$value4[PO]</td>
    <td>$value4[par_PO]</td>
    <td>$value4[lemkos_PO]</td>
    <td>$value4[densitas_PO]</td>
    <td>$value4[PM]</td>
    <td>$value4[par_PM]</td>
    <td>$value4[lemkos_PM]</td>
    <td>$value4[densitas_PM]</td>
                ";
            }
            echo '</tr> ';
        }

        echo '</table>';
