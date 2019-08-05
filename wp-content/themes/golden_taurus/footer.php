<?php wp_footer(); ?>
</div>
<!-- Vendor -->
<script src="<?=get_template_directory_uri()?>/vendor/jquery/jquery.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/jquery.cookie/jquery.cookie.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/popper/umd/popper.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/common/common.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/jquery.validation/jquery.validate.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/isotope/jquery.isotope.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/vide/jquery.vide.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/vivus/vivus.min.js"></script>
<script src="<?=get_template_directory_uri()?>/js/jquery.maskedinput.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?=get_template_directory_uri()?>/js/theme.js"></script>

<!-- Current Page Vendor and Views -->
<script src="<?=get_template_directory_uri()?>/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?=get_template_directory_uri()?>/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- Theme Custom -->
<script src="<?=get_template_directory_uri()?>/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?=get_template_directory_uri()?>/js/theme.init.js"></script>
<script src="<?=get_template_directory_uri()?>/js/forms.js"></script>
<?$all_options = get_option('true_options');

echo $all_options["js_code"]?>

</body>
</html>