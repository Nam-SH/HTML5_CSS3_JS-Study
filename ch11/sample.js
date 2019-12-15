 function visitingTime() {   
    var currentDate = new Date();    
    document.getElementById('info').innerHTML =
       '방문시간 : ' + currentDate.toLocaleString();  
 } 
