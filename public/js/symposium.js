function toggleSlide(button) {
        // 1. Cari kontainer '.info-slider' terdekat dari tombol yang diklik
        const slider = button.closest('.info-slider');
        
        // 2. Cek apakah slider tersebut sedang di posisi 0 atau sudah geser
        // Kita mengecek properti style transform secara langsung
        const currentTransform = slider.style.transform;

        if (!currentTransform || currentTransform === 'translateX(0%)') {
            // Jika di awal, geser ke kiri 50%
            slider.style.transform = 'translateX(-50%)';
        } else {
            // Jika sudah geser, kembalikan ke awal
            slider.style.transform = 'translateX(0%)';
        }
    }