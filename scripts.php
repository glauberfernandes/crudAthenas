<script>
	$(document).ready(function(){
		$("#cadastrarPessoa").on('click',function(){
			$.ajax({
				url: 'insertPessoa.php',
				type: 'POST',
				data: {
					nome:$("#name").val(),
					email:$("#email").val(),
					categoria:$("#sel1").val()
				}

			});
		});
	});


	$(document).ready(function(){
		$("#cadastrarCategoria").on('click',function(){
			$.ajax({
				url: 'insertCategoria.php',
				type: 'POST',
				data: {
					nome:$("#nameCat").val()
				}
			});
		});
	});

	$(document).ready(function(){
		$("#atualizarPessoa").on('click',function(){
			$.ajax({
				url: 'updatePessoa.php',
				type: 'POST',
				data: {
					id:$("#idPes").val(),
					nome:$("#name").val(),
					email:$("#email").val(),
					categoria:$("#sel1").val()
				}

			});
		});
	});


	$(document).ready(function(){
		$("#atualizarCategoria").on('click',function(){
			$.ajax({
				url: 'updateCategoria.php',
				type: 'POST',
				data: {
					id:$("#idCat").val(),
					nome:$("#nameCat").val()
				}
			});
		});
	});

</script>