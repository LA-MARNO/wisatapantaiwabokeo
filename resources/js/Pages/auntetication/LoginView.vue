<template>
  <!-- Container Full Screen (100vw x 100vh) -->
  <div class="relative h-screen h-[100dvh] w-screen w-[100vw] flex items-center justify-center p-4 sm:p-6 overflow-hidden bg-slate-950 select-none">

    <!-- Background Image Pantai Wabokeo (Full Cover 100vw x 100vh) -->
    <div class="absolute inset-0 w-full h-full z-0 overflow-hidden">
      <img
        src="/images/pantai-wabokeo-bg.webp"
        alt="Pemandangan Pantai Wabokeo"
        class="w-full h-full object-cover object-center scale-105 animate-pulse-subtle"
      />
      <!-- Overlay Gradient Transparan untuk Keterbacaan Kontras -->
      <div class="absolute inset-0 bg-gradient-to-br from-slate-950/70 via-slate-900/40 to-[#0284C7]/30 backdrop-blur-[1px]"></div>
    </div>

    <!-- Ambient Glow Accent -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#06B6D4]/30 rounded-full blur-3xl pointer-events-none z-0"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#F5E6C8]/25 rounded-full blur-3xl pointer-events-none z-0"></div>

    <!-- Main Card Form Login Glassmorphism Transparan & Blur -->
    <div class="w-full max-w-md bg-white/25 backdrop-blur-xl rounded-3xl shadow-2xl shadow-black/40 border border-white/40 p-6 sm:p-8 relative z-10 animate-fade-slide-up max-h-[95vh] overflow-y-auto sm:overflow-visible">

      <!-- Brand Logo & Header -->
      <div class="text-center mb-6">

        <h1 class="text-xl sm:text-2xl font-extrabold text-white tracking-tight drop-shadow-sm">
          Selamat Datang Kembali
        </h1>
        <p class="text-xs sm:text-sm text-slate-100/90 mt-1 font-medium drop-shadow-sm">
          Silakan login untuk melanjutkan ke dashboard Pantai Wabokeo.
        </p>
      </div>

      <!-- Alert Pesan Error Login (Kredensial Salah / Server Error) -->
      <div
        v-if="form.errors.login_error"
        class="mb-5 p-3.5 bg-red-500/20 backdrop-blur-md border border-red-300/40 text-red-100 text-xs sm:text-sm rounded-2xl flex items-start gap-2.5 shadow-lg animate-fade-in"
      >
        <svg class="w-5 h-5 text-red-300 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="font-medium leading-snug">
          {{ Array.isArray(form.errors.login_error) ? form.errors.login_error[0] : form.errors.login_error }}
        </div>
      </div>

      <!-- Login Form -->
      <form @submit.prevent="handleLogin" class="space-y-4" novalidate>

        <!-- Email Input -->
        <div>
          <label for="email" class="block text-xs sm:text-sm font-bold text-white mb-1.5 drop-shadow-sm">
            Alamat Email
          </label>
          <div class="relative">
            <input
              id="email"
              v-model="form.email"
              type="email"
              placeholder="Masukkan email terdaftar"
              :class="[
                'w-full px-4 py-2.5 sm:py-3 rounded-xl border bg-white/20 text-white placeholder-slate-200 text-xs sm:text-sm transition-all duration-200 outline-none font-medium backdrop-blur-md',
                (form.errors.email && form.errors.email !== 'Email atau kata sandi yang Anda masukkan salah.')
                  ? 'border-red-400 focus:ring-2 focus:ring-red-400/30 bg-red-500/20'
                  : 'border-white/30 hover:border-white/50 focus:border-[#06B6D4] focus:ring-4 focus:ring-[#06B6D4]/30 focus:bg-white/30'
              ]"
              @input="form.clearErrors('email', 'login_error')"
            />
          </div>
          <!-- Menampilkan Error Lapangan Input khusus Validasi Format/Kosong -->
          <p v-if="form.errors.email && form.errors.email !== 'Email atau kata sandi yang Anda masukkan salah.'" class="text-[11px] sm:text-xs text-red-300 mt-1.5 flex items-center gap-1 font-medium drop-shadow-sm">
            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            {{ form.errors.email }}
          </p>
        </div>

        <!-- Password Input -->
        <div>
          <label for="password" class="block text-xs sm:text-sm font-bold text-white mb-1.5 drop-shadow-sm">
            Kata Sandi
          </label>
          <div class="relative">
            <input
              id="password"
              v-model="form.password"
              :type="showPassword ? 'text' : 'password'"
              placeholder="Masukkan kata sandi"
              :class="[
                'w-full pl-4 pr-11 py-2.5 sm:py-3 rounded-xl border bg-white/20 text-white placeholder-slate-200 text-xs sm:text-sm transition-all duration-200 outline-none font-medium backdrop-blur-md',
                form.errors.password
                  ? 'border-red-400 focus:ring-2 focus:ring-red-400/30 bg-red-500/20'
                  : 'border-white/30 hover:border-white/50 focus:border-[#06B6D4] focus:ring-4 focus:ring-[#06B6D4]/30 focus:bg-white/30'
              ]"
              @input="form.clearErrors('password', 'login_error')"
            />
            <!-- Show / Hide Password Button -->
            <button
              type="button"
              @click="showPassword = !showPassword"
              class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-200 hover:text-white focus:outline-none transition-colors p-1"
              aria-label="Toggle Password Visibility"
            >
              <svg v-if="!showPassword" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              <svg v-else class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.02 10.02 0 013.122-.463c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21M3 3l18 18" />
              </svg>
            </button>
          </div>
          <p v-if="form.errors.password" class="text-[11px] sm:text-xs text-red-300 mt-1.5 flex items-center gap-1 font-medium drop-shadow-sm">
            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            {{ form.errors.password }}
          </p>
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between text-xs sm:text-sm pt-1">
          <label class="flex items-center space-x-2 cursor-pointer select-none group">
            <input
              type="checkbox"
              v-model="form.remember"
              class="w-4 h-4 rounded border-white/40 bg-white/20 text-[#0284C7] focus:ring-[#06B6D4] transition cursor-pointer"
            />
            <span class="text-slate-100 font-medium group-hover:text-white transition-colors drop-shadow-sm">Ingat Saya</span>
          </label>

          <Link
            href="/forgot-password"
            class="font-semibold text-[#E0F2FE] hover:text-[#06B6D4] transition-colors drop-shadow-sm"
          >
            Lupa Password?
          </Link>
        </div>

        <!-- Submit Button -->
        <button
          type="submit"
          :disabled="form.processing"
          class="w-full py-3 px-4 bg-gradient-to-r from-[#0284C7] to-[#06B6D4] hover:from-[#0369a1] hover:to-[#0891b2] text-white font-bold rounded-xl shadow-lg shadow-[#0284C7]/30 hover:shadow-xl hover:shadow-[#0284C7]/40 focus:outline-none focus:ring-4 focus:ring-[#06B6D4]/40 active:scale-[0.98] transition-all duration-200 flex items-center justify-center space-x-2 disabled:opacity-70 disabled:cursor-not-allowed mt-3"
        >
          <span v-if="!form.processing" class="text-sm sm:text-base tracking-wide">Masuk</span>
          <span v-else class="flex items-center space-x-2 text-sm font-medium">
            <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span>Memproses...</span>
          </span>
        </button>
      </form>

      <!-- Decorative Footer Note -->
      <div class="mt-6 pt-4 border-t border-white/20 text-center">
        <p class="text-[11px] sm:text-xs font-medium text-slate-200 drop-shadow-sm">
          &copy; {{ currentYear }} Pantai Wabokeo. Hak Cipta Dilindungi.
        </p>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { Link, useForm } from '@inertiajs/vue3'

