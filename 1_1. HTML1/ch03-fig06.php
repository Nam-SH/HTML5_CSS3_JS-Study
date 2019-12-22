<doctype html>
<html> <title> PHP 연습 </title>
<head>
</head>
<body>
<?PHP 
  extract(array_merge($_GET, $_POST)); 
  echo " <h2> 성적처리 결과 </h2><hr><hr>" ; 
  $total = $middle + $last; 
  $avg = $total / 2;  
  echo "이름 : $name ($major) <br> "; 
  echo "중간 : $middle <br> "; 
  echo "기말 : $last <br> ";  
  echo "총점 : $total <br> "; 
  echo "평균 : $avg <br> ";  
?> 
</body>
</html>









