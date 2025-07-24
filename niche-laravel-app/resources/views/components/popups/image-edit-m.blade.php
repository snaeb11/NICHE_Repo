<!-- Updated version using Tailwind CSS only (no Bootstrap CSS) -->
<!-- Cropper.js CSS (required, does not conflict heavily with Tailwind) -->
<link href="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.css" rel="stylesheet" id="cropper-css"/>

<!-- Required JS Libraries -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tesseract.js@2.1.5/dist/tesseract.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.13/dist/cropper.min.js"></script>

@vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Image Edit Popup (Tailwind Only) -->
<div id="image-edit-popup" style="display: none;" class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
  <div class="min-w-[52vw] max-w-[60vw] max-h-[90vh] bg-[#fffff0] rounded-2xl shadow-xl relative p-8 overflow-y-auto">
    <button id="imageEdit-close-popup" class="absolute top-4 right-4 text-[#575757] hover:text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>

    <div class="flex flex-col md:flex-row gap-6">
      <!-- Left Side -->
      <div class="flex-1 flex flex-col">
        <h2 id="popup-title" class="text-xl font-bold text-[#575757] mb-3">Abstract</h2>
        <div class="border border-[#575757] rounded-xl min-h-[30vh] max-h-[50vh] flex items-center justify-center mb-4 relative overflow-hidden">
          <video id="webcam" autoplay playsinline class="absolute inset-0 w-full h-full object-contain z-0"></video>
          <img id="capturedImage" class="absolute inset-0 w-full h-full object-contain z-10 hidden" alt="Captured">
        </div>

        <!-- Camera Controls -->
        <div class="flex flex-wrap justify-between gap-2 mb-3">
          <button id="openCameraBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Open Camera</button>
          <select id="cameraSelect" class="border border-gray-300 rounded px-2 py-1"></select>
          <label class="flex items-center space-x-2">
            <input type="checkbox" id="flashToggle">
            <span class="text-sm">Flash</span>
          </label>
          <button id="takePictureBtn" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 hidden">Take Picture</button>
          <button id="retakeBtn" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 hidden">Retake</button>
        </div>

        <!-- Contrast Slider -->
        <div class="space-y-3">
          <label for="bwSlider" class="text-sm font-medium text-[#575757]">Contrast Threshold</label>
          <input type="range" id="bwSlider" min="0" max="255" value="80" class="w-full">
        </div>

        <div class="flex justify-end mt-3 gap-2">
          <button id="cropImageBtn" class="bg-gradient-to-r from-[#FFC15C] to-[#FFA206] text-white font-semibold px-4 py-2 rounded-lg hover:brightness-110 transition">Crop Image</button>
          <button id="extractTextBtn" class="bg-gradient-to-r from-[#FFC15C] to-[#FFA206] text-white font-semibold px-4 py-2 rounded-lg hover:brightness-110 transition">Extract Text</button>
        </div>
      </div>

      <!-- Right Side -->
      <div class="flex-1 flex flex-col">
        <h2 class="text-xl font-bold text-[#575757] mb-3">Extracted Text</h2>
        <div class="relative p-4 min-h-[30vh] max-h-[50vh] overflow-auto text-[#575757] bg-white border rounded">
          <textarea id="ocrInput" class="w-full text-sm min-h-[20vh] bg-transparent outline-none resize-none"></textarea>
          <div id="loadingSpinner" class="hidden absolute inset-0 flex-col items-center justify-center bg-white/70 z-10">
            <div class="w-6 h-6 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
            <p class="mt-2 text-[#575757]">Extracting text, please wait...</p>
          </div>
        </div>
        <div class="flex justify-end mt-3">
          <button id="useTextBtn" class="bg-emerald-500 text-white px-4 py-2 rounded hover:bg-emerald-600">Add Text to Form</button>
        </div>
      </div>
    </div>

    <!-- Crop Modal (Tailwind only, will be rendered dynamically) -->
    <div id="cropModal" class="hidden fixed inset-0 bg-black/50 z-50 items-center justify-center">
      <div class="bg-[#fffff0] rounded-xl p-4 w-[90vw] max-w-4xl">
        <div class="flex justify-between items-center border-b pb-2 mb-4">
          <h5 class="text-xl font-bold text-[#575757]">Crop Image</h5>
          <button id="closeCropModal" class="text-red-500 text-xl font-bold">&times;</button>
        </div>
        <div class="w-full h-[60vh] overflow-auto border rounded">
          <img id="imageToCrop" src="#" alt="To Crop" class="max-w-full max-h-full object-contain mx-auto">
        </div>
        <div class="flex justify-end mt-4 gap-2">
          <button id="cancelCropBtn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded">Cancel</button>
          <button id="confirmCropBtn" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Crop</button>
        </div>
      </div>
    </div>
  </div>
