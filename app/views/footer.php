    </main>
</div><!-- layout-wrapper -->
    <footer>
        <p>&copy; <?php echo date('Y'); ?> StreamHive - Premium Streaming Experience</p>
    </footer>

    <script>
        // Sidebar toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            
            if (sidebarToggle && sidebar) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });

                // Close sidebar when a link is clicked
                const sidebarLinks = sidebar.querySelectorAll('.sidebar-item');
                sidebarLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        if (window.innerWidth <= 768) {
                            sidebar.classList.remove('active');
                        }
                    });
                });

                // Close sidebar when clicking outside
                document.addEventListener('click', function(event) {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                            sidebar.classList.remove('active');
                        }
                    }
                });
            }

            // Set active link based on current page
            const currentPage = new URLSearchParams(window.location.search).get('page') || 'home';
            const sidebarItems = document.querySelectorAll('.sidebar-item');
            sidebarItems.forEach(item => {
                item.classList.remove('active');
                if (item.getAttribute('href').includes(currentPage) || (currentPage === 'home' && item.getAttribute('href') === 'index.php')) {
                    item.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>