defineOptions({
  layout: null
})

const showPassword = ref(false)

const form = useForm({
  email: '',
  password: '',
  remember: false
})

const currentYear = computed(() => new Date().getFullYear())

const validateForm = () => {
  // Hanya bersihkan error kolom email & password, JANGAN bersihkan login_error dari backend
  form.clearErrors('email', 'password')

  let isValid = true
  const emailValue = form.email ? form.email.trim() : ''

  if (!emailValue) {
    form.setError('email', 'Email wajib diisi.')
    isValid = false
  } else {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if (!emailPattern.test(emailValue)) {
      form.setError('email', 'Format email tidak valid.')
      isValid = false
    }
  }

  if (!form.password) {
    form.setError('password', 'Kata sandi wajib diisi.')
    isValid = false
  }

  return isValid
}

const handleLogin = () => {
  if (!validateForm()) return

  form.post('/login-hidden-forAdmin', {
    onFinish: () => form.reset('password'),
  })
}
</script>

<style scoped>
@keyframes fadeSlideUp {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

.animate-fade-slide-up {
  animation: fadeSlideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-6px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
  animation: fadeIn 0.3s ease-out forwards;
}

@keyframes pulseSubtle {
  0%, 100% { transform: scale(1.05); }
  50% { transform: scale(1.08); }
}

.animate-pulse-subtle {
  animation: pulseSubtle 15s ease-in-out infinite;
}
</style>
