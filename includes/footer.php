</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    

    <!-- Bootstrap Core JavaScript -->
    
        <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu/metisMenu.min.js"></script>

   
   

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    <script src="js/jquery.validate.min.js"></script>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127069169-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-127069169-1');
  
    
  // for language
  function changeLanguage(getThis){
	var getThisVal = $(getThis).val();
	
	  	$.ajax({
			url : 'changelang.php',
			type : 'POST',
			data : {lang:getThisVal},
			dataType : 'json',
			success : function(resp){
				window.location.reload();
			},
			error : function(resp){
				window.location.reload();
			}
		}) 
  }
  // for language
</script>
<center>
상호: (주)한가족몰 대표: 김명희<br>
사업자번호: 849-88-01299<br>
주소: 서울특별시 금천구 가산디지털1로 168 (가산동) C동 5층<br>
전화: 02-853-9997 Fax: 02-853-9998 Email: dmmall2020@gmail.com<br>
</center>
</body>

</html>
