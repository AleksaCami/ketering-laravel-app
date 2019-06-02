$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });

    $('#example').DataTable({
            "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "iDisplayLength": 5
        }
    );
});