</div>




<script>
  document.addEventListener('DOMContentLoaded', () => {
    // === Global Vars ===
    let videoStream = null;
    let currentTrack = null;
    let cropper = null;
    let originalImageDataUrl = "";

    const webcam = document.getElementById('webcam');
    const capturedImage = document.getElementById('capturedImage');
    const flashToggle = document.getElementById('flashToggle');
    const takePictureBtn = document.getElementById('takePictureBtn');
    const retakeBtn = document.getElementById('retakeBtn');
    const bwSlider = document.getElementById('bwSlider');
    const cropModal = document.getElementById('cropModal');
    const ocrInput = document.getElementById('ocrInput');
    const spinner = document.getElementById('loadingSpinner');

    let bwThreshold = parseInt(bwSlider.value, 10);

    // === Close Popup ===
    document.getElementById('imageEdit-close-popup').addEventListener('click', () => {
      document.getElementById('image-edit-popup').style.display = 'none';
      stopCamera();
    });

    // === Populate Camera List ===
    async function populateCameraList() {
      const devices = await navigator.mediaDevices.enumerateDevices();
      const videoDevices = devices.filter(d => d.kind === 'videoinput');
      const select = document.getElementById('cameraSelect');
      select.innerHTML = '';
      videoDevices.forEach((device, i) => {
        const option = document.createElement('option');
        option.value = device.deviceId;
        option.text = device.label || `Camera ${i + 1}`;
        select.appendChild(option);
      });
    }

    // === Switch Camera ===
    document.getElementById('cameraSelect').addEventListener('change', async () => {
      if (!videoStream) return;
      stopCamera();
      await startCamera(document.getElementById('cameraSelect').value);
    });

    // === Start Camera ===
    async function startCamera(deviceId) {
      try {
        videoStream = await navigator.mediaDevices.getUserMedia({
          video: {
            deviceId: { exact: deviceId },
            facingMode: 'environment',
            width: { ideal: 1920 },
            height: { ideal: 1080 }
          }
        });
        webcam.srcObject = videoStream;
        currentTrack = videoStream.getVideoTracks()[0];
        toggleFlashlight();
      } catch (err) {
        console.error("Error starting camera:", err);
        alert("Could not start camera: " + err.message);
      }
    }

    // === Open Camera Button ===
    document.getElementById('openCameraBtn').addEventListener('click', async () => {
      stopCamera();
      capturedImage.classList.add('hidden');
      webcam.classList.remove('hidden');
      takePictureBtn.classList.remove('hidden');
      retakeBtn.classList.add('hidden');

      try {
        const tempStream = await navigator.mediaDevices.getUserMedia({ video: true });
        tempStream.getTracks().forEach(track => track.stop());

        await populateCameraList();
        await startCamera(document.getElementById('cameraSelect').value);
      } catch (err) {
        alert("Camera access failed: " + err.message);
      }
    });

    // === Stop Camera ===
    function stopCamera() {
      if (videoStream) {
        videoStream.getTracks().forEach(t => t.stop());
        videoStream = null;
      }
    }

    // === Flashlight Toggle ===
    flashToggle.addEventListener('change', () => toggleFlashlight());

    function toggleFlashlight() {
      if (!currentTrack) return;
      const flashOn = flashToggle.checked;
      const capabilities = currentTrack.getCapabilities?.();
      if (capabilities?.torch) {
        currentTrack.applyConstraints({ advanced: [{ torch: flashOn }] })
          .catch(e => alert("Torch not supported: " + e.message));
      } else if (flashOn) {
        alert("Torch not supported on this device.");
      }
    }

    // === Take Picture ===
    takePictureBtn.addEventListener('click', () => {
      const canvas = document.createElement('canvas');
      canvas.width = webcam.videoWidth || 640;
      canvas.height = webcam.videoHeight || 480;
      const ctx = canvas.getContext('2d');
      ctx.drawImage(webcam, 0, 0, canvas.width, canvas.height);
      originalImageDataUrl = canvas.toDataURL('image/png');
      capturedImage.src = originalImageDataUrl;
      webcam.classList.add('hidden');
      capturedImage.classList.remove('hidden');
      takePictureBtn.classList.add('hidden');
      retakeBtn.classList.remove('hidden');
      applyBWFilter();
    });

    // === Retake Button ===
    retakeBtn.addEventListener('click', () => {
      document.getElementById('openCameraBtn').click();
    });

    // === Apply B&W Filter ===
    bwSlider.addEventListener('input', () => {
      bwThreshold = parseInt(bwSlider.value, 10);
      applyBWFilter();
    });

    function applyBWFilter() {
      if (!originalImageDataUrl) return;
      const threshold = bwThreshold;
      const img = new Image();
      img.onload = () => {
        const canvas = document.createElement('canvas');
        canvas.width = img.width;
        canvas.height = img.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0);
        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
        const data = imageData.data;
        for (let i = 0; i < data.length; i += 4) {
          const avg = (data[i] + data[i + 1] + data[i + 2]) / 3;
          const bw = avg > threshold ? 255 : 0;
          data[i] = data[i + 1] = data[i + 2] = bw;
        }
        ctx.putImageData(imageData, 0, 0);
        capturedImage.src = canvas.toDataURL('image/png');
      };
      img.src = originalImageDataUrl;
    }

    // === Crop Image Button ===
    document.getElementById('cropImageBtn').addEventListener('click', () => {
      const img = document.getElementById('imageToCrop');
      img.src = capturedImage.src;
      cropModal.classList.remove('hidden');
      cropModal.classList.add('flex');

      setTimeout(() => {
        if (cropper) cropper.destroy();
        cropper = new Cropper(img, {
          aspectRatio: NaN,
          viewMode: 1,
          autoCropArea: 1,
          responsive: true,
        });
      }, 100);
    });

    // === Confirm Crop Button ===
    document.getElementById('confirmCropBtn').addEventListener('click', () => {
      if (!cropper) return;
      const croppedCanvas = cropper.getCroppedCanvas({ width: 640, height: 480 });
      const croppedDataURL = croppedCanvas.toDataURL('image/png');
      capturedImage.src = croppedDataURL;
      originalImageDataUrl = croppedDataURL;
      webcam.classList.add('hidden');
      capturedImage.classList.remove('hidden');
      cropModal.classList.add('hidden');
      cropper.destroy();
      cropper = null;
    });

    // === Cancel/Close Crop Modal ===
    document.getElementById('cancelCropBtn').addEventListener('click', closeCropModal);
    document.getElementById('closeCropModal').addEventListener('click', closeCropModal);

    function closeCropModal() {
      cropModal.classList.add('hidden');
      if (cropper) {
        cropper.destroy();
        cropper = null;
      }
    }

    document.getElementById('extractTextBtn').addEventListener('click', () => {
  runOCR(capturedImage.src);
});

// === OCR ===
  function runOCR(imageDataUrl) {
  spinner.classList.remove('hidden');
  spinner.classList.add('flex');
  ocrInput.value = '';

  Tesseract.recognize(imageDataUrl, 'eng', {
    logger: m => console.log(m)
  }).then(({ data: { text } }) => {
    ocrInput.value = text.trim(); 
  }).catch(err => {
    console.error("OCR Error:", err);
    ocrInput.value = "Error reading text.";
  }).finally(() => {
    spinner.classList.add('hidden');
  });
}

  document.getElementById('useTextBtn').addEventListener('click', () => {
  const extractedText = document.getElementById('ocrInput').value.trim();
  const targetId = window.selectedInputId;

  if (targetId) {
    const targetInput = document.getElementById(targetId);
    if (targetInput) {
      targetInput.value = extractedText;
    } else {
      console.warn('Target input not found for ID:', targetId);
    }
  } else {
    console.warn('window.selectedInputId is not set.');
  }

  document.getElementById('image-edit-popup').style.display = 'none';
});



    // === Init ===
    populateCameraList();
  });
</script>
