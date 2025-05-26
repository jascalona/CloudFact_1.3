var options = {
    "0":["", "", ""],
    "1": ["solucion1", "material1", "tiempo1"],
    "2": ["solucion2", "material2", "tiempo2"],
    "3": ["solucion3", "material3", "tiempo3"],
    "4": ["solucion4", "material4", "tiempo4"]
}

function cambioOption(){
    var combo = document.getElementById('options');
    var opcion = combo.value;
    
   
    document.getElementById('solucion').value = opciones[opcion][0];
  
    document.getElementById('material').value = opciones[opcion][1];
  
    document.getElementById('tiempo').value = opciones[opcion][2];
    
  
  }