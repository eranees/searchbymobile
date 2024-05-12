<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Search By Mobile</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="<?=ASSET?>js/jquery.min.js"></script>
		<script src="<?=ASSET?>js/skel.min.js"></script>
		<script src="<?=ASSET?>js/skel-layers.min.js"></script>
		<script src="<?=ASSET?>js/init.js"></script>
		<link rel="stylesheet" href="<?=ASSET?>css/skel.css" />
		<link rel="stylesheet" href="<?=ASSET?>css/style.css" />
		<link rel="stylesheet" href="<?=ASSET?>css/style-xlarge.css" />
		<link rel="stylesheet" href="<?=ASSET?>css/bootstrap.min.css">
		<style>
			.active{
				color : white;
				font-size: 20px;
			}
			.active:hover{
				color : gray;
			}
		</style>
	</head>
	<body class="landing">

		    <!-- Header -->
			<header id="header">
				<h1><a href="<?= base_url()?>dashboard">Mobile Search</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="<?= base_url()?>dashboard"><span class="active" >Home</span></a></li>
						<li>
							<?php echo anchor("dashboard/addNewContact","Add New Contact"); ?>
						</li>
						<li>
							<?php echo anchor("dashboard/view_contacts","My Contacts"); ?>
						</li>
						<li>
							<?php echo anchor("dashboard/my_messages","My Messages"); ?>
						</li>
						<li>	 
						  <?php echo anchor('login/logout', 'Logout', array('class' => 'button special dropdown-toggle'));?>
						</li>
					</ul>
				</nav>
			</header>

		    <!-- Banner -->
			<section id="banner">
				<h2>
					<a href="<?= base_url()?>dashboard/user_profile">
						<?php echo strtoupper($this->session->userdata('username'));?>
					</a>
					<span><small class="text-success">online</small></span>
				</h2>
				<p>Hi. You can search any person by his/her mobile number.</p>
				<ul class="actions">
					<li>
						<?php echo form_open("dashboard/add_new_like"); ?>
						<button type="submit" class="button big">
							Like&nbsp;<span class="badge badge-light"><?php echo $data ?></span>
							<span class="sr-only">Total Likes</span> 
						</button>
						<?php echo form_close();?>
					</li>
				</ul>
			</section>

		    <!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Get Latest Updates About COVID-19</h2>
						<p>Coronavirus is very harmful disease.</p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color1 fa-cloud"></i>
								<h3>News</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quam consectetur quibusdam magni minus aut modi aliquid.</p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color9 fa-desktop"></i>
								<h3>Android Application</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium ullam consequatur repellat debitis maxime.</p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color6 fa-rocket"></i>
								<h3>About</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque eaque eveniet, nesciunt molestias. Ipsam, voluptate vero.</p>
							</section>
						</div>
					</div>
				</div>
			</section>

		    <!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Our Team</h2>
						<p>They are my team members and i love.</p>
					</header>
					<section class="profiles">
						<div class="row">
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="<?= base_url()?>uploads/team/profile1.png" alt="" />
								<h4>Anees</h4>
								<p>Developer</p>
							</section>
							<section class="3u 6u$(medium) 12u$(xsmall) profile">
								<img src="<?= base_url()?>uploads/team/profile2.png" alt="" />
								<h4>Anis</h4>
								<p>Tester 1</p>
							</section>
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="<?= base_url()?>uploads/team/profile3.png" alt="" />
								<h4>Anees</h4>
								<p>Tester 2</p>
							</section>
							<section class="3u$ 6u$(medium) 12u$(xsmall) profile">
								<img src="<?= base_url()?>uploads/team/profile.png" alt="" />
								<h4>Anis</h4>
								<p>Designer</p>
							</section>
						</div>
					</section>
					<footer>
						<div class="form-group">
						  <label for="Phone"><h3 class="text-success">Enter Phone Number To Search</h3></label>
						  <?php echo form_open("dashboard/searchnumber_global"); ?>
						  	<input name="pnumber" type="text" class="form-control text-center" id="phone" placeholder="Enter Phone Number" value="<?= set_value('pnumber') ?>" style="font-size: 2rem;">
						  	<div class="mt-3 text-danger">
						  		<?php echo form_error('pnumber');?>
						  	</div>
						</div>
						<ul class="actions">
							<li>
								<?php echo form_submit("submit","Search",['class'=>'button big']); ?>
							</li>
						</ul>
						<?php echo form_close(); ?>
					</footer>
				</div>
			</section>

		    <!-- Three -->
		    <center><div style="width: 50%;">
			<?php
				if($message = $this->session->flashdata('is_message')){
					$alert_class = $this->session->flashdata('alert_class');
			?>
			<div class="alert <?= $alert_class?>">
				<p class="text-center"><?= $message?></p>
			</div>
			<?php
				}
			?>
			</div></center>

			<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Send Message</h2>
						<p>You can send message us. We are for your help!</p>
					</header>
				</div>
				<div class="container 50%">
					<?php echo form_open("dashboard/send_message"); ?>
						<div class="row uniform">
							<div class="6u 12u$(small)">
								<input name="username" id="name" value="<?= $this->session->userdata('username')?>" placeholder="Your Name" type="text" readonly>
							</div>
							<div class="6u$ 12u$(small)">
								<input name="" id="email" value="To : Site Admin" placeholder="" type="text" readonly>
							</div>
							<div class="12u$">
								<textarea name="message" id="message" placeholder="Message" rows="6"></textarea>
								<?php echo form_error('message'); ?>
							</div>
							<div class="12u$">
								<ul class="actions">
									<li>
										<?php echo form_submit("submit","Send Message",['class'=>'special big']);?>
									</li>
								</ul>
							</div>
						</div>
					<?php echo form_close();?>
				</div>
			</section>

		    <!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Learn HTML</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Nesciunt itaque, alias possimus</a></li>
									<li><a href="#">Optio rerum beatae autem</a></li>
									<li><a href="#">Nostrum nemo dolorum facilis</a></li>
									<li><a href="#">Quo fugit dolor totam</a></li>
								</ul>
							</section>
							<section class="3u 6u$(medium) 12u$(small)">
								<h3>Learn PHP</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Reiciendis dicta laboriosam enim</a></li>
									<li><a href="#">Corporis, non aut rerum</a></li>
									<li><a href="#">Laboriosam nulla voluptas, harum</a></li>
									<li><a href="#">Facere eligendi, inventore dolor</a></li>
								</ul>
							</section>
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Learn SQL</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Distinctio, inventore quidem nesciunt</a></li>
									<li><a href="#">Explicabo inventore itaque autem</a></li>
									<li><a href="#">Aperiam harum, sint quibusdam</a></li>
									<li><a href="#">Labore excepturi assumenda</a></li>
								</ul>
							</section>
							<section class="3u$ 6u$(medium) 12u$(small)">
								<h3>Learn Java</h3>
								<ul class="unstyled">
									<li><a href="#">Lorem ipsum dolor sit</a></li>
									<li><a href="#">Recusandae, culpa necessita nam</a></li>
									<li><a href="#">Cupiditate, debitis adipisci blandi</a></li>
									<li><a href="#">Tempore nam, enim quia</a></li>
									<li><a href="#">Explicabo molestiae dolor labore</a></li>
								</ul>
							</section>
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Copyright @ Anees</li>
								<li>Download: <a href="http://templated.co">TEMPLATES</a></li>
								<li>Learn : <a href="www.bcaknowledge4u.blogspot.com">C LANGUAGE</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>	
		<script src="<?=ASSET?>js/jquery.min.js""></script>
		<script src="<?=ASSET?>js/bootstrap.min.js""></script>
	</body>
</html>

<script>
</script>