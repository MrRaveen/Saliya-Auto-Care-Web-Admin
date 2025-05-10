<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AI Image Generator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      color: #ffffff;
      background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                  url('AIbackground.png') no-repeat center center fixed;
      background-size: cover;
      background-color: #121212; /* Fallback for dark mode */
    }

    header {
      background-image: linear-gradient(to right, #1f093d, #410496);
      color: #ffffff;
    }

    .card {
      background-color: rgba(30, 30, 30, 0.85); /* Slightly transparent dark background */
      border: none;
      color: #ffffff;
    }

    .card-title {
      font-weight: bold;
    }

    .form-control, .form-select {
      background-color: rgba(42, 42, 42, 0.9);
      color: #ffffff;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .form-control::placeholder {
      color: rgba(200, 200, 200, 0.7);
    }

    .btn-primary {
      background-color: #007bff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    footer {
      background-color: #1c1c1c;
    }

    #generated-image {
      max-height: 500px;
    }

    #result-section {
      display: none;
      opacity: 0;
      transition: opacity 1s ease-in-out; /* Smooth fade-in */
    }

    .result-container {
      margin-top: 20px;
    }

    .glass-effect {
      background: rgba(18, 18, 18, 0.7);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <!-- Header -->
  <header class="text-white text-center py-4">
    <h1>AI Image Generator</h1>
    <p>Generate stunning images with the power of AI!</p>
  </header>

  <!-- Main Content -->
  <main class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <!-- Input Form -->
        <div class="card shadow glass-effect">
          <div class="card-body">
            <h4 class="card-title text-center">Enter Your Prompt</h4>
            <form id="image-form">
              <div class="mb-3">
                <label for="prompt" class="form-label">Prompt</label>
                <input type="text" id="prompt" class="form-control" placeholder="THIS SERVICE IS NOT CURRENTLY AVAILABLE (THIS FEATURE WILL BE REMOVED WHEN THERE IS NO TIME TO DEVELOP)" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Generate Image</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Image Result Section -->
    <div class="row justify-content-center mt-5" id="result-section">
      <div class="col-md-8">
        <div class="card shadow">
          <div class="card-body text-center">
            <h4 class="card-title">Generated Image</h4>
            <div class="result-container">
              <img id="generated-image" src="#" alt="Generated Image" class="img-fluid rounded">
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('image-form').addEventListener('submit', function (event) {
      event.preventDefault();
      const imgElement = document.getElementById('generated-image');
      
      // Simulate generating an image
      imgElement.src = 'https://via.placeholder.com/1024'; // Replace with actual image source
      
      const resultSection = document.getElementById('result-section');
      resultSection.style.display = 'block';
      setTimeout(() => {
        resultSection.style.opacity = 1; // Fade in the result section
      }, 50); // Slight delay to allow display change to take effect
    });
  </script>
</body>
</html>
