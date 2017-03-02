$(".bg-shadow").hide();
$(".add").hide();
$(".edit").hide();

function addData()
{
	$(".bg-shadow").fadeIn();
	$(".add").fadeIn();
}

function closePopup()
{
	$(".bg-shadow").fadeOut();
	$(".form-action").fadeOut();
}

function editBuku(jdl,isb,pnls,pnrbt,thn,stk,hrgpkp,hrgjl,ppn,dskn,id)
{
	$("#i").val(id);

	$("#jdl").val(jdl);
	$("#isb").val(isb);
	$("#pnls").val(pnls);
	$("#pnrbt").val(pnrbt);
	$("#thn").val(thn);
	$("#stk").val(stk);
	$("#hrgpkp").val(hrgpkp);
	$("#hrgjl").val(hrgjl);
	$("#ppn").val(ppn);
	$("#dsk").val(dskn);

	$(".bg-shadow").fadeIn();
	$(".edit").fadeIn();
}

function editUsers(nama,alamat,telepon,username,password,akses,id)
{
	$("#i").val(id)
	$('#nm').val(nama);
	$("#almt").val(alamat);
	$("#tlp").val(telepon);
	$("#usn").val(username);
	$("#psw").val(password);
	$("#aks").val(akses);

	$('.bg-shadow').fadeIn();
	$(".edit").fadeIn();
}

function editDistrb(nmd,almt,tlp,i)
{
	$("#nmd").val(nmd);
	$("#almt").val(almt);
	$("#tlp").val(tlp);
	$("#i").val(i);

	$(".bg-shadow").fadeIn();
	$(".edit").fadeIn();
}

function editPasok(j,d,jm,i)
{	
	$("#i").val(i);
	$("#j").val(j);
	$("#d").val(d);
	$("#j").val(jm);

	$(".bg-shadow").fadeIn();
	$(".edit").fadeIn();
}