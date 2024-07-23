<div>
    <div
        x-data="{
        activeSlide: 0,
        slides: @entangle('images'),
        interval: null,
        initialized: false,
        init() {
            if (this.initialized) return;
            this.initialized = true;
            this.startInterval();
        },
        startInterval() {
            this.interval = setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
            }, 6000);
        },
        stopInterval() {
            clearInterval(this.interval);
        }
    }"
        x-init="init()"
        class="relative h-[80vh] overflow-hidden"
    >
        <!-- Hintergrund-Slider mit Zoom-Effekt -->
        <template x-for="(slide, index) in slides" :key="index">
            <div
                x-show="activeSlide === index"
                x-transition:enter="transition ease-in-out duration-[2000ms]"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-[2000ms]"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 w-full h-full"
            >
                <img
                    :src="slide"
                    class="absolute inset-0 w-full h-full object-cover"
                    :style="{ animation: 'zoomEffect 6s linear forwards' }"
                />
            </div>
        </template>

        <!-- Schwarzer Overlay mit 40% Deckkraft -->
        <div class="absolute inset-0 bg-black opacity-40 z-10"></div>

        <!-- Überschrift und Subtext -->
        <div class="absolute inset-0 flex flex-col items-center justify-center text-white z-20">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Ihre Hauptüberschrift</h1>
            <p class="text-xl md:text-2xl text-red-500">Ihr Subtext hier</p>
        </div>
    </div>

    <style>
        @keyframes zoomEffect {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }
    </style>

</div>
