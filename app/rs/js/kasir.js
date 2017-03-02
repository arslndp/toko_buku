$(".popup").hide();
$(".bg").hide();
$(".subtotal").hide();
$(".table").hide();
function addBarang()
{
	$(".bg").fadeIn();
	$(".add").fadeIn();
}

function closeP()
{
	$(".bg").fadeOut();
	$(".popup").fadeOut();
}

function editItems(isbn,c,id)
{
	$("#id").val(id);
	$("#isbn").val(isbn);
	$("#c").val(c);

	$(".bg").fadeIn();
	$(".edit").fadeIn();
}

/*
function subTotal()
{
	$.ajax({
		url:'index.php?action=kasir&status=total',
		type:'GET',
		success: function(data)
		{
			$(".total-price").html(data)
		}
	})
}

function show()
{
	$(".table").fadeIn();
	$.ajax({
		url:'index.php?action=kasir',
		type:'GET',
		success: function(data)
		{
			$(".table tbody").html(data);
			$subTotal();
		}
	})
}

function tambahBarang()
{
	var id = $("#i").val();
	$.ajax({
		url:'index.php?action=kasir&status=add',
		type: 'POST',
		data: 'i='+id,
		success:function(data)
		{
			closeP();
			show();
			$(".popup").fadeOut();
		}
	})
}

function delBarang(id)
{
	$.ajax({
		url: 'index.php?action=kasir&status=del',
		type: 'POST',
		data: 'i='+id,
		success:function(data)
		{
			show();
		}
	})
}*/