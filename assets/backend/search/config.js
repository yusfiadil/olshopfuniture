function search(){

	$.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url:"http://localhost/akta2.4/register/search", // Isi dengan url/path file php yang dituju
        data: {nokk : $("#nokk").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
		},
		success: function(response){ // Ketika proses pengiriman berhasil
            $("#salah").hide(); // Sembunyikan loadingnya
            
            if(response.status == "success"){ // Jika isi dari array status adalah success
			
				$("#nama").val(response.nama); // set textbox dengan id nama
				
			}else{ // Jika isi dari array status adalah failed
				$("#salah").show();
				 document.getElementById("nama").value = "";

			}
		},
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.responseText);
        }
    });
}

function simpan(){
         
$("input").removeAttr("disabled");
     // ajax adding data to database
        $.ajax({
          url : "http://localhost/akta2.4/register/simpan",
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data)
          {
          	//location.href ='http://localhost/akta2.4/register/prosesformdaftar';
            location.href='http://localhost/akta2.4/register/getnomer';// for reload a page
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Data Tidak Boleh Kosong');
          }
      });
    
}




function nik(){
	$.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url:"http://localhost/akta2.4/register/nik", // Isi dengan url/path file php yang dituju
        data: {nik : $("#nik").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
		},
		success: function(response){ // Ketika proses pengiriman berhasil
            $("#salah").hide(); // Sembunyikan loadingnya
            
            if(response.status == "success"){ // Jika isi dari array status adalah success
			
				$("#nama").val(response.nama); // set textbox dengan id nama
				$("#jk").val(response.jk);
				$("#tmp").val(response.tmp);
				$("#tgl").val(response.tgl);
				$("#ibu").val(response.ibu);
				$("#ayah").val(response.ayah);


			}else{ // Jika isi dari array status adalah failed
				$("#salah").show();
				 document.getElementById("nama").value = "";
				 document.getElementById("jk").value = "";
				 document.getElementById("tmp").value = "";
				 document.getElementById("tgl").value = "";
				 document.getElementById("ibu").value = "";
				 document.getElementById("ayah").value = "";



			}
		},
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.responseText);
        }
    });
}

function nikpelapor(){
	$.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url:"http://localhost/akta2.4/register/nik", // Isi dengan url/path file php yang dituju
        data: {nik : $("#nikpelapor").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
		},
		success: function(response){ // Ketika proses pengiriman berhasil
            $("#salah1").hide(); // Sembunyikan loadingnya
            
            if(response.status == "success"){ // Jika isi dari array status adalah success
			
				$("#namapelapor").val(response.nama); // set textbox dengan id nama
				

			}else{ // Jika isi dari array status adalah failed
				$("#salah1").show();
				 document.getElementById("namapelapor").value = "";
				



			}
		},
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.responseText);
        }
    });
}

function niksaksi1(){
	$.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url:"http://localhost/akta2.4/register/nik", // Isi dengan url/path file php yang dituju
        data: {nik : $("#niksaksi1").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
		},
		success: function(response){ // Ketika proses pengiriman berhasil
            $("#salah2").hide(); // Sembunyikan loadingnya
            
            if(response.status == "success"){ // Jika isi dari array status adalah success
			
				$("#namasaksi1").val(response.nama); // set textbox dengan id nama
				

			}else{ // Jika isi dari array status adalah failed
				$("#salah2").show();
				 document.getElementById("namasaksi1").value = "";
				



			}
		},
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.responseText);
        }
    });
}

function niksaksi2(){
	$.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url:"http://localhost/akta2.4/register/nik", // Isi dengan url/path file php yang dituju
        data: {nik : $("#niksaksi2").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
		},
		success: function(response){ // Ketika proses pengiriman berhasil
            $("#salah3").hide(); // Sembunyikan loadingnya
            
            if(response.status == "success"){ // Jika isi dari array status adalah success
			
				$("#namasaksi2").val(response.nama); // set textbox dengan id nama
				

			}else{ // Jika isi dari array status adalah failed
				$("#salah3").show();
				 document.getElementById("namasaksi2").value = "";
				



			}
		},
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.responseText);
        }
    });
}



function cariupl(){
         
//$("input").removeAttr("disabled");
     // ajax adding data to database
        $.ajax({
          url : "http://localhost/akta2.4/register/cekupl",
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data)
          {
            location.href ='http://localhost/akta2.4/register/upload1';
           //alert('oke');// for reload a page
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('No pendaftaran atau tanggal tidak sesuai');
          }
      });
    
}

function carilck(){
         
//$("input").removeAttr("disabled");
     // ajax adding data to database
        $.ajax({
          url : "http://localhost/akta2.4/register/cekupl",
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data)
          {
            location.href ='http://localhost/akta2.4/register/lacak1';
           //alert('oke');// for reload a page
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('No pendaftaran atau tanggal tidak sesuai');
          }
      });
    
}

$(document).ready(function(){
	$("#salah").hide(); 
	$("#salah1").hide(); 
	$("#salah2").hide(); 
	$("#salah3").hide(); 

//1
    $("#btn-search").click(function(){ // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });

     $("#lanjut").click(function(){ // Ketika user mengklik tombol Cari

    var x = document.getElementById("nama").value;
    if (x == "") {
     alert("Isi No. KK Dengan Benar Terlebih Dahulu");

        return false;
    }else{
    	location.href ='http://localhost/akta2.4/register/prosesformdaftar';
    }
    });
    
    $("#nokk").keyup(function(){ // Ketika user menekan tombol di keyboard
		if(event.keyCode == 13){ // Jika user menekan tombol ENTER
			search(); // Panggil function search

		}
	});


$("#upload-btn").click(function(){ // Ketika user mengklik tombol Cari
      
      cariupl();
    });
$("#lacak-btn").click(function(){ // Ketika user mengklik tombol Cari
      
      carilck();
    });

$("#nik-btn").click(function(){ // Ketika user mengklik tombol Cari
        nik(); // Panggil function search
    });

$("#nikpelapor-btn").click(function(){ // Ketika user mengklik tombol Cari
        nikpelapor(); // Panggil function search
    });
$("#niksaksi1-btn").click(function(){ // Ketika user mengklik tombol Cari
        niksaksi1(); // Panggil function search
    });
$("#niksaksi2-btn").click(function(){ // Ketika user mengklik tombol Cari
        niksaksi2(); // Panggil function search
    });
$("#simpanpdf").click(function(){ // Ketika user mengklik tombol Cari
        location.href ='http://localhost/akta2.4/register/cetaknopendaftar';
    });
$("#ssimpan").click(function(){ // Ketika user mengklik tombol Cari
       var x = document.getElementById("nama").value;
       var y = document.getElementById("anak").value;
       var z = document.getElementById("tanggal").value;
       var a = document.getElementById("tempat").value;
       var b = document.getElementById("jam").value;
       var c = document.getElementById("namapelapor").value;
       var d = document.getElementById("namasaksi1").value;
       var e = document.getElementById("namasaksi2").value;

    if (y == "" || x == "" || z == "" || a == "" || b == "" || c == "" || d == "" || e == "")  {
     alert("Data Tidak Boleh Kosong");

        return false;
    }else{
    	simpan();
    	//location.href ='http://localhost/akta2.4/register/simpan';
    }
    });
});
