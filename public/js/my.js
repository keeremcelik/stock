function confirmDel() {
 var agree=confirm("Bu içeriği silmek istediğinizden emin misiniz?\nBu işlem geri alınamaz!");
 if (agree) {
  return true ; }
 else {
  return false ;}


};

//stok update fonksiyonu element=stoğun idsini alır modal a gönderir
function viewStock(element) {
 
 document.getElementById("sid").value = element; 

};

function idCek($id,$name) {			
	document.getElementById("editid").value = $id; 
	document.getElementById("editname").value = $name; 
			
};
function olcubirimVeriCek($id,$name) {			
	document.getElementById("editid").value = $id; 
	document.getElementById("editname").value = $name; 
			
};
function compCek($id,$code,$name,$address,$taxadm,$taxnum,$autorized,$phone,$fax,$gsm,$web,$email) {					
	document.getElementById("editid").value = $id; 
	document.getElementById("editcode").value = $code; 
	document.getElementById("editname").value = $name; 
	document.getElementById("editaddress").value = $address; 
	document.getElementById("edittax-adm").value = $taxadm; 
	document.getElementById("edittax-num").value = $taxnum; 
	document.getElementById("editautorized").value = $autorized; 
	document.getElementById("editphone").value = $phone; 
	document.getElementById("editfax").value = $fax; 
	document.getElementById("editgsm").value = $gsm; 
	document.getElementById("editweb").value = $web; 
	document.getElementById("editemail").value = $email; 
			
};	
	
	
function mgrupCek($id,$code,$name,$description) {		

	document.getElementById("editid").value = $id; 
	document.getElementById("editcode").value = $code; 
	document.getElementById("editname").value = $name; 
	document.getElementById("editdescription").value = $description; 
			
};	
function mtypeCek(element) {		
			$.ajax({
				url:'ajax.php?type=mtype&op=upd',
				data: "id="+element,
				dataType: 'json',
				type:'post',
				success:function(result){
					//$('.veriler').html(result);
					document.getElementById("edt-mtype-id").value = id; 
					document.getElementById("edt-mtype-class").value = classs; 
					document.getElementById("edt-mtype-name").value = name; 
				}
			});
};
function productCek(element) {		
			$.ajax({
				url:'ajax.php?type=prd&op=upd',
				data: "id="+element,
				dataType: 'json',
				type:'post',
				success:function(result){
					//$('.veriler').html(result);
					document.getElementById("edt-prd-id").value = id; 
					document.getElementById("edt-prd-code").value = code; 
					document.getElementById("edt-prd-name").value = name; 
					document.getElementById("edt-prd-type").value = type; 
					document.getElementById("edt-img").src = "files/img/product/"+img;
					document.getElementById("edt-img-label").innerHTML = img;
				}
			});
};
function changeImgModal(element) {
	$('#edt-img')[0].src = window.URL.createObjectURL(element);
}

	
/*$(document).ready(function(){
	$(document).on('click', '#view', function(e){
	 
	  //e.preventDefault();
	 
	//  $('#modalid').val($(this).data('id'));
	function uygula() {
		   metin = $('input[name="modalid"]').val();
		   $.get('stocks.php', {id: metin}, function (gelen_cevap) {
			  $('#code').html(gelen_cevap);
		   });
		}
	

	});
});*/

