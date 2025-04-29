<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>UP-AIMS Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">

  <!-- Header Image Carousel -->
  <div x-data="{ current: 0, images: [
      'storage/cover-photos/5a733aa4-feb1-49bf-8fa2-dfa56775ca71.png',
      'https://via.placeholder.com/1600x400/0f766e/ffffff?text=Urban+Farming',
      'https://via.placeholder.com/1600x400/1e3a8a/ffffff?text=Community+Garden'
    ] }" class="relative w-full h-72 overflow-hidden">
    
    <template x-for="(img, index) in images" :key="index">
      <div x-show="current === index" class="absolute inset-0 transition-all duration-700">
        <img :src="img" class="w-full h-full object-cover" />
      </div>
    </template>

    <!-- Arrows -->
    <button @click="current = (current === 0) ? images.length - 1 : current - 1"
            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full">
      ‹
    </button>
    <button @click="current = (current === images.length - 1) ? 0 : current + 1"
            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full">
      ›
    </button>
  </div>

  <!-- Content Section: Announcements (Left) + Map (Right) -->
  <div class="max-w-7xl mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-2 gap-8">

    <!-- Announcements -->
    <div>
      <h2 class="text-2xl font-bold text-gray-800 mb-4">📢 Announcements</h2>

      <div class="bg-white shadow rounded-lg p-4 mb-6">
        <div class="flex items-center space-x-4">
          <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
          <div>
            <p class="font-semibold text-gray-800">UP-AIMS Admin</p>
            <p class="text-xs text-gray-500">Posted 2 hours ago</p>
          </div>
        </div>
        <p class="mt-4 text-gray-700">🚧 The system will be temporarily unavailable on April 30 from 1AM to 3AM.</p>
      </div>

      <div class="bg-white shadow rounded-lg p-4 mb-6">
        <div class="flex items-center space-x-4">
          <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
          <div>
            <p class="font-semibold text-gray-800">UP-AIMS Admin</p>
            <p class="text-xs text-gray-500">Posted April 20</p>
          </div>
        </div>
        <p class="mt-4 text-gray-700">✨ New CSV upload feature for encoding partners now available.</p>
      </div>
    </div>

    <!-- Google Map -->
    <div>
      <h2 class="text-2xl font-bold text-gray-800 mb-4">🗺️ Farm Locations</h2>
      <div class="w-full h-[500px] rounded-lg overflow-hidden shadow">
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1NtFihS4xhEV8LYEj-WLlVFqcJkMi-l4&ll=7.050571616465707%2C124.95462493207573&z=15"
                class="w-full h-full border-0"
                allowfullscreen
                loading="lazy">
        </iframe>
      </div>
    </div>

  </div>

</body>
</html>
