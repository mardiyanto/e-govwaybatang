<section class='content'>
<div class='row'>
<div class='col-lg-12'>

<div class='row'>
                       
                        <div class='col-md-12'>
                            <div class='panel panel-default'>
                                <div class='panel-heading'>
									Input data Matakulaih
                                 </div>
                                
                                <div class='panel-body'>

<form name='form1' id='form_combo' role='form'  method='post' action='proses.php?module=prosesinput'>
    	<label>Nama Matakuliah </label>
        <input type='text' class='form-control'  name='nama_matakul' onKeyUp=\"this.value=this.value.replace(/[^A-Z | a-z]/g,'')\"/ required><br>
		<label>Kode Matakuliah </label>
        <input type='text' class='form-control'   name='kode'  required><br>
		<label>SKS</label>
         <input type='text' class='form-control' name='sks' maxlength='12' onkeyup=\"this.value=this.value.replace(/[^0-9]/g,'')\" / ><br>
		<br />
            <button class='btn btn-primary btn-sm' type='submit'>Simpan</button>
            <button class='btn btn-primary btn-sm' type='reset'>Reset</button>
			<a href='javascript:history.go(-1)' class='btn btn-primary btn-sm'>Kembali</a><br /><br />
   </form> 
 
	       </div>
                        </div>
                    </div> </div> </div> </div></section>
					
					<tr><td>No Hp Aktif</td>	  	<td> <input type='text' class='form-control' name='hp' size=10></td></tr></br>
					
					
					
					
						 <table id='example1' class='table table-bordered table-striped'>
                    <thead>
	<tr>