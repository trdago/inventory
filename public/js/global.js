function getURL()
{
	return 'http://10.69.230.251/inventory/public/';
}

function apiUrl(codigo)
{

    return  'https://api.mercadopublico.cl/servicios/v1/publico/ordenesdecompra.json?codigo='+codigo+'&ticket=54150B43-04C4-4343-B9C8-F7AB6806E91D';
}

$(document).ready(function()
{

 
   var table = $('.tab').DataTable({
      rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true
    });
});