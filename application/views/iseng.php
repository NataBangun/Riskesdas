<div class="box-body">
		<form method="POST" id="frm1" name="penerimaan" class='form-horizontal'>
			<input type="hidden" name="status_addpenerimaan" value="0">
			<div class="control-group">
				<label for="NoStiker" class="control-label">No. Stiker</label>
				<div class="controls controls-row">
					<input type="text" name="NoStiker" id="NoStiker" placeholder="" maxlength="6" class="span2" />
					
					<label style="margin-left: 15%;" for="JenisSpesimen" class="control-label">Jenis Spesimen</label>
					<select style="margin-left: 2.5641%;" name="JenisSpesimen" id="JenisSpesimen" class='span3' >
						<option value=""> - Jenis Spesimen - </option>
						<?php foreach($arr_spesimen as $value): ?>
						<option value="<?php echo $value['spesimen_kode']; ?>"><?php echo $value['spesimen_kode']; ?> - <?php echo $value['spesimen_name']; ?></option>
						<?php endforeach; ?>
					</select>
			
				</div>
			</div>
			<div class="control-group">
				<label for="NoBarcode" class="control-label">No. Barcode</label>
				<div class="controls controls-row">
					<input type="text" name="NoBarcode" id="NoBarcode" class="span3" onkeyup="nobarcode(event)" />
					
					<label style="margin-left: 4%;" for="KondisiSpesimen" class="control-label">Kondisi Spesimen</label>
					<select style="margin-left: 2.5641%;" name="KondisiSpesimen" id="KondisiSpesimen" class='span3'  >
						<option value=""> - Kondisi Spesimen - </option>
						<?php foreach($arr_kondisispesimen as $value): ?>
						<option value="<?php echo $value['kondisispesimen_id']; ?>"><?php echo $value['kondisispesimen_id']; ?> - <?php echo $value['kondisispesimen_name']; ?></option>
						<?php endforeach; ?>
					</select>
			
				</div>
			</div>
			<div class="control-group">
				<label for="AsalInstitusi" class="control-label">Asal Institusi</label>
				<div class="controls controls-row">
					<select name="AsalInstitusi" id="AsalInstitusi" class='span3' >
						<option value=""> - Asal Institusi - </option>
						<?php foreach($arr_institusi as $value): ?>
						<option value="<?php echo $value['institusi_kode']; ?>"><?php echo $value['institusi_kode']; ?> - <?php echo $value['institusi_name']; ?></option>
						<?php endforeach; ?>
					</select>
					
					<label style="margin-left: 4%;" for="Visit" class="control-label">Visit ke</label>
					<input style="margin-left: 2.5641%;" type="text" name="Visit" id="Visit" placeholder="" class="span1" />
					<label style="width:12%" for="SuhuDtg" class="control-label">Suhu Datang</label>
					<input style="margin-left: 1%;" type="text" name="SuhuDtg" id="SuhuDtg" placeholder="" class="span1"/>
			
				</div>
			</div>
			<div class="control-group">
				<label for="NamaPenelitian" class="control-label">Nama Penelitian</label>
				<div class="controls controls-row">
					<select name="NamaPenelitian" id="NamaPenelitian" class='span3' >
						<option value=""> - Nama Penelitian - </option>
						<?php foreach($arr_penelitian as $value): ?>
						<option value="<?php echo $value['penelitian_kode']; ?>"><?php echo $value['penelitian_kode']; ?> - <?php echo $value['penelitian_name']; ?></option>
						<?php endforeach; ?>
					</select>
					
					<label style="margin-left: 6%;width:12%;" for="VSpesimen" class="control-label">Volume Spesimen</label>
					<input style="margin-left: 2.5641%;" type="text" name="VSpesimen" id="VSpesimen" placeholder="" class="span1"/>
					<label style="width:12%" for="JSpesimen" class="control-label">Jumlah Spesimen</label>
					<input style="margin-left: 1%;" type="text" name="JSpesimen" id="JSpesimen" placeholder="" class="span1"/>
			
				</div>
			</div>
			<div class="control-group">
				
				<div class="controls controls-row">
					<label style="margin-left:34.5%" for="NamaSite" class="control-label">Nama Site</label>
					<select style="margin-left: 2.5641%;" name="NamaSite" id="NamaSite" class='span3'>
						<option> - Nama Site - </option>
						<?php foreach($arr_site as $value): ?>
						<option value="<?php echo $value['site_id']; ?>"><?php echo $value['site_id']; ?> - <?php echo $value['site_name']; ?></option>
						<?php endforeach; ?>
					</select>
			
				</div>
			</div>
			<div class="control-group">
				<label for="NamaART" class="control-label">Nama</label>
				<div class="controls controls-row">
					<input type="text" name="NamaART" id="NamaART" placeholder="" class="span3" />
					
					<label style="margin-left:4.5%" for="SimpanSpesimen" class="control-label">Spesimen disimpan</label>
					<select style="margin-left: 2.5641%;" name="SimpanSpesimen" id="SimpanSpesimen" class='span3'  >
						<option value=""> - Simpan Spesimen - </option>
						<?php foreach($arr_simapanspesimen as $value): ?>
						<option value="<?php echo $value['simapanspesimen_id']; ?>"><?php echo $value['simapanspesimen_id']; ?> - <?php echo $value['simapanspesimen_name']; ?></option>
						<?php endforeach; ?>
					</select>
			
				</div>
			</div>
			<div class="control-group">
				<label for="umurART" class="control-label">Umur</label>
				<div class="controls controls-row">
					<input type="text" name="umurART" id="umurART" placeholder="" class="span1" />
					<label style="width:3%" class="control-label">Tahun</label>
					
					<label style="margin-left:1%" for="TGLKirim" class="control-label">TGL Kirim</label>
					<input style="margin-left: 2.5641%;" type="text" name="TGLKirim" id="TGLKirim" placeholder="dd/mm/yyyy" class="span2 datepick" />
					<label style="width:14%" for="Pengirim"class="control-label">Nama Pengirim</label>
					<input style="margin-left: 1%;" type="text" name="Pengirim" id="Pengirim" placeholder="" class="span2"/>
			
				</div>
			</div>
			<div class="control-group">
				<label for="JK" class="control-label">Jenis Kelamin</label>
				<div class="controls controls-row">
					<select name="JK" id="JK" class='span3'>
						<option value="0"> - Jenis Kalamin - </option>
						<option value="1">Pria</option>
						<option value="2">Wanita</option>
						<option value="8">Tidak Mengisi</option>
						<option value="9">Tidak Tahu</option>
					</select>
							
					<label style="margin-left: 1%;" for="DiambilTanggal" class="control-label">Diambil Tanggal</label>
					<input style="margin-left: 2.5641%;" type="text" name="DiambilTanggal" id="DiambilTanggal" placeholder="dd/mm/yyyy" class="span2 datepick" />
					<label style="width:10%" for="TGLDiterima" class="control-label">Diterima Tgl</label>
					<input style="margin-left: 2.5641%;" type="text" name="TGLDiterima" id="TGLDiterima" placeholder="dd/mm/yyyy" class="span2 datepick" />
			
				</div>
			</div>
			<div class="control-group">
				<label for="Alamat" class="control-label">Alamat</label>
				<div class="controls controls-row">
					<input type="text" name="Alamat" id="Alamat" placeholder="" class="span4" />
					
					<label for="AWB" class="control-label">AWB</label>
					<input style="margin-left: 2.5641%;" type="text" name="AWB" id="AWB" placeholder="" class="span3"/>
			
				</div>
			</div>
			<div class="control-group">
				<label for="Prov" class="control-label">Propinsi</label>
				<div class="controls controls-row">
					<!--input type="text" name="Prov" id="Prov" placeholder="" class="span1" />
					<input style="margin-left: 2.5641%;" type="text" name="KProv" id="KProv" placeholder="" class="span3" /-->
					<div class="span4">
						<select name="Prov" id="Prov" onchange="kabupaten(this.value)">
						<option> - Silakan Pilih Propinsi - </option>
															
						<?php foreach($arr_prop as $value): ?>
						<option value="<?php echo $value['ID_PROP'] ?>"><?php echo $value['ID_PROP'] ?> - <?php echo $value['NAMA_PROP'] ?></option>
						<?php endforeach; ?>
					</select></div>
					
					<label for="Ket" class="control-label">Keterangan</label>
					<input style="margin-left: 2.5641%;" type="text" name="Ket" id="Ket" placeholder="" class="span3"/>
			
				</div>
			</div>
			<div class="control-group">
				<label for="Kota" class="control-label">Kabupaten</label>
				<div class="controls controls-row">
					<!--input type="text" name="Kota" id="Kota" placeholder="" class="span1" />
					<input style="margin-left: 2.5641%;" type="text" name="KKota" id="KKota" placeholder="" class="span3" /-->
					<div class="span4" id="div_kota">
					<select name="Kota" id="Kota" onchange="kecamatan(this.value)">
						
					</select></div>
					
					<label for="jmlAliquot" class="control-label">Jumlah Aliquot</label>
					<input style="margin-left: 2.5641%;" type="text" name="jmlAliquot" id="jmlAliquot" placeholder="" class="span1"/>
					<button style="margin-left: 2.5641%;" class='button button-basic-blue' id="dialog-link" type="button">View</button>
			
				</div>
			</div>
			<div class="control-group">
				<label for="Kec" class="control-label">Kecamatan</label>
				<div class="controls controls-row">
					<!--input type="text" name="Kec" id="Kec" placeholder="" class="span1" />
					<input style="margin-left: 2.5641%;" type="text" name="KKec" id="KKec" placeholder="" class="span3" /-->
					<div class="span4" id="div_kec">
					<select name="Kec" id="Kec" onchange="kelurahan(this.value)">
						
					</select></div>
					
				</div>
			</div>
			<div class="control-group">
				<label for="Desa" class="control-label">Kelurahan</label>
				<div class="controls controls-row">
					<!--input type="text" name="Desa" id="Desa" placeholder="" class="span1" />
					<input style="margin-left: 2.5641%;" type="text" name="KDesa" id="KDesa" placeholder="" class="span3" /-->
					<div class="span4" id="div_kel">
					<select name="Desa" id="Desa">
						
					</select></div>
					
				</div>
			</div>
			<?php
				if (!($level == 3))
				echo"
			<div class=\"form-actions\">
				<button style=\"padding-left:1%\" type=\"button\" onclick=\"addaformpenerimaan_submit()\" class=\"button button-basic-blue\">Update</button>
			</div>
				";
			?>
		</form>
	</div>