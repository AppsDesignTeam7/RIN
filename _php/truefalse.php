<?php 
/*
to call:
at top of html have the line:
<?php include('_php/truefalse.php'); ?>
to call:
var result = "<?php echo ((getTrue()) ? "true" : "false"); ?>";
*/
function getTrue() {
	return TRUE;
}
function getFalse() {
	return FALSE;
}
?>