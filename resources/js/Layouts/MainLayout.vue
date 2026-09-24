<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'
import NavbarPublic from '@/Components/Navbar.vue'
import FooterPublic from '@/Components/Footer.vue'

const page = usePage()

// Pengecekan: Halaman login atau admin tidak boleh menampilkan Navbar & Footer
const hideNavbarFooter = computed(() => {
  const url = page.url
  return url.startsWith('/login') || url.startsWith('/admin')
})
</script>

<template>
  <div class="min-h-screen flex flex-col justify-between">
    <!-- Navbar hanya tampil jika BUKAN halaman /login atau /admin -->
    <NavbarPublic v-if="!hideNavbarFooter" />

    <!-- Konten Utama Halaman (Termasuk Login & Dashboard) -->
    <main class="flex-grow">
      <slot />
    </main>

    <!-- Footer hanya tampil jika BUKAN halaman /login atau /admin -->
    <FooterPublic v-if="!hideNavbarFooter" />
  </div>
</template>