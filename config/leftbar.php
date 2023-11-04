<style type="text/css">
	div.leftbar {
		position: fixed;
		background: white;
		box-shadow: 0px 4px 50px 0px rgba(0, 0, 0, 0.02);
		z-index: 1000;
		height: 100%;
		width: 250px;
		right: 0;
		left: 0;
	}
	div.leftbarContent {
		padding: 35px 30px !important;
	}
	img.leftbarLogo {
		width: 60%;
		margin-bottom: 15px;
		cursor: pointer;
	}
	div.links {
		padding-top: 20px;
	}
	div.link {
		padding: 12px 20px 8px 20px;
		border-radius: 20px;
		background: transparent;
		cursor: pointer;
		color: #939393;
		margin-bottom: 5px;
		margin-top: 5px;
		transition: all 300ms;
	}
	div.links .ativo {
		background: #22464B;
		color: white;

	}
	div.link svg {
		height: 25px;
		position: relative;
		top: -2px;
		margin: 0px !important;
		margin-right: 5px !important;
		stroke-width: 1px !important;
	}
	div.link:hover,
	div.link svg:hover {
		color: #000000ac;
	}
	div.ativo:hover,
	div.ativo svg:hover {
		background: #22464B;
		color: white;
	}
</style>

<div class="leftbar">
	<div class="leftbarContent">
		<center>
			<img onclick="window.location.href='<?php echo $app['local'] ?>/painel'" class="leftbarLogo" src="<?php echo $app['local'] ?>/assets/img/logo.svg">
		</center>
		<div class="links">

			<div onclick="window.location.href='<?php echo $app['local'] ?>/painel'" class="link <?php if ($page_name == "Painel"){ echo 'ativo'; } ?>">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
				</svg>	
				 Painel
			</div>

			<div onclick="window.location.href='<?php echo $app['local'] ?>/clientes'" class="link <?php if ($page_name == "Clientes"){ echo 'ativo'; } ?>">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
				</svg>
				Clientes
			</div>

			<div onclick="window.location.href='<?php echo $app['local'] ?>/plano-alimentar'" class="link <?php if ($page_name == "Plano Alimentar"){ echo 'ativo'; } ?>">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
				</svg>	
				Plano Alimentar
			</div>

			<div onclick="window.location.href='<?php echo $app['local'] ?>/relatorios'" class="link <?php if ($page_name == "Relatórios"){ echo 'ativo'; } ?>">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
				  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
				</svg>
				Relatórios
			</div>

		</div>
	</div>
</div>

<style type="text/css">
	.topbar {
		position: fixed;
		background: white;
		box-shadow: 0px 4px 60px -11px rgba(0, 0, 0, 0.04);
		z-index: 999;
		width: 100vw;
		left: 0;
		top: 0;
	}
	div.topbarContent {
		padding: 10px 50px 10px 300px;
	}

	.topbarPP {
		width: 50px;
		height: 50px;
		border-radius: 50px;
		float: right;
		box-shadow: 0px 0px 10px 1px rgba(0,0,0,0.05);
		background: url('<?php echo $_SESSION['admin']['pp']; ?>');
		background-position: center center !important;
		background-size: cover !important;
		cursor: pointer;
	}
	.pageStatus {
		color: #00000090;
	}
	.pageStatus svg {
		width: 20px;
		color: #929292;
	}
	.pageStatus .homeIcon {
		cursor: pointer !important;
		transition: all 200ms;
	}
	.pageStatus .homeIcon:hover {
		color: #22464B;
	}
	.dropdown-item svg {
		width: 18px !important;
		margin-right: 5px;
		color: #000000ae;
		position: relative;
		top: -1px;
	}
	.dropdown-item:active {
		background: #00000010 !important;
		color: #000000;
	}
</style>
<div class="topbar">
	<div class="topbarContent">
		<div class="row">
			<div class="col-6">
				<div class="pageStatus align">
					<svg onclick="window.location.href='<?php echo $app['local'] ?>/painel'" class="homeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-6 h-6">
					  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
					</svg>
					<svg style="width: 10px; margin-right: 5px;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
					  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
					</svg>
					<?php echo $page_name; ?>
				</div>
			</div>
			<div style="text-align: right;" class="col-6">
				<div class="dropdown">
					<a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<div class="topbarPP"></div>
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							  <path stroke-linecap="round" stroke-linejoin="round" d="M16.712 4.33a9.027 9.027 0 011.652 1.306c.51.51.944 1.064 1.306 1.652M16.712 4.33l-3.448 4.138m3.448-4.138a9.014 9.014 0 00-9.424 0M19.67 7.288l-4.138 3.448m4.138-3.448a9.014 9.014 0 010 9.424m-4.138-5.976a3.736 3.736 0 00-.88-1.388 3.737 3.737 0 00-1.388-.88m2.268 2.268a3.765 3.765 0 010 2.528m-2.268-4.796a3.765 3.765 0 00-2.528 0m4.796 4.796c-.181.506-.475.982-.88 1.388a3.736 3.736 0 01-1.388.88m2.268-2.268l4.138 3.448m0 0a9.027 9.027 0 01-1.306 1.652c-.51.51-1.064.944-1.652 1.306m0 0l-3.448-4.138m3.448 4.138a9.014 9.014 0 01-9.424 0m5.976-4.138a3.765 3.765 0 01-2.528 0m0 0a3.736 3.736 0 01-1.388-.88 3.737 3.737 0 01-.88-1.388m2.268 2.268L7.288 19.67m0 0a9.024 9.024 0 01-1.652-1.306 9.027 9.027 0 01-1.306-1.652m0 0l4.138-3.448M4.33 16.712a9.014 9.014 0 010-9.424m4.138 5.976a3.765 3.765 0 010-2.528m0 0c.181-.506.475-.982.88-1.388a3.736 3.736 0 011.388-.88m-2.268 2.268L4.33 7.288m6.406 1.18L7.288 4.33m0 0a9.024 9.024 0 00-1.652 1.306A9.025 9.025 0 004.33 7.288" />
							</svg>
							Suporte
						</a></li>
						<hr>
						<li class="align-middle"><a class="dropdown-item" href="<?php echo $app['local'] ?>/config/logout.php">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
							  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
							</svg>
							Sair
						</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
