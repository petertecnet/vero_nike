@php
	$uuid = uniqid();
	$hasSubmenu = isset($submenu) && is_array($submenu);
@endphp

<style type="text/css">
.menu-item-restricted {
	display:inline-block;
	width:calc(100% - 65px);
	overflow:hidden;
	text-overflow:ellipsis;
	height: 17px;
	line-height: 17px;
	vertical-align: middle;
}

.menu-item-disabled {
	color: #d2d2d2 !important;
	cursor: not-allowed;
}
</style>

<li class="nav-item  {{ $isActive() ? 'active' : '' }}">
	<a
		class="nav-link {{ $hasSubmenu && !$isActive() ? 'collapsed' : '' }}"
		href="{{ $hasSubmenu ? '#' . $uuid : $url }}"
		data-toggle="{{ $hasSubmenu ? 'collapse' : '' }}"
		aria-expanded="{{ $hasSubmenu && !$isActive() ? 'false' : 'true' }}"
	>
		@switch ($icon['type'])

			@case('fontawesome')

				<i class="{{ $icon['class'] }}" aria-hidden="true"></i>
				@break

			@case('material')

				<span class="material-icons">{{ $icon['name'] }}</span>
				@break

		@endswitch
		<p title="{{ $label }}">
			<span class="menu-item-restricted">{{ $label }}</span>
			{!! $hasSubmenu ? '<b class="caret"></b>' : '' !!}
		</p>
	</a>

	@if ($hasSubmenu)

		<div class="collapse {{ $isActive() ? 'show' : '' }}" id="{{ $uuid }}">
			<ul class="nav">

				@foreach ($submenu as $item)

					@php

						$enabled = @$item['enabled'] !== false;
						$itemIsActive = is_callable($item['isActive']) ? $item['isActive'] : function () {return false;};

					@endphp

					<li routerlinkactive="active" class="nav-item {{ !$enabled ? 'menu-item-disabled' : ''}} {{ $itemIsActive() ? 'active' : '' }}" title="{{ isset($item['title']) && !empty($item['title']) ? $item['title'] : $item['label'] }}">
						<a class="nav-link {{ !$enabled ? 'menu-item-disabled' : ''}}" href="{{ $enabled ? $item['url'] : '#' }}" {!! !$enabled ? 'onClick="javascript:return false"' : '' !!}>
							@switch ($item['icon']['type'])

								@case('fontawesome')

									<i class="{{ $item['icon']['class'] }}" aria-hidden="true"></i>
									@break

								@case('material')

									<span class="material-icons">{{ $item['icon']['name'] }}</span>
									@break

							@endswitch
							<span class="sidebar-normal">{{ $item['label'] }}</span>

						</a>
					</li>

				@endforeach

			</ul>
		</div>

	@endif

</li>
