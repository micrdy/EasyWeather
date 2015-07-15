<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?php $sizeIcon = $size + 30; 
$sizeLocation = $size - 10; ?>
<style>
#easyWeather h3{
	font-size: <?php echo $size; ?>px !important;
	color: <?php echo $color; ?> !important;
}
#easyWeather i{
	font-size: <?php echo $sizeIcon; ?>px;
}
</style>

<div id="easyWeather"></div>

<script>
$(document).ready(function(){
	$.simpleWeather({
		location: '<?php echo $location; ?>',
		unit: '<?php echo $unit; ?>',
		woeid: '',
		success: function(weather){
			var html = '<h3><p id="easyWeatherLocation" style="font-size:<?php echo $sizeLocation; ?>px"><?php if($showLocation){echo $location;} ?></p><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</h2>';
			$("#easyWeather").html(html); 
		},
		error: function(error){
			$("#easyWeather").html('<p>'+error+'</p>'); 
		}
	});
});
</script>



