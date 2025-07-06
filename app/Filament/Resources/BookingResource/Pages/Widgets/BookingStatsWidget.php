<?php

namespace App\Filament\Resources\BookingResource\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class BookingStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $cancelledBookings = Booking::where('status', 'cancelled')->count();
        
        // Hitung total pendapatan dari booking confirmed
        $totalRevenue = Booking::where('status', 'confirmed')
            ->sum('price');
        
        // Hitung pendapatan bulan ini
        $monthlyRevenue = Booking::where('status', 'confirmed')
            ->whereMonth('booking_time', now()->month)
            ->whereYear('booking_time', now()->year)
            ->sum('price');
        
        // Hitung persentase perubahan dari bulan lalu
        $lastMonthRevenue = Booking::where('status', 'confirmed')
            ->whereMonth('booking_time', now()->subMonth()->month)
            ->whereYear('booking_time', now()->subMonth()->year)
            ->sum('price');
        
        $revenueChange = $lastMonthRevenue > 0 
            ? (($monthlyRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100
            : 0;

        return [
            Stat::make('Total Bookings', $totalBookings)
                ->description('Semua booking')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),
                
            Stat::make('Pending Bookings', $pendingBookings)
                ->description('Menunggu konfirmasi')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
                
            Stat::make('Confirmed Bookings', $confirmedBookings)
                ->description('Sudah dikonfirmasi')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
                
            Stat::make('Cancelled Bookings', $cancelledBookings)
                ->description('Dibatalkan')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
                
            Stat::make('Total Pendapatan', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Dari booking confirmed')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success'),
                
            Stat::make('Pendapatan Bulan Ini', 'Rp ' . number_format($monthlyRevenue, 0, ',', '.'))
                ->description($revenueChange >= 0 
                    ? ($revenueChange > 0 ? '+' . number_format($revenueChange, 1) . '% dari bulan lalu' : 'Sama dengan bulan lalu')
                    : number_format($revenueChange, 1) . '% dari bulan lalu')
                ->descriptionIcon($revenueChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($revenueChange >= 0 ? 'success' : 'danger'),
        ];
    }
    
    protected function getColumns(): int
    {
        return 3; // Mengatur jumlah kolom untuk layout cards
    }
}