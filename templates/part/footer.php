</main>
    <footer>
    
    </footer>
    <!-- SCRIPT JQUERY -->
    <script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/jquery.js"></script>
    <!-- SCRIPT FONTAWESOME -->
    <script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/fontawesome-all.js"></script>
    <!-- DATATABLES -->
    <script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/datatables.min.js"></script>
    <!-- ROUTE POUR AJAX -->
    <script>    
                urlAjax = "<?php echo $this->generateUrl('ajax'); ?>"
                urlAjax1 = "<?php echo $this->generateUrl('ajax1'); ?>"
                urlAjax2 = "<?php echo $this->generateUrl('ajax2'); ?>"
                urlAjax3 = "<?php echo $this->generateUrl('ajax3'); ?>"
    </script>
    <!-- SCRIPT POUR LES FONCTIONS DES IHM -->
    
    <script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/frontal_app.js"></script>
    <script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/dataTables.js"></script>
    <script type="text/javascript" src="<?php echo $urlAccueil ?>assets/js/contextMenu.js"></script>

</body>
</html>