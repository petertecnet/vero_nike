@extends('layouts.single')
@section('content')




<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->


<div id="Conectors_data_data_usuario" class="row">
    <!---------------------------------------------- Postgre SQL -------------->
    <!---------------------------------------------- Postgre SQL -------------->
    <!--
                <div class="col-lg-3 col-6" >
                    <div class="small-box "id="Conectors_data">
                        <div class="inner">
                        <center><i id="icon_conectors_"class="fa fa-table" aria-hidden="true"></i></center>

                        </div>

                        <div class="icon">
                        <button id="choose_conector">escolher PostgreSQL</button>

                        </div>

                    </div>
                    <div id="footer_conectors">
                    <i class="fa fa-circle" aria-hidden="true"></i>
 Desvincular Módulo
                        </div>

                </div>
-->
    <!---------------------------------------------- Postgre SQL -------------->
    <!---------------------------------------------- Postgre SQL -------------->

    <div class="col-lg-3 col-6">
        <div class="small-box " id="Conectors_data">
            <div class="inner">
                <center><i id="icon_conectors_" class="fa fa-database" aria-hidden="true"></i></center>

            </div>

            <div class="icon">
                <button id="choose_conector">escolher SQL</button>

            </div>


        </div>
        <div id="footer_conectors">
            <i class="fa fa-circle" aria-hidden="true"></i>
            Desvincular Módulo
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box " id="Conectors_data">
            <div class="inner">
                <center><i id="icon_conectors_" class="fa fa-file-excel-o" aria-hidden="true"></i></center>

            </div>

            <div class="icon">
                <button id="choose_conector">escolher XLS/CSV</button>

            </div>

        </div>
        <div id="footer_conectors">
            <i class="fa fa-circle" aria-hidden="true"></i>
            Desvincular Módulo
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box " id="Conectors_data">
            <div class="inner">
                <center><i id="icon_conectors_" class="fa fa-file-code-o" aria-hidden="true"></i></center>

            </div>

            <div class="icon">
                <button id="choose_conector">escolher XML</button>

            </div>

        </div>
        <div id="footer_conectors">
            <i class="fa fa-circle" aria-hidden="true"></i>
            Desvincular Módulo
        </div>
    </div>

</div>

<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
<!-- CARD AGUARDANDO DADOS DO BANCO DE DADOS SOBRE CONECTORES -->
</div>



</div>




<!-- FINAL DIV-->
<!-- FINAL DIV-->

</div>


<script>
//RESPONSIVE REFRESH
//RESPONSIVE REFRESH
window.onresize = () => {
    window.location.reload()
}
//RESPONSIVE REFRESH
//RESPONSIVE REFRESH
</script>


@endsection
