<template>
  <div class="min-h-screen bg-[#E0F2FE]/30 pt-24 pb-16">
    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
      <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-[#0284C7] to-[#06B6D4] text-[#FFFFFF] p-8 sm:p-12 lg:p-16 shadow-xl animate-fade-in-down">
        <!-- Accent Glow -->
        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-[#F5E6C8]/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-10 -top-10 w-64 h-64 bg-[#FFFFFF]/10 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 max-w-3xl">
          <span class="inline-block px-4 py-1.5 rounded-full bg-[#F5E6C8] text-[#0284C7] text-xs sm:text-sm font-semibold tracking-wide uppercase mb-4 shadow-sm">
            Eksplorasi Keindahan
          </span>
          <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-[#FFFFFF] drop-shadow-sm mb-4">
            Wisata & Fasilitas Pantai Wabokeo
          </h1>
          <p class="text-base sm:text-xl text-[#FFFFFF]/90 leading-relaxed font-normal">
            Nikmati keindahan panorama pesisir pantai, spot rekreasi seru, dan fasilitas lengkap yang siap menyambut liburan Anda bersama keluarga dan kerabat.
          </p>
        </div>
      </div>
    </section>

    <!-- Destinasi Wisata Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">
      <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 animate-fade-in">
        <div>
          <h2 class="text-2xl sm:text-4xl font-bold text-[#0284C7]">
            Destinasi & Spot Favorit
          </h2>
          <p class="text-[#0284C7]/80 text-sm sm:text-base mt-2">
            Pilihan spot terbaik untuk bersantai, bermain air, dan menikmati keindahan alam.
          </p>
        </div>
        <div class="h-1 w-20 bg-[#06B6D4] rounded-full mt-4 md:mt-0"></div>
      </div>

      <!-- Grid Cards Wisata -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div
          v-for="(item, index) in wisataList"
          :key="item.id"
          class="bg-[#FFFFFF] rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-[#E0F2FE] flex flex-col justify-between group animate-slide-up"
          :style="{ animationDelay: `${(index + 1) * 150}ms` }"
        >
          <div>
            <!-- Image Frame -->
            <div class="relative h-56 overflow-hidden bg-[#E0F2FE]">
              <img
                :src="item.image"
                :alt="item.title"
                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
              />
              <div class="absolute inset-0 bg-gradient-to-t from-[#0284C7]/40 via-transparent to-transparent opacity-60"></div>
              <span class="absolute top-4 right-4 bg-[#FFFFFF]/90 backdrop-blur-md text-[#0284C7] text-xs font-bold px-3 py-1 rounded-full shadow">
                {{ item.category }}
              </span>
            </div>

            <!-- Content -->
            <div class="p-6">
              <h3 class="text-xl font-bold text-[#0284C7] mb-2 group-hover:text-[#06B6D4] transition-colors">
                {{ item.title }}
              </h3>
              <p class="text-gray-600 text-sm leading-relaxed mb-4">
                {{ item.description }}
              </p>
            </div>
          </div>

          <!-- Card Footer -->
          <div class="px-6 pb-6 pt-2 border-t border-[#E0F2FE]/60 flex items-center justify-between">
            <span class="text-xs text-[#06B6D4] font-medium flex items-center gap-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ item.highlight }}
            </span>
            <button
              @click="openDetail(item)"
              class="px-4 py-2 rounded-xl text-xs font-semibold bg-[#E0F2FE] text-[#0284C7] hover:bg-[#06B6D4] hover:text-[#FFFFFF] transition-all duration-300 shadow-sm"
            >
              Lihat Detail
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Fasilitas Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-[#FFFFFF] rounded-3xl p-8 sm:p-12 shadow-lg border border-[#E0F2FE] animate-fade-in">
        <div class="text-center max-w-2xl mx-auto mb-12">
          <span class="text-[#06B6D4] text-xs sm:text-sm font-bold uppercase tracking-wider">Kenyamanan Pengunjung</span>
          <h2 class="text-2xl sm:text-4xl font-bold text-[#0284C7] mt-1">
            Fasilitas Lengkap
          </h2>
          <p class="text-gray-600 text-sm sm:text-base mt-2">
            Segala kebutuhan Anda telah kami sediakan untuk kenyamanan selama berwisata.
          </p>
        </div>

        <!-- Grid Fasilitas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div
            v-for="(fasilitas, index) in fasilitasList"
            :key="fasilitas.name"
            class="p-6 rounded-2xl bg-[#E0F2FE]/40 hover:bg-[#E0F2FE]/80 border border-[#E0F2FE] transition-all duration-300 transform hover:scale-105 flex flex-col items-center text-center group animate-scale-up"
            :style="{ animationDelay: `${(index + 1) * 100}ms` }"
          >
            <div class="w-14 h-14 rounded-2xl bg-[#0284C7] group-hover:bg-[#06B6D4] text-[#FFFFFF] flex items-center justify-center mb-4 transition-colors duration-300 shadow-md">
              <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" v-html="fasilitas.iconSvg"></svg>
            </div>
            <h3 class="text-lg font-bold text-[#0284C7] mb-1">
              {{ fasilitas.name }}
            </h3>
            <p class="text-xs text-gray-600 leading-relaxed">
              {{ fasilitas.desc }}
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal Detail (Sederhana) -->
    <div
      v-if="selectedItem"
      class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm animate-fade-in"
    >
      <div class="bg-[#FFFFFF] rounded-3xl max-w-lg w-full p-6 shadow-2xl border border-[#E0F2FE]">
        <img :src="selectedItem.image" :alt="selectedItem.title" class="w-full h-48 object-cover rounded-2xl mb-4" />
        <h3 class="text-2xl font-bold text-[#0284C7] mb-2">{{ selectedItem.title }}</h3>
        <p class="text-gray-600 text-sm leading-relaxed mb-6">{{ selectedItem.description }}</p>
        <button
          @click="selectedItem = null"
          class="w-full py-2.5 rounded-xl bg-[#0284C7] text-[#FFFFFF] font-semibold hover:bg-[#06B6D4] transition-colors"
        >
          Tutup
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const props = defineProps({
  wisataList: Array,
  fasilitasList: Array
})

const selectedItem = ref(null)

const openDetail = (item) => {
  selectedItem.value = item
}
</script>

<style scoped>
/* Keyframe Custom Animasi Entrance Tanpa Library Tambahan */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes scaleUp {
  from {
    opacity: 0;
    transform: scale(0.9);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

.animate-fade-in {
  animation: fadeIn 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

.animate-fade-in-down {
  animation: fadeInDown 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

.animate-slide-up {
  opacity: 0;
  animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

.animate-scale-up {
  opacity: 0;
  animation: scaleUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>
