<?php
/*
Plugin Name: Manage user emails
*/
/** Step 2 (from text above). */
add_action( 'admin_menu', 'manage_emails_menu' );

/** Step 1. */
function manage_emails_menu() {
	add_options_page( 'Manage Email', 'Manage Emails', 'manage_options', 'my-unique-identifier', 'manage_emails_options' );
}

/** Step 3. */
function manage_emails_options() {
	global $wpdb;

	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

	echo "<br />";
	echo "<br />";
	echo "<br />";
	echo "<br />";
	echo "<br />";

	$user_count = $wpdb->get_results( "SELECT fname, lname, email, subj, message, date_add FROM " . $wpdb->prefix . "tps_forms", ARRAY_A );
?>
	<table border='1' bordercolor="#cdcdcd">
		<thead style="font-weight:800;">
			<tr>
				<td >First Name</td>
				<td>Last Name</td>
				<td>Email</td>
				<td>Subject</td>
				<td>Message</td>
				<td>Date</td>
			</tr>
		</thead>

		<tbody>
			<?php
				foreach ( $user_count as $u ) 
				{
					echo "<tr'>";
					echo "<td style='width:200px;'>" . $u['fname'] . "</td>";
					echo "<td style='width:200px;'>". $u['lname'] . "</td>";
					echo "<td style='width:200px;'>". $u['email'] .  "</td>";
					echo "<td style='width:200px;'>". $u['subj'] .  "</td>";
					echo "<td style='width:200px;'>". $u['message'] .  "</td>";
					echo "<td style='width:200px;'>". $u['date_add'] .  "</td>";
					echo "</tr>";
				}
			?>
		</tbody>

	</table>

<?php
}
?>