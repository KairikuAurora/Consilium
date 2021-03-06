<div id="container">
	<?php if(isset($lines)) { ?>
	<div id="legend">
		<?php
			if(isset($lines))
			{
				foreach ($lines as $line)
				{
					echo '<div class="legend-pack">';
					echo '<div class="legend-color" id="'.htmlspecialchars($line->color).'"></div>';
					echo htmlspecialchars($line->name);
					echo '</div>';
				}
			}
		?>
	</div>
	<?php } ?>

	<div id="calendar">
		
		<div id="nav-link">
			<div id="previous"><button>Précédent</button></div>
			<div id="next"><button>Suivant</button></div>
		</div>
		
		<table>
			<caption id="year"></caption>
			<?php
				// Print the months
				echo('<thead>');
				echo('<th></th>');

				for($i = 0; $i < 12; $i++) echo('<th>'.$months[$i].'</th>');

				echo('</thead>');

				// Print the days
				echo('<tbody id="dates">');

				for($i = 1; $i <= 31; $i++)
				{
					echo '<tr><th>'.$i.'</th>';

					for($j = 1; $j <= 12; $j++)
					{
						echo '<td><div class="dayContainer"></div></td>';
					}

					echo '</tr>';
				}

				echo('</tbody>');
			?>

		</table>
	</div>
</div>

<script>
	// Transform php variables into js variables
	let tasks = <?= json_encode($tasks) ?>;
	let reservations = <?= json_encode($reservations) ?>;
	let lines = <?= json_encode($lines) ?>;

	calendar = new YearlyCalendar(tasks, reservations, lines);
	calendar.load();

	let next = document.getElementById("next");
	let previous = document.getElementById("previous");

	next.onclick = function() { calendar.changeYear('next'); }
	previous.onclick = function() { calendar.changeYear('previous'); } 

	// Display the legend with good colours
	let legends = document.getElementsByClassName("legend-color");
	for(legend of legends) legend.style['background-color'] = legend.id;
</script>