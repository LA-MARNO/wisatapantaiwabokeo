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
            Layanan Pengunjung
          </span>
          <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight text-[#FFFFFF] drop-shadow-sm mb-4">
            Hubungi Kami
          </h1>
          <p class="text-base sm:text-xl text-[#FFFFFF]/90 leading-relaxed font-normal">
            Ada pertanyaan seputar tiket, sewa gazebo, atau kerjasama? Tim pengelola Pantai Wabokeo siap membantu Anda.
          </p>
        </div>
      </div>
    </section>

    <!-- Main Content: Form & Info Info Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <!-- Left Column: Information Cards & Quick Contact -->
        <div class="lg:col-span-5 space-y-6 animate-slide-up">

          <!-- Contact Details Card -->
          <div class="bg-[#FFFFFF] rounded-3xl p-6 sm:p-8 shadow-md border border-[#E0F2FE] space-y-6">
            <h2 class="text-xl sm:text-2xl font-bold text-[#0284C7] border-b border-[#E0F2FE] pb-4">
              Informasi Kontak
            </h2>

            <!-- Dynamic Contact Items -->
            <div
              v-for="item in contactInfos"
              :key="item.id"
              class="flex items-start space-x-4"
            >
              <!-- Dynamic Icon Container -->
              <div
                class="w-12 h-12 rounded-2xl text-[#FFFFFF] flex items-center justify-center shrink-0 shadow-md"
                :style="{ backgroundColor: item.bg_color }"
              >
                <!-- Icon Location -->
                <svg v-if="item.icon_type === 'location'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <!-- Icon Phone -->
                <svg v-else-if="item.icon_type === 'phone'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>

                <!-- Icon Email -->
                <svg v-else-if="item.icon_type === 'email'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>

                <!-- Icon Clock -->
                <svg v-else-if="item.icon_type === 'clock'" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>

              <!-- Text Content -->
              <div>
                <h3 class="text-sm font-bold text-[#0284C7]">{{ item.title }}</h3>
                <p class="text-xs sm:text-sm text-gray-600 mt-0.5 leading-relaxed">
                  {{ item.value }}
                </p>
              </div>
            </div>
          </div>

          <!-- WhatsApp Direct Card -->
          <div class="bg-gradient-to-r from-[#0284C7] to-[#06B6D4] rounded-3xl p-6 shadow-md text-[#FFFFFF] flex items-center justify-between">
            <div>
              <h3 class="font-bold text-base">Respons Lebih Cepat?</h3>
              <p class="text-xs text-[#FFFFFF]/90 mt-0.5">Hubungi pengelola melalui WhatsApp.</p>
            </div>
            <a
              href="https://wa.me/6281234567890"
              target="_blank"
              class="px-4 py-2.5 rounded-full bg-[#F5E6C8] text-[#0284C7] hover:bg-[#FFFFFF] text-xs font-bold transition-all duration-300 shadow-sm shrink-0"
            >
              Chat WA
            </a>
          </div>

        </div>

        <!-- Right Column: Contact Form -->
        <div class="lg:col-span-7 animate-slide-up" style="animation-delay: 150ms;">
          <div class="bg-[#FFFFFF] rounded-3xl p-6 sm:p-10 shadow-lg border border-[#E0F2FE]">
            <h2 class="text-2xl font-bold text-[#0284C7] mb-2">Kirim Pesan</h2>
            <p class="text-xs sm:text-sm text-gray-600 mb-6">
              Isi formulir di bawah ini. Kami akan membalas pesan Anda secepatnya.
            </p>

            <div>
              <!-- Notifikasi Sukses -->
              <div
                v-if="isSubmitted"
                class="mb-5 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm font-medium"
              >
                Pesan Anda berhasil terkirim! Terima kasih telah menghubungi kami.
              </div>

              <!-- Form -->
              <form @submit.prevent="handleSubmit" class="space-y-5">
                <!-- Field Nama -->
                <div>
                  <label for="nama" class="block text-xs font-bold text-[#0284C7] uppercase tracking-wider mb-2">
                    Nama Lengkap *
                  </label>
                  <input
                    v-model="form.nama"
                    type="text"
                    id="nama"
                    placeholder="Masukkan nama Anda"
                    :class="[
                      'w-full px-4 py-3 rounded-xl border text-sm transition-all duration-200 outline-none',
                      errors.nama ? 'border-red-400 bg-red-50' : 'border-[#E0F2FE] bg-[#E0F2FE]/20 focus:border-[#06B6D4] focus:bg-[#FFFFFF] focus:ring-2 focus:ring-[#06B6D4]/20'
                    ]"
                  />
                  <span v-if="errors.nama" class="text-xs text-red-500 mt-1 block">{{ errors.nama }}</span>
                </div>

                <!-- Field Email & Telepon Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <div>
                    <label for="email" class="block text-xs font-bold text-[#0284C7] uppercase tracking-wider mb-2">
                      Email *
                    </label>
                    <input
                      v-model="form.email"
                      type="email"
                      id="email"
                      placeholder="nama@email.com"
                      :class="[
                        'w-full px-4 py-3 rounded-xl border text-sm transition-all duration-200 outline-none',
                        errors.email ? 'border-red-400 bg-red-50' : 'border-[#E0F2FE] bg-[#E0F2FE]/20 focus:border-[#06B6D4] focus:bg-[#FFFFFF] focus:ring-2 focus:ring-[#06B6D4]/20'
                      ]"
                    />
                    <span v-if="errors.email" class="text-xs text-red-500 mt-1 block">{{ errors.email }}</span>
                  </div>

                  <div>
                    <label for="telepon" class="block text-xs font-bold text-[#0284C7] uppercase tracking-wider mb-2">
                      Nomor Telepon *
                    </label>
                    <input
                      v-model="form.telepon"
                      type="tel"
                      id="telepon"
                      placeholder="08123456789"
                      :class="[
                        'w-full px-4 py-3 rounded-xl border text-sm transition-all duration-200 outline-none',
                        errors.telepon ? 'border-red-400 bg-red-50' : 'border-[#E0F2FE] bg-[#E0F2FE]/20 focus:border-[#06B6D4] focus:bg-[#FFFFFF] focus:ring-2 focus:ring-[#06B6D4]/20'
                      ]"
                    />
                    <span v-if="errors.telepon" class="text-xs text-red-500 mt-1 block">{{ errors.telepon }}</span>
                  </div>
                </div>

                <!-- Field Pesan -->
                <div>
                  <label for="pesan" class="block text-xs font-bold text-[#0284C7] uppercase tracking-wider mb-2">
                    Pesan Anda *
                  </label>
                  <textarea
                    v-model="form.pesan"
                    id="pesan"
                    rows="4"
                    placeholder="Tuliskan pertanyaan atau keperluan Anda di sini..."
                    :class="[
                      'w-full px-4 py-3 rounded-xl border text-sm transition-all duration-200 outline-none resize-none',
                      errors.pesan ? 'border-red-400 bg-red-50' : 'border-[#E0F2FE] bg-[#E0F2FE]/20 focus:border-[#06B6D4] focus:bg-[#FFFFFF] focus:ring-2 focus:ring-[#06B6D4]/20'
                    ]"
                  ></textarea>
                  <span v-if="errors.pesan" class="text-xs text-red-500 mt-1 block">{{ errors.pesan }}</span>
                </div>

                <!-- Submit Button -->
                <button
                  type="submit"
                  :disabled="isSubmitting"
                  class="w-full py-3.5 px-6 rounded-xl font-semibold bg-[#0284C7] text-[#FFFFFF] hover:bg-[#06B6D4] transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center space-x-2"
                >
                  <span v-if="!isSubmitting">Kirim Pesan</span>
                  <span v-else class="flex items-center space-x-2">
                    <svg class="animate-spin h-5 w-5 text-[#FFFFFF]" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Mengirim...</span>
                  </span>
                </button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Map Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-[#FFFFFF] rounded-3xl p-6 sm:p-8 shadow-lg border border-[#E0F2FE] animate-fade-in">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-2">
          <div>
            <span class="text-xs font-bold text-[#06B6D4] uppercase tracking-wider">Lokasi Presisi</span>
            <h2 class="text-2xl font-bold text-[#0284C7]">Petunjuk Arah & Peta</h2>
          </div>
          <a
            href="https://maps.google.com"
            target="_blank"
            class="inline-flex items-center text-xs font-semibold text-[#0284C7] hover:text-[#06B6D4] transition-colors"
          >
            Buka di Google Maps
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
          </a>
        </div>

        <!-- Frame Map Placeholder / Embed -->
        <div class="w-full h-80 sm:h-96 rounded-2xl overflow-hidden border border-[#E0F2FE] relative bg-[#E0F2FE]/40">
          <iframe
            title="Peta Lokasi Pantai Wabokeo"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127111.45878297486!2d122.5!3d-5.4!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMjQnMDAuMCJTIDEyMsKwMzAnMDAuMCJF!5e0!3m2!1sid!2sid!4v1600000000000!5m2!1sid!2sid"
            class="w-full h-full border-0"
            allowfullscreen=""
            loading="lazy"
          ></iframe>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { router } from '@inertiajs/vue3'

export default {
  name: 'KontakView',
  props: {
    contactInfos: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      isSubmitting: false,
      isSubmitted: false,
      form: {
        nama: '',
        email: '',
        telepon: '',
        pesan: ''
      },
      errors: {}
    }
  },
  methods: {
    validateForm() {
      this.errors = {}

      if (!this.form.nama.trim()) {
        this.errors.nama = 'Nama lengkap wajib diisi.'
      }

      if (!this.form.email.trim()) {
        this.errors.email = 'Alamat email wajib diisi.'
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.form.email)) {
        this.errors.email = 'Format email tidak valid.'
      }

      if (!this.form.telepon.trim()) {
        this.errors.telepon = 'Nomor telepon wajib diisi.'
      } else if (!/^[0-9+\s-]{8,15}$/.test(this.form.telepon)) {
        this.errors.telepon = 'Nomor telepon tidak valid.'
      }

      if (!this.form.pesan.trim()) {
        this.errors.pesan = 'Pesan tidak boleh kosong.'
      }

      return Object.keys(this.errors).length === 0
    },

    handleSubmit() {
      if (!this.validateForm()) return

      this.isSubmitting = true
      this.isSubmitted = false

      router.post('/kontak', this.form, {
        onSuccess: () => {
          this.isSubmitting = false
          this.isSubmitted = true

          this.form = {
            nama: '',
            email: '',
            telepon: '',
            pesan: ''
          }

          setTimeout(() => {
            this.isSubmitted = false
          }, 6000)
        },
        onError: (backendErrors) => {
          this.isSubmitting = false
          this.errors = backendErrors
        }
      })
    }
  }
}
</script>


<style scoped>
/* Keyframes Custom Entrance Animation */
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
    transform: scale(0.95);
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
  animation: scaleUp 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
</style>
