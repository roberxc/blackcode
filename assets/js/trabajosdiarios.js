$(document).ready(function() {
  var max_fields      = 10; //maximum input boxes allowed
  var divmat1         = document.getElementById("divmaterial1"); //Fields wrapper
  var divvalormat1         = document.getElementById("divvalormat1"); //Fields wrapper
  var divcantidadmat1         = document.getElementById("divcantidadmat1"); //Fields wrapper
  var divdeletemat1         = document.getElementById("divdeletemat1"); //Fields wrapper
  var add_button      = document.getElementById("btnmat1agregar"); //Add button ID
 
  var x = 1; //initlal text box count


 $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
      if(x < max_fields){ //max input box allowed

       //text box increment
          $(divmat1).append('<br></br>');
          $(divmat1).append('<div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Ingrese" name="mytext[]"></div>'); //add input box
          
          $(divvalormat1).append('<br></br>');
          $(divvalormat1).append('<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">$</span></div><input type="text" class="form-control" placeholder="Ingrese" name="mytext[]"></div></div>'); //add input box
          
          $(divcantidadmat1).append('<br></br>');
          $(divcantidadmat1).append('<div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Ingrese" name="mytext[]"></div>'); //add input box
          
          $(divdeletemat1).append('<br></br>');
          $(divdeletemat1).append('<div class="input-group mb-3"><button type="button" class="btn"><i class="fa fa-trash btndeletemat1"></i></button></div>'); //add input box
          x++; 
  }
  });


  $(this).on("click",".btndeletemat1", function(){ //user click on remove text 
    $(this).parent('divmaterial1').remove(); 
    $(this).parent('divvalormat1').remove(); 
    $(this).parent('divcantidadmat1').remove();
    $(this).parent('divdeletemat1').remove(); 
		x--;
  });
  
 
});

function test(){

  alert("Si funka perrrro");
}