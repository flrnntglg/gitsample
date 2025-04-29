<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Interactive Map UI</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #f4f7fe;
      display: flex;
      height: 100vh;
    }

    .container {
      display: flex;
      width: 100%;
      position: relative;
    }

    .sidebar {
      width: 300px;
      background-color: #ffffff;
      padding: 2rem;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
      display: flex;
      flex-direction: column;
      gap: 1.2rem;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
      transition: transform 0.3s ease-in-out;
      z-index: 2;
    }

    .sidebar.hidden {
      transform: translateX(-100%);
    }

    .sidebar h2 {
      font-size: 1.5rem;
      color: #4a4a4a;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .form-group label {
      font-size: 0.9rem;
      color: #666;
    }

    .form-group input,
    .form-group select {
      padding: 0.7rem;
      border-radius: 10px;
      border: 1px solid #dcdcdc;
    }

    .form-buttons {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .form-buttons button {
      padding: 0.7rem 1.5rem;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-weight: 600;
    }

    .filter-btn {
      background-color: #3f5efb;
      color: white;
    }

    .reset-btn {
      background-color: #e0e0e0;
      color: #333;
    }

    .map-container {
      flex: 1;
      position: relative;
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: width 0.3s ease-in-out;
    }

    .map-container.fullwidth {
      width: 100%;
    }



    iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    @media (max-width: 900px) {
      .container {
        flex-direction: column;
      }
      .sidebar, .map-container {
        width: 100%;
        border-radius: 0;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar" id="sidebar">
      <h2>Map</h2>
      <div class="form-group">
        <label for="technology">Technology</label>
        <input type="text" id="technology" placeholder="Enter technology...">
      </div>
      <div class="form-group">
        <label for="crops">Crops</label>
        <input type="text" id="crops" placeholder="Enter crops...">
      </div>
      <div class="form-group">
        <label for="region">Region</label>
        <select id="region">
          <option>-- Select Region --</option>
        </select>
      </div>
      <div class="form-group">
        <label for="province">Province</label>
        <select id="province">
          <option>-- Select Province --</option>
        </select>
      </div>
      <div class="form-group">
        <label for="municipality">Municipality</label>
        <select id="municipality">
          <option>-- Select Municipality --</option>
        </select>
      </div>
      <div class="form-group">
        <label for="barangay">Barangay</label>
        <select id="barangay">
          <option>-- Select Barangay --</option>
        </select>
      </div>
      <div class="form-buttons">
        <button class="filter-btn">Filter</button>
        <button class="reset-btn">Reset</button>
      </div>
    </div>
    <div class="map-container" id="map-container">
      <button class="toggle-btn" onclick="toggleSidebar()"></button>
      <!-- Embed your Google My Map iframe -->
      <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1NtFihS4xhEV8LYEj-WLlVFqcJkMi-l4&ll=7.050571616465707%2C124.95462493207573&z=15" allowfullscreen></iframe>
    </div>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const mapContainer = document.getElementById('map-container');
      sidebar.classList.toggle('hidden');
      mapContainer.classList.toggle('fullwidth');
    }
  </script>
</body>
</html>
