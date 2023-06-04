

    <!-- footer -->
    <footer class="align-center">
        <div class="footer-wrapper">
            <ul class="footer_legal-list text-size-small">
                <li class="footer_credit-text">&copy; University of Johannesburg</li>
                <li><a href="#" class="footer_legal-link">Privacy Policy</a></li>
                <li><a href="#" class="footer_legal-link">Terms of Service</a></li>
                <li><a href="<?php echo ROOT_URL; ?>/developers.php" class="footer_legal-link">About</a></li>
                <li class="footer_credit-text">
                    powered by
                    <a href="https://www.uj.ac.za/" target="_blank" class="footer_legal-link">UJ</a>
                </li>
            </ul>
        </div>
    </footer>

    <script src="<?php echo ROOT_URL; ?>/public/js/main.js" defer></script>
    <?php mysqli_close($connection); ?>
</body>
</html>