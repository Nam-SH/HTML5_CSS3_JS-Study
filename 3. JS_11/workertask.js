var i=1; 
while (true) { 
  i++; 
  for (var j=2; j<Math.sqrt(i); j++) {
    if (i % j == 0) continue;
  } 
  if (i>1000) postMessage(i);   
} 