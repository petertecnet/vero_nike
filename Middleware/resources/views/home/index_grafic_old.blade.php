@extends('layouts.single')
@section('content')

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['DADOS', 'EMPRESAS X USUARIOS'],
		['Companias',       <?php echo $companies?>],

		]);

		var options = {
			pieHole: 0.5,
			pieSliceTextStyle: {
			color: '#ffffff',
		},
		legend: 'none',
		backgroundColor: { fill:'transparent' },
		slices: {0: {color: '#eb3d75'}, 1:{color: '#fdce1c'}}
		};

		var chart = new google.visualization.PieChart(document.getElementById('Graficos_laravel_php01'));
		chart.draw(data, options);


	}
	</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['DADOS', 'EMPRESAS X USUARIOS'],
		['Usuários',       <?php echo $users?>],

		]);

		var options = {
			pieHole: 0.5,
			pieSliceTextStyle: {
			color: '#ffffff',
		},
		legend: 'none',
		backgroundColor: { fill:'transparent' },
		slices: {0: {color: '#eb3d75'}, 1:{color: '#fdce1c'}}
		};

		var chart = new google.visualization.PieChart(document.getElementById('Graficos_laravel_php02'));
		chart.draw(data, options);


	}
	</script>
	<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = google.visualization.arrayToDataTable([
		['DADOS', 'RELATÓRIO GERAL SISTEMA'],
		['Usuários',        <?php echo $users?>],
		['Companias',       <?php echo $companies_grafic?>],
		['Faturamentos',       <?php echo $faturamentos_grafic?>],
		['Recebimentos',       <?php echo $recebimentos_grafic?>],
		['Clientes',       <?php echo $clientes_grafic?>],
		['Estoque',       <?php echo $estoque_grafic?>]


		]);

		var options = {
			pieHole: 0.3,
			pieSliceTextStyle: {
			color: '#ffffff',
		},
		legend: 'none',
		backgroundColor: { fill:'transparent' },
		slices: {
			0:{color: '#eb3d75'}, 
			1:{color: '#fdce1c'},
			2:{color: '#262626'},
			3:{color: '#1a1a1a'},
			4:{color: '#262626'},
			5:{color: '#404040'},
			6:{color: '#4d4d4d'},
			7:{color: '#666666'}
		}
		};

		var chart = new google.visualization.PieChart(document.getElementById('Graficos_laravel_php03'));
		chart.draw(data, options);


	}
	</script>



<div id="main_home">


<!--GRAFICOS -->
<!-- OBS adicionar mai graficos -->


<div id="Graficos_laravel_php03"></div>
<!-- OBS adicionar mais graficos -->
<!--GRAFICOS -->

<div id="row_data_usuario"class="row">
				<div class="col-lg-6 col-6" >
					<div class="small-box "id="card_data_usuario">
					<div class="inner">
							
					<a href="/crud/clientes/list">  <h3 id="font_size_total" style="color:#404040;"> <strong id="font-size_users" style="color:#404040;">USUÁRIOS</strong>  {{ $users }}</h3></a>

						</div>


					</div>
				</div>

				<div class="col-lg-6 col-6">
					<div class="small-box "id="card_data_usuario_meio">
						<div class="inner">
						<a href="/companies"> <h3 id="font_size_total"><strong id="font-size_users">EMPRESAS</strong>  {{ $companies_grafic }}</h3></a>
						</div>
						<div class="icon">


						</div>

					</div>
				</div>



</div>

</div>


<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->

<div id="row_data_usuario"class="row">
				<div class="col-lg-3 col-6" >
					<div class="small-box "id="card_data_usuario_meio">
						<div class="inner">
						<a href="#"> <h3 id="font_size_total"><strong id="font-size_users">FATURAMENTO </strong>   {{ $faturamentos_grafic }}</h3></a>
						<p id="dados_card">aguardando dados...</p>
						</div>
						<div class="icon">


						</div>

					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box "id="card_data_usuario_meio">
						<div class="inner">
						<a href="#">  <h3 id="font_size_total"><strong id="font-size_users">RECEBIMENTOS </strong>   {{ $recebimentos_grafic }}</h3></a>
						<p id="dados_card">aguardando dados...</p>
					</div>
						<div class="icon">


						</div>

					</div>
				</div>
				<div class="col-lg-3 col-6">
					<div class="small-box "id="card_data_usuario_meio">
						<div class="inner">
						<a href="#">  <h3 id="font_size_total"><strong id="font-size_users">ESTOQUE </strong>   {{ $estoque_grafic }}</h3></a>
						<p id="dados_card">aguardando dados...</p>
					</div>
						<div class="icon">


						</div>

					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box "id="card_data_usuario_meio">
						<div class="inner">
						<a href="/users">  <h3 id="font_size_total"><strong id="font-size_users">CLIENTES  </strong>{{ $clientes_grafic }}</h3></a>
						<p id="dados_card">aguardando dados...</p>
					</div>
						<div class="icon">


						</div>

					</div>
				</div>

</div>

<br>
<br>



<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
</div>



</div>




<!-- FINAL DIV-->
<!-- FINAL DIV-->

</div>




@endsection
