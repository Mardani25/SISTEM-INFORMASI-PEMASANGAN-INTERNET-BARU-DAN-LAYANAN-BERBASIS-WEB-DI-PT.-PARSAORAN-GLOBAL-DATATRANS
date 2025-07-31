<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="
                            <?php switch(auth()->user()->role):
                                case ('admin'): ?>
                                    <?php echo e(route('admin.dashboard')); ?>

                                    <?php break; ?>
                                <?php case ('teknisi'): ?>
                                    <?php echo e(route('teknisi.dashboard')); ?>

                                    <?php break; ?>
                                <?php case ('pelanggan'): ?>
                                    <?php echo e(route('pelanggan.dashboard')); ?>

                                    <?php break; ?>
                                <?php default: ?>
                                    <?php echo e(route('welcome')); ?>

                            <?php endswitch; ?>
                        " class="text-blue-600 hover:underline">
                            Kembali ke Dashboard
                        </a>
                        
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <?php if(auth()->guard()->check()): ?>
                            <!-- Logout Button -->
                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="text-blue-600 hover:text-blue-800">
                                    <?php echo e(__('Log Out')); ?>

                                </button>
                            </form>
                        <?php endif; ?>
                    </div>

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <?php if(auth()->guard()->check()): ?>
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 transition duration-150 ease-in-out">
                                <?php echo e(__('Log Out')); ?>

                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </nav>

        <!-- Page Heading -->
        <?php if(isset($header)): ?>
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <?php echo e($header); ?>

                </div>
            </header>
        <?php endif; ?>

        <!-- Page Content -->
        <main>
            <?php echo e($slot); ?>

        </main>
    </div>
</body>
</html><?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/layouts/app.blade.php ENDPATH**/ ?>