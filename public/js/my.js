
function modalOpen($tip){
	$(".popup").fadeOut();

		$($tip).fadeToggle();	
		

}
function modalClose($modalName){
	$($modalName).fadeOut();	
}

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
function kullaniciYetkilendirme(id,name,surname){
	document.getElementById("yetkiId").value = id;
	document.getElementById("yetkiNameLastName").innerHTML = name + " " + surname;
	//document.getElementById('editstatus').options[status-1].selected = true;
}
function kullaniciVeriCek(id,name,surname,email,phone,status){
	document.getElementById("editid").value = id;
	document.getElementById("editname").value = name;
	document.getElementById("editlastname").value = surname;
	document.getElementById("editemail").value = email;
	document.getElementById("editphone").value = phone;
	//document.getElementById('editstatus').options[status-1].selected = true;
}

function depoVeriCek(id,code,name){
	document.getElementById("editid").value = id;
	document.getElementById("editcode").value = code;
	document.getElementById("editname").value = name;
}
function malzemeTipiVeriCek(id,name){
	document.getElementById("editid").value = id;
	document.getElementById("editname").value = name;

}
function urunVeriCek(id,type,typename,code,name,img){
	document.getElementById('editid').value = id;
	document.getElementById('edittype').value = type;
	document.getElementById('edittypename').value = typename;
	document.getElementById('editcode').value = code;
	document.getElementById('editname').value = name;
	document.getElementById('editimg').src = img;
}

function idCek(id,name) {			
	document.getElementById("editid").value = id; 
	document.getElementById("editname").value = name; 		
}
function mUnitCek(element) {		
	$.ajax({
		url:'ajax.php?type=munit&op=upd',
		data: "id="+element,
		dataType: 'json',
		type:'post',
		success:function(result){
			//$('.veriler').html(result);
			document.getElementById("edt-munit-id").value = result.id; 
			document.getElementById("edt-munit-name").value = result.name; 
		}
	})}

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
}
function changeImgModal(element) {
	$('#editimg')[0].src = window.URL.createObjectURL(element);
}

	
