<?php
	session_start();

	if(!isset($_SESSION['flag'])){
		header('location: ../../view/signin.php');

	}else{

		require_once('../model/UserModel.php');

		$id=$_SESSION['current_user']['username'];
		$data = getUserById($id);

		$username=$data['username'];
		$name=$data['name'];
		$email=$data['email'];
		$gender=$data['gender'];
		$phone=$data['phone'];
		$address=$data['address'];
		$department=$data['department'];
		$blood=$data['blood'];
		$dob=$data['dob'];
		
//==================================================
	}
?>

<!-- ========================================================= -->

<?php 
	$title= "View Profile";
	include('../view/header.html');
?>
</head>
<body>

	<table border="1px" align="center" width="100%">
		<tr>	
			<td>
				<table width="100%">
					<tr>
						<td width="200px" height="60px">
							<img src="../asset/company_logo.png" width="100%" height="100%">
						</td>
						<td align="right" >
							Logged in as
							<a href="view_profile_check.php"> 
								<?php
									echo $_SESSION['current_user']['name'];
								?>
							</a> |
							<a href="../../controller/logout.php"> Logout </a> 
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<!-- creating new table -->
	<table border="1px" align="center" width="100%">
		<tr>
			<td width="200px" height="425px"><h2>Main Menu</h2>
				<hr>

				<details>
					<summary><b>Dashboard</b></summary>
						<details>
							<summary><a href="../view/dashboard.php">Dashboard</a></summary>	
						</details>
				</details>

				<details>
					<summary><b>Portal</b></summary>
						<details>
							<summary><a href="../view/create_leave_request.php">Create Leave Request</a></summary>
						</details>
						<details>
							<summary><a href="../view/create_travel_request.php">Create Travel Request</a></summary>
						</details>
						<details>
							<summary><a href="../view/fixing_interview_approval.php">Fixing Interview</a></summary>
						</details>
				</details>

				<details>
					<summary><b>Screening & Approval</b></summary>
						<details>
							<summary><a href="../view/leave_approval.php">Leave Approval</a></summary>
						</details>
						<details>
							<summary><a href="../view/travel_approval.php">Travel Approval</a></summary>
						</details>
						<details>
							<summary><a href="../view/performance_approval.php">Performance Overview</a></summary>
						</details>
				</details>

				<details>
					<summary><b>Requirement</b></summary>
						<details>
							<summary><a href="../view/add_job.php">Add Job Titles</a></summary>
						</details>
						<details>
							<summary><a href="../view/view_job.php">View Job Titles</a></summary>
						</details>
						<details>
							<summary><a href="../view/add_job_vacancy.php">Add Job Vacancy</a></summary>
						</details>
						<details>
							<summary><a href="../view/view_job_vacancy.php">View Job Vacancy</a></summary>
						</details>
						<details>
							<summary><a href="../view/online_app.php">Online Application</a></summary>
						</details>
						<details>
							<summary><a href="../view/fixing_interview.php">Fixing Interview Online</a></summary>
						</details>
				</details>

				<details>
					<summary><b>Setting</b></summary>
						<details>
							<summary><a href="view_profile_check.php">View Profile</a></summary>
						</details>
						<details>
							<summary><a href="edit_profile_check.php">Edit Profile</a></summary>
						</details>
						<details>
							<summary><a href="change_pass_check.php">Change Password</a></summary>
						</details>
						<details>
							<summary><a href="../../controller/logout.php">Logout</a></summary>
						</details>
				</details>	
			</td>

<!-- ==================================================================================================-->
			<td align="center">
				<table>
					<tr>
						<td>
							<form method="post" action="view_profile_check.php">
								<fieldset>
									<legend>PROFILE</legend>
									<table align="center">
										<tr>
											<td>Username</td>
											<td>:
												<?php
													echo $username;
												?>
											</td> 
										</tr>
										<tr>
											<td>Name</td>
											<td>:
												<?php
													echo $name;
												?>
											</td>

											<form method="post" action="../view/profile_pic.php" enctype="multipart/form-data">
												<td rowspan="4" align="center">
													<?php
														//require_once('../model/db.php');
														require_once('../model/imageModel.php');
														
														/*$conn = getConnection();
														$sql = "select * from user_image where user";
														$result = mysqli_query($conn, $sql);
														$row = mysqli_fetch_assoc($result);*/

														$result = getImageById($username);
														$row = mysqli_fetch_assoc($result);

														if($row>0){
													?>
														<img src="<?php echo "{$row['photos']}"; ?>" width="200px" height="200px"><br>
													<?php 
														}else{
													?>
														<img src="../asset/user.png" width="100px" height="100px"><br>
													<?php 
														}
													?>
													<a href="../view/profile_pic.php">Change</a>
												</td>
											</form>
										</tr>
										<tr>
											<td>Email</td>
											<td>:
												<?php
													echo $email;
												?>

											</td>
										</tr>
										<tr>
											<td>Gender</td>
											<td>:
												<?php
													echo $gender;
												?>
											</td>
										</tr>
										<tr>
											<td>Phone</td>
											<td>:
												<?php
													echo $phone;
												?>
											</td>
										</tr>
										<tr>
											<td>Address</td>
											<td>:
												<?php
													echo $address;
												?>
											</td>
										</tr>
										<tr>
											<td>Department</td>
											<td>:
												<?php
													echo $department;
												?>
											</td>
										</tr>
										<tr>
											<td>Blood Group</td>
											<td>:
												<?php
													echo $blood;
												?>
											</td>
										</tr>
										<tr>
											<td>Date of Birth</td>
											<td>:
												<?php
													echo $dob;
												?>
											</td>
										</tr>
										<tr>
											<td><a href="edit_profile_check.php">Edit Profile</a></td>
										</tr>
									</table>
								</fieldset>
							</form>
						</td>
					</tr>
				</table>
			</td>
		</tr>
<?php 
	include('../view/footer.html'); 
?>