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

function idCek(element) {		
			$.ajax({
				url:'ajax.php?type=dep&op=upd',
				data: "id="+element,
				dataType: 'json',
				type:'post',
				success:function(result){
					//$('.veriler').html(result);
					document.getElementById("editid").value = result.id; 
					document.getElementById("editname").value = result.name; 
				}
			});
};
	function depoVeriCek(element) {		
			$.ajax({
				url:'ajax.php?type=str&op=upd',
				data: "id="+element,
				dataType: 'json',
				type:'post',
				success:function(result){
					document.getElementById("edt-str-id").value = result.id; 
					document.getElementById("edt-str-code").value = result.code; 
					document.getElementById("edt-str-name").value = result.name; 
				}
			});
};	
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
			});
};	
function classCek(element) {		
			$.ajax({
				url:'ajax.php?type=mclass&op=upd',
				data: "id="+element,
				dataType: 'json',
				type:'post',
				success:function(result){
					//$('.veriler').html(result);
					document.getElementById("edt-mclass-id").value = result.id; 
					document.getElementById("edt-mclass-name").value = result.name; 
				}
			});
};	
function mtypeCek(element) {		
			$.ajax({
				url:'ajax.php?type=mtype&op=upd',
				data: "id="+element,
				dataType: 'json',
				type:'post',
				success:function(result){
					//$('.veriler').html(result);
					document.getElementById("edt-mtype-id").value = result.id; 
					document.getElementById("edt-mtype-class").value = result.classs; 
					document.getElementById("edt-mtype-name").value = result.name; 
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
					document.getElementById("edt-prd-id").value = result.id; 
					document.getElementById("edt-prd-code").value = result.code; 
					document.getElementById("edt-prd-name").value = result.name; 
					document.getElementById("edt-prd-type").value = result.type; 
					document.getElementById("edt-img").src = "files/img/product/"+result.img;
					document.getElementById("edt-img-label").innerHTML = result.img;
				}
			});
};
function changeImgModal(element) {
	$('#edt-img')[0].src = window.URL.createObjectURL(element);
}
function compCek(element) {		
			$.ajax({
				url:'ajax.php?type=comp&op=upd',
				data: "id="+element,
				dataType: 'json',
				type:'post',
				success:function(result){
					//$('.veriler').html(result);
					document.getElementById("edt-comp-id").value = result.id; 
					document.getElementById("edt-comp-code").value = result.code; 
					document.getElementById("edt-comp-name").value = result.name; 
					document.getElementById("edt-comp-address").value = result.address; 
					document.getElementById("edt-comp-tax-adm").value = result.taxadm; 
					document.getElementById("edt-comp-tax-num").value = result.taxnum; 
					document.getElementById("edt-comp-autorized").value = result.autorized; 
					document.getElementById("edt-comp-phone").value = result.phone; 
					document.getElementById("edt-comp-fax").value = result.fax; 
					document.getElementById("edt-comp-gsm").value = result.gsm; 
					document.getElementById("edt-comp-web").value = result.web; 
					document.getElementById("edt-comp-email").value = result.email; 
				}
			});
};	
	
$(document).ready(function(){
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
});

