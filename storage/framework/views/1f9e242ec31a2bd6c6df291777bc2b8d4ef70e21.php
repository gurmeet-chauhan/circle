<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <title>Circle</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.css">
    <!-- Styles -->
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <style>
        body {
            font-family: montserrat;
        }
    </style>
</head>
<body>
    <div id="app">

        <?php echo $__env->make('partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('partials.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php if( request()->path() == 'login' || request()->path() == 'register'): ?>
            <main class="py-4">            
        <?php else: ?>
            <main class="col-md-6 offset-md-3 py-4">    
        <?php endif; ?>        
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
