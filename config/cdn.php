<meta name="theme-color" content="#161617">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>

	@import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

	body {
		background: #F8F8FD !important;
	}

	* {
		font-family: Poppins;
		font-size: 0.9rem;
		font-weight: 300;
		outline: none;
	}

	.content {
		padding: 90px 40px 50px calc(250px + 40px);
	}

	label.input {
		width: 100%;
		font-size: 0.8rem;
	}

	input,
	select {
		width: 100%;
		padding: 15px 20px;
		border: 1px solid white;
		border-radius: 15px;
		margin-bottom: 15px;
	}

	div.align {
		position: relative;
		transform: translateY(-50%);
		top: 50%;
	}

	.copy {
		position: fixed;
		bottom: 1%;
		right: 1%;
		text-align: right !important;
		width: 100%;
		font-size: 0.5rem;
		font-weight: 300;
		color: #00000050;
	}

	.module {
		padding: 20px 25px;
		border-radius: 25px;
		background: white;
		box-shadow:  20px 20px 20px #d9d9d920,
		             -20px -20px 20px #d9d9d920;
	}

	button.act {
		padding: 10px 15px;
		border-radius: 20px;
		border: 1px solid #132d30;
		font-weight: 300 !important;
		background: #132d30;
		color: white;
	}

	button.border_color {
		border: 1px solid #132d30;
		font-weight: 400 !important;
		background: transparent;
		color: #132d30;
	}

	button.act_border {
		padding: 5px 10px;
		border-radius: 20px;
		border: 1px solid #00000050;
		font-size: 0.8rem !important;
		font-weight: 400 !important;
		background: transparent;
		color: #00000050;
	}

	button.act svg {
		margin-right: 5px;
		width: 20px;
	}

	button.act_border svg {
		position: relative;
		margin-right: 5px;
		width: 20px;
		top: -2px;
	}

	.topModule {
	    background: white;
	    padding: 10px;
	    border-radius: 25px;
	    border: 1px solid #f1f1f180;
	    box-shadow: 7px 7px 41px #f0f0f0, -7px -7px 41px #ffffff;
	}

	.topMsg {
	    font-size: 1.5rem;
	    line-height: 1;
	    font-weight: 400;
	    color: #161617;
	    margin-left: 2px;
	}

	.btmMsg {
	    font-size: 0.7rem;
	    margin-left: 2px;
	}

	.topModule svg {
	    width: 100% !important;
	    padding-bottom: 100%;
	    padding: 10px;
	    border-radius: 15px;
	    background: #132d30;
	    color: white !important;
	}

	td,
	th,
	tr,
	table {
	    border: none !important;
	}

	td,
	th {
	    padding: 10px !important;
	    border-bottom: 1px solid #00000007 !important;
	}

	th {
	    font-weight: 400 !important;
	    color: #00000070 !important;
	}

	.current {
	    background: transparent !important;
	    border: 1px solid #00000080 !important;
	    border-radius: 10px !important;
	    color: white !important;
	}

	.dataTables_info,
	.dataTables_paginate {
	    margin-top: 20px !important;
	}

	input[type="search"] {
	    padding: 10px 15px !important;
	    border-radius: 20px !important;
	    border-color: #00000050 !important;
	    margin-bottom: 30px !important;
	}

	.dt-button {
	    padding: 10px 15px !important;
	    background: transparent !important;
	    border: 1px solid #00000080 !important;
	    border-radius: 20px !important;
	    position: relative !important;
	    top: 50% !important;
	    transform: translateY(15%) !important;
	    transition: all 300ms !important;
	    margin-right: 10px !important;
	}

	.dt-button:hover {
	    background: #161617 !important;
	    color: white !important;
	}

	.actionIcon svg {
	    width: 17px !important;
	    cursor: pointer !important;
	    margin-left: 5px;
	    color: #00000080;
	}

	form {
		margin: 0px !important;
	}

	.noButton {
		background: transparent;
		padding: 0px !important;
		border: none;
	}

	.dropdown-menu {
		font-size: 0.8rem !important;
		border: none !important;
		border-radius: 15px;
		overflow: hidden;
		box-shadow:  7px 7px 14px #ebebeb60,
             -7px -7px 14px #ebebeb30;
	}

	.dropdown-menu hr {
		margin: 5px 0px;
		border-color: #00000020;
	}

	h4.title {
		color: #000000ae;
		font-size: 1.6rem;
		font-weight: 300;
	}

	input[type=title_plan] {
		font-size: 1.5rem !important;
		color: #00000070;
		position: auto !important;
		top: 0;
		background: transparent;
		padding: 10px 15px;
		margin-top: 15px;
		margin-bottom: 10px;
		border: 1px solid #00000010;
	}

</style>

<link rel="icon" type="text/css" href="<?php echo $app['local'] ?>/assets/img/favicon.png">
<title><?php echo $page_name ?> | <?php echo $app['nome'] ?></title>
<div class="copy"><?php echo $app['copy'] ?></div>