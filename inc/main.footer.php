</div>
<script src="script/jquery-3.2.1.min.js" ></script>
<script src="script/bootstrap.min.js" ></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.mobile').click(function(){
			$('.sidebar').slideToggle('fast');
		});
		$('#subjectsLink').click(function(){
			$('#subjectList').slideToggle('fast');
		});
		$('#textbooksLink').click(function(){
			$('#textbooksList').slideToggle('fast');
		});

		window.onresize = function(){
			if($(window).width() >= 500){
				$('.sidebar').show();
			}
		};

		$('#nav>li>a').click(function(){
			$('#nav>li>a').removeClass('selected');
			$(this).addClass('selected');
		});

	});
</script>
</body>
</html>