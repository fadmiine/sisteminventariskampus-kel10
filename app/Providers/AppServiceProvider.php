<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View composer untuk sidebar dinamis
        View::composer('*', function ($view) {
            $menus = [
                [
                    'label' => 'Dashboard',
                    'icon' => 'mdi mdi-view-dashboard',
                    'route' => '/dashboard',
                ],
                [
                    'label' => 'Data Barang',
                    'icon' => 'mdi mdi-cube-outline',
                    'route' => '/barang',
                ],
                [
                    'label' => 'Pengajuan',
                    'icon' => 'mdi mdi-file-document',
                    'route' => '/pengajuan',
                ],
            ];

            // Tambahan menu khusus untuk role admin
            if (Auth::check() && Auth::user()->role === 'admin') {
                $menus[] = [
                    'label' => 'Manajemen User',
                    'icon' => 'mdi mdi-account-multiple',
                    'route' => '/users',
                ];
            }

            // Mengirim data ke semua view
            $view->with('sidebarMenus', $menus);
        });
    }
}
