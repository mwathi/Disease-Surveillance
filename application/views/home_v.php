<?php
$this -> load -> helper('url');
$this -> load -> helper('form');
?>
<script type="text/javascript">
	$(function(){
var chart = new FusionCharts('<?php echo base_url().'Scripts/FusionCharts/Charts/MSLine.swf'?>', "ChartId", "700", "350", "0", "0");
	chart.setDataURL('<?php echo base_url().'home_controller/graph'?>');
	chart.render("consumption");
	});

</script>
<div align="center">
	<?php echo form_open('home_controller/filter');?>
	<table>
		<tr>
			<td> Province
			<select name="province" id="province">
				<option value="0" selected>--Select Province--</option>
				<?php
				foreach ($provinces as $province) {
					echo "<option selected value='$province->id'>$province->Name</option>";
				}
				?>
			</select></td>
			<td> Epiweek
			<select name="epiweek" id="epiweek">
				<option value="0" selected>--Select Epiweek--</option>
				<?php
				foreach ($epiweeks as $epiweek) {
					echo "<option selected value='$epiweek->epiweek'>$epiweek->epiweek</option>";
				}
				?>
			</select></td>
			<td> Year
			<select name="year" id="year">
				<option value="0" selected>--Select Year--</option>
				<?php
				foreach ($years as $year) {
					echo "<option selected value='$year->filteryear'>$year->filteryear</option>";
				}
				?>
			</select></td>
			<td> Disease
			<select name="disease" id="disease">
				<option value="0" selected>--Select Disease--</option>
				<?php
				foreach ($diseases as $disease) {
					echo "<option selected value='$disease->id'>$disease->Name</option>";
				}
				?>
			</select></td>
			<td><input name="filter" type="submit" class="button" value="Filter"/></td>
		</tr>
	</table>
	<?php echo form_close();?>

	<div id="consumption" class="graph_container" align="center" ></div>
