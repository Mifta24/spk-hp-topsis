<?php

if (!function_exists('getIconForCriteria')) {
    function getIconForCriteria($criteriaName) {
        $icons = [
            'camera' => 'camera',
            'battery' => 'battery-full',
            'ram' => 'memory',
            'price' => 'tag',
            // tambahkan kriteria lain jika ada
        ];

        return $icons[$criteriaName] ?? 'mobile-alt';
    }
}
