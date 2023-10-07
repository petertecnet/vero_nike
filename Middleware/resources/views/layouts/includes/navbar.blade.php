<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
	<div class="container-fluid">
		<div class="navbar-wrapper"></div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
			aria-expanded="false" aria-label="Toggle navigation">
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-end">

			@include('layouts.includes.company_selector')

			<ul class="navbar-nav">
				<li class="nav-item dropdown  text-primary"  id="admin_area_menu">
					<a id="icons_navbar"class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i  id="icons_navbar" style="margin-top:-3px;"class="fa fa-user-circle" aria-hidden="true"></i>
						@auth {{ Auth::user()->name }} @endauth
						<p class="d-lg-none d-md-block">----</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" id="drop_perfil" aria-labelledby="navbarDropdownProfile">

						<a class="dropdown-item" href="/showme">
							<i id="icons_perfil"class="fa fa-user-o" aria-hidden="true"></i>
							EDITAR PERFIL
						</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i id="icons_perfil" class="fa fa-window-close" aria-hidden="true"></i>
							{{ __('SAIR DO SISTEMA') }}
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
