@if($success = Session::get('success'))
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 3000
                };
                toastr.success('Admin Panel', "<?php echo $success ?>");

            }, 100);

        });
    </script>
@endif

@if($error = Session::get('error'))
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 3000
                };
                toastr.error('Admin Panel', "<?php echo $error ?>");

            }, 100);

        });
    </script>
@endif

@if($warning = Session::get('warning'))
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 3000
                };
                toastr.warning('Admin Panel', "<?php echo $warning ?>");

            }, 100);

        });
    </script>
@endif

@if($info = Session::get('info'))
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 3000
                };
                toastr.info('Admin Panel', "<?php echo $info ?>");

            }, 100);

        });
    </script>
@endif


@if (!$errors->isEmpty())
    @foreach($errors->all() as $error)
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 3000
                    };
                    toastr.error('Admin Panel', "<?php echo $error ?>");

                }, 100);

            });
        </script>
    @endforeach
@endif
