var valBri=100;
var valCont=100;




$(document).ready(function()
{
    $(".radiografia").hover(function()
    {
        
            console.log("dago****************");
        console.log("aplicar css");        

     
    });
    $('.tab').DataTable();
  
   // $('masbrillo').change(function(){
   //      var val = (parseInt(this.value));
   //      var br='brightness('+val+'%)';
   //      console.log(br);
   //          $('#micanvas')
   //              .css('filter',br)
   //              .css('webkitFilter',br)
   //              .css('mozFilter',br)
   //              .css('oFilter',br)
   //              .css('msFilter',br); 
   //          $('#datBri').html('('+(val-100)+')');
   //      });
   
    

    // function accion()
    // {
    //     console.log("realizo accion");

    // }
    $('#masbrillo').click(function()
    {
        valBri +=10;
        var br='brightness('+valBri+'%)';
        console.log(br);
            $('.radiografia')
                .css('filter',br)
                .css('webkitFilter',br)
                .css('mozFilter',br)
                .css('oFilter',br)
                .css('msFilter',br); 
            $('#datBri').html((valBri-100));
        });   
    $('#menosbrillo').click(function()
    {
        valBri -=10;
        var br='brightness('+valBri+'%)';
        console.log(br);
            $('.radiografia')
                .css('filter',br)
                .css('webkitFilter',br)
                .css('mozFilter',br)
                .css('oFilter',br)
                .css('msFilter',br); 
            $('#datBri').html((valBri-100));
        }); 
    $('#masContraste').click(function()
    {
        valCont +=10;
        var br='contrast('+valCont+'%)';
        console.log(br);
            $('.radiografia')
                .css('filter',br)
                .css('webkitFilter',br)
                .css('mozFilter',br)
                .css('oFilter',br)
                .css('msFilter',br); 
            $('#datCont').html((valCont-100));
        });   
    $('#menosContraste').click(function()
    {
        valCont -=10;
        var br='contrast('+valCont+'%)';
        console.log(br);
            $('.radiografia')
                .css('filter',br)
                .css('webkitFilter',br)
                .css('mozFilter',br)
                .css('oFilter',br)
                .css('msFilter',br); 
            $('#datCont').html((valCont-100));
        });



    $('input[name="contraste"]').change(function(){
        var val = (parseInt(this.value));
        var br='contrast('+val+'%)';
        console.log(br);
            $('#micanvas')
                .css('filter',br)
                .css('webkitFilter',br)
                .css('mozFilter',br)
                .css('oFilter',br)
                .css('msFilter',br); 
        $('#datCont').html('('+(val-100)+')');
        });
    


});

 // function accion()
 //    {
 //        console.log("realizo accion: "+valBri+ " - "+valCont);
 //            var br='brightness('+valBri+'%)';
 //            $('.radiografia')
 //                .css('filter',br)
 //                .css('webkitFilter',br)
 //                .css('mozFilter',br)
 //                .css('oFilter',br)
 //                .css('msFilter',br); 

 //             br='contrast('+valCont+'%)';
 //            $('.radiografia')
 //                .css('filter',br)
 //                .css('webkitFilter',br)
 //                .css('mozFilter',br)
 //                .css('oFilter',br)
 //                .css('msFilter',br); 
 //        //     jQuery.hola();

 //    }


// var srcimg='dist/img/ciudad.jpg';
var url      = window.location.href;

var cod=url.split('/');
if(cod[5]=='imagen')
{
// alert(cod[5]);
cod = cod.pop();
// var cod=58;
// var srcimg='http://10.69.230.252:8080/mromexis/proxy?url=http%3A%2F%2F10.69.230.252%3A8093%2Fjson%3Ffullimage%3D'+cod+'&Authorization=Basic+c3lzYWRtOnByb21heA%3D%3D';
// var srcimg=$('.MagicZoom').html;


// window.onload = function() {
     
    // document.querySelector('#brillo').value = 100;
    // document.querySelector('#contraste').value = 100;
    // var img=new Image();
    // crossOrigin="anonymous";
    // img.src=srcimg;
    // img = new Image();
    // img.src = srcimg;
 
    //canvas = document.querySelector('micanvas');               
    //ctx = document.querySelector('canvas').getContext('2d');

    // img.onload = function() {
    //     ctx.drawImage(img,0,0);
    // }  
// };

// document.querySelector('input[name="brillo"]').addEventListener('change',function(){
//     var val = parseInt(this.value);
//     brightness(val);   
// });
 
// document.querySelector('input[name="contraste"]').addEventListener('change',function(){
//     var val = parseInt(this.value);
//     contrast(val);
// });

function brightness(val){  
     // img = new Image();
     // img.crossOrigin = 'anonymous';   // crossOrigin attribute has to be set before setting src.If reversed, it wont work.  
    // img.src = obj_data.srcUser;
    // img.src = srcimg;

    canvas = document.querySelector('micanvas');
    ctx = document.querySelector('canvas').getContext('2d');
   

    img.onload=function() {
        ctx.drawImage(this, 0, 0);
        var imgd = ctx.getImageData(0, 0, 2205, 1435);
        var pix = imgd.data;
        for (var i = 0, n = pix.length; i < n; i += 4) {
                     
            pix[i  ] += val;
            pix[i+1] += val;
            pix[i+2] += val;
     
        }
        ctx.putImageData(imgd, 0, 0);
    }
             
}

function contrast(val){
    img = new Image();
    img.src = srcimg;
    canvas = document.querySelector('micanvas');
    ctx = document.querySelector('canvas').getContext('2d');
 
    var factor = (259 * (val + 255)) / (255 * (259 - val));
 
    img.onload=function() {
        ctx.drawImage(this, 0, 0);
        var imgd = ctx.getImageData(0, 0, 2205, 1435);
        var pix = imgd.data;
        for (var i = 0, n = pix.length; i < n; i += 4) {
                 
            pix[i  ] = factor * pix[i  ];
            pix[i+1] = factor * pix[i+1];
            pix[i+2] = factor * pix[i+2];
         
        }
        ctx.putImageData(imgd, 0, 0);
    }
             
}
}
