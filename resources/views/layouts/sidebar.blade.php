 <!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="http://lorempixel.com/50/50" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p>{{Auth::user()->name}}</p>
				</div>
			</div>

			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">

				<li class="treeview">
					<a href="#">
						<i class="fa fa-male"></i> <span>Clients</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li class="active"><a href="/clients/create"><i class="fa fa-circle-o"></i> Add Client</a></li>
						<li><a href="/clients"><i class="fa fa-circle-o"></i> Manage Clients</a></li>
					</ul>
				</li>

				<li><a href="/transactions/refund/requests"><i class="fa fa-circle-o"></i>Refund Requests</a></li>

			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>
